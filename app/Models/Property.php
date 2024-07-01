<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_property($request)
    {
        self::$data = new Property();
        self::$data->property_title = $request->property_title??null;
        self::$data->location = $request->location??null;
        self::$data->room_number = $request->room_number??null;
        self::$data->land_area = $request->land_area??null;
        self::$data->build_year = $request->build_year??null;
        self::$data->price = $request->price??null;
        self::$data->property_home = $request->property_home??null;
        self::$data->image = self::saveMainImage($request);
        self::$data->banner_image = self::saveBannerImage($request);
        self::$data->save();
    }
    public static function update_property($request)
    {
        self::$data = Property::find($request->id);
        self::$data->property_title = $request->property_title??null;
        self::$data->location = $request->location??null;
        self::$data->room_number = $request->room_number??null;
        self::$data->land_area = $request->land_area??null;
        self::$data->build_year = $request->build_year??null;
        self::$data->price = $request->price??null;
        self::$data->property_home = $request->property_home??null;
        // self::$data->status = $request->status??null;
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
        if($request->file('banner_image')){
            if(self::$data->banner_image){
                if(file_exists(self::$data->banner_image)){
                    unlink(self::$data->banner_image);
                    self::$data->banner_image = self::saveBannerImage($request);
                }
            }
            else{
                self::$data->banner_image = self::saveBannerImage($request);
            }
        }
        self::$data->save();
    }

    private static function saveMainImage($request){
        self::$image = $request->file('image');
        self::$imageName = 'property_main_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'property/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveBannerImage($request){
        self::$image = $request->file('banner_image');
        self::$imageName = 'property_banner_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'property/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
