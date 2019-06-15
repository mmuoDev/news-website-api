<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function add(Request $request){
        $method = $request->isMethod('post');
        if($method){
            //add
            //validate
            $validator = Validator::make($request->all(), [
                'headline' => 'required|unique:articles',
                'body' => 'required',
                'category_id' => 'required'
            ]);
            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
            //create data
            $data = [
                'headline' => $request->headline,
                'body' => $request->body,
                'category_id' => $request->category_id,
                'created_by' => Auth::user()->id
            ];
            $create = Article::addArticle($data); //add record
            if($create){
                $request->session()->flash('status', 'Article added');
            }else{
                $request->session()->flash('status', 'Unable to add article');
            }
            return back();
        }else{
            //show form
            return view('news.add');
        }
    }

    public function delete(Request $request){
        $method = $request->isMethod('post');
        $user_id = Auth::user()->id;

        if($method){
            //delete
            $article_id = $request->article_id;
            Article::find($article_id)->delete();
            $request->session()->flash('status', 'News deleted');
            return back();
        }else{
            //use raw sql queries to hasten the select process
            $articles = DB::select("select a.headline, a.id as article_id, a.body, c.name as category, u.name as created_by, a.created_at as created from articles as a, 
            categories as c, users as u
            where a.category_id = c.id and a.created_by = u.id and a.deleted_at IS NULL and a.created_by = '$user_id'");
            return view('news.remove', compact('articles'));
        }
    }


}
