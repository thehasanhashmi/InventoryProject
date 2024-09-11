<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location'];

    // A warehouse has many stock history records
    public function stockHistories()
    {
        return $this->hasMany(StockHistory::class);
    }
}
