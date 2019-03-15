@extends('layouts_admin.master_login')

@section('content')

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>

                @if(session('message')) 
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if(session('error')) 
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

               {{--  @include('layouts_admin.error') --}}

                <div class="login-form">
                    <form method="post" action="{{ url('/admin/admin-login') }}" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email')}}" autofocus required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" id="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        {{-- <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                            </div>
                        </div> --}}
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      
@endsection                    