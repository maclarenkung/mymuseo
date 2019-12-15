<?php

use Illuminate\Database\Seeder;

class MuseumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('museums')->insert([
            [
                "name" => "พิพิธภัณฑ์ชาวบางกอก",
                "address_url" => "https://goo.gl/maps/PaMwwRmBPPd2miKs6",
                "phonenumber" => "02 233 7027",
                "email" => "admin@muse.com",
                "website_url" => "admin@muse.com",
                "email" => "admin@muse.com",
                "image_url" => "https://promotions.co.th/wp-content/uploads/16864532_1309052882451208_4188840007222021267_n-horz.jpg",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim mollitia aut magni adipisci, ratione repellat accusamus nisi est aliquid dicta possimus quidem et quibusdam consectetur tempora vero hic maxime fuga?",
            ],
            [
                "name" => "muse2",
                "address_url" => "https://goo.gl/maps/1aYRv9UAyevFvVnw5",
                "phonenumber" => "0871231234",
                "email" => "admin@muse.com",
                "website_url" => "admin@muse.com",
                "email" => "google.com",
                "image_url" => "https://picsum.photos/200/300",
                "description" => "พิพิธภัณฑ์ชาวบางกอก หรือ พิพิธภัณฑ์ท้องถิ่นกรุงเทพมหานคร เขตบางรัก กรุงเทพมหานคร เป็นหนึ่งใน 27 พิพิธภัณฑ์กรุงเทพมหานคร ตั้งอยู่ที่บ้านเลขที่ 273 ซอยเจริญกรุง 43 ถนนเจริญกรุง เขตบางรัก กรุงเทพมหานคร 10500 เป็นพิพิธภัณฑ์ท้องถิ่นที่ก่อตั้งโดยเอกชน โดยเจ้าของบ้านมีวัตถุประสงค์ที่จะมอบบ้านของตนให้เป็นพิพิธภัณฑ์เพื่อให้เยาวชนได้ศึกษา และต่อมาได้โอนกรรมสิทธิ์ให้กรุงเทพมหานครดูแล เมื่อ 1 ตุลาคม พ.ศ. 2547 ทำเลที่ตั้งเป็นย่านพักอาศัยของชุมชนชาวบางรัก ซึ่งในอดีตเป็นย่านตากอากาศ ชุมชนนานาชาติ และทำเลธุรกิจที่สำคัญมาตั้งแต่ปลายสมัยอยุธยา เนื้อหาในการจัดแสดงจึงแสดงให้เห็นถึงประวัติความเป็นมาของชีวิตชาวบางกอก (กรุงเทพฯ ในยุคก่อน) และความเป็นมาของเขตบางรักที่มีการผสมผสานวัฒนธรรมหลายชนชาติ ทั้งไทย จีน ฝรั่ง และแขก มีวิวัฒนาการและอิทธิพลจากตะวันตกต่อการปฏิรูปประเทศ สถานที่ต่างๆซึ่งเกี่ยวกับภูมิหลังของชุมชน เช่น กุศลสถาน อาสนวิหารอัสสัมชัญ โบสถ์สืบสัมพันธวงศ์ โรงพยาบาลเลิดสิน วัดมหาพฤฒารามวรวิหาร วัดพระศรีมหาอุมาเทวี โรงเรียนกรุงเทพคริสเตียน แฟลตแห่งแรกของไทย และสโมสรแห่งแรกในไทย ในสมัยรัชกาลที่ 5 เป็นย่านที่พำนักของบุคคลสำคัญ เช่น หลวงประดิษฐ์มนูธรรม ดร.ป๋วย อึ้งภากรณ์ อ.สุลักษณ์ ศิวรักษ์ เป็นต้น",
            ]
        ]);
    }
}
