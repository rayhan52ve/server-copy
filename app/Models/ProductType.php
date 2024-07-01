<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    public static $data;

    public static function save_product($request)
    {
        self::$data = new ProductType();
        self::$data->product_name = $request->product_name??null;

        self::$data->save();
    }
    public static function update_product($request)
    {
        self::$data = ProductType::find($request->id);
        self::$data->product_name = $request->product_name??null;
        self::$data->is_active = $request->filled('is_active')??null;

        self::$data->save();
    }
}
