<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalsSummary extends Model
{
    protected $table = 'rentals_summary';  // The name of the materialized view

    public $timestamps = false;  // Materialized views don’t have timestamps
}
