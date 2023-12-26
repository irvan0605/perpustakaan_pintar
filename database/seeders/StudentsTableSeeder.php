<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            DB::table('students')->insert([
                'nim' => '100322002'.$i,
                'name' => 'Student'.$i,
                'study_program' => 'Informatika',
                'class' => 'Reguler',
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
