@extends('layouts.lay')
@section('content')

<div class="col-7 grid-margin">
                  <div class="card mb-3">                            
  <div class="card-body">
    <h4 class="card-title">Menu</h4>
    <a href="/exportJawaban/{{$idForm}}" class="btn btn-info btn-sm"> Excel</a>
    <input type="button" id="bt" class="btn btn-info btn-sm" onclick="printJS('printJS-form', 'html')" value="PDF" />
    @if(Gate::check('jurusan') || Gate::check('prodi'))
    <a href="/showJawaban/{{$idForm}}" class="btn btn-info btn-sm">All Jawaban</a>
    @endif
  </div>
</div>
</div>

<div class="col-7 grid-margin">
                  <div class="card mb-3">                            
  <div class="card-body">
    <h4 class="card-title">Search</h4>
    <input id="myInput" type="text" class="form-control" placeholder="Search..">
  </div>
</div>
</div>
<div id="printJS-form">
@foreach($pertanyaan as $p)

<div class="col-7 grid-margin myDIV">

                  <div class="card mb-3">                            
  <div class="card-body">
 
  <h4 class="card-title">{{$p->label}}</h4>    
    <canvas id="doughnutChart{{$p->name}}" ></canvas>

  </div>
</div>
</div>

@endforeach
@foreach($pertanyaan2 as $p)
<div class="col-7 grid-margin myDIV">
                  <div class="card mb-3">                            
  <div class="card-body">
  <h4 class="card-title">{{$p->label}}</h4>
 @foreach($jawaban as $j)

  @if(isset($j->text[$p->name]))
  

  <p class="card-text">{{$j->text[$p->name]}}</p>
  @endif
  
@endforeach
  </div>
</div>
</div>
@endforeach
@foreach($pertanyaan3 as $p)
<div class="col-7 grid-margin myDIV">
                  <div class="card mb-3">                            
  <div class="card-body">
  <h4 class="card-title">{{$p->label}}</h4>
 @foreach($jawaban as $j)

  @if(isset($j->file[$p->name]))
  
  <p class="card-text">
    <a href="{{asset($j->file[$p->name])}}">{{$j->file[$p->name]}}</a>
</p>
  
  @endif
  
@endforeach
</div>
</div>
</div>
@endforeach
</div>
@section('script')
@foreach($pertanyaan as $p)
<?php
$data = $dt[$p->name];
?>
<script>
  var cb= Object.values(<?php print_r(json_encode($data)) ?>)
  var ad= Object.keys(<?php print_r(json_encode($data)) ?>)
  console.log(cb);
  var data = @json($data);
  var doughnutPieData = {
    datasets: [{
      data:cb,
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: ad
  };
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
  if ($("#doughnutChart{{$p->name}}").length) {
    var doughnutChartCanvas = $("#doughnutChart{{$p->name}}").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }
</script>
@endforeach

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    
    $('.myDIV').removeClass('d-none')
    if(value){
      $('.myDIV').addClass('d-none')
      $.each($('.myDIV'), function(i,v){
        if($(v).text().toLowerCase().indexOf(value) > -1){
          $(v).removeClass('d-none')
        }
      
      })
      // $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    }
   
  });
//   $('#myInput').on("keyup", function () {
//     var filter = $(this).val(); // get the value of the input, which we filter on
//     $('#myDIV').find(".card-title:not(:contains(" + filter + "))").parent().css('display','none');
// });
});
</script>

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

<!--the script-->

@endsection

@endsection
