@extends('layouts_admin.master_new')

@section('content')

 <div class="breadcrumbs">
      <div class="col-sm-4">
          <div class="page-header float-left">
              <div class="page-title">
                  <h1>Manage User</h1>
              </div>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="page-header float-right">
              <div class="page-title">
                  <ol class="breadcrumb text-right">
                      <li><a href="#">Add User</a></li>
                      <li><a href="#">Manage Users</a></li>
                  </ol>
              </div>
          </div>
      </div>
  </div>

                  
      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      {{-- <div class="card-header">
                        <strong>Add Membership</strong>
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

                    <div class="col-md-12">
                      <div class="card-body">

                        <form  method="post" action="{{ url('/admin/add') }}" class="form-horizontal">
                          {{ csrf_field() }}

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Firstname" class=" form-control-label">Firstname</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="firstname" name="firstname" placeholder="firstname" class="form-control" value="{{ old('firstname')}}" required=""></div> 
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="lastname" class=" form-control-label">Lastname</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="lastname" name="lastname" placeholder="lastname" class="form-control" value="{{ old('lastname')}}"></div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Email" class=" form-control-label">Email</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Email" class="form-control" ></div>
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Phone" class=" form-control-label">Phone</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="phone" class="form-control" ></div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="textarea-input" class=" form-control-label">Address</label></div>
                            <div class="col-12 col-md-9"><textarea name="address" rows="3" placeholder="Address..." class="form-control"> {{ old('address')}}</textarea></div>
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Username" class=" form-control-label">Username</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="Username" class="form-control" value="{{ old('username')}}"></div>
                            </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-6 form-group">
                                <div class="col col-md-2"><label for="roles" class=" form-control-label">Roles</label></div>
                              <div class="col-12 col-md-9">
                                <select name="roles" id="roles" required="" class="form-control-sm form-control">
                                  <option value="Admin">Admin</option>
                                  <option value="User">User</option>
                                </select>
                              </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-6 form-group">
                                <div class="col col-md-2"><label for="Country" class=" form-control-label">Country</label></div>
                              <div class="col-12 col-md-9">
                                <select name="country" id="country" required="" class="form-control-sm form-control">
                                  <option value="" selected="selected">Please select Country</option>
                                  <option value="Nigeria">Nigeria</option>
                                  <option value="Ghana">Ghana</option>
                                </select>
                              </div>
                              </div>

                              <div class="col-lg-6 form-group">
                                <div class="col col-md-2"><label for="State" class=" form-control-label">State</label></div>
                              <div class="col-12 col-md-9">
                                <select name="state" id="state" required="" class="form-control-sm form-control">
                                  <option value="" selected="selected">Please select State</option>
                                  <option value="Lagos">Lagos</option>
                                  <option value="Ghana">Accra</option>
                                </select>
                              </div>
                              </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Password" class=" form-control-label">Password</label></div>
                              <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="xxxxxxxx" class="form-control"></div>
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Password-Confirmation" class=" form-control-label">Confirm Password</label></div>
                              <div class="col-12 col-md-9"><input type="password" id="password_confirmation" name="password_confirmation" placeholder="xxxxxxxx" class="form-control"></div>
                            </div>
                          </div>
                         
                            <div class="row form-group">
                                <div class="col col-md-1"><label for="disabled-input" class=" form-control-label"> </label></div>
                                <div class="form-actions form-group"><button type="submit" id="submit" class="btn btn-primary btn-sm">Add Membership</button></div>

                            </div>

                        </form>
                      </div>
                  </div>
                </div>
              </div>
        </div>
@endsection                    