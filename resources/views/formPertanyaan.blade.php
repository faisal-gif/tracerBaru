@extends('layouts.lay')
@section('content')
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                @if (\Session::has('success'))
<div class="alert alert-success">
    <strong>Data Tersimpan</strong> {!! \Session::get('success') !!}
  </div>
@endif
                  <h4 class="card-title">Form Pertanyaan</h4>
                  <form class="form-sample" method="POST" action="/prosesBuat" enctype="multipart/form-data">
                 
                    @csrf
                   
                    <input type="hidden" name="idForm" value="{{$idForm}}">
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Type</label>
                          <div class="col-sm-9">
                          <select name="type" id="type" onchange="myFunction()">
                            <option value="text">text</option>
                            <option value="textarea">textarea</option>
                            <option value="file" >file</option>
                            <option value="select" id="coba">select</option>
                            <option value="choice" id="coba">pilihan</option>
                            
                        </select>
                          </div>
                        </div>
                    <div id="dynamicTable">  

</div> 
                      </div>
                    
                    </div>
                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                   
                    </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function myFunction() {
      $("#isi").remove();
  var x = document.getElementById("type").value;
  if (x == "choice" ) {
    
    $("#dynamicTable").append('<div class="form-group row" id="isi"> <div class="col-sm-9"> <input type="text" class="form-control" name="isi[0]" placeholder="Enter your Price" class="form-control" /> </div><button type="button" name="add" id="add" class="btn btn-success">Add More</button></div>');
    var i = 0;
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<div class="form-group row" id="isi">  <div class="col-sm-9"> <input type="text" class="form-control" name="isi['+i+']" placeholder="Enter your Price" class="form-control" /></div> <button type="button" class="btn btn-danger remove-tr">Remove</button> </div> ');

    });
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('#isi').remove();

    });  
  
}
else if(x == "select"){
  $("#isi").remove();
  $("#dynamicTable").append('<div class="form-group row" id="isi"> <div class="col-sm-9"> <input type="text" class="form-control" name="isi[0]" placeholder="Enter your Price" class="form-control" /> </div><button type="button" name="add" id="add" class="btn btn-success">Add More</button></div>');
    var i = 0;
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<div class="form-group row" id="isi">  <div class="col-sm-9"> <input type="text" class="form-control" name="isi['+i+']" placeholder="Enter your Price" class="form-control" /></div> <button type="button" class="btn btn-danger remove-tr">Remove</button> </div> ');

    });
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('#isi').remove();

    });
}
else{
    $("#isi").remove();
  
}
}
</script>
@endsection