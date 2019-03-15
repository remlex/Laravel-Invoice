@extends('layouts_admin.master_new')

@section('content')

      <div class="breadcrumbs">
      <div class="col-sm-4">
          <div class="page-header float-left">
              <div class="page-title">
                  <h1>Manage Invoice</h1>
              </div>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="page-header float-right">
              <div class="page-title">
                  <ol class="breadcrumb text-right">
                      <li><a href="#">Add Invoice</a></li>
                      <li><a href="#">Manage Invoice</a></li>
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

                      {{-- @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif --}}

                      @include('layouts_admin.error')

                      <div class="card-body card-block">

                      <form  method="post" id="company-form" action="{{ url('/admin/insert') }}" class="form-horizontal">
                        {{ csrf_field() }}

                       <div class="row">
                            <div class="col-lg-6 form-group">
                                <div class="col col-md-2"><label for="company" class=" form-control-label ">Company Name</label></div>
                                <div class="col-9 col-md-6">
                                  <select   name="company" class="form-control company" id="company" required="">
                                      <option value="0" selected="true" selected="selected">Select Customer name</option>
                                      @foreach($views_custs as $views_cust)
                                        <option value="{{$views_cust->id}}">{{ $views_cust->company }}</option>
                                      @endforeach
                                    </select> 
                                </div>
                                

                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#mediumModal"><i class="fa fa-plus"></i> New Customer </button>

                              </div>


                              <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Account" class=" form-control-label">Account No</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="account" name="account" placeholder="account" class="form-control account" value="{{ old('account')}}">
                                <span class="text-danger">{{ $errors->first('account') }}</span>
                              </div>
                            </div>
                          </div>

                          <div class="row"> 
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="Account" class=" form-control-label">Customer Code</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="cust_no" name="cust_no" placeholder="customer no" class="form-control cust_no" value="{{ old('cust_no')}}">
                                <span class="text-danger">{{ $errors->first('cust_no') }}</span>
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

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-2"><label for="textarea-input" class=" form-control-label">Number</label></div>
                            <div class="col-12 col-md-9"><textarea id="number" name="number" rows="3" placeholder="Comma separator..." class="form-control" readonly> {{ old('number')}}</textarea></div>
                            </div> 
                          </div>
                        

                        <div class="col-lg-6 form-group">
                              <div class="col col-md-2">
                                <label for="textarea-input" class=" form-control-label">Day</label>
                              </div>
                            <div class="col-12 col-md-9">
                              <select name="day" class="form-control day" required="">
                                      <option value="0">-------------</option>
                                        @for($i =1; $i<=31; $i++)
                                          <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                            </div>
                          </div> 

                          <div class="col-lg-6 form-group">
                              <div class="col col-md-2">
                                <label for="textarea-input" class=" form-control-label">Year</label>
                              </div>
                            <div class="col-12 col-md-9">
                              <select name="day" class="form-control day" required="">
                                      <option value="0">-------------</option>
                                        @for($i =2000; $i<=2048; $i++)
                                          <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                            </div>
                          </div> 

                          <div class="col-lg-6 form-group">
                              <div class="col col-md-2">
                                <label for="textarea-input" class=" form-control-label">Month</label>
                              </div>
                            <div class="col-12 col-md-9">
                              <select name="day" class="form-control day" required="">
                                        @foreach($months as $month)
                                          <option value="{{ $month }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                            </div>
                          </div>                        
                        
                        </div>
                        {{-- </form>

                        <form method="post" action="#"> --}}
                          <div class="col-lg-12 col-sm-12">
                            <table class="table table-bordered" id="mytable">
                              <thead>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price &#8358;</th>
                                <th>Discount</th>
                                <th>Amount &#8358;</th>
                                <th style="text-align: center;"><a href="javascript:void(0);" class="addRow"><i class="btn btn-primary fa fa-plus"></i></a>
                                   {{--  <a href="javascript:void(0);" class="addRow"><i class="btn btn-primary glyphicon glyphicon-plus">+</i> </a> --}}
                                </th>
                                
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <select name="productname[]" class="form-control productname" required="">
                                      <option value="0" selected="true" disabled="true">Select Product</option>
                                      @foreach($views_prods as $views_prod)
                                        <option value="{{ $views_prod->id}}">{{ $views_prod->name }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td><input type="number" name="qty[]" class="form-control qty"></td>
                                  <td><input type="text" name="price[]" class="form-control price" readonly></td>
                                  <td><input type="text" name="discount[]" class="form-control discount"></td>
                                  <td><input type="text" name="amount[]" class="form-control amount" readonly></td>
                                  <td><a href="javascript:void(0);" class="btn btn-danger"><i class="fa fa-trash remove"></i></a></td>
                                </tr>
                                <tr>
                                  <td>
                                    <select name="productname[]" class="form-control productname" required="">
                                      <option value="0" selected="true" disabled="true">Select Product</option>
                                      @foreach($views_prods as $views_prod)
                                        <option value="{{ $views_prod->id}}">{{ $views_prod->name }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td><input type="number" name="qty[]" class="form-control qty"></td>
                                  <td><input type="text" name="price[]" class="form-control price" readonly></td>
                                  <td><input type="text" name="discount[]" class="form-control discount"></td>
                                  <td><input type="text" name="amount[]" class="form-control amount" readonly></td>
                                  <td><a href="javascript:void(0);" class="btn btn-danger"><i class="fa fa-trash remove"></i></a></td>
                                </tr>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td style="border:none;"></td>
                                  <td style="border:none;"></td>
                                  <td style="border:none;"></td>
                                  <td><b>Total</b></td>
                                  <td><b class="total"></b></td>
                                  <td></td>
                                </tr>                            
                                <tr>
                                  <td style="border:none;"></td>
                                  <td style="border:none;"></td>
                                  <td style="border:none;"></td>
                                  <td><b>VAT 5%</b></td>
                                  <td><b class="vat"></b></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td style="border:none;"></td>
                                  <td style="border:none;"></td>
                                  <td style="border:none;"></td>
                                  <td><b>Grand Total</b></td>
                                  <td><input type="text" name="gamt" id="gamt" class="form-control" readonly></td>
                                  <td></td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>

                      <div class="row">
                          <div class="col-lg-6 form-group">
                            <div class="col col-md-1"><label for="disabled-input" class=" form-control-label"> </label></div>
                            <div class="form-actions form-group">
                              <button type="submit" id="submit" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add Invoice</button>
                            </div>
                          </div>
                        </div>

                    </form>
                  </div>
                </div>
              </div>
        </div>




<script type="text/javascript">
        function addRow(){
          var tr = `<tr>
                      <td>
                        <select name="productname[]" class="form-control productname" required="">
                          <option value="0" selected="true" disabled="true">Select Product</option>
                          @foreach($views_prods as $views_prod)
                            <option value="{{ $views_prod->id}}">{{ $views_prod->name }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td><input type="number" name="qty[]" class="form-control qty"></td>
                      <td><input type="text" name="price[]" class="form-control price" readonly></td>
                      <td><input type="text" name="discount[]" class="form-control discount"></td>
                      <td><input type="text" name="amount[]" class="form-control amount" readonly></td>
                      <td><a href="javascript:void(0);" class="btn btn-danger"><i class="fa fa-trash remove"></i></a></td>
                    </tr>`;
            
             $('tbody').append(tr);                         
         };

         //----------------- end of function created by user ------
         // $('.remove').live('click', function(){
         //    var l = $('tbody tr').length;
         //    if(l==1){
         //        alert('You can not remove last one');
         //    }else{
         //        $(this).parent().parent().remove();
         //        total();
         //    }
         // });
    </script> 



{{-- ////////////////////////  html   /////////////////////////// --}}
{{-- http://demo.itsolutionstuff.com/addmore --}}
{{-- <form name="add_name" id="add_name">  

            <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
            </div>

            <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
            </div>

            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                        <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
            </div>

         </form> --}}
{{-- ////////////////////////  ajax   /////////////////////////// --}}
   {{--  <script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "http://demo.itsolutionstuff.com/addmore";
      var i=1;  

      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                      i=1;
                      $('.dynamic-added').remove();
                      $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                $(".print-success-msg").css('display','block');
                $(".print-error-msg").css('display','none');
                $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  

      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');

         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }

    });  
</script> --}}



    {{-- Begining of Modal --}}

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Add New Customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{-- <p> --}}
                   <div class="card-body card-block">

                      <form  method="post" id="company-form" action="{{ url('/admin/addcustomer')}}" class="form-horizontal">
                        {{ csrf_field() }}

                       <div class="row">
                        <input type="hidden" name="samePage" value="samePage">
                            <div class="col-lg-6 form-group">
                                <div class="col col-md-3"><label for="Account" class=" form-control-label">Company Name</label></div>
                                  <div class="col-12 col-md-9"><input type="text" id="company" name="company" placeholder="Company Name" class="form-control account" value="{{ old('company')}}" required="">
                                    <span class="text-danger">{{ $errors->first('company') }}</span>
                                  </div> 
                              </div>

                              <div class="col-lg-6 form-group">
                                <div class="col col-md-3"><label for="Phone" class=" form-control-label">Phone</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="phone" value="{{ old('phone')}}"class="form-control" required=""></div>
                              </div>
                          </div>

                          <div class="row"> 
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="Firstname" class=" form-control-label">Firstname</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="firstname" name="firstname" placeholder="firstname" class="form-control firstname" value="{{ old('firstname')}}" required=""></div> 
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="lastname" class=" form-control-label">Lastname</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="lastname" name="lastname" placeholder="lastname" class="form-control lastname" value="{{ old('lastname')}}" required=""></div>
                            </div>
                          </div>

                        <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="Email" class=" form-control-label">Email</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="email" name="email" placeholder="Email" class="form-control email" value="{{ old('email')}}" required=""></div>
                            </div>

                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Address</label></div>
                              <div class="col-12 col-md-9"><textarea id="address" name="address" rows="3" placeholder=" Address..." class="form-control" required=""> {{ old('address')}}</textarea></div>
                              </div>
                          </div>

                          <div class="row">                            
                              <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="Amount" class=" form-control-label">Open Amount</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="open_amt" name="open_amt" placeholder="0.00" class="form-control" value="{{ old('open_amt')}}" required=""></div>
                            </div>
                          </div>
                        
                        <div class="col-lg-6 col-sm-6>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label"> </label></div>
                            <div class="form-actions form-group"><button type="submit" id="submit" class="btn btn-primary btn-sm fa fa-plus"> Add New Customer </button></div> 
                          </div>
                        </div>
                    </form>
                  </div>
                               {{--  </p> --}}
                            </div>
                        </div>
                    </div>
                </div>

{{-- Ending of Modal --}}

    @endsection 