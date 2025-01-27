<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use View;
use Auth;
use App\Menu;
use App\Permission;
use App\Forum;
use App\Fkategori;
use App\fkomen;
use Entrust;
use Datatables;
use DB;

/**
 *
 */
class ForumCtrl extends Controller
{

  function index()
  {
    $forums = Fkategori::orderBy('id', 'DESC')->get();

    return View('forum.forum')->with('item', $forums);
    // return view('forum.forum');
  }

  function create($id){
    $item = Fkategori::where('id', '=', $id)->get();
    $entar = compact('item', $item);
    return view('forum.create')->with('item', $item);
    // dd($item);
  }

  function saveinto(Request $request){
    // $forum = Forum::create($request->all());

    $forum = new Forum;
    $forum->subject = Input::get('subject');
    $forum->user_acc_id = Auth::user()->id;
    $forum ->save();

    return Redirect::back();
  }

  public function dat(){
    $data = Fkategori::orderBy('id', 'DESC')->get();
    $dt = Fkategori::first();
    if ($dt) {
      return Datatables::of($data)
      ->addColumn('No', function($data) {
          return NULL;
      })
      ->addColumn('action', function($data) {
          $html = Entrust::can('forum_update') ? '<a href="'. url('forum/createkategori/'.$data->id) .'" class="text-primary row-edit" data-toggle="tooltip" title="Edit kategori"><span class="glyphicon glyphicon-wrench"></span></a>' : '';
          $html .= Entrust::can('forum_delete') ? '&nbsp;&nbsp;<a href="javascript:" data-url="'. url('forum/deletekate/'.$data->id) .'" class="text-danger row-delete" data-toggle="tooltip" title="Delete Kategori"><span class="glyphicon glyphicon-trash"></span></a>' : '';
          $html .= Entrust::can('forum_create') ? '&nbsp;&nbsp;&nbsp;<a href="'. url('forum/kategori/'.$data->id) .'" class="text-primary row-add" data-toggle="tooltip" title="Lihat kategori"><span class="glyphicon glyphicon-plus"></span></a>' : '';
          return $html;
      })
      ->make(TRUE);
    }
    else {
     $data = '{"draw": 0, "recordsTotal": 0, "recordsFiltered": 0, "data":[]}';
     return $data;
   }
  }

  public function addpost($data){
    return view('forum.view')->with('item', $data);
  }

  public function dataforum($id){
    $data = Forum::where('id_kategori','=',$id)->orderBy('id', 'DESC')->get();
    $dt = Forum::where('id_kategori','=',$id)->first();
    if ($dt) {
      return Datatables::of($data)
      ->addColumn('No', function($data) {
          return NULL;
      })
      ->addColumn('action', function($data) {
          $html = Entrust::can('forumthread_update') ? '<a href="'. url('forum/createthread/'.$data->id) .'" class="text-primary row-edit" data-toggle="tooltip" title="Edit Thread"><span class="glyphicon glyphicon-wrench"></span></a>' : '';
          $html .= Entrust::can('forumthread_delete') ? '&nbsp;&nbsp;<a href="javascript:" data-url="'. url('forum/deletethread/'.$data->id) .'" class="text-danger row-delete" data-toggle="tooltip" title="Delete Thread"><span class="glyphicon glyphicon-trash"></span></a>' : '';
          $html .= Entrust::can('forumthread_create') ? '&nbsp;&nbsp;&nbsp;<a href="'. url('forum/view/'.$data->id) .'" class="text-primary row-add" data-toggle="tooltip" title="Lihat Thread"><span class="glyphicon glyphicon-plus"></span></a>' : '';
          return $html;
      })
      ->make(TRUE);
    }
    else {
     $data = '{"draw": 0, "recordsTotal": 0, "recordsFiltered": 0, "data":[]}';
     return $data;
   }
  }

  public function createkategori($id = FALSE){
    $params = [];
    if ($id!==FALSE) {
      $forum = Fkategori::where('id', '=', $id)->first();
      $params['data'] = $forum;
    }
    return view('forum.kategori', $params);
  }

  public function addkategori(Request $req){
    // disini ditambah edit(sudah ada, tetapi di edit)
    if ($req->id) {
      $kategori = Fkategori::where('id','=',$req->id)->first();
    } else {
      $kategori = new Fkategori();
    }
    $kategori->kategori = $req->kategori;
    $kategori->save();

    return redirect('forum')->with('success', 'Kategori Saved');
    // dd($kategori);
  }

  public function addisi(Request $req){
    $isi = Forum::where('id','=',$req->id)->first();
    if ($isi) {
      $isi->id = $req->id;
    }else {
      $isi = new Forum();
    }
    $isi->id_kategori = $req->id_kategori;
    $isi->judul = $req->judul;
    $isi->isi = $req->isi;
    $isi->user_acc_id = $req->id_acc;
    $isi->save();
    return redirect('forum/kategori/'.$req->id_kategori)->with('success', 'Data Saved');
    // dd($isi);
  }

  public function view($id){
    $entahlah = DB::table('forums AS f')
    ->join('users AS u', function($join){
      $join->on('u.id', '=', 'f.user_acc_id');
    })
    ->join('forum_kategori AS fk', function($join){
      $join->on('fk.id', '=', 'f.id_kategori');
    })
    ->select('f.judul', 'f.isi', 'u.name', 'fk.kategori', 'f.id')
    ->where('f.id', '=', $id)
    ->first();

    $comment = DB::table('fcomment AS fc')
    ->join('forums AS f', function($join){
      $join->on('fc.id_forum','=','f.id');
    })
    ->join('users AS u', function($join){
      $join->on('fc.id_user','=','u.id');
    })
    ->select('fc.isi', 'fc.created_at', 'u.username')
    ->where('f.id','=',$id)->orderBy('fc.id', 'DESC')
    ->get();

    // dd(compact('entahlah','comment'));
    return view('forum.viewforum')->with(compact('entahlah','comment'));
  }

  public function addcomm(Request $req){
    $komen = new fkomen();
    $komen->isi = $req->comment;
    $komen->id_user = $req->id_user;
    $komen->id_forum = $req->id_forum;
    $komen->save();
    // dd($komen);

    return redirect('forum/view/'.$req->id_forum)->with('success', 'Comment Saved');
  }

  public function deletekate($id){
    Fkategori::where('id','=',$id)->delete();
    return redirect('forum')->with('success', 'User Deleted!');
  }

  public function createthread($id = FALSE){
    $params = [];
    if ($id!==FALSE) {
      $forum = Forum::where('id','=',$id)->first();
      $kate = Fkategori::where('id','=', $forum->id_kategori)->first();
      $params['data'] = $forum;
      $params['kate'] = $kate;
    }
    return view('forum.create', $params);
    // dd($kate);
  }

  public function deletethread($id){
    Forum::where('id','=',$id)->delete();
    return Redirect::back()->with('success', 'User Deleted!');
  }

}

 ?>
