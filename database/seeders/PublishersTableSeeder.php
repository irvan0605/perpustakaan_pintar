<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert([
            [
                'code_publisher' => 'PT001',
                'name_publisher' => 'Deepublish ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code_publisher' => 'PT002',
                'name_publisher' => 'Gramedia Pustaka Utama',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
