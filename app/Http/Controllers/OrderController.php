<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Customer;
use App\Product;
use App\Invoice;
use DB;
//use App\Carbon;

use Auth;

class OrderController extends Controller
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
       $views_prods = Product::all();
       $views_custs = Customer::all();
       $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
       // return view('admin.add_customer');
       return view('admin.add_invoice', compact(['views_prods','views_custs', 'months']));
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

    public function findNumber(Request $request)
    {
        //$data = Withdrawal::where('cust_id', $request->cust_no)->pluck('wth_phone')->implode(','); 
        $data = DB::table('withdrawals')->where('cust_id', $request->cust_id)->pluck('wth_phone')->implode(',');
        return response()->json($data);
        //return $data;
    }

    public function insert(Request $request)
    {
        $validate = $request->validate([
            'company' => 'required',
            //'account' => 'required',
            'productname' => 'required',
            'qty' => 'required',
        ]);
        //if($validate){}
        $order_code = str_random(8);
        $orders = new Order;
        $orders->order_code = $order_code;
        $orders->user_id = Auth::user()->id;
        $orders->company = $request->company;
        $orders->firstname = $request->firstname;
        $orders->lastname = $request->lastname;
        $orders->email = $request->email;
        $orders->phone = $request->phone;
        $orders->address = $request->address;
        if($orders->save()){
            // insert into invoice table

            $id = $orders->id;
            $inv_code = str_random(8);
            $description = 'Goods order';
            $prod=Input::get('productname');
            $qty=Input::get('qty');
            $price=Input::get('price');
            $discount=Input::get('discount');
            $amount=Input::get('amount');

            $input = Input::all();
            //dd(Input::get('productname'));

            for($i = 0; $i < count($prod); $i++) {
                $invoice = new Invoice;
                $invoice->invoice_id = $inv_code;
                $invoice->order_id = $id;
                $invoice->user_id = Auth::user()->id;
                $invoice->description = $description;
                $invoice->prod_name = $input['productname'][$i];
                $invoice->qty = $input['qty'][$i];
                $invoice->price = $input['price'][$i];
                $invoice->discount = $input['discount'][$i];
                $invoice->total = $input['amount'][$i];
                $invoice->status = 1; 


                //dd(count($input['productname']));
                ////////////////////second ////////////////               
                // $data = [];

                // for ($i = 0; $i < count($prod); $i++) {
                //     $data[] = [
                //         'invoice_id' => $inv_code,
                //         'order_id' => $id,
                //         'user_id' => Auth::user()->id,
                //         'description' => $description,
                //         'prod_name' => $prod[$i],
                //         'qty' => $qty[$i],
                //         'price' => $price[$i],
                //         'discount' => $discount[$i],
                //         'total' => $amount[$i],
                //         'status' => 1,
                //         'created_at' => date('Y-m-d:H:i:s'),
                //         'updated_at' => date('Y-m-d:H:i:s')
                //     ];
                $invoice->save();
            }   
            //Invoice::insert($data);
            
            //DB::table('tablename')->insert($tableitems);
                      
          }
        return redirect()->route('customer.fetchproduct')->with('message', 'Invoice Added Successfully');

        // try {
        //   $this->buildXMLHeader;
        // }
        // catch (\Exception $e) {
        //     return $e->getMessage();
        // }
    }

    // public function addPost(Request $req){
    //     $rules = array(
    //       'title' => 'required,
    //       'body' => 'required,
    //     );
    //     $validator = Validator::make(input::all(), $rules);
    //     if($validator->fails())
    //         return response::json(array('error'=>$validator->getMessageBag()->toarray()));

    //     else{
    //         $post = new post;
    //         $post->title = $req->title;
    //         $post->body = $req->body;
    //         $post->save();
    //         return response->json($post);
    //     }
    // }

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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
