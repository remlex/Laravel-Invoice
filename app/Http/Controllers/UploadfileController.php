<?php

namespace App\Http\Controllers;

use App\Uploadfile;
use App\Product;
use Illuminate\Http\Request;
//use App\Http\Controllers\Upload;

use Mail;
// use Session;
// use Image;
// use Storage;
// use App\Mailfile;

class UploadfileController extends Controller
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
        //return view('admin.add_uploadfile');

        $views_prods = Product::all();
        return view('admin.add_uploadfile', compact('views_prods'));
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
       // $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|max:13',
            'email' => 'required|string|email',
            'photos' => 'required|mimes:jpeg,jpg,png,gif,pdf,doc,xls,docx|max:2048',
        ]);

        if($validate){ //->passes()

            if($request->hasFile($request->input('photos'))){
                //$user_profile = time().'.'.$request->file('photos')->getClientOriginalExtension();
                $user_profile = $request->file('photos')->getClientOriginalName();
                $NewFilePath = $request->file('photos')->move(public_path('\cssjs_admin/images/upload'), $user_profile);
            }

            $uploadfile = Uploadfile::create([
                'name' => request('name'),
                'phone' => request('phone'),
                'email' => request('email'),
                //'photos' => request('photos')->getClientOriginalName(),
                'photos' => $user_profile,
             ]); 

            if($uploadfile){

                $name = $request->get('name');
                $email = $request->get('email');
                $phone = $request->get('phone');
                $photos = $request->get('photos');
                //$enq_message = $request->get('enq_message');
                
                $data = array(
                        'name' => $name,
                        'email' => $email,
                        'phone'=>$phone,
                        'photos' => $photos
                );

                Mail::send('admin.mail', $data, function($message) {
                    $message->subject("A new Member has been Registered" );
                    $message->from('noreply@remlextech.org', 'Your application title');
                    $message->to('test@remlextech.org');
                });

                // $user = new User;
                //  $user->name=$request->get('name');
                //  $user->email=$request->get('email');
                //  $user->password=$request->get('password');
                // $user->verification_token = md5(uniqid('KP'));
                // $user->save();
                // $activation_link = route('user.activate', ['email' => $user->email, 'verification_token' => urlencode($user->verification_token)]);
                // Mail::send('users.email.welcome', ['name' => $user->name, 'activation_link' => $activation_link], function ($message) use($user,$activation_link)
                //    {
                //       $message->to($user->email, $user->name)->subject('Welcome to Expertphp.in!');    
                //     });
    
                return redirect('/admin/uploadfile')->with('message', 'Document Successfully Uploaded Successfully');
            }
                //return redirect('/admin/add_user')->with('error', 'Cannot Insert Records');
            

        }else{
            //return redirect()->back()->with('message', 'Cannot Insert Records');  //'/admin/uploadfile'
            return redirect('/admin/uploadfile')->with('message', 'Sorry, the format of uploaded files is not allow and too big to upload');
        }
    }

    public function confirm(Request $request){
        // $input = $request->all();
        // $validator = $this->validator($input);

        // if($validator->passes()){
        //     $user = $this->create($input)->toArray();
        //     $user['link'] = str_random(30);

        //     DB::table('users_activations')->insert(['id_user'=>$user['id'], 'token'=>$user['link']]);

        //     Mail::send('admin.activation', $user, function($message) use ($user){
        //          $message->to($user['email']);
        //          $message->subject('scqq.blogspot.com - Activation Code');   
        //     });
        //     return redirect()->to('login')->with('success', 'We sent activatin code, please check your email');
        // }
        // return back()->->with('error', $validator->error());
    }

    public function userActivation($token){
        // $check = DB::table('isers_activations')->where('token', $token)->first();
        // if(!is_null($check)){

        //     $user = User::find($check->id_user);
        //     if($user->is_activated ==1){
        //         return redirect()->to('login')->with('success', 'User are already activated')
        //     }
        //     $user->update(['is_activated'=>1]);
        //     DB::table('users_activations')->where('token', $token)->delete();
        //     return redirect()->to('login')->with('success', "User active successfully");
        // }

        // return redirect()->to('login')->with('warning', "Your token is invalid");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Uploadfile  $uploadfile
     * @return \Illuminate\Http\Response
     */
    public function show(Uploadfile $uploadfile)
    {
        $views_upload = Uploadfile::all();
        return view('admin.view_upload', compact('views_upload'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Uploadfile  $uploadfile
     * @return \Illuminate\Http\Response
     */
    public function edit(Uploadfile $uploadfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uploadfile  $uploadfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uploadfile $uploadfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uploadfile  $uploadfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uploadfile $uploadfile)
    {
        //
    }
}
