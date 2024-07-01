<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruiterCompany extends Model
{
    use HasFactory;

    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_recruiter($request)
    {
        self::$data = new RecruiterCompany();
        self::$data->title = $request->title??null;
        
        self::$data->recruiter_photo = self::saveMainImage($request);
        self::$data->banner_image = self::saveBannerImage($request);
        
        self::$data->save();
    }
    public static function update_recruiter($request)
    {
        self::$data = RecruiterCompany::find($request->id);
        self::$data->title = $request->title??null;
        
        if($request->file('recruiter_photo')){
            if(self::$data->recruiter_photo){
                if(file_exists(self::$data->recruiter_photo)){
                    unlink(self::$data->recruiter_photo);
                    self::$data->recruiter_photo = self::saveMainImage($request);
                }
            }
            else{
                self::$data->recruiter_photo = self::saveMainImage($request);
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
        self::$image = $request->file('recruiter_photo');
        self::$imageName = 'recruiter_recruiter_photo-'.rand().'.'. self::$image->Extension();
        self::$directory = 'recruiter/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveBannerImage($request){
        self::$image = $request->file('banner_image');
        self::$imageName = 'recruiter_banner_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'recruiter/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
