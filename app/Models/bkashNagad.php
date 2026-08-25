<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BkashNagad extends Model
{
    use HasFactory;

    protected $table = 'bkash_nagads';

    protected $guarded = [];

    public function BNType()
    {
        return $this->belongsTo(BkashNagadType::class, 'type', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
