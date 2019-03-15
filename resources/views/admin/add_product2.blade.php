@extends('layouts_admin.master_new')

@section('content')


      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Add Products Ajax</strong>
                      </div>

                       {{-- @if(session('message')) 
                          <div class="alert alert-success">
                              {{ session('message') }}
                          </div>
                       @endif

                      @include('layouts_admin.error') --}}

                      <div class="card-body card-block">

                        <p id="msg" class="alert alert-success"></p>
                         <input type="hidden" id="token" value="{{ csrf_token() }}" /> 

                              <label for="name" class=" form-control-label">Product Name</label>
                              <input type="text" id="name"  placeholder="Product name" class="col-md-6 form-control" value="{{ old('name')}}" required=""> 

                          <label for="price" class=" form-control-label">Product Price</label>
                          <input type="text" id="price"  placeholder="00.00" class="col-md-6 form-control" value="{{ old('price')}}">

                          <label for="qty" class=" form-control-label">Quantity</label>
                          <input type="number" id="qty" class="col-md-6 form-control" value="{{ old('qty')}}">

                         <label for="stocks" class=" form-control-label">Stocks</label>
                        <select id="stocks" required="" class="col-md-6 form-control-sm form-control">
                          <option value="6">6</option>
                          <option value="12">12</option>
                          <option value="24">24</option>
                        </select>

                        <br/>
                        <input type="submit" value="Submit" class="btn btn-success btn-fill" id="add">

                      </div>
                    </div>
                  </div>
        </div>
@endsection                    