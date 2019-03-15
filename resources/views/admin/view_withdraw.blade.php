@extends('layouts_admin.master_new')

@section('content')

      <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Customer Details</h1>
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
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif


                  <div class="card">
                      {{-- <div class="card-header">
                        Search <strong>Details</strong>
                      </div> --}}
                      <div class="card-body col-lg-5 card-block">
                        <form id="customer-form">
                          {{-- {{ csrf_field() }} --}}
                              <div class="form-group">
                                  <label for="account" class="control-label mb-1">Customer Code</label>
                                  <input id="account" name="account" type="text" class="form-control" aria-required="true" placeholder="xxxxxxxxxxx" value="{{ old('account')}}" required="" autofocus>
                              </div>

                            <button type="submit" id="submit" class="btn btn-primary btn-sm"> <i class="fa fa-dot-circle-o"></i> View Customer Details  </button>
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
                                    <th style="width:65px;">Cust. ID</th>
                                    <th style="width:150px;">Company</th>
                                    <th style="width:120px;">Firstname</th>
                                    <th style="width:120px;">Lastname </th> 
                                    {{-- <th scope="col">Email</th> --}}
                                    <th style="width:300px;">Address</th>
                                    {{-- <th scope="col">Phone</th> --}}
                                </tr>
                            </thead>
                            <tbody id="data">

                            </tbody>
                          </table>

                          {{-- {{ $data->links("pagination::bootstrap-4") }} --}}

                        </div>
                      </div>
                    </div>

                   {{-- </div>
                </div>
            </div>
        </div> --}}
@endsection


      

                            