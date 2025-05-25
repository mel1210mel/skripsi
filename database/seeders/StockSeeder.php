<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\StockIn;
use App\Models\StockOut;
use Carbon\Carbon;

class StockSeeder extends Seeder
{
    public function run()
    {
        // Membuat beberapa item
        $items = Item::factory()->count(5)->create();

        // Menambahkan stok masuk dan keluar untuk setiap item
        foreach ($items as $item) {
            // Stok Masuk
            StockIn::create([
                'item_id' => $item->id,
                'quantity' => rand(50, 200),
                'created_at' => Carbon::now()->subMonths(rand(1, 12))
            ]);

            // Stok Keluar
            StockOut::create([
                'item_id' => $item->id,
                'quantity' => rand(10, 50),
                'created_at' => Carbon::now()->subMonths(rand(1, 12))
            ]);
        }
    }
}
