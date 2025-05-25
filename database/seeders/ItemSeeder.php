<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['name' => 'Besi', 'sku' => 'SKU-BESI', 'price' => 5000],
            ['name' => 'Kertas', 'sku' => 'SKU-KERTAS', 'price' => 2000],
            ['name' => 'Kardus', 'sku' => 'SKU-KARDUS', 'price' => 1500],
            ['name' => 'Plastik', 'sku' => 'SKU-PLASTIK', 'price' => 1000],
            ['name' => 'Logam', 'sku' => 'SKU-LOGAM', 'price' => 8000],
           
        ];
        
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
