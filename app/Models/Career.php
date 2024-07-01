<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }
    public static $data;

    public static function save_career($request)
    {
        self::$data = new Career();
        self::$data->career_title = $request->career_title??null;
        self::$data->field = $request->field??null;
        self::$data->career_details = $request->career_details??null;
        self::$data->career_home = $request->career_home??null;
        self::$data->save();
    }
    public static function update_career($request)
    {
        self::$data = Career::find($request->id);
        self::$data->career_title = $request->career_title??null;
        self::$data->field = $request->field??null;
        self::$data->career_details = $request->career_details??null;
        self::$data->career_home = $request->career_home??null;
        self::$data->status = $request->status??null;
        self::$data->save();
    }

}
