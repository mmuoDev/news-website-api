<?php

namespace App\Http\Controllers\API;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //
    //api to retrieve all articles
    public function index(){
        $articles = DB::select("select a.headline, a.id as article_id, a.body, c.name as category, u.name as created_by, a.created_at as createdAt from articles as a, 
            categories as c, users as u
            where a.category_id = c.id and a.created_by = u.id and a.deleted_at IS NULL");
        return response()->json(['data' => $articles], 200);
    }

    //api to retrieve only one article
    public function show($id){
        $count = Article::where('id', $id)->count();
        if($count > 0){
            //exists
            $article = DB::select("select a.headline, a.body, c.name as category, u.name as created_by, a.created_at as createdAt from articles as a, 
            categories as c, users as u
            where a.category_id = c.id and a.created_by = u.id and a.deleted_at IS NULL and a.id = '$id'");

            return response()->json(['data' => $article], 200);
        }else{
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }
    }
}
