<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoImage extends Model
{
    use HasFactory;
    
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_videoimage($request)
    {
        self::$data = new VideoImage();
        self::$data->title_one = $request->title_one??null;
        self::$data->title_two = $request->title_two??null;
        self::$data->title_three = $request->title_three??null;
        self::$data->subtitle_one = $request->subtitle_one??null;
        self::$data->subtitle_two = $request->subtitle_two??null;
        self::$data->video_link = $request->video_link??null;
        self::$data->image = self::saveMainImage($request);
        self::$data->save();
    }
    public static function update_videoimage($request)
    {
        self::$data = VideoImage::find($request->id);
        self::$data->title_one = $request->title_one??null;
        self::$data->title_two = $request->title_two??null;
        self::$data->title_three = $request->title_three??null;
        self::$data->subtitle_one = $request->subtitle_one??null;
        self::$data->subtitle_two = $request->subtitle_two??null;
        self::$data->video_link = $request->video_link??null;
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
        self::$imageName = 'videoimage_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'videoimage/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
