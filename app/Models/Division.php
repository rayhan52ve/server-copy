<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_division($request)
    {
        self::$data = new Division();
        self::$data->state_id = $request->state_id??null;
        self::$data->division_name = $request->division_name??null;
        self::$data->division_details = $request->division_details??null;
        self::$data->division_details2 = $request->division_details2??null;
        self::$data->division_details3 = $request->division_details3??null;
        self::$data->division_home = $request->division_home??null;
        self::$data->division_image = self::saveMainImage($request);
        self::$data->division_image2 = self::saveMainImage2($request);
        self::$data->division_image3 = self::saveMainImage3($request);
        self::$data->save();
    }
    public static function update_division($request)
    {
        self::$data = Division::find($request->id);
        self::$data->state_id = $request->state_id??null;
        self::$data->division_name = $request->division_name??null;
        self::$data->division_details = $request->division_details??null;
        self::$data->division_details2 = $request->division_details2??null;
        self::$data->division_details3 = $request->division_details3??null;
        self::$data->division_home = $request->division_home??null;
        self::$data->status = $request->status??null;
        if($request->file('division_image')){
            if(self::$data->division_image){
                if(file_exists(self::$data->division_image)){
                    unlink(self::$data->division_image);
                    self::$data->division_image = self::saveMainImage($request);
                }
            }
            else{
                self::$data->division_image = self::saveMainImage($request);
            }
        }
        if($request->file('division_image2')){
            if(self::$data->division_image2){
                if(file_exists(self::$data->division_image2)){
                    unlink(self::$data->division_image2);
                    self::$data->division_image2 = self::saveMainImage2($request);
                }
            }
            else{
                self::$data->division_image2 = self::saveMainImage2($request);
            }
        }
        if($request->file('division_image3')){
            if(self::$data->division_image3){
                if(file_exists(self::$data->division_image3)){
                    unlink(self::$data->division_image3);
                    self::$data->division_image3 = self::saveMainImage3($request);
                }
            }
            else{
                self::$data->division_image3 = self::saveMainImage3($request);
            }
        }
        self::$data->save();
    }

    private static function saveMainImage($request){
        self::$image = $request->file('division_image');
        self::$imageName = 'divisions_division_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'divisions/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveMainImage2($request){
        self::$image = $request->file('division_image2');
        self::$imageName = 'divisions_division_image2-'.rand().'.'. self::$image->Extension();
        self::$directory = 'divisions/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveMainImage3($request){
        self::$image = $request->file('division_image3');
        self::$imageName = 'divisions_division_image3-'.rand().'.'. self::$image->Extension();
        self::$directory = 'divisions/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
