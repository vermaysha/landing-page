<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [
            'gallery-1.jpg',
            'gallery-2.jpg',
            'gallery-3.jpg',
            'gallery-4.jpg',
            'gallery-5.jpg',
            'gallery-6.jpg',
        ];

        File::makeDirectory(storage_path('app/public/template'), 0755, true, true);

        $faker = fake();
        foreach ($files as $file) {
            File::copy(resource_path('img/template/' . $file), storage_path('app/public/template/' . $file));

            $title = $faker->words(3, true);
            Template::create([
                'thumbnail' => 'template/' . $file,
                'image' => 'template/' . $file,
                'title' => $title,
                'description' => $faker->sentences(2, true),
            ]);
        }
    }
}
