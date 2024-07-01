<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerCopyOrder extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
