<?php

namespace App\Http\Controllers;

use App\FloorTranslation;
use Illuminate\Http\Request;

class FloorTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floorstrans =  FloorTranslation::get();
        foreach ($floorstrans as $floorstran) {
        }
        return $floorstrans;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FloorTranslation  $floorTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(FloorTranslation $floorTranslation)
    {
        return $floorTranslation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FloorTranslation  $floorTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(FloorTranslation $floorTranslation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FloorTranslation  $floorTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FloorTranslation $floorTranslation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FloorTranslation  $floorTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(FloorTranslation $floorTranslation)
    {
        //
    }
}
