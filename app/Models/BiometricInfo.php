<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiometricInfo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function biometric_type(){
        return $this->belongsTo(BiometricType::class,'type','id');
    }

    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
