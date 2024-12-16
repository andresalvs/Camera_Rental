<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade

class CameraSeeder extends Seeder
{
    public function run()
    {
        DB::table('cameras')->insert([
            [
                'camera_name' => 'Canon EOS R5',
                'camera_price' => 150.00,
                'camera_category' => 'Full-frame Mirrorless',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'camera_name' => 'Sony A7 III',
                'camera_price' => 120.00,
                'camera_category' => 'Full-frame Mirrorless',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'camera_name' => 'Nikon Z6',
                'camera_price' => 130.00,
                'camera_category' => 'Full-frame Mirrorless',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'camera_name' => 'Fujifilm X-T4',
                'camera_price' => 100.00,
                'camera_category' => 'APS-C Mirrorless',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'camera_name' => 'Panasonic Lumix GH5',
                'camera_price' => 110.00,
                'camera_category' => 'Micro Four Thirds',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'camera_name' => 'Blackmagic Pocket 6K',
                'camera_price' => 200.00,
                'camera_category' => 'Cinema Camera',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
