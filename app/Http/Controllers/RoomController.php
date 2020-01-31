<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomImage;
use App\RoomTranslation;
use Illuminate\Http\Request;
use App\SoundLang;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::get();
        foreach ($rooms as $room) {
        }
        return $rooms;
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
        $room = Room::create([
            // "image_url" => $request->all['image_url'],
            "floor_id" => $request->all['floor_id']
        ]);

        foreach ($request->only(['th', 'en', 'cn']) as $key => $value) {
            $lang_id = getLangSlugIdByCode($key);
            RoomTranslation::create([
                "lang_id" =>  $lang_id,
                "room_id" => $room->id,
                "name" => $value['name'],
                "description" => $value['description']
            ]);
        }

        foreach ($request->all['image_url'] as $url) {
            RoomImage::create([
                "room_id" => $room->id,
                "image_url" => $url
            ]);
        }


        return $room;





        $floor = Room::create($request->all());
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
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        // $room->items;
        return $room;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
