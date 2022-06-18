@extends('layouts.lay')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome!</h3>
                  <h5>Tracer Study JTI Politeknik Negeri Malang</h5>
                  <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <!-- <div class="col-md-6 grid-margin stretch-card">
                  <div class="card position-relative">
                    <div class="card-body" >
                        <h4 class="card-title">Pie chart</h4>
                         <canvas id="pieChart"></canvas>
                    </div>
                  </div>
              </div>      -->
            <div class="col-md-6 grid-margin transparent">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Jumlah Alumni</p>
                      <p class="fs-30 mb-2">{{ $b }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Pengisi Kuisoner</p>
                      <p class="fs-30 mb-2">{{$j}}</p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
       

          
</div>
@endsection