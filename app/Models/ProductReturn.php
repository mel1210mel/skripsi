<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReturn extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id', 'quantity', 'reason', 'return_date'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
