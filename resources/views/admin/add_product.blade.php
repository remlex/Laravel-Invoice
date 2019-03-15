@extends('layouts_admin.master_new')

@section('content')

      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Add Products</strong>
                      </div>

                       @if(session('message')) 
                          <div class="alert alert-success">
                              {{ session('message') }}
                          </div>
                       @endif

                      @include('layouts_admin.error')

                      <div class="card-body card-block">

                        <form  method="post" action="{{ url('/admin/addproduct') }}" class="form-horizontal">
                          {{ csrf_field() }}

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="name" class=" form-control-label">Product Name</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Product name" class="form-control" value="{{ old('name')}}" required=""></div> 
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="price" class=" form-control-label">Product Price</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="price" name="price" placeholder="00.00" class="form-control" value="{{ old('price')}}"></div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="qty" class=" form-control-label">Quantity</label></div>
                              <div class="col-12 col-md-9"><input type="number" id="qty" name="qty" class="form-control" value="{{ old('qty')}}"></div>
                            </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-6 form-group">
                                <div class="col col-md-3"><label for="stocks" class=" form-control-label">Stocks</label></div>
                                <div class="col-12 col-md-9">
                                  <select name="stocks" id="stocks" required="" class="form-control-sm form-control">
                                    <option value="6">6</option>
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                  </select>
                                </div>
                              </div>
                          </div>

                            <div class="row form-group">
                                <div class="col col-md-2"><label for="disabled-input" class=" form-control-label"> </label></div>
                                <div class="form-actions form-group"><button type="submit" id="submit" class="btn btn-primary btn-sm">Add Product</button></div>

                            </div>

                        </form>
                      </div>
                    </div>
                  </div>
        </div>
@endsection                    