<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $primaryKey = 'SalesID';
    protected $guarded = ['SalesID'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function salesperson()
    {
        return $this->belongsTo(SalesPerson::class, 'SalesPersonID', 'SalesPersonID');
    }
}
