@include('messages.flashmsg')
@extends('layouts.main')

@section('content')
<div class="container-fluid">
{!! Form::open(['action'=>['CarsController@update',$cars->id],'method'=>'PUT']) !!}

    <div class="form-group">

        {{form::label('model', 'CarModel')}}

        {{form::Text('model',$cars->model,['class' =>'form-control','placeholder'=>'CarModel'])}}

    </div>

    <div class="form-group">

            {{form::label('make', 'CarMake')}}

            {{form::Textarea('make',$cars->make,['class' =>'form-control','placeholder'=>'Make'])}}

        </div>

    <div class="form-group">

                {{form::label('user_id', 'CarOwner')}}

                {{form::select('user_id',$users,null,['class' =>'form-control','placeholder'=>$users[$cars->user_id]])}}

            </div>

    <div class="form-group">

                {{form::label('year', 'Year')}}

                {{form::Date('year',$cars->year,['class' =>'form-control','placeholder'=>'Year'])}}

            </div>




        {{Form::submit('Create',['class'=>'btn btn-primary'])}}



{!! Form::close() !!}
</div>
@endsection
