@extends('layouts_admin.master_new')

@section('content')

      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Update Products</strong>
                      </div>

                       @if(session('message')) 
                          <div class="alert alert-success">
                              {{ session('message') }}
                          </div>
                       @endif

                      @include('layouts_admin.error')

                      <div class="card-body card-block">

                        <form  method="post" action="{{ url('/admin/products', [$products->id]) }}" class="form-horizontal">
                          {{ csrf_field() }}

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="name" class=" form-control-label">Product Name</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Product name" class="form-control" value="{{ $products->name }}" required=""></div> 
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="price" class=" form-control-label">Product Price</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="price" name="price" placeholder="00.00" class="form-control" value="{{ $products->price }}" readonly="readonly"></div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <div class="col col-md-3"><label for="qty" class=" form-control-label">Quantity</label></div>
                              <div class="col-12 col-md-9"><input type="number" id="qty" name="qty" class="form-control" value="{{ $products->qty }}" readonly="readonly"></div>
                            </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-6 form-group">
                                <div class="col col-md-3"><label for="stocks" class=" form-control-label">Stocks</label></div>
                              <div class="col-12 col-md-9">
                                <select name="stocks" id="stocks" class="form-control-sm form-control" readonly="readonly">
                                  <option value="{{ $products->stocks }}"> {{ $products->stocks }} </option>
                                </select>
                              </div>
                              </div>
                          </div>


                            <div class="row form-group">
                                <div class="col col-md-2"><label for="disabled-input" class=" form-control-label"> </label></div>
                                <div class="form-actions form-group"><button type="submit" id="submit" class="btn btn-primary btn-sm">Update Product</button></div>

                            </div>

                        </form>
                      </div>
                    </div>
                  </div>
        </div>
@endsection                    