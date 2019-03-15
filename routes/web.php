<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('login', function(){
	return redirect('/admin/admin-login'); //admin/admin-login
})->name('login');	


	Route::get('/admin/admin-login', 'UserController@loginpage')->name('user.logout'); //
	Route::post('/admin/admin-login', 'UserController@login_admin');
	Route::get('/admin/logout', 'UserController@logout');//->name('user.logout')



//Route::group(['middleware'=>['web']], function() {
Route::group(['middleware' => 'auth'], function(){	
//Route::group(['middleware'=>['auth']], function() {

	Route::get('/admin/dashboard', 'UserController@dashboard')->name('admin.dashboard');
	Route::get('/admin/add_user', 'UserController@add_user');

// Route::middleware(['auth'])->group(function(){});
	//////////////////// Begining Project Route //////////////////
	Route::get('/admin/add', 'UserController@add');
	Route::post('/admin/add', 'UserController@store');
	//Route::post('/admin/add', 'UserController@store')->middleware('auth');

	Route::get('/admin/newadd', 'UserController@newadd');
	Route::get('/admin/view', 'UserController@show');
	Route::delete('/admin/user/{id}', 'UserController@destroy');

	Route::get('/admin/dashboard', 'UserController@summary');

	

	//Route::get('/admin/member/{id}', 'UserController@api');
	Route::get('/admin/member/{cust_code}/{id}', 'UserController@api');

	//////////////////// Ending Project Route ///////////////////////

	//////////////////// Begining Product Route //////////////////
	Route::get('/admin/addproduct', 'ProductController@index')->name('product.addProduct');
	Route::post('/admin/addproduct', 'ProductController@store');
	Route::get('/admin/addProduct_ajax', 'ProductController@addProduct_ajax');
	Route::post('/admin/addproduct2', 'ProductController@addProduct2');
	//Route::post('/admin/add-product', 'ProductController@addProduct');
	Route::get('/admin/view_product', 'ProductController@show')->name('product.view_product');

	Route::get('/admin/products/{product}', 'ProductController@edit');


	Route::get('/admin/view_info', 'ProductController@info');
	Route::get('/admin/view_info2', 'ProductController@view_info');

	Route::post('/admin/products/{product}', 'ProductController@update');

	Route::delete('/admin/product/{id}', 'ProductController@destroy');
	//Route::get('/admin/product/view', 'ProductController@viw');

	//////////////////// Ending Project Route ///////////////////////

	//////////////////// Begining Order Route //////////////////

	Route::get('/admin/addinvoice', 'OrderController@index')->name('customer.fetchproduct');
	Route::get('/admin/fetchproduct', 'OrderController@fetchProducts');
	//Route::get('/admin/findPrice', 'CustomerController@findPrice');
	Route::get('/admin/findPrice', array('as'=>'findPrice','uses'=>'OrderController@findPrice'));
	Route::get('/admin/findCompany', array('as'=>'findCompany','uses'=>'OrderController@findCompany'));
	Route::get('/admin/findAccount', array('as'=>'findAccount','uses'=>'OrderController@findAccount'));
	Route::get('/admin/findNumber', array('as'=>'findNumber','uses'=>'OrderController@findNumber'));
	Route::post('/admin/insert', array('as'=>'insert','uses'=>'OrderController@insert'));


	//////////////////// Ending Order Route ///////////////////////

	//////////////////// Begining Upload File Route //////////////////
	Route::get('/admin/uploadfile', 'UploadfileController@index')->name('uploadfile.result');
	Route::post('/admin/uploadfile', 'UploadfileController@store');
	Route::get('/admin/view_upload', 'UploadfileController@show');

	Route::get('/admin/mail', 'UploadfileController@show');

	//////////////////// Ending Upload File Route ///////////////////////


	/////////////////////// Beginging of Customer Route ////////////////////////////////////////

	Route::get('/admin/addcustomer', 'CustomerController@index')->name('customer.addcustomer');
	Route::post('/admin/addcustomer', 'CustomerController@insert');

	Route::get('/admin/view_customer', 'CustomerController@show');
	Route::get('/admin/findAccount', array('as'=>'findAccount','uses'=>'CustomerController@findAccount'));
	Route::get('/admin/view_cust', array('as'=>'view_info2','uses'=>'CustomerController@view_info'));


	// Route::get('/admin/load-data', 'CustomerController@loadData');
	// Route::get('/admin/read-data', 'CustomerController@readData');

	Route::get('/admin/search-customer','CustomerController@view_info2');
	// Route::get('/admin/search','CustomerController@view_getinfo');


	//Route::post('/admin/view_info2', 'CustomerController@view_info');
	//////////////////// Ending of Customer Route //////////////////

	/////////////////////// Beginging of Depositor Route ////////////////////////////////////////

	Route::get('/admin/add_depositor', 'DepositorController@index')->name('deposit.post_depositor');
	
	Route::get('/admin/findAccount_deposit', array('as'=>'findAccount','uses'=>'DepositorController@findAccount'));

	Route::post('/admin/post_deposit', 'DepositorController@store');
	//////////////////// Ending of Depositor Route //////////////////

	/////////////////////// Beginging of Withdrawal Route ////////////////////////////////////////
// Route::group(['prefix' => 'withdrwal', 'middleware' => 'auth'], function() {
	Route::get('/admin/add_withdrawal', 'WithdrawalController@index')->name('withdraw.post_withdrawal');
	
	Route::get('/admin/findAccount_withdrawal', array('as'=>'findAccount','uses'=>'WithdrawalController@findAccount'));

	Route::post('/admin/post_withdrawal', 'WithdrawalController@store');
	Route::get('/admin/view_withdrawal', 'WithdrawalController@view');
	Route::get('/withdrwal/admin/post_withdrawal/{id}', 'WithdrawalController@api');

	Route::get('/admin/view_withdraw', 'WithdrawalController@view_withdrwal');

	Route::get('/admin/findbirthday', array('as'=>'findbirthday','uses'=>'WithdrawalController@findbirthday'));

	Route::get('/admin/test2', 'WithdrawalController@test');
	Route::get('/admin/getcurl', 'WithdrawalController@getCURL');
	//Route::get('/admin/test2', 'WithdrawalController@test')->middleware('auth');

	// Route::get('/admin/mywithdrawal', 'WithdrawalController@disy');
	// Route::delete('/admin/mywithdrawal/{id}', 'WithdrawalController@deletesingle');
	// Route::delete('/admin/mywithdrawalDeleteAll', 'WithdrawalController@deleteAll');// });
	//////////////////// Ending of Depositor Route //////////////////

	/////////////////////// Beginging of Depositor Route ////////////////////////////////////////

	Route::get('/admin/birthday', 'WithdrawalController@birthday');
	//////////////////// Ending of Depositor Route //////////////////

});