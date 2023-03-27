<?php

namespace Database\Seeders;

// Models
use App\Models\Type;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Type::truncate();

        $types = [
            'private',
            'public',
            'template'
        ];

        foreach ($types as $type) {
            $newType = Type::create([
                'name' => $type
            ]);
        }
    }
}
