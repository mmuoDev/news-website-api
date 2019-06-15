<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;


class Article extends Model
{
    use SoftDeletes;
    //

    public $table = 'articles';

    protected $fillable = ['headline', 'body', 'category_id', 'created_by'];

    //create article
    public static function addArticle($data){
        try{
            self::create($data);
            return true;
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return false;
        }

    }
}
