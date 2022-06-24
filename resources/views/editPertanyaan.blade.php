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
                          <label class="col-sm-3 col-form-label">Pertanyaan</label>
                          <div class="col-sm-9">
                            <textarea name="nama" class="form-control" cols="30" rows="10">{{$p->label}}</textarea>
                            <input type="hidden" name="id" value="{{$p->_id}}"/>
                            <input type="hidden" name="idForm" value="{{$p->idForm}}"/>
                            <input type="hidden" name="jenisForm" value="{{$jenisForm}}"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tipe</label>
                          <div class="col-sm-9">
                          <select name="type" id="type_{{ $p->_id }}" onchange="myFunction('{{$p->_id}}')">
                            <option value="text">text</option>
                            <option value="textarea">textarea</option>
                            <option value="file" >file</option>
                            <option value="date" >date</option>
                            <option value="select">dropdown</option>
                            <option value="choice">select</option>
                            
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
          $("#dynamicTable").append(`<div class="form-group row" id="isi"> <div class="col-sm-9"> <input type="text" class="form-control" name="isi[]" placeholder="Isi pilihan" value="${item}" /> </div><button type="button" name="add" id="add" class="btn btn-success">Add More</button></div>`);
        }else{
          $("#dynamicTable").append(`<div class="form-group row" id="isi">  <div class="col-sm-9"> <input type="text" class="form-control" name="isi[]" placeholder="Isi pilihan" value="${item}" /></div> <button type="button" class="btn btn-danger remove-tr">Remove</button> </div> `);
        }
      })
    })

    addTr();
    removeTr();

  })
  function addTr(){
    $("#add").click(function(){
      $("#dynamicTable").append('<div class="form-group row isi" id="isi">  <div class="col-sm-9"> <input type="text" class="form-control" name="isi[]" placeholder="Isi pilihan" class="form-control" /></div> <button type="button" class="btn btn-danger remove-tr">Remove</button> </div> ');
      removeTr();
    });
  }
  function removeTr(){
    $('.remove-tr').click(function(){
      $(this).parents('#isi').remove();
      // console.log($())
    });
  }

  function myFunction(id = '') {
    $("#isi").remove();
    var x = $(`#type_${id}`).val();
    if(x == "select" || "choice"){
      $("#isi").remove();
      $("#dynamicTable").append('<div class="form-group row" id="isi"> <div class="col-sm-9"> <input type="text" class="form-control" name="isi[]" placeholder="Isi pilihan" class="form-control" /> </div><button type="button" name="add" id="add" class="btn btn-success">Add More</button></div>');
    }
    else{
      $("#isi").remove();
    }
    addTr();
}
</script>
@endsection