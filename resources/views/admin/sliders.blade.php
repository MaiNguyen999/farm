@extends('layouts.appadmin')
@section('title')
    Sliders 
@endsection
@section('content')
{{Form::hidden('',$increment=0)}}
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Sliders</h4>
      @if(Session::has('status'))
        <div class="alert alert-success">
          {{Session::get('status')}}
        </div> 
      @endif
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Order #</th>
                    <th>Image</th>
                    <th>Description one</th>
                    <th>Description two</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sliders as $slider)
                  {{Form::hidden('',$increment+=1)}}
                  <tr>
                  <td>{{$increment}}</td>
                    <td><img src="{{url('/storage/slider_image/'.$slider->slider_image)}}"/></td>
                    <td>{{$slider->description1}}</td>
                    <td>{{$slider->description2}}</td>
                    @if($slider->status == 1)
                      <td>
                        <label class="badge badge-success">Activated</label>
                      </td>
                    @else
                      <td>
                        <label class="badge badge-danger">Deactivated</label>
                      </td>
                    @endif
                    <td>
                      <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_slider/'.$slider->id)}}'">Edit</button>
                    <a href="delete_slider/{{$slider->id}}" class="btn btn-outline-danger" id="delete">Delete</a>
                      @if ($slider->status == 1)
                        <label class="btn btn-outline-warning" onclick="window.location='{{url('/deactivate_slider/'.$slider->id)}}'">Deactivate</label>
                      @else
                        <label class="btn btn-outline-success" onclick="window.location='{{url('/activate_slider/'.$slider->id)}}'">Activate</label>
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
    <script src="{{secure_asset('backend/js/data-table.js')}}"></script>
@endsection