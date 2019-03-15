@extends('layouts_admin.master_new')

@section('content')

      <div class="breadcrumbs">
      <div class="col-sm-4">
          <div class="page-header float-left">
              <div class="page-title">
                  <h1>Manage Customers</h1>
              </div>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="page-header float-right">
              <div class="page-title">
                  <ol class="breadcrumb text-right">
                      <li><a href="#">Add New Customer</a></li>
                      <li><a href="#">Manage Customers</a></li>
                  </ol>
              </div>
          </div>
      </div>
  </div>

      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                     {{--  <div class="card-header">
                        <strong>Add Customer</strong>
                      </div> --}}

                       @if(session('message')) 
                          <div class="alert alert-success">
                              {{ session('message') }}
                          </div>
                      @endif

                      {{-- @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif --}}

                      @include('layouts_admin.error')

                      <div class="card-body card-block">

                      <form  method="post" id="company-form" action="#" class="form-horizontal">
                        {{ csrf_field() }}

                       <div class="row">
                            <div class="col-lg-6 form-group">
                                <div class="col col-md-3"><label for="Account" class=" form-control-label">Company Name</label></div>
                                  <div class="col-12 col-md-9"><input type="text" id="company" name="company" placeholder="Company Name" class="form-control account" value="{{ old('company')}}" required="">
                                    <span class="text-danger">{{ $errors->first('company') }}</span>
                                  </div> 
                              </div>

                              {{-- <div class="col-lg-6 form-group">
                                <div class="col col-md-3"><label for="Account" class=" form-control-label">Account No</label></div>
                                  <div class="col-12 col-md-9"><input type="text" id="account" name="account" placeholder="account" class="form-control account" value="{{ old('account')}}">
                                    <span class="text-danger">{{ $errors->first('account') }}</span>
                                  </div> 
                              </div> --}}
                              <div class="col-lg-6 form-group">
                                <div class="col col-md-3"><label for="Phone" class=" form-control-label">Phone</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="phone" value="{{ old('phone')}}"class="form-control" required=""></div>
                              </div>
                          </div>

                          <div class="row"> 
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="Firstname" class=" form-control-label">Firstname</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="firstname" name="firstname" placeholder="firstname" class="form-control firstname" value="{{ old('firstname')}}" required=""></div> 
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="lastname" class=" form-control-label">Lastname</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="lastname" name="lastname" placeholder="lastname" class="form-control lastname" value="{{ old('lastname')}}" required=""></div>
                            </div>
                          </div>

                        <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="Email" class=" form-control-label">Email</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Email" class="form-control email" value="{{ old('email')}}" required=""></div>
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Address</label></div>
                              <div class="col-12 col-md-9"><textarea id="address" name="address" rows="3" placeholder=" Address..." class="form-control" required=""> {{ old('address')}}</textarea></div>
                              </div>
                          </div>

                          <div class="row">                            
                              <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="Amount" class=" form-control-label">Open Amount</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="open_amt" name="open_amt" placeholder="0.00" class="form-control" value="{{ old('open_amt')}}" required=""></div>
                            </div>
                          </div>
                        
                        <div class="col-lg-6 col-sm-6>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label"> </label></div>
                            <div class="form-actions form-group"><button type="submit" id="submit" class="btn btn-primary btn-sm">Add New Customer</button></div>

                          </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>
@endsection 


