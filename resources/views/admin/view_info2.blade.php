@extends('layouts_admin.master_new')

@section('content')

      <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Withdrawal Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Add Info</a></li>
                            <li><a href="#">Manage Search</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

      {{-- <div class="row">
            <div class="col-lg-12">
                    <div class="card"> --}}

                @if(session('message')) 
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif


                  <div class="card">
                      {{-- <div class="card-header">
                        Search <strong>Details</strong>
                      </div> --}}
                      <div class="card-body col-lg-5 card-block">
                        <form id="withdraw-form">
                          {{-- {{ csrf_field() }} --}}
                              <div class="form-group">
                                  <label for="account" class="control-label mb-1">Customer Code</label>
                                  <input id="account" name="account" type="text" class="form-control" aria-required="true" placeholder="xxxxxxxxxxx" value="{{ old('account')}}" required="" autofocus>
                              </div>

                            <button type="submit" id="submit" class="btn btn-primary btn-sm"> <i class="fa fa-dot-circle-o"></i> View Withdrawal Details  </button>
                        </form>
                      </div>
                      
                    </div>
                    
                    <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">View information</strong>
                          </div>
                          <div class="card-body">
                              <table class="table table-striped table-bordered"> {{-- id="bootstrap-data-table" --}}
                                <thead>
                                  <tr>
                                    <th>Cust. ID</th>
                                    <th>Company</th>
                                    {{-- <th>Firstname</th>
                                    <th>Lastname </th> 
                                    <th>Email</th> --}}
                                    <th>Withdrawal Phone</th>
                                    <th>Withdrwal Name</th>     
                                    <th>Amount Withdraw</th>
                                    <th>Date Withdrawed</th>
                                </tr>
                            </thead>
                            <tbody id="cust">

                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>

                   {{-- </div>
                </div>
            </div>
        </div> --}}
@endsection


      

                            