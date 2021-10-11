<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::create([
            'site_name' => "Laravel's Blog",
            'address' => 'Attock, Islamabad',
            'contact_number' => '+92 3 46 5463330',
            'contact_email' => 'shahzad@blog.com',
        ]);
    }
}
