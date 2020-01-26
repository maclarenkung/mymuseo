<?php

namespace App\Http\Controllers;

use App\Floor;
use App\FloorTranslation;
use App\SoundLang;

use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floors =  Floor::get();
        foreach ($floors as $floor) {
        }
        return $floors;
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
        // $floor = Floor::create([
        //     // "image_url" => $request->all['image_url'],
        //     "museum_id" => $request->all['museum_id']
        // ]);

        // foreach ($request->only(['th', 'en', 'cn']) as $key => $value) {
        //     $lang_id = getLangSlugIdByCode($key);
        //     FloorTranslation::create([
        //         "lang_id" =>  $lang_id,
        //         "item_id" => $floor->id,
        //         "name" => $value['name'],
        //         "description" => $value['description']
        //     ]);
        // }

        // foreach ($request->all['image_url'] as $url) {
        //     Image::create([
        //         "item_id" => $item->id,
        //         "image_url" => $url
        //     ]);
        // }


        // return $floor;
        // $floor = Floor::create($request->all());
        // $soundLang = SoundLang::create([
        //     "model" =>  "App\Floor",
        //     "relation_id" => $floor->id,
        //     "lang_id" => 1,
        //     "file_url" => $request->file_url
        // ]);
        // return $floor;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        // $floor->rooms;
        return $floor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function edit(Floor $floor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floor $floor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        //
    }
}
