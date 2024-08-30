<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    protected $fillable = ['user_id', 'attendance_start', 'attendance_end'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
