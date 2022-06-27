@extends('layouts.lay')
@section('content')

@foreach($kabar as $k)
<div class="col-lg-6 grid-margin stretch-card">
                  <div class="card mb-3">
                  <a href="/showKabar/{{$k->id}}">
  <img class="card-img-top" src="{{$k->img}}" height="300" alt="Card image cap">
  </a>
  <div class="card-body">
    <h5 class="card-title"><a href="/editKabar/{{$k->id}}">{{$k->judul}}</a></h5>
    <p class="card-text">{!! Str::limit($k->kabar, 130),$end='...' !!}</p>
    <p class="card-text"><small class="text-muted">status : {{$k->status}}</small></p>
    <p class="card-text"><small class="text-muted">catatan : {{$k->note}}</small></p>
    <p class="card-text"><small class="text-muted">{{$k->created_at->format('d, M Y')}}</small></p>
    
    <a class="btn btn-danger btn-sm" href="/deleteKabar/{{$k->id}}">
      <i class="ti-trash"></i>
    </a>
  </div>
</div>
</div>

@endforeach

@endsection