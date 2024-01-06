<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
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

        File::makeDirectory(storage_path('app/public/portfolio'), 0755, true, true);

        $faker = fake();
        foreach ($files as $file) {
            File::copy(resource_path('img/' . $file), storage_path('app/public/portfolio/' . $file));

            $title = $faker->words(3, true);
            $tags = ['Web Design', 'Web Development', 'Mobile App', 'Branding', 'Illustration'];
            Portfolio::create([
                'thumbnail' => 'portfolio/' . $file,
                'image' => 'portfolio/' . $file,
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $faker->sentences(2, true),
                'tags' => $faker->randomElements($tags, mt_rand(1, 2)),
            ]);
        }
    }
}
