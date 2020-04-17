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
                        "name" => "โต๊ะเครื่องสุขภัณฑ์",
                        "lang_id" => 1,
                        "description" => "โต๊ะเครื่องสุขภัณฑ์ที่ใช้สำหรับการประกอบชีวิตประวัน",
                        "audio_url" => "/uploads/files/1580541575Beeper_Emergency_Call.mp3"
                    ],
                    [
                        "name" => "sanitary ware table",
                        "lang_id" => 2,
                        "description" => "Sanitary ware table used for daily living",
                        "audio_url" => "/uploads/files/1580541575Beeper_Emergency_Call.mp3"
                    ],
                    [
                        "name" => "卫浴桌",
                        "lang_id" => 3,
                        "description" => "日常生活用卫生洁具桌",
                        "audio_url" => "/uploads/files/1580541575Beeper_Emergency_Call.mp3"
                    ]
                ]

            ],
            [
                "room_id" => 1,

                "image_url" => "https://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "เครื่องอัดกลีบผ้าสไบ",
                        "lang_id" => 1,
                        "description" => "ใช้สำหรับอัดกลีบผ้าสไบ",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "a pleat-making machine",
                        "lang_id" => 2,
                        "description" => "Used for compressing petals in shawls",
                        "audio_url" => "wwwww"
                    ],
                    [
                        "name" => "打褶机",
                        "lang_id" => 3,
                        "description" => "用于压缩披肩的花瓣",
                        "audio_url" => ""
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "ตู้",
                        "lang_id" => 1,
                        "description" => "ตู้ทรงเหลี่ยม มี 4 ขา ด้านหน้ามีบานประตูกระจก 2 บาน มี 3 ชั้น ที่บานประตูมีกุญแจล็อก และปุ่มจับ 2 ปุ่ม",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "cabinet",
                        "lang_id" => 2,
                        "description" => "Square shape cabinet with 4 legs. The front has 2 glass doors. There are 3 layers. The door has a lock and 2 keys.",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "内阁",
                        "lang_id" => 3,
                        "description" => "四腿方形柜子。前面有2个玻璃门。共3层。门上有一把锁和2把钥匙。",
                        "audio_url" => ""
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "โต๊ะเครื่องแป้ง",
                        "lang_id" => 1,
                        "description" => "โต๊๊ะเครื่องแป้งมีกระจก 1 บานด้านบนโต๊ะมีมุมทั้งสองมีลิ้นชักเล็กๆ ข้างละช่อง ด้านหน้ามีลิ้นชักแบ่ง 2 ช่อง ใต้ลิ้นชักเป็นตู้พร้อมบานเปิด-ปิด 2 บาน ภายในแบ่งเป็นชั้นวางเสื้อผ้า 2 ชั้น",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "Dressing table",
                        "lang_id" => 2,
                        "description" => "The dressing table has 1 mirror. The table top has two corners. There are 2 drawers on each side. The front has 2 dividers. The bottom is a cabinet with 2 open-closed doors.",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "梳妆台",
                        "lang_id" => 3,
                        "description" => "梳妆台有1个镜子。桌面有两个角。每侧有2个抽屉。前部有2个分隔板。底部是一个带2个开闭门的橱柜",
                        "audio_url" => "wwwww"
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "ตู้",
                        "lang_id" => 1,
                        "description" => "เดิมเป็นตู้ยาวเมื่อหมอเสียชีวิตแม่ย้ายจากบ้านเช่า ซึ่งเป็นอาคารสองชั้นครึ่งตรงข้ามวัดแก้วแจมฟ้าด้านหลังโรงพยาบาลเซนต์โยเซฟตัดเป็นตู้สองหลังเพื่อให้ตรงกับบ้าน",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "cabinet",
                        "lang_id" => 2,
                        "description" => "was original a long cabinet, when the doctor died the mother  moved from the rental house. which is a two and a half story buiding Opposite Wat Keaw Chaem Fah Behind St. Joseph Hospital Cut into two cabinets To match the house",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "内阁",
                        "lang_id" => 3,
                        "description" => "原来是一个长柜子，当医生去世时，母亲从出租屋搬走了。这是一个两层半的建筑，位于圣约瑟夫医院后面的Wat Keaw Chaem Fah对面切成两个柜子以匹配房屋",
                        "audio_url" => ""
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "ตาชั่งน้ำหนัก",
                        "lang_id" => 1,
                        "description" => "ตาชั่งสปิงรูปกล่องสี่เหลี่ยม ไว้ใช้ยืน ฝาด้านหน้าติดกระจกเอาไว้อ่านน้ำหนักจากหน้าปัด",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "weigh",
                        "lang_id" => 2,
                        "description" => "Ping scales, rectangular box for standing, the front lid is attached with a mirror to read the weight from the dial",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "称重",
                        "lang_id" => 3,
                        "description" => "平秤，直立的矩形盒子，前盖装有镜子，可从表盘上读取重量",
                        "audio_url" => ""
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "เตียงนอน",
                        "lang_id" => 1,
                        "description" => "เป็นเตียงที่อาจารย์ใช้ไว้นอนเมื่อยังมีชีวิตอยู่ ",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "bed",
                        "lang_id" => 2,
                        "description" => "Is the bed that the teacher used to sleep while still alive",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "床",
                        "lang_id" => 3,
                        "description" => "是老师还活着时用来睡觉的床吗",
                        "audio_url" => ""
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "โต๊ะวางสุขภัณฑ์",
                        "lang_id" => 1,
                        "description" => "โต๊ะสี่เหลี่ยมผืนผ้าไม้สักมีสีขา พื้นโต๊ะเป็นแผ่นไม้ต่อชั้นวางของหนึ่งชั้น  ",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "Toilet table",
                        "lang_id" => 2,
                        "description" => "Teak rectangle table with leg colors The table top is made of wood per shelf.",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "洗手台",
                        "lang_id" => 3,
                        "description" => "柚木长方桌，有腿色桌面由每个架子的木头制成",
                        "audio_url" => ""
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "ชามกระเบื้องเบญจรงค์ลายเทพนมขครุฑ",
                        "lang_id" => 1,
                        "description" => "ชามกระเบื้องเบญจรงค์ลายเทพนมขครุฑ คาดว่ามีอายุในช่วงปลายอยุธยา(2210 - 2310)  ",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "Bowl of Benjarong pattern, Thep Phanok Garuda",
                        "lang_id" => 2,
                        "description" => "Bowl of Benjarong pattern, Thep Phanok Garuda Expected to be aged in the late Ayutthaya period (1667 - 1767).",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "碗的Benjarong模式，Thep Phanok鹰航",
                        "lang_id" => 3,
                        "description" => "碗Benjarong模式，Thep Phanok Garuda有望在大城府后期（1667年至1767年）衰老",
                        "audio_url" => ""
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "โต๊ะเครื่องแป้ง",
                        "lang_id" => 1,
                        "description" => "โต๊ะเครื่องแป้ง แบบ มีกระจก 3 บาน โดยเปิดออกด้านข้าง มีลิ้นชักเก็บของ อยู่ข้างกระจกบานกลางเป็นชั้นๆ",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "Dressing table",
                        "lang_id" => 2,
                        "description" => "Dressing table with 3 mirrors, open to the side There are storage drawers. Next to the glass in the middle",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "梳妆台",
                        "lang_id" => 3,
                        "description" => "梳妆台，带3个镜子，侧向打开有储物抽屉。中间玻璃旁边",
                        "audio_url" => ""
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
                        "description" => "เปียโนคู่ใจของคุณแม่ท่านอาจารย์ โดยจะเป็นเปียโนงาช้างซึ่งคนในสมัยก่อนมีความเชื่อว่า หากใครที่เจ็บไข้ได้ป่วยก็ให้มานั่งเล่นเปียโนที่ทำแป้นกดจากงาช้างแบบนี้ เพราะงาช้างจะสามารถช่วยดูดพิษไข้ออกไปได้",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "piano",
                        "lang_id" => 2,
                        "description" => "Reliant Piano of Mother, Master It will be ivory piano which people in the olden days believed that If anyone is sick, come to sit in the piano made of ivory like this. Because ivory can help to suck out fever poisoning",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "钢琴",
                        "lang_id" => 3,
                        "description" => "母亲，大师的信赖钢琴这将是古老的人们认为如果有人生病的象牙钢琴，就可以坐在象牙制成的钢琴中。因为象牙可以帮助吸出发烧中毒",
                        "audio_url" => ""
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "เตียงนอน",
                        "lang_id" => 1,
                        "description" => "เป็นที่นอนที่มีไว้รับรองแขกของอาจารย์ที่มาเยี่ยม",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "bed",
                        "lang_id" => 2,
                        "description" => "Is a mattress that serves guests of the visiting teachers",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "床",
                        "lang_id" => 3,
                        "description" => "是为来访的老师的客人服务的床垫",
                        "audio_url" => ""
                    ]
                ]

            ],


            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "ชักโครก",
                        "lang_id" => 1,
                        "description" => "เป็นสุขภัณฑ์ อยู่ในห้องน้ำ",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "flush toilet",
                        "lang_id" => 2,
                        "description" => "Is a toilet in the bathroom",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "抽水马桶",
                        "lang_id" => 3,
                        "description" => "在卫生间上厕所",
                        "audio_url" => ""
                    ]
                ]

            ],
            [
                "room_id" => 1,
                "image_url" => "xxxhttps://picsum.photos/200/300",
                "lang" => [
                    [
                        "name" => "โต๊ะรับประทานอาหาร",
                        "lang_id" => 1,
                        "description" => "เป็นโต๊ะอาหารที่อยู่ในห้องอาหาร สามารถนั่ง 6-8 ที่นั่ง บนโต๊ะจัดแสดงชุด Dinner set แบบฝรั่ง และภาชนะลายครามแบบบจีน เครื่องเคลือบสีเขียวไข่กา รูปแบบต่างๆ",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "Dining table",
                        "lang_id" => 2,
                        "description" => "Is a dining table in the dining room. Can sit 6-8 seats on the table, show a Western dinner set and Chinese porcelain. Variegated green porcelain",
                        "audio_url" => ""
                    ],
                    [
                        "name" => "餐桌",
                        "lang_id" => 3,
                        "description" => "是饭厅里的餐桌。可以坐在桌子上6至8个座位，展示西餐和中国瓷器。杂色青瓷",
                        "audio_url" => ""
                    ]
                ]

            ],
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
