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
                  <form id="form-sample" class="form-sample" method="POST" action="/prosesEdit" enctype="multipart/form-data">
                 
                    @csrf
                    
                    
                    @foreach($pertanyaan as $p)
                    <div class="row" id="row-pertanyaan_{{$p->_id}}">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" value="{{$p->name}}"/>
                            <input type="hidden" name="id" value="{{$p->_id}}"/>
                            <input type="hidden" name="idForm" value="{{$p->idForm}}"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Type</label>
                          <div class="col-sm-9">
                          <select name="type" id="type_{{ $p->_id }}" onchange="myFunction('{{$p->_id}}')">
                            <option value="text">text</option>
                            <option value="textarea">textarea</option>
                            <option value="file" >file</option>
                            <option value="select">select</option>
                            <option value="choice">pilihan</option>
                            
                        </select>
                          </div>
                        </div>
                    <div id="dynamicTable" data-index> 
                  
              

</div> 
                      </div>
                    
                    </div>
                    @endforeach
                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                   
                    </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  // eksekusi / load awal
  $(function (){
    var pertanyaanarray = @json($pertanyaan);
    pertanyaanarray.forEach((item, inddex) => {
      $(`#type_${item._id}`).val(item.type).trigger('change');
      $('#dynamicTable').html('');
      Object.values(item.choices).forEach((item, index) => {
        if(index == 0){
          $("#dynamicTable").append(`<div class="form-group row" id="isi"> <div class="col-sm-9"> <input type="text" class="form-control" name="isi[]" placeholder="Enter your Price" value="${item}" /> </div><button type="button" name="add" id="add" class="btn btn-success">Add More</button></div>`);
        }else{
          $("#dynamicTable").append(`<div class="form-group row" id="isi">  <div class="col-sm-9"> <input type="text" class="form-control" name="isi[]" placeholder="Enter your Price" value="${item}" /></div> <button type="button" class="btn btn-danger remove-tr">Remove</button> </div> `);
        }
      })
    })

    $("#add").click(function(){
      $("#dynamicTable").append('<div class="form-group row isi" id="isi">  <div class="col-sm-9"> <input type="text" class="form-control" name="isi[]" placeholder="Enter your Price" class="form-control" /></div> <button type="button" class="btn btn-danger remove-tr">Remove</button> </div> ');
      removeTr();
    });
    removeTr();

  })

  function removeTr(){
    $('.remove-tr').click(function(){
      $(this).parents('#isi').remove();
      // console.log($())
    });
  }

  function myFunction(id = '') {
    $("#isi").remove();
    var x = $(`#type_${id}`).val();
    if(x == "select"){
      $("#isi").remove();
      $("#dynamicTable").append('<div class="form-group row" id="isi"> <div class="col-sm-9"> <input type="text" class="form-control" name="isi[]" placeholder="Enter your Price" class="form-control" /> </div><button type="button" name="add" id="add" class="btn btn-success">Add More</button></div>');
    }
    else{
      $("#isi").remove();
    }
}
</script>
@endsection