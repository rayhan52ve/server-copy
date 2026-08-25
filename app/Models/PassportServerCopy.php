<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassportServerCopy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function copyType()
    {
        return $this->belongsTo(PassportServerCopyType::class, 'type', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
