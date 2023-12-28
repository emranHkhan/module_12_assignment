<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ["from", "to", "departure_date", "departure_time", "seat_count"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
