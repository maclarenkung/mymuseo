<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemTranslation;
use App\ItemImage;

use App\SoundLang;
use App\MuseumUser;

use App\ItemScan;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function userScan(Request $request)
    {
        return ItemScan::create([
            "ip" => $request->ip(),
            "item_id" => $request->item_id
        ]);
    }
    public function index()
    {

        $user = request()->user();

        $user_museum = MuseumUser::where('user_id', $user->id)->get()->pluck('museum_id');

        $items = Item::whereHas('room.floor.museum', function ($query) use ($user_museum) {
            $query->whereIn('museum_id', $user_museum);
        })->get();

        return $items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $item = Item::create([
            // "image_url" => $request->all['image_url'],
            "room_id" => $request->all['room_id'],
            "locate_x" => $request->all['locate_x'],
            "locate_y" => $request->all['locate_y'],
        ]);

        foreach ($request->only(['th', 'en', 'cn']) as $key => $value) {
            $lang_id = getLangSlugIdByCode($key);
            ItemTranslation::create([
                "lang_id" =>  $lang_id,
                "item_id" => $item->id,
                "name" => $value['name'],
                "audio_url" => $value['file_url'],
                "description" => $value['description']
            ]);
        }

        foreach ($request->all['image_url'] as $url) {
            ItemImage::create([
                "item_id" => $item->id,
                "image_url" => $url
            ]);
        }


        return $item;





        $item = Item::create($request->all());
        $soundLang = SoundLang::create([
            "model" =>  "App\Item",
            "relation_id" => $item->id,
            "lang_id" => 1,
            "file_url" => $request->file_url
        ]);
        return $item;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $item->images;
        $item->room->floor->museum;
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return 'delete success';
    }
}
