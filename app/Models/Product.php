<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'quantity_in_stock', 'supplier_id'];

    // A product belongs to a supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // A product has many stock history records
    public function stockHistories()
    {
        return $this->hasMany(StockHistory::class);
    }
}
