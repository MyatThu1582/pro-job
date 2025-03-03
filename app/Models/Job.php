<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'salary',
        'type',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
