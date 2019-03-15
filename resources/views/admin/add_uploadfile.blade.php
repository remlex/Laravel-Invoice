@extends('layouts_admin.master_new')

@section('content')

      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Add Membership</strong>
                      </div>

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

                        <form  method="post" action="{{ url('/admin/uploadfile') }}" class="form-horizontal" enctype="multipart/form-data">
                          {{ csrf_field() }}

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="name" class=" form-control-label">Name</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="firstname" class="form-control" value="{{ old('name')}}" required=""></div> 
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="phone" class=" form-control-label">Phone</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="23480xxxxxxxxx" class="form-control" value="{{ old('phone')}}"></div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Email" class=" form-control-label">Email</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Email" class="form-control" value="{{ old('email')}}"></div>
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Phone" class=" form-control-label"> Upload Document</label></div>
                              <div class="col-12 col-md-9">
                                <input type="file" id="photos" name="photos" class="form-control-file"> <br>
                                Allow file upload: .jpeg,.jpg,.png,gif,docx,doc,pdf,xls. Save the document with your name
                              </div>
                            </div>
                          </div>


                          {{-- <div class="row">
                              <div class="col-lg-6 form-group">
                                  <div class="col col-md-2"><label for="upload" class=" form-control-label">Upload Document</label></div>
                                  <div class="col-12 col-md-9">
                                      <input type="file" id="photos" name="photos" class="form-control-file">
                                  </div>
                              </div>
                          </div> --}}
                         
                            <div class="row form-group">
                                <div class="col col-md-1"><label for="disabled-input" class=" form-control-label"> </label></div>
                                <div class="form-actions form-group"><button type="submit" id="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload Documents</button></div>

                            </div>

                        </form>
                      </div>
                    </div>
                  </div>
        </div>
@endsection                    