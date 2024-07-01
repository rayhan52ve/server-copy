<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_ServiceProvider($request)
    {
        self::$data = new ServiceProvider();
        self::$data->company_name = $request->company_name??null;
        self::$data->first_name = $request->first_name??null;
        self::$data->last_name = $request->last_name??null;
        self::$data->phone = $request->phone??null;
        self::$data->email = $request->email??null;
        self::$data->street_address = $request->street_address??null;
        self::$data->city = $request->city??null;
        self::$data->state = $request->state??null;
        self::$data->base_region = $request->base_region??null;
        self::$data->radius_in_mile = $request->radius_in_mile??null;
        self::$data->is_airductcleaning = $request->filled('is_airductcleaning')??null;
        self::$data->is_appliance = $request->filled('is_appliance')??null;
        self::$data->is_carpetcleaner = $request->filled('is_carpetcleaner')??null;
        self::$data->is_cleaner = $request->filled('is_cleaner')??null;
        self::$data->is_commonareacleaning = $request->filled('is_commonareacleaning')??null;
        self::$data->is_damage = $request->filled('is_damage')??null;
        self::$data->is_electrician = $request->filled('is_electrician')??null;
        self::$data->is_exterminator = $request->filled('is_exterminator')??null;
        self::$data->is_fireplaceservices = $request->filled('is_fireplaceservices')??null;
        self::$data->is_flooring = $request->filled('is_flooring')??null;
        self::$data->is_fullturnover = $request->filled('is_fullturnover')??null;
        self::$data->is_garagedoor = $request->filled('is_garagedoor')??null;
        self::$data->is_gardener = $request->filled('is_gardener')??null;
        self::$data->is_generalcontractor = $request->filled('is_generalcontractor')??null;
        self::$data->is_glassandmirrors = $request->filled('is_glassandmirrors')??null;
        self::$data->is_handyman = $request->filled('is_handyman')??null;
        self::$data->is_homeinspector = $request->filled('is_homeinspector')??null;
        self::$data->is_hvac = $request->filled('is_hvac')??null;
        self::$data->is_lawncare = $request->filled('is_lawncare')??null;
        self::$data->is_leadinspection = $request->filled('is_leadinspection')??null;
        self::$data->is_lockchange = $request->filled('is_lockchange')??null;
        self::$data->is_locksmith = $request->filled('is_locksmith')??null;
        self::$data->is_moldremediation = $request->filled('is_moldremediation')??null;
        self::$data->is_noheat = $request->filled('is_noheat')??null;
        self::$data->is_painter = $request->filled('is_painter')??null;
        self::$data->is_plumber = $request->filled('is_plumber')??null;
        self::$data->is_plumberwater = $request->filled('is_plumberwater')??null;
        self::$data->is_poolcleaning = $request->filled('is_poolcleaning')??null;
        self::$data->is_poolmaintenance = $request->filled('is_poolmaintenance')??null;
        self::$data->is_poolrepair = $request->filled('is_poolrepair')??null;
        self::$data->is_repair = $request->filled('is_repair')??null;
        self::$data->is_roofer = $request->filled('is_roofer')??null;
        self::$data->is_secinspector = $request->filled('is_secinspector')??null;
        self::$data->is_sewagebackup = $request->filled('is_sewagebackup')??null;
        self::$data->is_sewagecleanup = $request->filled('is_sewagecleanup')??null;
        self::$data->is_snowremoval = $request->filled('is_snowremoval')??null;
        self::$data->is_tilecontractor = $request->filled('is_tilecontractor')??null;

        //for file upload
        self::$data->vendor_w9_image = self::saveMainImageOne($request);
        self::$data->vendor_col_image = self::saveMainImageTwo($request);
        self::$data->vendor_certification_image = self::saveMainImageThree($request);

        self::$data->save();
    }
    public static function update_ServiceProvider($request)
    {
        self::$data = ServiceProvider::find($request->id);
        self::$data->company_name = $request->company_name??null;
        self::$data->first_name = $request->first_name??null;
        self::$data->last_name = $request->last_name??null;
        self::$data->phone = $request->phone??null;
        self::$data->email = $request->email??null;
        self::$data->street_address = $request->street_address??null;
        self::$data->city = $request->city??null;
        self::$data->state = $request->state??null;
        self::$data->base_region = $request->base_region??null;
        self::$data->radius_in_mile = $request->radius_in_mile??null;
        self::$data->is_airductcleaning = $request->filled('is_airductcleaning')??null;
        self::$data->is_appliance = $request->filled('is_appliance')??null;
        self::$data->is_carpetcleaner = $request->filled('is_carpetcleaner')??null;
        self::$data->is_cleaner = $request->filled('is_cleaner')??null;
        self::$data->is_commonareacleaning = $request->filled('is_commonareacleaning')??null;
        self::$data->is_damage = $request->filled('is_damage')??null;
        self::$data->is_electrician = $request->filled('is_electrician')??null;
        self::$data->is_exterminator = $request->filled('is_exterminator')??null;
        self::$data->is_fireplaceservices = $request->filled('is_fireplaceservices')??null;
        self::$data->is_flooring = $request->filled('is_flooring')??null;
        self::$data->is_fullturnover = $request->filled('is_fullturnover')??null;
        self::$data->is_garagedoor = $request->filled('is_garagedoor')??null;
        self::$data->is_gardener = $request->filled('is_gardener')??null;
        self::$data->is_generalcontractor = $request->filled('is_generalcontractor')??null;
        self::$data->is_glassandmirrors = $request->filled('is_glassandmirrors')??null;
        self::$data->is_handyman = $request->filled('is_handyman')??null;
        self::$data->is_homeinspector = $request->filled('is_homeinspector')??null;
        self::$data->is_hvac = $request->filled('is_hvac')??null;
        self::$data->is_lawncare = $request->filled('is_lawncare')??null;
        self::$data->is_leadinspection = $request->filled('is_leadinspection')??null;
        self::$data->is_lockchange = $request->filled('is_lockchange')??null;
        self::$data->is_locksmith = $request->filled('is_locksmith')??null;
        self::$data->is_moldremediation = $request->filled('is_moldremediation')??null;
        self::$data->is_noheat = $request->filled('is_noheat')??null;
        self::$data->is_painter = $request->filled('is_painter')??null;
        self::$data->is_plumber = $request->filled('is_plumber')??null;
        self::$data->is_plumberwater = $request->filled('is_plumberwater')??null;
        self::$data->is_poolcleaning = $request->filled('is_poolcleaning')??null;
        self::$data->is_poolmaintenance = $request->filled('is_poolmaintenance')??null;
        self::$data->is_poolrepair = $request->filled('is_poolrepair')??null;
        self::$data->is_repair = $request->filled('is_repair')??null;
        self::$data->is_roofer = $request->filled('is_roofer')??null;
        self::$data->is_secinspector = $request->filled('is_secinspector')??null;
        self::$data->is_sewagebackup = $request->filled('is_sewagebackup')??null;
        self::$data->is_sewagecleanup = $request->filled('is_sewagecleanup')??null;
        self::$data->is_snowremoval = $request->filled('is_snowremoval')??null;
        self::$data->is_tilecontractor = $request->filled('is_tilecontractor')??null;
        self::$data->serviceproviders_home = $request->serviceproviders_home??null;
        self::$data->is_active = $request->filled('is_active')??null;

        if($request->file('vendor_w9_image')){
            if(self::$data->vendor_w9_image){
                if(file_exists(self::$data->vendor_w9_image)){
                    unlink(self::$data->vendor_w9_image);
                    self::$data->vendor_w9_image = self::saveMainImageOne($request);
                }
            }
            else{
                self::$data->vendor_w9_image = self::saveMainImageOne($request);
            }
        }

        if($request->file('vendor_col_image')){
            if(self::$data->vendor_col_image){
                if(file_exists(self::$data->vendor_col_image)){
                    unlink(self::$data->vendor_col_image);
                    self::$data->vendor_col_image = self::saveMainImageTwo($request);
                }
            }
            else{
                self::$data->vendor_col_image = self::saveMainImageTwo($request);
            }
        }

        if($request->file('vendor_certification_image')){
            if(self::$data->vendor_certification_image){
                if(file_exists(self::$data->vendor_certification_image)){
                    unlink(self::$data->vendor_certification_image);
                    self::$data->vendor_certification_image = self::saveMainImageThree($request);
                }
            }
            else{
                self::$data->vendor_certification_image = self::saveMainImageThree($request);
            }
        }
        self::$data->save();
    }

    private static function saveMainImageOne($request){
        self::$image = $request->file('vendor_w9_image');
        self::$imageName = 'serviceprovider_main_vendor_w9_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'serviceprovider/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }

    private static function saveMainImageTwo($request){
        self::$image = $request->file('vendor_col_image');
        self::$imageName = 'serviceprovider_main_vendor_col_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'serviceprovider/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }

    private static function saveMainImageThree($request){
        self::$image = $request->file('vendor_certification_image');
        self::$imageName = 'serviceprovider_main_vendor_certification_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'serviceprovider/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
}
