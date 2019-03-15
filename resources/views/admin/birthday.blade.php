@extends('layouts_admin.master_new')

@section('content')

      <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Check Birthday</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Add Birthday User</a></li>
                            <li><a href="#">Manage Birthday User</a></li>
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
                      <div class="card-body col-lg-6 card-block">

                        {{-- <input type="hidden" id="token" value="{{ csrf_token() }}" /> --}}
                          <div class="row">
                              <div class="col-lg-6 form-group">
                                  <label for="day" class="control-label mb-1">Day</label>
                                  <select id="day" class="form-control day" required="">
                                      <option value="">--- Select Day----</option>
                                        @for($i =1; $i<=31; $i++)
                                          <option value="{{ $i }} ">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="account" class="control-label mb-1">Month</label>
                                    <select id="month" class="form-control month">
                                        <option value="">---Select Month----</option>
                                          @foreach($months as $month)
                                            <option value="{{ $month }}">{{ $month }} </option>
                                          @endforeach
                                      </select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <button type="submit" id="check" class="btn btn-primary btn-sm search"> <i class="fa fa-dot-circle-o"></i> Check Birthday  </button>
                                </div>
                            </div>
                        

                        <form id="customer-form">
                          {{-- {{ csrf_field() }} --}}
                            <div class="row">
                              <div class="col-lg-12 form-group">
                                  <label for="account" class="control-label mb-1">Number</label>

                                  <textarea id="number" name="number" rows="4" placeholder="number..." class="form-control" readonly> {{ old('number')}}</textarea>
                                </div>                                
                            </div>

                            <div class="row">
                              <div class="col-lg-12 form-group">
                                  <label for="message" class="control-label mb-1">Message</label>

                                  <textarea id="message" name="message" rows="4" placeholder="Message..." class="form-control"> {{ old('message')}}</textarea>
                                </div>                                
                            </div>

                            <div class="col-lg-6 form-group">
                                <button type="submit" id="submit" class="btn btn-primary btn-sm message"> <i class="fa fa-dot-circle-o"></i> Send SMS Birthday  </button>
                            </div>
                        </form>
                      </div>
                      
                    </div>
@endsection

{{-- <script type="text/javascript"> 
  $('.search').on('click',function(){ 
        var day = $(this).val(); 
        var month = $(this).val(); 
        var dataId = {'Day':day, 'Month':month};
        $.ajax({ 
        type : 'get', 
        url : '{{ url('/admin/findbirthday')}}', 
        data : dataId, 
        success:function(data){ 
          //$('tbody').html(data); 
          $('#number').val(data.number);
        } 
      }); 
  }) 
</script>
 
<script type="text/javascript"> 
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } }); 
</script> --}}


      

                            