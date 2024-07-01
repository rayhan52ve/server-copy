<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id', 'id');
    }
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_apply($request)
    {
        self::$data = new Apply();
        self::$data->career_id = $request->career_id??null;
        self::$data->name = $request->name??null;
        self::$data->email = $request->email??null;
        self::$data->phone = $request->phone??null;
        self::$data->address = $request->address??null;
        self::$data->date_available = $request->date_available??null;
        self::$data->expected_salary = $request->expected_salary??null;
        self::$data->portfolio_url = $request->portfolio_url??null;
        self::$data->linkedin_url = $request->linkedin_url??null;
        //for file upload
        self::$data->resume = self::saveMainImage($request);
        self::$data->save();
    }
    public static function update_apply($request)
    {
        self::$data = Apply::find($request->id);
        self::$data->career_id = $request->career_id??null;
        self::$data->name = $request->name??null;
        self::$data->email = $request->email??null;
        self::$data->phone = $request->phone??null;
        self::$data->address = $request->address??null;
        self::$data->date_available = $request->date_available??null;
        self::$data->expected_salary = $request->expected_salary??null;
        self::$data->portfolio_url = $request->portfolio_url??null;
        self::$data->linkedin_url = $request->linkedin_url??null;
        self::$data->apply_home = $request->apply_home??null;
        self::$data->status = $request->status??null;
        if($request->file('resume')){
            if(self::$data->resume){
                if(file_exists(self::$data->resume)){
                    unlink(self::$data->resume);
                    self::$data->resume = self::saveMainImage($request);
                }
            }
            else{
                self::$data->resume = self::saveMainImage($request);
            }
        }
        self::$data->save();
    }

    private static function saveMainImage($request){
        self::$image = $request->file('resume');
        self::$imageName = 'apply_main_resume-'.rand().'.'. self::$image->Extension();
        self::$directory = 'apply/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
