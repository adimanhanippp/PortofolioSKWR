@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            @foreach($anggotas->all() as $anggota)
            <div class="box-header with-border">
                <h4>Profil {{$anggota->namalengkap}}</h4>
            </div>
            <div class="container">

              <div class="">
                NIP  : {{$anggota->nip}}
              </div>
              <br>
              <div class="">
                Nama : {{$anggota->namalengkap}}
              </div>
              <br>
              <div class="">
                Email : {{$anggota->email}}
              </div>
              <br>
              <div class="">
                Nomor Handphone : {{$anggota->nomorhp}}
              </div>
              <br>
              <div class="">
                Alamat : {{$anggota->alamat}}
              </div>
              <br>
              <div class="">
                Jabatan : {{$anggota->jabatan}}
              </div>
              <br>
              <div class="">
                Unit kerja : {{$anggota->unitkerja}}
              </div>
              <br>
              @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
