<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    public static $data;

    public static function save_faq($request)
    {
        self::$data = new Faq();
        self::$data->faq_question = $request->faq_question??null;
        self::$data->faq_answer = $request->faq_answer??null;
        self::$data->save();
    }
    public static function update_faq($request)
    {
        self::$data = Faq::find($request->id);
        self::$data->faq_question = $request->faq_question??null;
        self::$data->faq_answer = $request->faq_answer??null;
        self::$data->faq_home = $request->faq_home??null;
        self::$data->status = $request->status??null;
        self::$data->save();
    }
}
