<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Model
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $technologies = [
            'HTML',
            'CSS',
            'JAVASCRIPT',
            'PHP'
        ];

        foreach ($technologies as $technology) {
            $newType = Technology::create([
                'name' => $technology
            ]);
        }
    }
}
