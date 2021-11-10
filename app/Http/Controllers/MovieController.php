<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return $movies->toJson();
        // return $movies;
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
        /*if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/movies/', $filename);
            $request->image = $filename;
        }*/
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:movies|max:255',
            'runtime' => 'required|max:500|integer',
            'classification' => 'required|max:1',
            'director' => 'required|max:255',
            'actors' => 'required|max:255',
            'sinopsis' => 'required|max:500',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }

        $movie = Movie::create(['name' => $request->name,
        'runtime' => $request->runtime,
        'classification' => $request->classification,
        'director' => $request->director,
        'actors' => $request->actors,
        'sinopsis' => $request->sinopsis/*,
        'image' => $request->image*/]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $movies = Movie::where('name',$request->name)->first();
        return $movies->toJson();
        // return $movies;
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
        /*if($request->hasFile('image'))
        {
            $movies = Movie::find($id);
            $path='assets/uploads/movies/'.$movies->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/movies/', $filename);
            $request->image = $filename;
        }*/
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:movies,id',
            'name' => 'required|unique:movies|max:255',
            'runtime' => 'required|max:500|integer',
            'classification' => 'required|max:1',
            'director' => 'required|max:255',
            'actors' => 'required|max:255',
            'sinopsis' => 'required|max:500',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }


        Movie::where('id',$request->id)
        ->update(['name'=> $request->name,
                          'runtime'=> $request->runtime,
                          'classification'=> $request->classification,
                          'director'=> $request->director,
                          'actors'=> $request->actors,
                          'sinopsis'=> $request->sinopsis/*,
                        'image'=> $request->image*/]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $movie = Movie::where('id',$request->id)->first();
        $movie->delete();
    }

    public function showToken(){
        echo csrf_token();
    }
}
