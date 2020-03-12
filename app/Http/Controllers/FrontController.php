<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        return view('front/index');
    }
    public function news(){
        $news_data=DB::table('news')->orderBy('sort', 'desc')->get();
        return view('front/news',compact('news_data'));
    }

}
