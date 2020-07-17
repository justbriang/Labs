<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use App\Reviews;
use App\Car;
class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review=Reviews::all();
        return ReviewResource::collection($review);
    }

    public function store(Request $request)
    {  $car=new Car();
        $request->validate([
        'description' => 'required|max:255',
        'rating'=>'required|max:255',
        'car_id'=>'required|max:255']);

        $input = $request->all();
        $review=new Reviews;
        $review->car_id=$request->input('car_id');
        $review->rating=$request->input('rating');
        $review->description=$request->input('description');
        $review->save();
        // $review =$car->reviews()->create($input);
        return new ReviewResource($review);
    }
    public function show(Reviews $review)
    {
        $reviews=Reviews::find($review);
        return new ReviewResource($reviews);
    }
    public function update(Request $request, Reviews $review)
    {
        $request->validate([
            'description' => 'required|max:255',
            'car_id'=>'required|max:255']);
    $input = $request->all();

    $review->update($input);
    return new ReviewResource($review->load('creator'));

    }
    public function destroy(Reviews $review)
    {
        $review -> delete();
         return response(['message' => 'deleted']);
        }
    }