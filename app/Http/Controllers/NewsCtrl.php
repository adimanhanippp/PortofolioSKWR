<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Menu;
use App\News;
use App\Permission;
use DB;
use Entrust;
use Datatables;
use Validator;
use Input;

/**
 *
 */
class NewsCtrl extends Controller
{

  public function index()
  {
    return view('news.new');
  }

  public function ldata(){
    $data = News::all();
    $dt = News::first();
    if ($dt) {
      return Datatables::of($data)
      ->addColumn('No', function($data) {
          return NULL;
      })
      ->addColumn('action', function($data) {
          $html = Entrust::can('user_update') ? '<a href="'. url('news/create/'.$data->Id) .'" class="text-primary row-edit" data-toggle="tooltip" title="Edit News"><span class="glyphicon glyphicon-wrench"></span></a>' : '';
          $html .= Entrust::can('user_delete') ? '&nbsp;&nbsp;<a href="javascript:" data-url="'. url('news/delete/'.$data->Id) .'" class="text-danger row-delete" data-toggle="tooltip" title="Delete News"><span class="glyphicon glyphicon-trash"></span></a>' : '';
          return $html;
      })
      ->make(TRUE);
    }
    else {
     $data = '{"draw": 0, "recordsTotal": 0, "recordsFiltered": 0, "data":[]}';
     return $data;
   }
  }

  public function create($id = FALSE){
    // dd($id!==FALSE);
    $params = [];
    if($id!==FALSE) {
        $news = News::where('Id', '=', $id)->first();
        $params['data'] = $news;
    }
    // dd($params);
    return view('news.create', $params);
  }

  public function destroy($Id)
  {
    $dt = News::where('Id', '=', $Id);
    $dt->delete();
    return redirect('news')->with('success', 'Data Deleted');
  }

  public function detail($id){
    $news_models = News::where('Id','=',$id)->get();
    $newss = News::latest()->take(5)->get();
    return view('ews.detail',['news_models' => $news_models],['newss' => $newss]);
  }

  public function userv(){
    $news_models = News::orderBy('created_at','DESC')->paginate(3);
    return view('news.userv')->with('news_models',$news_models);
}

  public function getNews(){
    return (News::all());
  }

  public function updating(Request $req){
    return DB::transaction(function() use($req) {
        try {
            $news = News::where('Id', '=', $req->id)->first();
            // $news = new News();
            $news = [
              'Id'=>$req->id,
              'Title'=>$req->title,
              'Author'=>$req->author,
              'Description'=>$req->description,
              'Isi'=>$req->isi,
              'Gambar'=>$req->image
            ];
            $update = News::where('Id', '=', $req->id)->update($news);
            return '1';
        } catch(\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
        }
    });
  }

  public function save(Request $req){
    try {
      // dd($req);
      $validator = Validator::make($req->all(),[
        'title' => 'required',
        'author' => 'required',
        'description' => 'required',
        'isi' => 'required',
        'image' => 'required|image',
      ]);

      if ($validator->fails()) {
        return back()->with('error', 'Error while saving data! ')->withInput()->with($validator);
      }
      else {
        try {
          $extension = $req->file('image')->getClientOriginalExtension();
          $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
          $dir = 'assets/image/news/';
          // save image
          $req->file('image')->move($dir, $filename);

          if ($req->id) {
            $news = News::where('Id', $req->id)->first();
            $news = [
              'Id'=>$req->id,
              'Title'=>$req->title,
              'Author'=>$req->author,
              'Description'=>$req->description,
              'Isi'=>$req->isi,
              'Gambar'=>$dir.$filename
            ];
            $update = News::where('Id', '=', $req->id)->update($news);
            // dd($news);
          }
          else {
            $news = new News();
            $news->Title = $req->title;
            $news->Author = $req->author;
            $news->Description = $req->description;
            $news->Isi = $req->isi;
            $news->Gambar = $dir.$filename;
            $news->save();
          }

          return redirect('news')->with('success', 'Data Saved');

        } catch (\Exception $e) {
          return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
        }
      }
    } catch (\Exception $e) {
      return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
    }
  }

}

 ?>
