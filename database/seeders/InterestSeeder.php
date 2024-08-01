<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interests = [
            ['name' => 'Reading', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cooking', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Watching TV', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Basketball', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('interests')->insert($interests);
    }
}
