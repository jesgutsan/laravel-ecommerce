<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Carretera',
                'slug' => 'carretera',
                'description' => 'Lorem ipsum dolor sit amet',
                'color' => '#440022'
            ],
            [
                'name' => 'Muntanya',
                'slug' => 'mtb',
                'description' => 'Lorem ipsum dolor sit amet',
                'color' => '#445500'
            ]
        ];

        Category::insert($data);
    }
}
