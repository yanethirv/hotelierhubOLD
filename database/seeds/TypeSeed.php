<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = Type::create([
            'name' => 'Marketing and Sales',
            'created_at' => now()
        ]);

        $type = Type::create([
            'name' => 'Experts',
            'created_at' => now()
        ]);

        $type = Type::create([
            'name' => 'Property Management Tools',
            'created_at' => now()
        ]);

        $type = Type::create([
            'name' => 'Distribution channels',
            'created_at' => now()
        ]);

        $type = Type::create([
            'name' => 'Services',
            'created_at' => now()
        ]);

        $type = Type::create([
            'name' => 'Guest Communication Apps',
            'created_at' => now()
        ]);
    }
}
