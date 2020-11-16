@extends('layouts.appadmin')
@section('title')
    Products
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Products</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Order #</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>1</td>
                    {{-- <td>{{$product->product_image}}</td>
                    <td><img src="{{asset('/storage/product_images/product-1_1605394272.jpg')}}'"/></td> --}}
                    <td>{{$product->product_name}}</td>
                    <td>${{$product->product_price}}</td>
                    <td>{{$product->product_category}}</td>
                    @if($product->status == 1)
                      <td>
                        <label class="badge badge-success">Activated</label>
                      </td>
                    @else
                      <td>
                        <label class="badge badge-danger">Deactivated</label>
                      </td>
                    @endif
                    <td>
                      <button class="btn btn-outline-primary">Edit</button>
                      <a href="" class="btn btn-outline-danger">Delete</a>
                      @if ($product->status == 1)
                        <label class="badge badge-danger">Deactivate</label>
                      @else
                        <label class="badge badge-success">Activate</label>
                      @endif
                      
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script src="{{asset('backend/js/data-table.js')}}"></script>
@endsection