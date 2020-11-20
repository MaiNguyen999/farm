@extends('layouts.appadmin')

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create category</h4>
          @if(Session::has('status'))
            <div class="alert alert-success">
              {{Session::get('status')}}
            </div>  
          @elseif(Session::has('status1'))
            <div class="alert alert-danger">
              {{Session::get('status1')}}
            </div>  
          @endif
          {!!Form::open(['action' => 'CategoryController@savecategory', 'class'=> 'cmxform', 'method'=>'POST', 'id'=>'commentForm'])!!}
                {{csrf_field()}}
                    <div class="form-group">
                        {{Form::label('','Product Category', ['for' => 'cname'])}}
                        {{Form::text('category_name','',['class'=>'form-control', 'minlength'=>'2'])}}
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
