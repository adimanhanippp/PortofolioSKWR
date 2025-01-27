<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Permission;
use App\Anggota;
use DB;
use Datatables;
use Entrust;

/**
 *
 */
class AnggotaCtrl extends Controller
{

  function index()
  {
    $data = Anggota::all();
    // return view('anggota.coba',['anggotas'=>$anggotas]);
    return view('anggota.anggota',['data'=>$data]);
  }

  // public function data(){
  //   $data = Anggota::all();
  //   // dd($anggota);
  //   return Datatables::of($data)
  //   ->addColumn('No', function($data){
  //     return NULL;
  //   })
  //   ->addColumn('action', function($data) {
  //     $html = Entrust::can('anggota_index') ? '<a href="'. url('anggota/profil/'.$data->nip) .'" class="btn btn-default" data-toggle="tooltip" title="Lihat Profil">Lihat</span></a>' : '';
  //     return $html;
  //   })
  //   ->make(TRUE);
  //   // masukin model untuk anggota dari hanip
  // }
  //
  public function lihatprofil($nip){
      $anggotas = Anggota::where('nip','=',$nip)->get();
      return view('anggota.lihatprofil',['anggotas'=>$anggotas]);
    }

}

 ?>
