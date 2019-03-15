@extends('layouts_admin.master_new')

@section('content')

      <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Check Details</h1>
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
                        <form action="{{ url('/admin/view_info2') }}" method="post" id="search-form" class="form-horizontal">
                          {{ csrf_field() }}
                              <div class="form-group">
                                  <label for="account" class="control-label mb-1">Account Number</label>
                                  <input id="account" name="account" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="xxxxxxxxxxx" value="{{ old('account')}}" required="">
                              </div>

                              {{-- <div class="form-group">
                                <div class="input-group">
                                  <input type="text" id="account" name="account" placeholder="Account Number" class="form-control" value="{{ old('account')}}" required="">
                                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                </div>
                            </div> --}}

                            <button type="submit" id="submit" class="btn btn-primary btn-sm"> <i class="fa fa-dot-circle-o"></i> Check Details  </button>
                        </form>
                      </div>
                      
                    </div>


                 {{-- <div class="content mt-3">
                   <div class="animated fadeIn">
                      <div class="row">
                        <div class="col-lg-12"> --}}

                    {{-- <form  method="post" id="search-form" action="{{ url('/admin/view_info2') }}" class="form-horizontal">
                       {{ csrf_field() }}

                      <div class="row">
                          <div class="col-lg-6 form-group">
                            <div class="col col-md-3"><label for="Account" class=" form-control-label">Account No</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="account" name="account" placeholder="account" class="form-control-sm account" value="{{ old('account')}}" required="">
                            </div> 
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6 form-group">
                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label"> </label></div>
                              <div class="form-actions form-group"><button type="submit" id="submit" class="btn btn-primary btn-sm"> Search </button>
                            </div>
                          </div>
                      </div>
                    </form> --}}

                    {{-- <div class="content mt-3">
                        <div class="animated">

                        <div class="card">
                          <div class="card-body">
                              <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#smallmodal"> Popup </button> 
                          </div>
                        </div>  

                          <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra
                                                and the mountain zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus
                                                Dolichohippus. The latter resembles an ass, to which it is closely related, while the former two are more
                                                horse-like. All three belong to the genus Equus, along with other living equids.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                       </div>
                     </div> --}}
                    
                    <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">View information</strong>
                          </div>
                          <div class="card-body">
                              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Firstname</th>
                                    <th scope="col">Lastname </th> 
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone</th>
                                </tr>
                            </thead>
                            <tbody>

                              {{-- str_limit($project->description, 50) --}}

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

      

                            