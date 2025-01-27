@extends('app')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
          <h4> Pengurus</h4>
      </div>
          <div class="box-body">
            <!-- <table border="0" cellpadding="1" cellspacing="1" style="height:1266px; width:700px"> -->
            <style>
                  td{
                    padding: 10px;
                    vertical-align: top;
                    text-align: justify;
                  }
                  th{
                    padding: 10px;
                    text-align: center;
                  }
            </style>
            <table align="center" border="1" cellpadding="1" cellspacing="1" width="800px">
              <thead>
            		<tr>
                  <th>Foto</th>
                  <!-- <th>Nama</th>
                  <th>Jabatan</th> -->
                  <th>Profil</th>
                  <th>Tanggal Pengangkatan</th>

            		</tr>
            	</thead>
              <tbody>
              @foreach($pengurus->all() as $urus)
              <tr>
                <td height="225px" width="175px" align="center">
                  <img src="{{asset($urus->gambar)}}" height="200px" width="150px" class="img-responsive">
                </td>
                <td align="justify" style="white-space: pre-line"> {{$urus->nama}}
                  {{$urus->jabatan}} <br>
                  {{$urus->profil}} </td>
                <td >{{$urus->tgldiangkat}}</td>
             </tr>
              @endforeach
            </tbody>
            </table>
          </div>
    </div>
  </div>
</div>

@endsection
