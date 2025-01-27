@extends('app')

@section('plugins_css')
<link rel="stylesheet" href="{{ asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h2>Post</h2>
            </div>
            <div class="blog-post">
                  <div class="container">
                    <!-- <div class="row"> -->
                    <div class="col-md-8 post-header-line">
                    @foreach($news_models->all() as $news)
                    <div class="row">
                        <div class="col-md-12">
                          <h3>  <a style="color:black; font-family:verdana;" href="{{url('news/read/'.$news->Id)}}"> {{$news->Title}}</a></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                          <h6> <span class="glyphicon glyphicon-time"></span>{{$news->created_at}}</h6>
                        </div>
                    </div>
                    <div class="image">
                      <!-- <img class="image-lg" src="{{ asset('assets/image/news/'.$news->news_image) }}" alt="Post Image" class="post-image"> -->
                          <img src="{{ asset($news->Gambar) }}" width="200" height="200" class="img-responsive" >
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                          <p style="text-align:justify"> {{$news->Description}}</p>
                        </div>
                    </div>
                      <p>
                        <a class="pull-right" href="{{ url('news/read/'.$news->Id) }}"> Read More...</a>
                      </p>
                      <!-- <br> -->
                      <br>
                      <hr>
                    @endforeach
                    </div>
                  <div class="col-md-6 pull-right">
                    {!! $news_models->render()!!}
                  </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
