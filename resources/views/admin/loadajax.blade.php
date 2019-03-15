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
                      <div class="card-body col-lg-5 card-block">
                      </div>
                      
                    </div>
                    
                    <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">View information</strong>

                              <button id="read-data" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-dot-circle-o"></i> Load data By Ajax  </button>
                          </div>
                          
                          <div class="card-body">
                              <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                  <tr>
                                    <th>Cust. ID</th>
                                    <th>Company</th>
                                    <th>Full Name</th>
                                    <th>Email </th> 
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="data">

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
  $('#read-data').on('click', function(){

    $.get("{{ url('/admin/read-data')}}", function(data){

      $('#data').empty();
      $.each(data, function(i,value){
        var tr = $("<tr/>");
          tr.append($("<td/>",{
            text : value.cust_code
          })).append($("<td/>",{
            text : value.company
          })).append($("<td/>",{
            text : value.firstname
          })).append($("<td/>",{
            text : value.email
          })).append($("<td/>",{
            text : value.phone
          })).append($("<td/>",{
            text : value.address
          })).append($("<td/>",{
            html: "<a href='' class='fa fa-dot-circle-o'>View</a>"
          }))
        $('#data').append(tr);
      });
    })
  });
</script>



      

                            