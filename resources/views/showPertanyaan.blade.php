@extends('layouts.lay')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Pertanyaan</h4>
                  
                  <a class="btn btn-primary btn-sm" href="/formPertanyaan/{{$idForm}}"> Tambah </a>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#copyModal">Copy Pertanyaan</button>
                           
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              
                <th>Nama pertanyaan</th>
                <th>Type</th>
                <th>Action</th>
               
                
            </tr>
        </thead>
        @foreach($pertanyaan as $p)
        <tbody>
       
                        <tr>
                        <td>
                        {{ Str::limit(p->label, 50),$end='......' }}
                          </td>
                          <td>
                          {{$p->type}}
                          </td>
                          <td>
                          <a class="btn btn-primary btn-sm" href="/editPertanyaan/{{$p->id}}">
                           <i class="ti-pencil"></i>
                          </a> | 
                          <a class="btn btn-danger btn-sm" href="/deletePertanyaan/{{$p->id}}">
                           <i class="ti-trash"></i>
                          </a>
                          </td>
                          
                        </tr>
                       
                        </tbody>
                        @endforeach
                    </table>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="copyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Copy Pertanyaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                 <form class="form-sample" method="POST" action="/copyPertanyaan/{{$idForm}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">List Form</label>
                       <div class="col-sm-9">
                       <select name="formCopy" id="status" class="form-control">
                       @foreach($listForm as $l)  
                       <option value="{{$l->id}}">{{$l->namaForm}}</option>
                         @endforeach
                        </select>
                          </div>
                        </div>
                      </div>
                    
                    </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="save" id="save" class="btn btn-primary" value="Copy" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
</form>
            @endsection