<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use Illuminate\Support\Facades\Validator;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale = Show::join('movies','movies.id', '=', 'shows.movie_id')
        ->join('theaters','theaters.id', '=', 'shows.theater_id')
        ->join('cinemas','cinemas.id', '=', 'theaters.cinema_id')
        ->select('movies.name as Pelicula','shows.schedule as Horario','theaters.id as Sala', 'cinemas.name as Cine', 'shows.day as Fecha')
        ->latest('shows.day')
        ->orderByDesc('shows.schedule')
        ->get();
        return $sale->toJson();
        // return $sale;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'movie_id' => 'required|exists:movies,id',
            'theater_id' => 'required|exists:theaters,id',
            'schedule' => 'required|max:24|int',
            'day' => 'required|date',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }

        $show = Show::create(['movie_id' => $request->movie_id,
        'theater_id' => $request->theater_id,
        'schedule' => $request->schedule,
        'day' => $request->day]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $busqueda = $request->get("moviename");
        $sale = Show::join('movies','movies.id', '=', 'shows.movie_id')
        ->join('theaters','theaters.id', '=', 'shows.theater_id')
        ->join('cinemas','cinemas.id', '=', 'theaters.cinema_id')
        ->where("movies.name", "=", $busqueda)
        ->select('movies.name as Pelicula','shows.schedule as Horario','theaters.name as Sala', 'cinemas.name as Cine', 'shows.day as Fecha')
        ->latest('shows.day')
        ->orderByDesc('shows.schedule')
        ->get();
        return $sale->toJson();
        // return $sale;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:shows,id',
            'movie_id' => 'required|exists:movies,id',
            'theater_id' => 'required|exists:theaters,id',
            'schedule' => 'required|max:24|int',
            'day' => 'required|date',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }

        Show::where('id',$request->id)
        ->update(['movie_id'=> $request->movie_id,
                          'theater_id'=> $request->theater_id,
                          'schedule'=> $request->schedule,
                          'day'=> $request->day]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $show = Show::where('id',$request->id)->first();
        $show->delete();
    }

    public function showToken(){
        echo csrf_token();
    }
}
