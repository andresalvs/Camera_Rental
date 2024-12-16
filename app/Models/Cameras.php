<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cameras extends Model
{
    use HasFactory;

    // Specify the table explicitly
    protected $table = 'cameras';

    // Specify the primary key explicitly if it's not "id"
    protected $primaryKey = 'camera_id';

    // If the primary key is non-incrementing or non-numeric, set this
    public $incrementing = true;

    // Ensure timestamps are enabled
    public $timestamps = true;

    protected $fillable = [
        'camera_image',
        'camera_id',
        'camera_name',
        'camera_price',
        'camera_category',
    ];
    public function payments()
    {
        return $this->hasMany(Payments::class, 'camera_id');
    }
    public function stock()
    {
        return $this->hasOne(Stocks::class, 'camera_id');
    }
}
