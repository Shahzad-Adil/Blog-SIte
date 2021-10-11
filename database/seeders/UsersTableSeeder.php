<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Profile;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'adil shahzad',
            'email' => 'adil@gmail.com',
            'password' => bcrypt('12345678'),
            'admin' => 1,
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpeg',
            'about' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat eius ab esse ipsam autem sint similique vero debitis nihil molestias quo voluptatem nostrum nobis, nulla dignissimos, maiores expedita eos voluptatibus!',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
        ]);
    }
}
