<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\UserProfile;
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
        User::factory()->create([
            'name' => 'Danilo Vega',
            'email' => 'danilo.vega.lopez@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'image'=>'http://lorempixel.com/400/400/people',
            'is_admin' => true,
        ])->each(function($user){            
            UserProfile::factory()->create([
                'user_id' => $user->id
            ]);
        });;

        User::factory()->count(60)->create([
            'image'=>'http://lorempixel.com/400/400/people',
        ])->each(function($user){            
            UserProfile::factory()->create([
                'user_id' => $user->id
            ]);
        });

        
    }
}
