@extends('layouts.lay')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome Alumni!</h3>
                  <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
                  <h5>Tracer Study JTI Politeknik Negeri Malang</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                                 
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                 
                <div class="card-body">
                  <div id="detailedReports">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Profil Alumni</p>
                            @foreach($alum as $b) 
                            <!-- <a href="/showBiodata" class="btn btn-danger mb-2">close</a> -->
                              <!-- <h1 class="text-primary">400</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">Total Alumni JTI</h3> -->
                              <img id="blah" src="{{asset($b->foto)}}" alt="your image"  width="250" />
<table>
  <thead>
  <th>Data Diri</th>
</thead>
<tr>          
  <td>
      No Handphone : {{$b->noHp}}
        <br>
      Kota Lahir : {{$b->kotaLahir}}            
        <br>
      Tangal Lahir : {{$b->tanggalLahir}}            
        <br>
      Jenis Kelamin : {{$b->jk}}            
        <br>
      Email : {{$b->email}}            
  </td>
        <br>
</table>
                            
                            
                            </div>
                          
                            </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  @if($b->status == 'subscribe')
                <a class="btn btn-success btn-sm" href="/subscribe/{{auth()->user()->id}}">
                          Unsubscribe
                          </a>
                          @endif
                          @if($b->status == 'unsubscribe')
                <a class="btn btn-success btn-sm" href="/subscribe/{{auth()->user()->id}}">
                          Subscribe
                          </a>
                          @endif
                  
              </div>  
              </div>
            
              @endforeach
            </div>
          </div>

          
</div>
@endsection