@extends('layouts_admin.master_new')

@section('content')

      <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Manage Product</strong>
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
                                              {{-- <a href="{{ url('/admin/addproduct') }}" class="btn btn-primary btn-sm"><i class="fa fa-users"></i> Add New Product </a> --}}

                                              <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#product"><i class="fa fa-plus"></i> Add New Product </button>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price &#8358;</th> 
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Date Created</th>
                                                <th scope="col" class="float-right">Action</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($views_prods as $views_prod)
                                            <tr>
                                                <th scope="row">{{ $views_prod->id }}</th>
                                                <td scope="row">{{ $views_prod->name }} {{-- {{ str_limit($project->description, 50) }} --}}</td>
                                                <td scope="row">&#8358; {{ number_format($views_prod->price, 2) }}</td>
                                                <td scope="row">{{ $views_prod->qty }}</td>
                                                <td scope="row">{{ $views_prod->stocks }}</td>
                                                <td scope="row">{{ $views_prod->created_at }}</td>
                                                <td scope="row">
                                                  <a href="javascript:void(0);" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i></a> &nbsp;

                                                  <a href="/admin/products/{{ $views_prod->id }}" class="btn btn-success btn-sm float-right"><i class="fa fa-edit"></i></a></td>
                                                <td scope="row"> 
                                                  <form method="post" action="/admin/product/{{ $views_prod->id }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this records!');"><i class="fa fa-trash"></i> </button>
                                                  </form>
                                              </td>

                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                
                                {{ $views_prods->links("pagination::bootstrap-4") }}

                              </div>
                             </div>
                           </div>

                    </div>
                  </div>
        </div>


        {{-- Begining of Modal --}}

<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Add New Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if(session('message')) 
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                   <div class="card-body card-block">

                      <form method="POST" action="{{url('/admin/addproduct')}}">
                          {{ csrf_field() }}

                          <div class="row">
                             <input type="hidden" name="samePage" value="samePage">
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
                                <div class="form-actions form-group"><button type="submit" id="prod_id" class="btn btn-primary btn-sm">Add Product</button></div>

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