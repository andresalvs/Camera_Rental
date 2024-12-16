<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $fillable = [
        'stock_id',
        'camera_id',
        'camera_stock',
        'camera_rented'
    ];
    public function camera()
    {
        return $this->belongsTo(Cameras::class, 'camera_id');
    }
}
