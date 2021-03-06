<?php

namespace App\Http\Controllers;

use App\Floor;
use App\FloorImage;
use App\FloorTranslation;
use App\SoundLang;
use App\User;
use Illuminate\Http\Request;
use App\MuseumUser;
use Illuminate\Support\Arr;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = request()->user();
        $museumuser = MuseumUser::where('user_id', $user->id)->get()->pluck('museum_id');
        // return $museumuser;
        $floors =  Floor::whereIn('museum_id', $museumuser)->get();

        foreach ($floors as $floor) {
        }

        return $floors;
    }
    // ->orderBy('id', 'desc')
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
        $floor = Floor::create([
            // "image_url" => $request->all['image_url'],
            "museum_id" => $request->all['museum_id'],
            "map_image_url" => $request->all['map_image_url']
        ]);

        foreach ($request->only(['th', 'en', 'cn']) as $key => $value) {
            $lang_id = getLangSlugIdByCode($key);
            FloorTranslation::create([
                "lang_id" =>  $lang_id,
                "floor_id" => $floor->id,
                "name" => $value['name'],
                "description" => $value['description']
            ]);
        }

        foreach ($request->all['image_url'] as $url) {
            FloorImage::create([
                "floor_id" => $floor->id,
                "image_url" => $url
            ]);
        }


        return $floor;





        $floor = Floor::create($request->all());
        $soundLang = SoundLang::create([
            "model" =>  "App\Floor",
            "relation_id" => $floor->id,
            "lang_id" => 1,
            "file_url" => $request->file_url
        ]);
        return $floor;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        $floor->rooms;

        $floor->all = [
            "museum_id" => $floor->museum_id,
            "image_url" => Arr::pluck($floor->image, 'image_url')
        ];

        $floor->th = $floor->transByLangId(1);
        $floor->en = $floor->transByLangId(2);
        $floor->cn = $floor->transByLangId(3);

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
    public function update(Request $request, $id)
    {


        $floor = Floor::find($id);

        FloorTranslation::where('floor_id', $floor->id)->delete();

        foreach ($request->only(['th', 'en', 'cn']) as $key => $value) {
            $lang_id = getLangSlugIdByCode($key);
            FloorTranslation::create([
                "lang_id" =>  $lang_id,
                "floor_id" => $floor->id,
                "name" => $value['name'],
                "description" => $value['description']
            ]);
        }

        FloorImage::where('floor_id', $floor->id)->delete();

        foreach ($request->all['image_url'] as $url) {
            FloorImage::create([
                "floor_id" => $floor->id,
                "image_url" => $url
            ]);
        }


        return $floor;
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
