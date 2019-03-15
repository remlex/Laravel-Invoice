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
                        <form id="customer-form">
                          {{-- {{ csrf_field() }} --}}
                              <div class="form-group">
                                  <label for="account" class="control-label mb-1">Customer Code</label>
                                  <input id="account" name="account" type="text" class="form-control" aria-required="true" placeholder="xxxxxxxxxxx" value="{{ old('account')}}" required="">
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
                             {{--  @foreach($datas as $data)

                              <tr>
                                  <td scope="row"><a href="#">$data->cust_code</a></td>
                                  <td scope="row">$data->company</td>
                                  <td scope="row">$data->firstname</td>
                                  <td scope="row">$data->lastname</td>
                                  <td scope="row">$data->address</td>
                              </tr>

                              @endforeach --}}

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

<script type="text/javascript"> 
  $('#account').on('keyup',function(){ 
      $value=$(this).val(); 
      $.ajax({ 
      type : 'get', 
      url : '{{ url('/admin/search-customer')}}', 
      data:{'search':$value}, 
      success:function(data){ 
      $('tbody').html(data); 
      } 
      }); 
  }) 
</script>
 
<script type="text/javascript"> 
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } }); 
</script>


      

                            