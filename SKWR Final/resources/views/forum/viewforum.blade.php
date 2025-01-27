@extends('app')
@section('content')

@section('plugins_css')
<link rel="stylesheet" href="{{ asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Forum</h4>
            </div>
            <div class="box-body">
              <div class="col-xs-12">

                <div class="col-xs-2">
                  <b>{{ $entahlah->name }}</b>
                </div>
                <div class="col-xs-10">
                  <div class="">
                    <b>{{ $entahlah->judul }}</b>
                  </div>
                  <div class="">
                    <!-- posted at harusnya ditaruh sini -->
                  </div>
                  <div class="">
                    {{ $entahlah->isi }} <hr>
                  </div>

                  <div class="">
                    <b>Comment</b> <br>
                    @foreach ($comment as $comment)
                    <div class="col-xs-9">
                      <div class="col-xs-2">
                        <b>{{ $comment->username }}</b>
                      </div>
                      <div class="col-xs-7">
                        {{ $comment->isi }} <br>
                        {{ $comment->created_at}}
                        <hr>
                      </div>
                    </div>
                    @endforeach
                    <!-- komentar masuk sini -->
                  </div>
                  <div class="col-lg-12">
                    <b>Your Comment</b> <br>
                    <form class="" action="{{ url('forum/addcomm') }}" method="post">
                      {{ csrf_field() }}
                      <textarea name="comment" rows="8" cols="80"></textarea>
                      <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="id_forum" value="{{ $entahlah->id}}">
                      <div class="box-footer">
                          <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('plugins_js')
<script type="text/javascript" src="{{ asset('themes/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('themes/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endsection

@section('contentjs')
<script type="text/javascript">
$(function() {
  var ant = {{ $entahlah->judul }};
  .('#entahlah').val = '';
</script>
@endsection
