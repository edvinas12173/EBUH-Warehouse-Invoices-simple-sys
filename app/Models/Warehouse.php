<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $table = "warehouse";

    protected $fillable = [
        'item_name',
        'item_desc',
        'category',
        'stock',
        'price',
        'location',
    ];

    public function category_name() {
        return $this->belongsTo(Category::class, 'category');

    }

    public function location_name() {
        return $this->belongsTo(Location::class, 'location','id');
    }
}
