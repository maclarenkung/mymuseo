<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\ItemTranslation;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                "room_id" => 1,
                "image_url" => "https://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "แจกัน th",
                        "lang_id" => 1,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "แจกัน en",
                        "lang_id" => 2,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "แจกัน cn",
                        "lang_id" => 3,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ]
                ]

            ],
            [
                "room_id" => 1,

                "image_url" => "https://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "แจกัน th",
                        "lang_id" => 1,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "แจกัน en",
                        "lang_id" => 2,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "แจกัน cn",
                        "lang_id" => 3,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "แจกัน th",
                        "lang_id" => 1,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "แจกัน en",
                        "lang_id" => 2,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "แจกันxxxx cn",
                        "lang_id" => 3,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "แจกัน th",
                        "lang_id" => 1,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "แจกัน en",
                        "lang_id" => 2,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "แจกันxxxx cn",
                        "lang_id" => 3,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ]
                ]

            ]
        ];

        foreach ($items as $item) {
            $save = Item::create([
                "room_id" => $item['room_id'],
                "image_url" => $item['image_url']
            ]);

            foreach ($item["lang"] as $lang) {
                ItemTranslation::create([
                    "lang_id" => $lang["lang_id"],
                    "item_id" => $save->id,
                    "name" => $lang['name'],
                    "description" => $lang['description'],
                    "audio_url" => $lang['audio_url']
                ]);
            }
        }
    }
}
