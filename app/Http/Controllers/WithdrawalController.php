<?php

namespace App\Http\Controllers;

use App\Withdrawal;
use App\Customer;
use App\Balance;
//use App\Birthday;
use App\Sms;

use DB;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\HttpException;
use Ixudra\Curl\Facades\Curl;


class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.add_withdrawal');
    }

    public function birthday()
    {
        $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        return view('admin.birthday', compact('months'));
    }

    public function findbirthday(Request $request)
    {
        if($request->ajax()){
           $data = DB::table('birthdays')
           ->where('day', '=', $request->day)
            ->Where('month', '=', $request->month)
            ->pluck('phone')->implode(',');
            return response()->json($data);
            // return view('admin.me', compact('data')); 

        }
    }

    public function findAccount(Request $request)
    {
        $data = Customer::join('balances', 'balances.cust_id', '=', 'customers.id')
            ->where('customers.cust_code', $request->cust_code)
            ->select('customers.company','customers.firstname','customers.lastname','customers.email','customers.phone','customers.address', 'balances.balance')
            //->selectRow('customers.company, CONCAT(customers.firstname, " ",customers.lastname) AS fullname,  customers.email,customers.phone,customers.address, balances.balance')
            ->first(); 
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function view()
    {
        return view('admin.view_withdraw');
    }

    public function view_withdrwal(Request $request)
    {
        if($request->ajax()){

            $data = Customer::join('withdrawals', 'withdrawals.cust_id', '=', 'customers.id')
                ->where('customers.cust_code', 'like', '%'.$request->account.'%')->get();
            return response()->json($data);


            // $page = Input::get('page', 1);
            // $perPage = 7;
            // $offset = ($page * $perPage) - $perPage;

            // $pag_views = new LengthAwarePaginator(
            //     array_slice($data, $offset, $perPage, true),
            //     count($data),
            //     $perPage,
            //     $page,
            //     ['path' => $request->url(), 'query' => $request->query()]
            // );

            // return view('admin.withdrawal')->with('pag_views', $pag_views);
        }
    }

    public function getCURL()
    {
        // $response = Curl::to('http://smsc.smsremlex.net/index.php')
        //                     ->get();
        // dd($response);
    }

    public function create()
    {
        //
    }

    public function test()
    {
        $dataSet1 = DB::table('withdrawals')->where('cust_id', 8)->pluck('wth_phone')->implode(',');
        
        //return view(('/admin/dashboard'),compact('dataset1'));
        dd($dataSet1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'acct_id' => 'required',
            'withdraw' => 'required',
            'wth_name' => 'required',
            'wth_phone' => 'required|numeric',
            'wth_address' => 'required|string|min:10|max:225'
        ]);


        if($validate){

            $cust_id = Customer::where('cust_code', $request->acct_id)->first();

            if($request->withdraw > $request->balance){
                 return redirect('/admin/add_withdrawal')->with(['error'=> 'Withdrawal Amount is more than your balance']);
                 // return redirect()->back()->with(['error'=> 'Withdrawal Amount is more than your balance']);
            }

            $ref = rand(100000000, 999999999);
            $withdrawal = new Withdrawal;
            $withdrawal->cust_id = $cust_id->id;
            $withdrawal->user_id = Auth::user()->id;
            $withdrawal->amount_wth = $request->withdraw;
            $withdrawal->wth_name = $request->wth_name;
            $withdrawal->wth_phone = $request->wth_phone;
            $withdrawal->wth_address = $request->wth_address;
            if($withdrawal->save()){
                // insert into invoice table
                $id = $withdrawal->id;
                $amt = $request->balance - $request->withdraw;
                

               if($withdrawal){

                    $BalUpdate = Balance::where('cust_id', $cust_id->id)
                    ->update([
                            'balance'=> $amt,
                    ]);

                    
                    ///////////////////// Begining SMS Code /////////////////////////
                    //$phone_number = $request->input('phone_number');
                    //$phone_number = $request->wth_phone;
                    $phone_number = $request->phone;
                    $message = "Welcome $request->company, Amt:NGN $request->withdraw DR Payment Ref: RT-$ref. Avail Bal: NGN $amt.00";
                    $sms = new Sms();
                    $sms->initiateSmsActivation($phone_number, $message);

                    ///////////////////// End SMS Code /////////////////////////

                    return redirect()->route('withdraw.post_withdrawal')->with('message', 'Withdraw '. $request->withdraw. ' Successfully');
               }
           }         
       }else{
            return redirect()->back()->withInput();
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function show(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdrawal $withdrawal)
    {
        //
    }

    
    public function disy()
    {
       // $withdraws = Withdrawal::all()->get();
        $withdraws = DB::table("withdrawals")->get();
        return view('admin.view_withdraw',compact([ 'withdraws' => $withdraws]));
    }

    public function deletesingle($id)
    {
        DB::table("withdrawals")->delete($id);
        return response()->json(['success'=>"Product Deleted successfully.", 'tr'=>'tr_'.$id]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("withdrawals")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }


    public function api(Request $request)
    {
       //if (!$id) {
        if (!$request->cust_code) {
           throw new HttpException(400, "Invalid id");
        }
        // $book = Book::find($id);
        // return response()->json([
        //     $book,
        // ], 200);

        $data = Customer::join('balances', 'balances.cust_id', '=', 'customers.id')
            ->where('customers.cust_code', $request->cust_code)
            ->select('customers.company','customers.firstname','customers.lastname','customers.email','customers.phone','customers.address', 'balances.balance')
            ->first(); 
        return response()->json([$data], 200);
    }
}
