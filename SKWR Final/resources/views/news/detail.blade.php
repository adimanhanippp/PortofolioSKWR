@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
              <div class="container">
                <div class="col-md-8 post-header-line">
                  @foreach($news_models->all() as $news)
                  <div class="row">
                      <div class="col-md-12">
                        <h3>{{$news->Title}}</h3>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 post-header-line">
                        <h6>{{$news->created_at}}</h6>
                      </div>
                  </div>
                  <div class="image">
                    <!-- <img class="image-lg" src="{{ asset('assets/image/news/'.$news->news_image) }}" alt="Post Image" class="post-image"> -->
                        <img  src="{{ asset($news->Gambar) }}" width="400" height="400" style="position: relative;" class="img-responsive" >

                  </div>
                  <br>
                  <div class="row" >
                  <article class="article" text-align="justify">
                    <p align="justify" style="white-space: pre-line" >{{$news->Isi}}</p>
                  </article>
                    <!-- <div class="text" text-align="justify"> -->
                      <!-- <p>{{$news->news_isi}}</p> -->
                    <!-- </div> -->
                </div>
                  <ul class="pager">
                    <li class="previous"> <a href="{{url('news/view')}}">&larr; Back to post </a> </li>
                  </ul>

                  @endforeach
                </div>
                <div class="col-sm-3">
                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:transparent">
                      <h4> Latest Post</h4>
                      @foreach($newss as $news)
                      <li hrefclass="list-group-item"> <a href="{{url('post/read/'.$news->news_id)}}">{{$news->Title}}</a>
                      </li>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
