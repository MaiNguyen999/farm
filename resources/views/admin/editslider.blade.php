@extends('layouts.appadmin')

@section('title')
    Edit slider
@endsection

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit slider</h4>
          @if(Session::has('status'))
            <div class="alert alert-success">
              {{Session::get('status')}}
            </div>  
          @elseif(Session::has('status1'))
            <div class="alert alert-danger">
              {{Session::get('status1')}}
            </div>  
          @endif
            {!!Form::open(['action' => 'SliderController@updateslider', 'class'=> 'cmxform', 'method'=>'POST', 'id'=>'commentForm', 'enctype'=>'multipart/form-data'])!!}
                {{csrf_field()}}
                    <div class="form-group">
                        {{Form::hidden('id', $slider->id)}}
                        {{Form::label('','Description one', ['for' => 'cname'])}}
                        {{Form::text('description_one',$slider->description1,['class'=>'form-control', 'minlength'=>'2'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('','Description Two', ['for' => 'cname'])}}
                        {{Form::text('description_two',$slider->description2,['class'=>'form-control', 'minlength'=>'2'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('','Slider Image', ['for' => 'cname'])}} 
                        {{Form::file('slider_image',['class'=>'form-control'])}}
                    </div>  
                    <div class="form-group">    
                        {{Form::label('','Slider Status', ['for' => 'cname'])}}
                        {{Form::checkbox('slider_status','Status',['class'=>'form-control'])}}
                    </div>  
                    
                    
                    {{Form::submit('Update',['class' => 'btn btn-primary'])}}
            {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
@endsection