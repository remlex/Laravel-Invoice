@extends('layouts_admin.master')

@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            @if(session('message')) 
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @include('layouts_admin.error')

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage User
                    </div>

                  <div class="panel-body">
                    <form method="POST" action="/admin/store_member">
                                {{ csrf_field() }}
                    <div class="row">

                      <div class="col-lg-6">

                              
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <input type="text"  id="firstname" name="firstname" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input type="text"  id="lastname" name="lastname" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text"  id="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text"  id="phone" name="phone" class="form-control">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>File input</label>
                                        <input type="file">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Place some text here" style="width: 100%; height: 130px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                    
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label>Country</label>
                                        <select id="country" name="country" class="form-control">
                                            <option value="Nigeria" selected="selected">Nigeria</option>
                                            <option value="Ghana">Ghana</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>State</label>
                                        <select id="state" name="state" class="form-control">
                                            <option value="Lagos" selected="selected">Lagos</option>
                                            <option value="Ogun">Ogun</option>
                                        </select>
                                    </div>

                                    <div class="form-group input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password"  id="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password"  id="confirm-password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                     <button id="submit" class="btn btn-primary">Add Membership</button>
                               </div>
                           </div>
                            </form>
                        </div>

                           
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    <!-- /#page-wrapper -->

    {{-- {{ Form::open(['route' => 'account-create-post']) }}
    
        <div>
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email') }}
           @if($errors->has('email')){{$errors->first('email')}}@endif
        </div>

        <div>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}
           @if($errors->has('username')){{$errors->first('username')}}@endif
        </div>

        <div>
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password') }}
           @if($errors->has('password')){{$errors->first('password')}}@endif
        </div>

        <div>
            {{ Form::label('password_confirm', 'Confirm password:') }}
            {{ Form::password('password_confirm') }}
           @if($errors->has('password_confirm')){{$errors->first('password_confirm')}}@endif
        </div>

        <div>{{ Form::submit('Create account') }}</div>

    {{ Form::close() }}
 --}}
@endsection        