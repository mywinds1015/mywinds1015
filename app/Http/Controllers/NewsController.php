<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $all_news = News::all();
        return view('admin/news/index',compact('all_news'));
    }

    public function create(){
        return view('admin/news/create');
    }

    public function store(Request $request){
        $news_data = $request->all();
        News::create($news_data);
        return redirect('/home/news');
    }
}
