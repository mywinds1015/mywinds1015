<?php

namespace App\Http\Controllers;

use App\News;

use App\News_img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_news = News::all();
        // dd(News::all());
        return view('admin/news/index',compact('all_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('admin/news/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $requestData = $request ->all(); //all出來的是陣列


        // 單一筆圖片上傳
        if($request->hasFile('img')){//是否有這張圖

            $file = $request -> file('img'); //$request是物件,我們要找物件的img

            $path = $this ->fileUpload($file,'news');//到外面this找到檔案存進news的資料庫裡

            $requestData['img'] = $path;
        }

            $news = News::create($requestData);

        // 多張圖片上傳
        // foreach($requestData['imges'] as $item){
        //     if($request->hasFile('imges')){
        //         $file = $item;
        //         $path = $this ->fileUpload($file,'news');
        //         $manyimg = new News_img;
        //         $manyimg->img = $path;
        //         $manyimg->news_id = $news->id;
        //         $manyimg->save();
        //     }
        // }


        return redirect('/home/news');


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$news = News::where('id','=',$id)->first();

        $news = News::find($id);



        return view('admin/news/edit',compact('news'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $news = News::find($id);
        // $news ->img = $request->img;
        // $news ->title = $request->title;
        // $news ->content = $request->content;

        // $news->save();
        $require_data = $request->all();
        $item = News::find($id);
        // News::find($id)->update($request->all());

        //if有上傳新的照片
        if($request->hasFile('img')) {
            //刪除舊有圖片

            $old_image = $item->img;
            File::delete(public_path().$old_image);

            //上傳新的圖片
            $file = $request->file('img');
            $path = $this->fileUpload($file,'news');
            $request_data['img'] = $path;

        }
        $item->update($request_data);
        return redirect('/home/news');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        News::find($id)->delete();

        return redirect('/home/news');
    }


    private function fileUpload($file,$dir){
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if( ! is_dir('upload/')){
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if ( ! is_dir('upload/'.$dir)) {
            mkdir('upload/'.$dir);
        }
        //取得檔案的副檔名
        $extension = $file->getClientOriginalExtension();
        //檔案名稱會被重新命名
        $filename = strval(time().md5(rand(100, 200))).'.'.$extension;
        //移動到指定路徑
        move_uploaded_file($file, public_path().'/upload/'.$dir.'/'.$filename);
        //回傳 資料庫儲存用的路徑格式
        return '/upload/'.$dir.'/'.$filename;
    }
}
