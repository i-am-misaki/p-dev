<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\learning_data;
use App\Models\category;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        learning_data::factory()->count(10)->create();
        category::factory()->count(10)->create();
        // DB::table('users')->insert([
        //     'name' => 'mm',
        //     'email' => 'testtest@com',
        //     'password' => 'mmtesttest',
        //     'content' => Str::random(10),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }
}
