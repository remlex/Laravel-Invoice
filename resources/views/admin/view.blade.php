@extends('layouts_admin.master_new')

@section('content')

      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Manage Membership</strong>
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
                                          <strong class="card-title">Manage Member</strong>
                                      </div> --}}
                                      <div class="card-body">
                                          <table class="table">
                                            <thead>
                                              @if(Auth::check() && Auth::user()->roles == "Admin")
                                                <a href="{{ url('/admin/add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
                                              @endif
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Firstname</th>
                                                <th scope="col">Lastname</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Role</th>
                                                {{-- <th scope="col">Verified</th> --}}
                                                <th scope="col">Status</th>
                                                @if(Auth::check() && Auth::user()->roles == "Admin")
                                                  <th scope="col">Action</th>
                                                  <th scope="col"></th>
                                                @endif
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                          @foreach($views as $view)
                                            <tr>
                                                <th scope="row">{{ $view->id }}</th>
                                                <td scope="row">{{ $view->firstname }}</td>
                                                <td scope="row">{{ $view->lastname }}</td>
                                                <td scope="row">{{ $view->username }}</td>
                                                <td scope="row">{{ $view->email }}</td>
                                                <td scope="row">{{ $view->phone }}</td>
                                                <td scope="row"><span class="btn btn-primary btn-sm fa fa-user-circle"> {{ $view->roles }} </span></td>
                                                {{-- <td scope="row">
                                                   @if($view->verified == 1)
                                                      <span class="btn btn-success btn-sm"> Actived </span>
                                                   @else
                                                      <span class="btn btn-danger btn-sm"> Suspended </span>
                                                   @endif
                                                </td> --}}
                                                <td scope="row">
                                                   @if($view->status == 1)
                                                      <span class="btn btn-success btn-sm"> Enabled </span>
                                                   @else
                                                      <span class="btn btn-danger btn-sm"> Disabled </span>
                                                   @endif
                                                </td>
                                                @if(Auth::check() && Auth::user()->roles == "Admin")
                                                  <td scope="row">
                                                    <a href="javascript:void(0);" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-success btn-sm float-right"><i class="fa fa-edit"></i></a>
                                                  </td>
                                                  <td scope="row">
                                                      <form method="post" action="/admin/user/{{ $view->id }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this records!');"><i class="fa fa-trash"></i> </button>
                                                      </form>
                                                  </td>
                                                @endif

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