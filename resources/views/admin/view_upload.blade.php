@extends('layouts_admin.master_new')

@section('content')

      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Manage Profile</strong>
                      </div>

                      @if(session('message')) 
                          <div class="alert alert-success">
                              {{ session('message') }}
                          </div>
                      @endif

                       <div class="content mt-3">
                          <div class="animated fadeIn">
                              <div class="row">
                              <div class="col-lg-12">
                                  <div class="card">
                                      {{-- <div class="card-header">
                                          <strong class="card-title">Manage Products</strong>
                                      </div> --}}
                                      <div class="card-body">
                                          <table class="table">
                                            <thead>
                                              <a href="{{ url('/admin/uploadfile') }}" class="btn btn-success btn-sm"><i class="fa fa-users"></i> Add New Document </a>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone </th> 
                                                <th scope="col">Email</th>
                                                <th scope="col">Document</th>
                                                <th scope="col">Date Created</th>
                                                <th scope="col">Download File</th>
                                                <th scope="col" class="float-right">Action</th>                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($views_upload as $views_upl)
                                            <tr>
                                                <th scope="row"><a href="#"> {{ $views_upl->id }} </a></th>
                                                <td scope="row">{{ $views_upl->name }}</td>
                                                <td scope="row">{{ $views_upl->phone}}</td>
                                                <td scope="row">{{ $views_upl->email }}</td>
                                                <td scope="row">{{ $views_upl->photos }}</td>
                                                <td scope="row">{{ $views_upl->created_at }}</td>
                                                <td scope="row"><a href="/cssjs_admin/images/upload/{{ $views_upl->photos }}" class="btn btn-success btn-sm float-left"> Download </a> </td>
                                                <td scope="row"><a href="#" class="btn btn-success btn-sm float-right"><i class="fa fa-edit"></i> Edit </a></td>                
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                      </div>
                                  </div>
                              </div>

                    </div>
                  </div>
        </div>
@endsection                    