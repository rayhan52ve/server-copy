<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WebsiteLinks extends Model
{

    use HasFactory;
    public static $data;
    public static function saveWebsiteLinks($request)
    {
        if ($request->id) {
            self::$data = WebsiteLinks::find($request->id);

            // Only update fields if they exist in the request
            if ($request->has('email')) {
                self::$data->email = $request->email;
            }
            if ($request->has('facebook')) {
                self::$data->facebook = $request->facebook;
            }
            if ($request->has('instagram')) {
                self::$data->instagram = $request->instagram;
            }
            if ($request->has('linkedIn')) {
                self::$data->linkedIn = $request->linkedIn;
            }
            if ($request->has('twitter')) {
                self::$data->twitter = $request->twitter;
            }
            if ($request->has('youtube')) {
                self::$data->youtube = $request->youtube;
            }
            if ($request->has('number')) {
                self::$data->number = $request->number;
            }
            if ($request->has('address')) {
                self::$data->address = $request->address;
            }
            if ($request->has('map_link')) {
                self::$data->map_link = $request->map_link;
            }
            if ($request->has('bkash')) {
                self::$data->bkash = $request->bkash;
            }
            if ($request->has('nagad')) {
                self::$data->nagad = $request->nagad;
            }
            if ($request->has('bkash_type')) {
                self::$data->bkash_type = $request->bkash_type;
            }
            if ($request->has('nagad_type')) {
                self::$data->nagad_type = $request->nagad_type;
            }
            if ($request->has('whatsapp_group_link')) {
                self::$data->whatsapp_group_link = $request->whatsapp_group_link;
            }
            self::$data->save();
        } else {
            self::$data = new WebsiteLinks();
            self::$data->email = $request->email;
            self::$data->facebook = $request->facebook;
            self::$data->instagram = $request->instagram;
            self::$data->linkedIn = $request->linkedIn;
            self::$data->twitter = $request->twitter;
            self::$data->youtube = $request->youtube;
            self::$data->number = $request->number;
            self::$data->address = $request->address;
            self::$data->map_link = $request->map_link;
            self::$data->bkash = $request->bkash;
            self::$data->nagad = $request->nagad;
            self::$data->bkash_type = $request->bkash_type;
            self::$data->nagad_type = $request->nagad_type;
            self::$data->whatsapp_group_link = $request->whatsapp_group_link;
            self::$data->save();
        }
    }
    //save  end




}
