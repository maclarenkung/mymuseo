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
                        "name" => "ตู้",
                        "lang_id" => 1,
                        "description" => "ตู้ทรงสี่เหลี่ยมมี 4 ขา ด้านหน้ามีบานประตูกระจก 2 บาน เคยเป็นตู้เก็บของและเอกสารสำคัญของคุณแม่",
                        "audio_url" => "/uploads/files/1580541575Beeper_Emergency_Call.mp3
"
                    ],
                    [
                        "name" => "Cupboard",
                        "lang_id" => 2,
                        "description" => "The square cabinet has 4 legs. The front has 2 glass doors. Used to be a locker and important documents for mother",
                        "audio_url" => "/uploads/files/1580541575Beeper_Emergency_Call.mp3
"
                    ],
                    [
                        "name" => "內閣",
                        "lang_id" => 3,
                        "description" => "方形櫃子有4個支腿，前部有2個玻璃門，曾經是儲物櫃和重要的母親文件。",
                        "audio_url" => "/uploads/files/1580541575Beeper_Emergency_Call.mp3
"
                    ]
                ]

            ],
            [
                "room_id" => 1,

                "image_url" => "https://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "เปียโน",
                        "lang_id" => 1,
                        "description" => "เปียโนคู่ใจของคุณแม่ท่านอาจารย์ โดยจะเป็นเปียโนงาช้างซึ่งคนในสมัยก่อนมีความเชื่อว่า หากใครที่เจ็บไข้ได้ป่วยก็ให้มานั่งเล่นเปียโนที่ทำแป้นกดจากงาช้างแบบนี้ เพราะงาช้างจะสามารถช่วยดูดพิษไข้ออกไปได้ ",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "piano",
                        "lang_id" => 2,
                        "description" => "Reliant Piano of Mother, Master It will be ivory piano which people in the olden days believed that If anyone is sick, come to sit in the piano made of ivory like this. Because ivory can help to suck out fever poisoning",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "鋼琴",
                        "lang_id" => 3,
                        "description" => "母親的可靠鋼琴，大師人們會相信這將是像牙鋼琴如果有人生病，可以坐在像牙製成的鋼琴上。因為像牙可以幫助吸出發燒中毒",
                        "audio_url" => "wwwww"
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "แจกัน",
                        "lang_id" => 1,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "vase",
                        "lang_id" => 2,
                        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "花瓶",
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
                        "name" => "เปียโน",
                        "lang_id" => 1,
                        "description" => "เปียโนคู่ใจของคุณแม่ท่านอาจารย์ โดยจะเป็นเปียโนงาช้างซึ่งคนในสมัยก่อนมีความเชื่อว่า หากใครที่เจ็บไข้ได้ป่วยก็ให้มานั่งเล่นเปียโนที่ทำแป้นกดจากงาช้างแบบนี้ เพราะงาช้างจะสามารถช่วยดูดพิษไข้ออกไปได้ ",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "piano",
                        "lang_id" => 2,
                        "description" => "Reliant Piano of Mother, Master It will be ivory piano which people in the olden days believed that If anyone is sick, come to sit in the piano made of ivory like this. Because ivory can help to suck out fever poisoning",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "鋼琴",
                        "lang_id" => 3,
                        "description" => "母親的可靠鋼琴，大師人們會相信這將是像牙鋼琴如果有人生病，可以坐在像牙製成的鋼琴上。因為像牙可以幫助吸出發燒中毒",
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
