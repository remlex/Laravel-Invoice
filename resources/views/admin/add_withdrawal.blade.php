@extends('layouts_admin.master_new')

@section('content')

      <div class="breadcrumbs">
      <div class="col-sm-4">
          <div class="page-header float-left">
              <div class="page-title">
                  <h1>Manage Withdrawal</h1>
              </div>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="page-header float-right">
              <div class="page-title">
                  <ol class="breadcrumb text-right">
                      <li><a href="#">Add Withdrawal</a></li>
                      <li><a href="#">Manage Withdrawal</a></li>
                  </ol>
              </div>
          </div>
      </div>
  </div>

      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      {{-- <div class="card-header">
                        <strong>Add Customer</strong>
                      </div> --}}

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

                      @include('layouts_admin.error')

                      <div class="card-body card-block">

                      <form  method="post" id="company-form" action="{{ url('/admin/post_withdrawal')}}" class="form-horizontal">
                        {{ csrf_field() }}

                       <div class="row">
                              <div class="col-lg-6 form-group">
                                <div class="col col-md-2"><label for="Account" class=" form-control-label">Account No</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="acct_id" name="acct_id" placeholder="Account ID" class="form-control acct_id" value="{{ old('acct_id')}}" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6 form-group">
                                <div class="col col-md-2"><label for="Account" class=" form-control-label">Company Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="company" name="company" placeholder="company name" class="form-control company" value="{{ old('company')}}" readonly="">
                                </div> 
                            </div>
                          </div>

                          <div class="row"> 
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Firstname" class=" form-control-label">Firstname</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="firstname" name="firstname" placeholder="firstname" class="form-control firstname" value="{{ old('firstname')}}" required="" readonly></div> 
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="lastname" class=" form-control-label">Lastname</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="lastname" name="lastname" placeholder="lastname" class="form-control lastname" value="{{ old('lastname')}}" readonly></div>
                            </div>
                          </div>

                        <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Email" class=" form-control-label">Email</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Email" class="form-control email" value="{{ old('email')}}" readonly></div>
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Phone" class=" form-control-label">Phone</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="phone" value="{{ old('phone')}}"class="form-control" readonly></div>
                            </div>
                          </div>

                         <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="textarea-input" class=" form-control-label">Address</label></div>
                            <div class="col-12 col-md-9"><textarea id="address" name="address" rows="3" placeholder="Address..." class="form-control" readonly> {{ old('address')}}</textarea></div>
                            </div> 
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Balance" class=" form-control-label">Balance</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="balance" name="balance" placeholder="Balance" class="form-control balance" value="{{ old('balance')}}" readonly=""></div>
                            </div>                            
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Balance" class=" form-control-label">Amount Withdrawal</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="withdraw" name="withdraw" placeholder="withdraw" class="form-control withdraw" value="{{ old('withdraw')}}">

                                <input type="hidden" id="bal" name="bal" placeholder="Balance" class="form-control bal" value="{{ old('bal')}}" readonly=""></div>
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="wth_name" class=" form-control-label">Withdrawal's Name</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="wth_name" name="wth_name" placeholder="Depositor Name" class="form-control wth_name" value="{{ old('wth_name')}}"></div>
                            </div>                            
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="wth_phone" class=" form-control-label">Withdrawal's Number</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="wth_phone" name="wth_phone" placeholder="Deposit Number" class="form-control wth_phone" value="{{ old('wth_phone')}}">
                              </div>
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="dep_name" class=" form-control-label">Withdrawal's Address</label></div>
                              <div class="col-12 col-md-9"><textarea id="wth_address" name="wth_address" rows="3" placeholder="Address..." class="form-control"> {{ old('dep_address')}}</textarea></div>
                            </div>
                          </div>
                        
                        <div class="col-lg-6 col-sm-6>
                          <div class="row form-group">
                            <div class="col col-md-0"><label for="disabled-input" class=" form-control-label"> </label></div>
                            <div class="form-actions form-group"><button type="submit" id="submit" class="btn btn-primary btn-sm"><i class="fa fa-credit-card"></i> Withdraw Account</button></div>

                          </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>
@endsection                 