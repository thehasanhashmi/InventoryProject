<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'warehouse_id', 'quantity', 'action'];
    // Stock history belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Stock history belongs to a warehouse
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
