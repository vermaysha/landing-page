<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Rawilk\Settings\Facades\Settings;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'app.name' => 'Perfect Coding',
            'app.url' => 'http://localhost/',
            'app.debug' => true,

            // Contact
            'contact.email' => 'perfectcoding@gmail.com',
            'contact.phone' => '6287765299386',
            'contact.instagram' => 'perfectcoding.id',
            'contact.facebook' => 'perfectcoding.id',
        ];
        DB::transaction(function () use ($settings) {
            foreach ($settings as $key => $value) {
                Settings::set($key, $value);
            }
        });
    }
}
