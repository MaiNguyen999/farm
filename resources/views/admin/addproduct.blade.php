@extends('layouts.appadmin')

@section('title')
    Add product
@endsection

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create product</h4>
            @if(Session::has('status'))
              <div class="alert alert-success">
                {{Session::get('status')}}
              </div>  
            @elseif(Session::has('status1'))
              <div class="alert alert-danger">
                {{Session::get('status1')}}
              </div>  
            @endif
            {!!Form::open(['action' => 'ProductController@saveproduct', 'class'=> 'cmxform', 'method'=>'POST', 'id'=>'commentForm', 'enctype'=>'multipart/form-data'])!!}
                {{csrf_field()}}
                    <div class="form-group">
                        {{Form::label('','Product Name', ['for' => 'cname'])}}
                        {{Form::text('product_name','',['class'=>'form-control', 'min-length'=>'2'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('','Product Price', ['for' => 'cname'])}}
                        {{Form::number('product_price','',['class'=>'form-control'])}}
                    </div>  
                    <div class="form-group">
                        {{Form::label('','Product Category', ['for' => 'cname'])}} 
                        {{Form::select('product_category', $categories,null,['placeholder'=>'Select category', 'class'=>'form-control'])}}
                    </div>  
                    <div class="form-group">
                        {{Form::label('','Product Image', ['for' => 'cname'])}} 
                        {{Form::file('product_image',['class'=>'form-control'])}}
                    </div>  
                    <div class="form-group">    
                        {{Form::label('','Product Status', ['for' => 'cname'])}}
                        {{Form::checkbox('product_status','Status',['class'=>'form-control'])}}
                    </div>  
                    
                    
                    {{Form::submit('Save',['class' => 'btn btn-primary'])}}
            {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{secure_asset('backend/js/bt-maxLength.js')}}"></script>
@endsection