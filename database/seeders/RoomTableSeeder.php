<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoomTableSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = Room::factory(10)->create();
        $imageUrl = 'https://placeimg.com/200/150?' . rand(1, 100);
        foreach ($rooms as $item) {
            $item->addMediaFromUrl($imageUrl)->usingFilename(md5(Str::random(8) . time()) . '.jpg')->toMediaCollection('image');
        }
    }
}
