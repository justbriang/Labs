@include('messages.flashmsg')
@extends('layouts.main')
@section('content')
@if(count($cars)>0)

                <table class="table table-white" id="dataTable" width="100%" cellspacing="0">
                    <th>Owner</th>
                    <th>Model</th>
                    <th>Make</th>
                    <th>Year</th>
                    @foreach ($cars as $car)
                     <tr>
                    <td>{{$users[$car->user_id]}}</td>
                     <td>{{$car->make}}</td>
                     <td>{{$car->model}}</td>
                     <td>{{$car->year}}</td>

                     <td><a href="/car/{{$car->id}}/edit" class="btn btn-info">Edit</a></td>
                     <td>{!!Form::open(['action'=>['CarsController@destroy',$car->id],'method'=>'POST','class'=>'pull-right'])!!}

                           {{Form::hidden('_method','DELETE')}}

                           {{Form::Submit('Delete',['class'=>'btn btn-danger'])}}

                           {!!Form::close()!!}</td>

                    </tr>



                    @endforeach

                </table>

@endif
@endsection
