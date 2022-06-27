@extends('layouts.tempKabar')
@section('content')

      

<section class="ftco-section bg-light">
@foreach($bio as $b)
 <div class="container">
  <div class="row">
   <div class="col-md-4 ftco-animate d-flex align-items-center align-items-stretch">
    <div class="staff-2 w-100">
     <div class="img-wrap d-flex align-items-stretch">
      <div class="img align-self-stretch d-flex align-items-end" style="background-image: url({{$b->foto}});">
       <div class="text mb-4 text-md-center">
        <h3>{{$b->nama}}</h3>
        
    </div>

  </div>
</div>
</div>
</div>

<div class="col-md-8 d-flex align-items-center">
  <div class="staff-detail w-100 pl-md-5">
    
   <h3>Nama</h3>
   <p>{{$b->nama}}</p>   
   <h3>Pekerjaan</h3>
   <p>{{$b->pekerjaan}}</p>
   
   <hr>
   <div class="row">
    <div class="col-md-6">
        <h5>User Id</h5>
    </div>
    <div class="col-md-6">
        <p>{{$b->nim}}</p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-6">
        <h5>Nama</h5>
    </div>
    <div class="col-md-6">
        <p>{{$b->nama}}</p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-6">
        <h5>Email</h5>
    </div>
    <div class="col-md-6">
        <p>{{$b->email}}</p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-6">
        <h5>No HP</h5>
    </div>
    <div class="col-md-6">
        <p>{{$b->noHp}}</p>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-6">
        <h5>Pekerjaan</h5>
    </div>
    <div class="col-md-6">
        <p>{{$b->pekerjaan}}</p>
    </div>
  </div>
 </div>
</div>

</div>
</div>
@endforeach

</section>

@endsection
        