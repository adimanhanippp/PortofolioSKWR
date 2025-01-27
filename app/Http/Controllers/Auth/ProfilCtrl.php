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
      try {
        if ($req->nama) {
          if ($user->name != $req->nama) {
            $user->name = $req->nama;
          }
        }
        if ($req->email) {
          if ($user->email != $req->email) {
            $user->email = $req->email;
          }
        }
        if ($req->password) {
          if (!Hash::check($req->password, $user->password)) {
            $user->password = Hash::make($req->password);
            }
        }
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
      return $lul;
    }
}
