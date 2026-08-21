<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimCallList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function callType()
    {
        return $this->belongsTo(SimCallListType::class, 'type', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
