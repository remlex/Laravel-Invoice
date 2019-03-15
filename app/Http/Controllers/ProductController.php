<?php

namespace App\Http\Controllers;

use App\Product;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;
use DB;

class ProductController extends Controller
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
        return view('admin.add_product');
    }

    public function info()
    {
        return view('admin.view_info');
    }


    public function view_info(Request $request)
    {
        if($request->ajax()){
            $datas = Customer::where('cust_code', 'like', '%'.$request->account.'%')->get();
            return response()->json($datas);
        }

        // $test = Product::paginate(3);
        // return view('admin.view_prod', compact('test'));
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
            'name' => 'required',
            'price' => 'required|min:3',
            'qty' => 'required',
            'stocks' => 'required',
        ]);
        if($validate){

            $p_code = str_random(8);

            $user = Product::create([
                'prod_code' => $p_code,
                'name' => strip_tags(request('name')),
                'price' => request('price'),
                'qty' => request('qty'),
                'stocks' => request('stocks'),
            ]);

           if($user){

             // return redirect()->route('product.addProduct')->with('message', 'Successfully Inserted');
            return redirect()->route('product.view_product')->with('message', 'Product Added Successfully');
            }
            return redirect('/admin/add_product')->with(['error'=> 'Cannot Insert Records']);
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function addProduct(Request $request) {
    $rules = array (
            'name' => 'required',
            'price' => 'required|min:3',
            'qty' => 'required',
            'stocks' => 'required',
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails ())
        return Response::json(array(
                    
                'errors' => $validator->getMessageBag()->toArray()
        ));
        else {
            $p_code = str_random(8);
            $data = new Product;
            $data->prod_code = $p_code;
            $data->name = $request->name;
            $data->price = $request->price;          
            $data->qty = $request->qty;            
            $data->stocks = $request->stocks;
            $data->save();
            // return response()->json($data, ['message'=>'Insert Successfully!']);

        }
}

    public function addProduct_ajax()
    {
        return view('admin.add_product2');
    }

    public function addProduct2(Request $request){
        $name = $request->name;
        $price = $request->price;
        $qty = $request->qty;
        $stocks = $request->stocks;
        $p_code = str_random(8);

        $addProduct2 = DB::table('products')->insert([
            'prod_code' => $p_code,
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
            'stocks' => $stocks,
            'created_at' => \Carbon\Carbon::now()->toDateTimestring(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimestring()
        ]);
        if($addProduct2){
            echo "Success";
        }else{
            echo "Error";
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $views_prods = Product::paginate(4);
        return view('admin.view_prod', compact('views_prods'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::find($product->id);

        return view('/admin/edit_product', ['products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //update data
        $productUpdate = Product::where('id', $product->id)
                ->update([
                        'name'=>$request->input('name'),
                        'price'=>$request->input('price'),
                        'qty'=>$request->input('qty'),
                        'stocks'=>$request->input('stocks'),
                ]);

        if($productUpdate){

            //return redirect('/admin/view_prod')->with('message', 'Successfully Updated');
            return redirect()->route('product.view_product')->with('message', 'Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findProduct = Product::find($id);
        if($findProduct->delete()){
           return back()->with('message', 'Product Deleted Successfully');
        }
    }
}
