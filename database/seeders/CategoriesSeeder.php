<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar kategori
        $categories = [
            'Teknologi',
            'Kesehatan',
            'Olahraga',
            'Seni & Budaya',
            'Pariwisata',
            'Keuangan & Bisnis',
            'Ilmu Pengetahuan & Alam',
            'Makanan & Kuliner',
            'Gaya Hidup & Fashion',
            'Otomotif & Kendaraan'
        ];

        // Masukkan kategori ke dalam database
        foreach ($categories as $category) {
            DB::table('CategoriPost')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
