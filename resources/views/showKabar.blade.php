@extends('layouts.tempKabar')
@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row">
      
<div class="col-lg-8 ftco-animate py-md-5 mt-md-5">
@foreach($kabar as $kab)
        <p>
          <img src="{{$kab->img}}" alt="" class="img-fluid">
        </p>
        <p>{{$kab->created_at->format('d, M Y')}}</p>
        <h2 class="mb-3">{{$kab->judul}}</h2>
        <p>{!! $kab->kabar !!}</p>
@endforeach
</div>
</div>
</div>
</section>
@endsection
        