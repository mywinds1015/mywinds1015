<?php

namespace App\Http\Controllers;

use App\contactUs;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index(){
        return view('front/index');
    }
    public function news(){
        $news_data=DB::table('news')->orderBy('sort', 'desc')->get();
        return view('front/news',compact('news_data'));
    }

    public function contactUs(){
        return view('admin/contact/contactUs');
    }

    public function contactUs_store(Request $request){
        $user_data = $request->all();
        $content = contactUs::create($user_data);
        Mail::to('mywinds-b2d1c9@inbox.mailtrap.io')->send(new OrderShipped($content));
        return redirect('/contactUs');
    }

}
