<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->nullable();
            $table->string('unit')->nullable(); // satuan, misal pcs, kg
            $table->decimal('weight', 8, 2)->default(0.00); // berat, gram
            $table->integer('stok')->default(0); // stok saat ini
            $table->decimal('price', 15, 2)->default(0.00); // harga
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
