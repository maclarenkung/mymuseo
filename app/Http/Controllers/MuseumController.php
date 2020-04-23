<?php

namespace App\Http\Controllers;

use App\Museum;
use App\MuseumPackage;
use App\MuseumUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MuseumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $museums = Museum::get();

        foreach ($museums as $museum) {
            $museum->sound;
        }
        return  $museums;
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
        $user = request()->user();
        $museum = Museum::create($request->all());
        $museumPackage = MuseumPackage::create([
            "museum_id" => $museum->id,
            "package_id" => $request->package_id,
            // "expiry_date" => Carbon::now()->addMonths(1),
        ]);
        $museumUser = MuseumUser::create([
            "user_id" => $user->id,
            "museum_id" => $museum->id,
        ]);
        return $museum;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function show(Museum $museum)
    {
        $museum->floors;
        return $museum;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function edit(Museum $museum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Museum $museum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Museum $museum)
    {
        $museum->delete();
        return 'delete';
    }
}
