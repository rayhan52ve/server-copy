<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    public static $data;

    public static function save_affiliate($request)
    {
        self::$data = new Affiliate();
        self::$data->first_name = $request->first_name??null;
        self::$data->last_name = $request->last_name??null;
        self::$data->email = $request->email??null;
        self::$data->phone = $request->phone??null;
        self::$data->agent_type = $request->agent_type??null;
        self::$data->hear_about = $request->hear_about??null;
        self::$data->affiliate_home = $request->affiliate_home??null;

        self::$data->save();
    }
    public static function update_affiliate($request)
    {
        self::$data = Affiliate::find($request->id);
        self::$data->first_name = $request->first_name??null;
        self::$data->last_name = $request->last_name??null;
        self::$data->email = $request->email??null;
        self::$data->phone = $request->phone??null;
        self::$data->agent_type = $request->agent_type??null;
        self::$data->hear_about = $request->hear_about??null;
        self::$data->affiliate_home = $request->affiliate_home??null;
        self::$data->is_active = $request->filled('is_active')??null;

        self::$data->save();
    }
}
