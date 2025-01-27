<!DOCTYPE html>
<style media="screen">
  body{
    background-image: url("login-3.jpg");
    background-size: cover;
    background-repeat: repeat;
    background-attachment: fixed;
  }
</style>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registration | SKWR</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ asset('themes/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/plugins/Ionicons/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/css/skins/skin-black-light.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('themes/plugins/toastr/toastr.min.css') }}">
        <style>
        .skin-black-light > .wrapper > .main-header {
            border-top: 6px solid #3c8dbc;
        }
        </style>
    </head>
    <!-- <body class="hold-transition login-page"> -->
    <body class="body">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>Registration</b></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Please Registration</p>
                <form action="{{url('register/doregister')}}" id="form-input" class="form-horizontal">
                    {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-sm-12">
                          <!-- <span class="text-danger">*</span>NIP akan digunakan sebagai username -->
                            <input type="text" class="form-control input-sm required" id="nip" name="nip" placeholder="NIP" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" class="form-control input-sm required" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control input-sm required" id="namalengkap" name="namalengkap" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" class="form-control input-sm required" id="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control input-sm required" id="nomorhp" name="nomorhp" placeholder="Nomor Handphone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control input-sm required" id="alamat" name="alamat" placeholder="Alamat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control input-sm required" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control input-sm required" id="unitkerja" name="unitkerja" placeholder="Unit Kerja" required>
                        </div>
                    </div>
                    <div class="text">
                      <label class="checkbox-inline required" for="item_1">
                        <input name="" id="item_1" value="1" type="checkbox" required> Mengajukan permohonan untuk didaftar sebagai
                        anggota SEKAR WIKA REALTY dan menaati syarat dan ketentuan sebagai berikut:
                        <li>Bersedia menaat AD/ART Organisasi.</li>
                        <li>Bersedia membayar biaya pendaftaran anggota sebesar RP 100.000,- dan iuran bulanan Rp 5000,- per bulan.</li>
                      </label>
                    </div>
                  </div>
                <div class="box-footer">
                  <ul class="pager">
                    <li class="previous"> <a href="{{url('/')}}">&larr; Back to Login </a> </li>
                    <!-- <button type="submit" class="btn btn-secondary pull-left" id="btn"> Back to Login</button> -->
                    <button type="submit" class="btn btn-primary pull-right" id="btn-submit">Register</button>
                  </ul>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript" src="{{ asset('themes/plugins/jquery/dist/jquery.min.js') }}"></script>x
<script type="text/javascript" src="{{ asset('themes/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('themes/plugins/toastr/toastr.min.js') }}"></script>

<script type="text/javascript">
@if(session('success'))
  toastr.success('{{ session('success') }}');
@endif
@if(session('error'))
  toastr.error('{{ session('error') }}');
@endif
</script>
