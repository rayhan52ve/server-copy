<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public static $data;

    public static function save_company($request)
    {
        self::$data = new Company();
        self::$data->company_name = $request->company_name??null;

        self::$data->save();
    }
    public static function update_company($request)
    {
        self::$data = Company::find($request->id);
        self::$data->company_name = $request->company_name??null;
        self::$data->is_active = $request->filled('is_active')??null;

        self::$data->save();
    }
}
