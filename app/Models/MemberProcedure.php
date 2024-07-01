<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberProcedure extends Model
{
    use HasFactory;

    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_memberProcedure($request)
    {
        self::$data = new MemberProcedure();
        self::$data->banner_title = $request->banner_title??null;
        self::$data->banner_description = $request->banner_description??null;
        self::$data->registered_description = $request->registered_description??null;
        self::$data->orientated_description = $request->orientated_description??null;
        self::$data->banner_image = self::saveBannerImage($request);
        self::$data->registered_image = self::saveRegistratedImage($request);
        self::$data->orientated_image = self::saveOrientatedImage($request);
        self::$data->save();
    }
    public static function update_memberProcedure($request)
    {
        self::$data = MemberProcedure::find($request->id);
        self::$data->banner_title = $request->banner_title??null;
        self::$data->banner_description = $request->banner_description??null;
        self::$data->registered_description = $request->registered_description??null;
        self::$data->orientated_description = $request->orientated_description??null;
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
        if($request->file('registered_image')){
            if(self::$data->registered_image){
                if(file_exists(self::$data->registered_image)){
                    unlink(self::$data->registered_image);
                    self::$data->registered_image = self::saveRegistratedImage($request);
                }
            }
            else{
                self::$data->registered_image = self::saveRegistratedImage($request);
            }
        }
        if($request->file('orientated_image')){
            if(self::$data->orientated_image){
                if(file_exists(self::$data->orientated_image)){
                    unlink(self::$data->orientated_image);
                    self::$data->orientated_image = self::saveOrientatedImage($request);
                }
            }
            else{
                self::$data->orientated_image = self::saveOrientatedImage($request);
            }
        }
        self::$data->save();
    }
    private static function saveBannerImage($request){
        self::$image = $request->file('banner_image');
        self::$imageName = 'memberprocedure_banner_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'memberprocedure/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveRegistratedImage($request){
        self::$image = $request->file('registered_image');
        self::$imageName = 'memberprocedure_registered_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'memberprocedure/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveOrientatedImage($request){
        self::$image = $request->file('orientated_image');
        self::$imageName = 'memberprocedure_orientated_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'memberprocedure/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
