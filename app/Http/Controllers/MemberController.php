<?php

namespace App\Http\Controllers;

use Auth;
use App\Member;
use App\Product;
use App\Customer;
use App\Withdrawal;

use Illuminate\Http\Request;
use Response;

use Illuminate\Support\Facades\Validator;

use Session;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            // $data = [];
            // for($i=0,$i<count($input['item_id']);$i++)
            // {
            //  $data[]= array ('item_id'=>$input[$i]['item_id'],
            //                  'item_description'=>$input[$i]['item_description']);
            //                  'units'=>$input[$i]['units']);
            //                  'rate'=>$input[$i]['rate']);
            //                  'initial_amount'=>$input[$i]['initial_amount']);
            // }
            // Model::insert($data); // Eloquent
            // DB::table('table')->insert($data); // Query Builder
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
                return redirect('/admin/view')->with('message', 'Successfully Inserted');
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
        

        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return back()->with([
                'message' => 'Please check your credential and try again.'
            ]);
        }else{
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
            );

            if(Auth::attempt($userdata)){
                return redirect('/admin/dashboard');
            }
            // else{
            //     //return
            // }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $views = Member::all();
        return view('admin.view', compact('views'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $findUser = Member::find( $member->id);
        if($findUser->delete()){

            return back()->with('message', 'User has been remove from database');

        }
    }

     public function logout(Request $request)
     {

        auth()->logout();
        Session::flush();
        return redirect('/admin/admin-login');
        
        
        //  $this->guard()->logout();
        // $request->session()->invalidate();
        // $request->session()->flash('message', 'You are logged out!');
        // return redirect('/admin/admin-login');
     }

     public function api($id){
        //$items = Member::where('id', $id)->orderBy('id')->lists('id', 'firstname', 'lastname', 'username', 'remember_token')->get();
        $items = Member::where('id', $id)->get();
        //$itemsp = Product::all();
        $itemsp = Product::where('id', $id)->get();
        return Response::json([
            'success'=>true, 
            'items'=>$items,
            'itemsp'=>$itemsp,

        ]);
     }
}
