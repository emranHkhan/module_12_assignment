<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'name', 'mobile'];

    public function trips()
    {
        return $this->belongsToMany(Trip::class);
    }
}
