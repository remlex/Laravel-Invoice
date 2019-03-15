<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Product;
use App\Withdrawal;
use App\Depositor;
use App\Customer;
use Illuminate\Http\Request;

use DB;

use Response;

use Illuminate\Support\Facades\Validator;
use Log;

use Session;


class Usercontroller extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function add_user()
    {
        return view('admin.add_user');
    }

    public function add()
    {
      return view('admin.add');
    }
    public function newadd()
    {
      return view('admin.newadd');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function summary(Request $request){     
        if(Auth::check() && Auth::user()->roles == "Admin"){
            $count = User::where('status','=','1')->get();
            $Tproduct = Product::all();
            $TCust = Customer::all();
            $sumW = Withdrawal::where('cust_id','=','8')->selectRaw('SUM(amount_wth) as total')->get();
            $sumD = Depositor::where('cust_id','=','8')->selectRaw('SUM(amount_dep) as total')->get();
            return view('admin.dashboard',[
                'count'=>$count, 
                'Tproduct'=>$Tproduct,
                'sumW'=>$sumW,
                'sumD'=>$sumD,
                'TCust'=>$TCust
            ]);
        }else{
            $count = User::where(['username' => Auth::user()->username, 'status' => 1])->get();
            return view('admin.dashboard',[
                'count'=>$count, 
            ]);
       } 
    }

    public function index()
    {
        //
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|string|email|min:6|max:255|unique:users',
            'phone' => 'required|max:13',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required',
        ]);
        if($validate){
           $token = str_random(40);
            $ver = 0;

            $user = User::create([
                'firstname' => request('firstname'),
                'lastname' => request('lastname'),
                'email' => request('email'),
                'phone' => request('phone'),
                'address' => request('address'),
                'country' => request('country'),
                'state' => request('state'),
                'username' => request('username'),
                'password' => bcrypt(request('password')),
                'verified' => $ver,
                'status' => 1,
                'roles' => request('roles'),
                'remember_token' => $token,
             ]); 

            if($user){
                return redirect('/admin/view')->with('message', 'User Added Successfully');
            }
            return redirect('/admin/add_user')->with('error', 'Cannot Insert Records');
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function loginpage()
    {
        return view('admin.admin_login');
    }

    public function login_admin(Request $request)
    {
        if(!Auth::attempt(request(['email', 'password']))){  //'email' => $email, 'password' => $password, 'active' => 1
            return back()->with([
                'error' => 'Please check your credential and try again.'
            ]);
        }
        return redirect('/admin/dashboard');//->login();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if(Auth::check() && Auth::user()->roles == "Admin"){
            $views = User::all();
            return view('admin.view', compact('views'));
        }else{
           // $views = User::where(['username' => auth()->user('id'), 'status' => 1])->get();
            $views = User::where(['email' => Auth::user()->email, 'status' => 1])->get();
           // $test = Product::paginate(3);
           return view('admin.view', compact('views'));
           //return view('admin.view', compact('test'));
       } 
       return redirect('admin.admin_login');//->login();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findUser = User::find($id);
        if($findUser->delete()){
           return back()->with('message', 'User Deleted Successfully');
        }
    }

    public function logout() //Request $request
     {
        Auth::logout();
        Session::flush();
        Session::flash('message', 'You are logged out!');
        return redirect('/');
     }

    public function api(Request $request, $id){
        //$items = User::where('id', $id)->get();

        $data = User::join('customers', 'customers.user_id', '=', 'users.id')
                ->where('customers.cust_code', '=', $request->cust_code)->get();

        $itemsp = Product::where('id', $id)->get();
        // if(!$request->cust_code && $id){
        //     return Response::json([
        //         'unsuccessful'=>failed, 
        //         // 'items'=>$items,
        //         // 'itemsp'=>$itemsp,
        //         'data' => $data

        //     ]);
        // }
        return Response::json([
                'success'=>true, 
                // 'items'=>$items,
                 'itemsp'=>$itemsp,
                'data' => $data

            ]);           
        
     }
}
