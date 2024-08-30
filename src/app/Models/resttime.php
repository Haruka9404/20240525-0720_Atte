<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resttime extends Model
{
    protected $fillable = ['timestamp_id', 'rest_start', 'rest_end'];
    public function timestamp()
    {
        return $this->belongsTo('App\Models\Timestamp');
    }
}
