@include('messages.flashmsg')
@extends('layouts.main')

@section('content')
<div class="container-fluid">
{!! Form::open(['action'=>'CarsController@store','method'=>'POST']) !!}

    <div class="form-group">

        {{form::label('model', 'CarModel')}}

        {{form::Text('model','',['class' =>'form-control','placeholder'=>'CarModel'])}}

    </div>

    <div class="form-group">

            {{form::label('make', 'CarMake')}}

            {{form::Textarea('make','',['class' =>'form-control','placeholder'=>'Make'])}}

        </div>

    <div class="form-group">

                {{form::label('User_id', 'CarOwner')}}

                {{form::select('user_id',$users,null,['class' =>'form-control','placeholder'=>'Pick a Owner...'])}}

            </div>

    <div class="form-group">

                {{form::label('year', 'Year')}}

                {{form::Date('year','',['class' =>'form-control','placeholder'=>'Year'])}}

            </div>




        {{Form::submit('Create',['class'=>'btn btn-primary'])}}



{!! Form::close() !!}
</div>
@endsection
