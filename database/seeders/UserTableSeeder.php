<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create([
            'image'=>'http://lorempixel.com/400/400/people',
        ]);

        User::factory()->create([
            'name' => 'Danilo Vega',
            'email' => 'danilo.vega.lopez@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'image'=>'http://lorempixel.com/400/400/people',
        ]);
    }
}
