@extends('layouts.testi')
@section('content')
@foreach($kabar as $kab)
        <div class="col-lg-4 ftco-animate">
          <div class="blog-entry">
            <a href="/showKabar/{{$kab->id}}" class="block-20" style="background-image: url({{asset($kab->img)}});">
            </a>
            <div class="text d-block">
              <div class="meta">
                <p>
                  <a href="#"><span class="fa fa-calendar mr-2"></span>{{$kab->created_at->format('d, M Y')}}</a>
                  <a href="/showProfile/{{$kab->idUser}}"><span class="fa fa-user mr-2"></span>{{$kab->nama}}</a>
                 
                </p>
              </div>
              <h3 class="heading"><a href="/showKabar/{{$kab->id}}">{{ Str::limit($kab->judul, 30),$end='......' }}</a></h3>
              <p> {!! Str::limit($kab->kabar, 20),$end='...' !!}</p>
              <p><a href="/showKabar/{{$kab->id}}" class="btn btn-secondary py-2 px-3">Read more</a></p>
            </div>
          </div>
        </div>
      @endforeach
@endsection