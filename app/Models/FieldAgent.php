<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldAgent extends Model
{
    use HasFactory;

    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_fieldagent($request)
    {
        self::$data = new FieldAgent();
        self::$data->first_name = $request->first_name??null;
        self::$data->last_name = $request->last_name??null;
        self::$data->company_name = $request->company_name??null;
        self::$data->email = $request->email??null;
        self::$data->phone = $request->phone??null;
        self::$data->street_address = $request->street_address??null;
        self::$data->city = $request->city??null;
        self::$data->state = $request->state??null;
        self::$data->postal_code = $request->postal_code??null;
        self::$data->task_region = $request->task_region??null;
        self::$data->is_uber = $request->filled('is_uber')??null;
        self::$data->is_lyft = $request->filled('is_lyft')??null;
        self::$data->is_ubereats = $request->filled('is_ubereats')??null;
        self::$data->is_doordash = $request->filled('is_doordash')??null;
        self::$data->is_handy = $request->filled('is_handy')??null;
        self::$data->is_instacart = $request->filled('is_instacart')??null;
        self::$data->is_other = $request->filled('is_other')??null;
        self::$data->is_null = $request->filled('is_null')??null;

        //for file upload
        self::$data->image = self::saveMainImage($request);
        self::$data->save();
    }
    public static function update_fieldagent($request)
    {
        self::$data = FieldAgent::find($request->id);
        self::$data->first_name = $request->first_name??null;
        self::$data->last_name = $request->last_name??null;
        self::$data->company_name = $request->company_name??null;
        self::$data->email = $request->email??null;
        self::$data->phone = $request->phone??null;
        self::$data->street_address = $request->street_address??null;
        self::$data->city = $request->city??null;
        self::$data->state = $request->state??null;
        self::$data->postal_code = $request->postal_code??null;
        self::$data->task_region = $request->task_region??null;
        self::$data->is_uber = $request->filled('is_uber')??null;
        self::$data->is_lyft = $request->filled('is_lyft')??null;
        self::$data->is_ubereats = $request->filled('is_ubereats')??null;
        self::$data->is_doordash = $request->filled('is_doordash')??null;
        self::$data->is_handy = $request->filled('is_handy')??null;
        self::$data->is_instacart = $request->filled('is_instacart')??null;
        self::$data->is_other = $request->filled('is_other')??null;
        self::$data->is_null = $request->filled('is_null')??null;
        self::$data->fieldagent_home = $request->fieldagent_home??null;
        self::$data->is_active = $request->filled('is_active')??null;

        if($request->file('image')){
            if(self::$data->image){
                if(file_exists(self::$data->image)){
                    unlink(self::$data->image);
                    self::$data->image = self::saveMainImage($request);
                }
            }
            else{
                self::$data->image = self::saveMainImage($request);
            }
        }
        self::$data->save();
    }

    private static function saveMainImage($request){
        self::$image = $request->file('image');
        self::$imageName = 'fieldagent_main_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'fieldagent/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
