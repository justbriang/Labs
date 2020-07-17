<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\User;
class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Car::paginate(10);

        $users = User::pluck('name', 'id');
        return view('car.index',compact('cars','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('car.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'model'=>'required',

            'make'=>'required',

            'user_id'=>'required',

            'year'=>'required',]);

            $car=new Car;

                   $car->model=$request->input('model');

                   $car->make=$request->input('make');

                   $car->user_id=$request->input('user_id');

                   $car->year=$request->input('year');



                   $car->save();

                   return redirect('/car')->with('success','car created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars=Car::find($id);

        $users=User::pluck('name','id');

        return view('car.edit',compact(['cars','users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[

            'model'=>'required',

            'make'=>'required',

            'user_id'=>'required',

            'year'=>'required',]);

            $car=Car::find($id);

                   $car->model=$request->input('model');

                   $car->make=$request->input('make');

                   $car->user_id=$request->input('user_id');

                   $car->year=$request->input('year');



                   $car->save();

                   return redirect('/car')->with('success','car created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $car=Car::find($id);

        $car->delete();

        return redirect('car')->with('success','car removed');
    }
}
