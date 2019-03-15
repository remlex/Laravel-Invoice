<?php

namespace App\Http\Controllers;

use App\Depositor;
use App\Customer;
use App\Balance;
use Illuminate\Http\Request;
use DB;

use Auth;

class DepositorController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add_depositor');
    }

    public function findAccount(Request $request)
    {
        $data = Customer::join('balances', 'balances.cust_id', '=', 'customers.id')
            ->where('customers.cust_code', $request->cust_code)
            ->select('customers.company','customers.firstname','customers.lastname','customers.email','customers.phone','customers.address', 'balances.balance')
            ->first(); 
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'deposit' => 'required',
            'dep_name' => 'required',
            'dep_phone' => 'required|numeric',
            'dep_address' => 'required|string|min:10|max:225'
        ]);


        if($validate){

            $cust_id = Customer::where('cust_code', $request->acct_id)->first();
           // $user_id = User::where('id', Auth::user()->id)->first();

            //$deposit = rand(10000, 99999);
            $deposit = new Depositor;
            $deposit->cust_id = $cust_id->id;
            $deposit->user_id = Auth::user()->id;
            $deposit->amount_dep = $request->deposit;
            $deposit->dep_name = $request->dep_name;
            $deposit->dep_phone = $request->dep_phone;
            $deposit->dep_address = $request->dep_address;
            if($deposit->save()){
                // insert into invoice table
                $id = $deposit->id;
                $amt = $request->deposit + $request->balance;

               if($deposit){

                    $BalUpdate = Balance::where('cust_id', $cust_id->id)
                    ->update([
                            'balance'=> $amt,
                    ]);
                    return redirect()->route('deposit.post_depositor')->with('message', 'Depositor Added Successfully');
               }
           }         
       }else{
            return redirect()->back()->withInput();
       }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depositor  $depositor
     * @return \Illuminate\Http\Response
     */
    public function show(Depositor $depositor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depositor  $depositor
     * @return \Illuminate\Http\Response
     */
    public function edit(Depositor $depositor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depositor  $depositor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depositor $depositor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depositor  $depositor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depositor $depositor)
    {
        //
    }
}
