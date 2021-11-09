<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale = Sale::join('users','users.id', '=', 'sales.user_id')
        ->join('shows','shows.id', '=', 'sales.show_id')
        ->join('movies','movies.id', '=', 'shows.movie_id')
        ->select('users.name as Usuario','sales.quantity as BoletosComprados','movies.name as Pelicula', 'sales.mount')->get();
        return $sale;
        // $sales = Sale::all();
        // return $sales;
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
        $sale = Sale::create(['user_id' => $request->user_id,
        'show_id' => $request->show_id,
        'quantity' => $request->quantity,
        'mount' => $request->mount]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $busqueda = $request->get("name");
        $sale = Sale::join('users','users.id', '=', 'sales.user_id')
        ->join('shows','shows.id', '=', 'sales.show_id')
        ->join('movies','movies.id', '=', 'shows.movie_id')
        ->where("users.name", "=", $busqueda)
        ->select('users.name as Usuario','sales.quantity as BoletosComprados','movies.name as Pelicula', 'sales.mount')
        ->latest('sales.id')
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showToken(){
        echo csrf_token();
    }
}
