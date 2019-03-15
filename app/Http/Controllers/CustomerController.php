<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Balance;
use App\Product;
use App\Invoice;
use App\Withdrawal;
use DB;

use Auth;

class CustomerController extends Controller
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
       return view('admin.add_customer');
    }

    public function findPrice(Request $request)
    {
        $data = Product::select('price')->where('id', $request->id)->first();
        //$data = Product::find('id', $id)->get();
        return response()->json($data);
    }

    public function findCompany(Request $request)
    {
        $data = Customer::all()->where('id', $request->id)->first(); 
        return response()->json($data);
       // return response()->json(['message' =>'success']);
    }

    public function findAccount(Request $request)
    {
        $data = Customer::all()->where('cust_code', $request->cust_code)->first(); 
        return response()->json($data);
    }

    public function view_customer(Request $request)
    {
        if($request->ajax()){
            $data = Customer::where('cust_code', 'like', '%'.$request->account.'%')->first();
            return response()->json($data);
        }
    }

    public function view_info2(){
       return view('admin.view_info2');
    }
    // public function view_getinfo(Request $request)
    // {
    //     if($request->ajax()){
    //     $output="";
    //     $customers=DB::table('customers')->where('cust_code','LIKE','%'.$request->account."%")->get();
    //         if($customers){
    //             foreach ($customers as $customer) {         
    //                 $output.='<tr>'.                  
    //                 '<td>'.$customer->cust_code.'</td>'.         
    //                 '<td>'.$customer->firstname.'</td>'.         
    //                 '<td>'.$customer->lastname.'</td>'.         
    //                 '<td>'.$customer->email.'</td>'.         
    //                 '<td>'.$customer->address.'</td>'.         
    //                 '<td>'.$customer->phone.'</td>'.         
    //                 '</tr>';         
    //             } 
    //             //return response()->json($output); 
    //             return Response($output); 
    //         } 
    //     } 
    // }

    public function summary()
    {
        $Tcustomer = Customer::all();
        return view('admin.dashboard',[
            'Tcustomer'=>$Tcustomer
        ]);
    }

    public function insert(Request $request)
    {
        $validate = $request->validate([
            'company' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|string|email|min:6|max:255|unique:customers',
            'phone' => 'required|numeric',
            'address' => 'required|string|min:10|max:225'
        ]);
        if($validate){

            $cust_code = rand(10000, 99999);
            $customer = new Customer;
            $customer->cust_code = 'RT-'.$cust_code;
            $customer->user_id = Auth::user()->id;
            $customer->company = $request->company;
            $customer->firstname = $request->firstname;
            $customer->lastname = $request->lastname;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            if($customer->save()){
                // insert into invoice table
                $id = $customer->id;

               if($customer){
                DB::table('balances')->insert(
                        array(
                        //$data = array(
                            'cust_id' => $id,
                            'user_id' => Auth::user()->id,
                            'balance'=> $request->open_amt,
                            'created_at' => date('Y-m-d:H:i:s'),
                            'updated_at' => date('Y-m-d:H:i:s'),
                        )
                    );
               }
                   
            }
            if(request('samePage')){
              return redirect()->route('customer.fetchproduct')->with('message', 'New Customer Added Successfully');
             }

             else{
                return redirect()->route('customer.addcustomer')->with('message', 'New Customer Added Successfully');
             }

            
        }

            return redirect('/admin/addcustomer')->with(['error'=> 'Cannot Add this Customer']);
        }/*else{
            return redirect()->back()->withInput();
        }*/
    //}

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.view_customer');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
