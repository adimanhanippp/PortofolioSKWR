<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Permission;
use App\Sharing;
use Validator;
use Auth;
use DB;
use Entrust;
use Datatables;
use Response;
use Illuminate\Support\Collection;



/**
 *
 */
class SharingCtrl extends Controller
{

  function index()
  {
    return view('sharing.show');
  }

  public function ldata(){
    $data = Sharing::all();
    $dt = Sharing::first();
    if ($dt) {
      return Datatables::of($data)
      ->addColumn('No', function($data) {
          return NULL;
      })
      ->addColumn('Search', function($data) {
          $html = Entrust::can('sharing_download') ? '<a href="'. url('sharing/download/'.$data->id) .'" class="text-primary row-edit" data-toggle="tooltip" title="Download"><span class="glyphicon glyphicon-download-alt"></span></a>' : '';
          return $html;
      })
      ->addColumn('action', function($data) {
          $html = Entrust::can('sharing_update') ? '<a href="'. url('sharing/create/'.$data->Id) .'" class="text-primary row-edit" data-toggle="tooltip" title="Update File"><span class="glyphicon glyphicon-wrench"></span></a>' : '';
          $html .= Entrust::can('sharing_delete') ? '&nbsp;&nbsp;<a href="javascript:" data-url="'. url('sharing/delete/'.$data->id) .'" class="text-danger row-delete" data-toggle="tooltip" title="Delete File"><span class="glyphicon glyphicon-trash"></span></a>' : '';
          return $html;
      })
      ->make(TRUE);
     }
     else {
      $data = '{"draw": 0, "recordsTotal": 0, "recordsFiltered": 0, "data":[]}';
      return $data;
    }
  }

  public function download($id){
    $data = Sharing::where('id', '=', $id)->first();
    $file = public_path()."/".$data->file;
    return Response::download($file);
    // dd($file);
  }

  public function create($id = false){
    $params = [];
    if($id!==FALSE) {
        $sharing = Sharing::where('Id', '=', $id)->first();
        $params['data'] = $sharing;
    }
    // dd($params);
    // return view('news.create', $params);
    return view('sharing.sharing',$params);
  }

  public function destroy($id){
    $dt = Sharing::where('id','=',$id)->first();
    $dt->delete();
    return redirect('sharing')->with('success', 'Data Deleted');
  }

  public function save(Request $req){
    try {
      $validator = Validator::make($req->all(),[
      'judul' => 'required',
      'deskripsi' => 'required',
      'file' => 'required',
      ]);
      if ($validator->fails()) {
        return back()->with('error', 'Error while saving data! ')->withInput()->with($validator);
      }else {
        try {
          $extension = $req->file('file')->getClientOriginalExtension();
          $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
          $dir = 'assets/image/news/';
          // save file
          $req->file('file')->move($dir, $filename);

          $sharing = new Sharing;
          $sharing->judul = $req->judul;
          $sharing->deskripsi = $req->judul;
          $sharing->file = $dir.$filename;
          $sharing->id_upload = Auth::user()->id;

          $sharing->save();
          return redirect('sharing')->with('success', 'Data Saved');
        } catch (\Exception $e) {
          return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();
        }
      }
    } catch (\Exception $e) {
      return back()->with('error', 'Error while saving data!');
    }
  }
}

 ?>
