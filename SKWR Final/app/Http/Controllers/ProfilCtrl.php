<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Anggota;
use Hash;
use App\mailuser;
use Auth;

class ProfilCtrl extends Controller
{
    public function index(){
      return view('profil.profil');
    }

    public function edit(Request $req){
      $user = User::where('id', $req->id_acc)->first();
      $angg = Anggota::where('nip', $req->username)->first();
      // dd($angg);
      try {
        if ($req->nama) {
          if ($user->name != $req->nama) {
            $user->name = $req->nama;
            if ($angg) {
              $angg->namalengkap = $req->nama;
            }
          }
        }
        if ($req->email) {
          if ($user->email != $req->email) {
            $user->email = $req->email;
            if ($angg) {
              $angg->email = $req->email;
            }
          }
        }
        if ($req->password) {
          if (!Hash::check($req->password, $user->password)) {
            $user->password = Hash::make($req->password);
            if ($angg) {
              $angg->password = $user->password;
              }
            }
        }
        if ($req->hp) {
          if ($angg) {
            $angg->nomorhp = $req->hp;
          }
        }
        if($req->alamat){
          if ($angg) {
            $angg->alamat = $req->alamat;
          }
        }
        // dd($angg);
        $angg->save();
        $user->save();
        $mail = new mailuser();
        $mail->subject = 'Perubahan Akun';
        $mail->isi = 'Perubahan pada email anda telah berhasil dilakukan';
        $mail->email = Auth::user()->email;
        $mail->flag = FALSE;
        $mail->save();
        // dd($mail);

        return redirect('profil')->with('success', 'User Updated');
      } catch (\Exception $e) {
        return back()->with('error', 'Error while saving data! '. $e->getMessage())->withInput();

      }

      // echo "string";
      // dd(Hash::check($req->password, $user->password));
    }

    public function cek($id){
      $lul = Anggota::where('nip', $id)->first();
      // dd($id);
      return $lul;
    }
}
