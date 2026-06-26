<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi', 'slug' => 'fiksi'],
            ['name' => 'Non-Fiksi', 'slug' => 'non-fiksi'],
            ['name' => 'Biografi', 'slug' => 'biografi'],
            ['name' => 'Sejarah', 'slug' => 'sejarah'],
            ['name' => 'Sains', 'slug' => 'sains'],
            ['name' => 'Teknologi', 'slug' => 'teknologi'],
            ['name' => 'Agama', 'slug' => 'agama'],
            ['name' => 'Sastra', 'slug' => 'sastra'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
