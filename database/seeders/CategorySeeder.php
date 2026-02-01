<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('book_categories')->insert([
            [
                'name' => 'Fiksi',
                'deskripsi' => 'Koleksi buku cerita imajinatif seperti novel dan cerpen.'
            ],
            [
                'name' => 'Non-Fiksi',
                'deskripsi' => 'Buku berbasis fakta, pengalaman nyata, dan pengetahuan umum.'
            ],
            [
                'name' => 'Teknologi',
                'deskripsi' => 'Buku seputar IT, pemrograman, dan perkembangan teknologi.'
            ],
            [
                'name' => 'Pendidikan',
                'deskripsi' => 'Buku pembelajaran untuk pelajar, mahasiswa, dan umum.'
            ],
            [
                'name' => 'Sejarah',
                'deskripsi' => 'Membahas peristiwa masa lalu dan perkembangan peradaban.'
            ],
            [
                'name' => 'Bisnis & Ekonomi',
                'deskripsi' => 'Buku tentang bisnis, keuangan, dan manajemen.'
            ],
            [
                'name' => 'Sains',
                'deskripsi' => 'Ilmu pengetahuan alam dan penelitian ilmiah.'
            ],
            [
                'name' => 'Seni & Desain',
                'deskripsi' => 'Buku tentang seni visual, desain, dan kreativitas.'
            ],
            [
                'name' => 'Agama',
                'deskripsi' => 'Buku keagamaan dan spiritualitas.'
            ],
            [
                'name' => 'Pengembangan Diri',
                'deskripsi' => 'Buku motivasi, self-improvement, dan pengembangan mental.'
            ],
        ]);
    }
}
