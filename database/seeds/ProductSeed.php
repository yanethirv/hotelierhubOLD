<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'name' => 'Product Free',
            'description' => 'Product free.',
            'price' => 0.00,
            'cost' => 0.00,
            'type_id' => '1',
            'type_name' => '',
            'picture' => '',
            'status' => 'active',
            'document' => '1604194793.pdf',
            'created_at' => now()
        ]);
    }
}
