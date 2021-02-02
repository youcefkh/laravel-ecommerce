<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
            'name' => 'PC HP',
            'description' => 'laptop hp 8go ram 500go ssd nvdia gtx 1080',
            'price' => '900',
            'category' => 'computer',
            'gallery' => 'https://image.darty.com/informatique/ordinateur_portable-portable/portable/hp_14-cf0022nf_i3_4_128_s1912124762649A_105959062.jpg'
            ],
            [
            'name' => 'BMW motorcycle',
            'description' => 'BMW motorcycle, blue',
            'price' => '5000',
            'category' => 'motorcycle',
            'gallery' => 'https://images.frandroid.com/wp-content/uploads/2019/12/bmw_e_roadster-1200x900.jpg'
            ],
            [
            'name' => 'DYNAMIC 4 H - Black',
            'description' => 'a black jacket for men',
            'price' => '99.99',
            'category' => 'clothes',
            'gallery' => 'https://www.cimalp.fr/12758-tonytheme_cloudzoom_big/veste-softshell-3-couches-dynamic-4.jpg'
            ],
            [
            'name' => 'Oppo watch',
            'description' => 'white oppo watch',
            'price' => '150',
            'category' => 'accessories',
            'gallery' => 'https://images.frandroid.com/wp-content/uploads/2020/07/oppo-watch-frandroid-2020.png'
            ],
        ]);
    }
}
