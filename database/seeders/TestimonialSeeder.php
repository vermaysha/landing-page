<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'content' => 'Perfect Coding telah membantu kami mengembangkan aplikasi yang luar biasa. Mereka benar-benar memahami kebutuhan kami dan memberikan solusi yang tepat.',
                'fullname' => 'Budi Santoso',
                'job_title' => 'CEO di PT. Maju Mundur',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Saya sangat terkesan dengan kecepatan dan kualitas pekerjaan Perfect Coding. Mereka benar-benar membantu bisnis saya tumbuh.',
                'fullname' => 'Dewi Sartika',
                'job_title' => 'Pemilik Toko Online Dewi’s Shop',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Tim di Perfect Coding sangat profesional dan mudah diajak bekerja sama. Mereka selalu ada untuk menjawab pertanyaan saya dan memberikan saran yang berharga.',
                'fullname' => 'Agus Pranoto',
                'job_title' => 'Manajer Proyek di PT. Sejahtera Abadi',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Saya sangat merekomendasikan Perfect Coding untuk semua kebutuhan pengembangan aplikasi Anda. Mereka benar-benar tahu apa yang mereka lakukan.',
                'fullname' => 'Ratna Dewi',
                'job_title' => 'Pendiri Startup Edukasi Anak Genius',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Perfect Coding telah menjadi partner yang luar biasa dalam proyek kami. Mereka selalu memberikan hasil yang melebihi ekspektasi.',
                'fullname' => 'Eko Prasetyo',
                'job_title' => 'Direktur Teknologi di PT. Inovasi Digital Indonesia',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Saya sangat puas dengan layanan Perfect Coding. Mereka selalu memberikan solusi yang inovatif dan efisien untuk bisnis saya.',
                'fullname' => 'Siti Aminah',
                'job_title' => 'CEO di PT. Kuliner Nusantara',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Testimonial::insert($testimonials);
    }
}
