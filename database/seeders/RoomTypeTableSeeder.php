<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeTableSeeder extends Seeder
{
    public function run(): void
    {
        $arr = [
            'Conference',
            'Suite',
            'Studio',
            'Villa',
            'King suite',
            'Apartment Style',
            'Duplex',
            'Villa'
        ];

        foreach ($arr as $item) {
            RoomType::create([
                'title' => $item
            ]);
        }
    }
}
