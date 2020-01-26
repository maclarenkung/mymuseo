<?php

namespace App\Http\Controllers;

use App\MuseumPackage;
use Illuminate\Http\Request;

class MuseumPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
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
     * @param  \App\MuseumPackage  $museumPackage
     * @return \Illuminate\Http\Response
     */
    public function show(MuseumPackage $museumPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MuseumPackage  $museumPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(MuseumPackage $museumPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MuseumPackage  $museumPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MuseumPackage $museumPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MuseumPackage  $museumPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(MuseumPackage $museumPackage)
    {
        //
    }
}
