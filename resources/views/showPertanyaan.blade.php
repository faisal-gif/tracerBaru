@extends('layouts.lay')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Pertanyaan</h4>
                  
                  <a class="btn btn-primary btn-sm" href="/formPertanyaan/{{$jenisForm}}/{{$idForm}}"> Tambah </a>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#copyModal">Copy Pertanyaan</button>
                  <div class="table-responsive pt-3">
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              
                <th>Nama pertanyaan</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
               
                
            </tr>
        </thead>
        
        <tbody>
        @foreach($pertanyaan as $p)
                        <tr>
                        <td>
                        {{ Str::limit( $p->label, 50),$end='......' }}
                          </td>
                          <td>
                          {{$p->type}}
                          </td>
                          <td>
                          @if($p->status === 'setuju')
                          <a class="btn btn-success btn-sm" href="#">
                           Yes
                          </a>
                          @elseif($p->status === 'tolak')
                          <a class="btn btn-danger btn-sm" href="#">
                           No
                          </a>
                          @else
                          <a class="btn btn-secondary btn-sm" href="#">
                           Waiting
                          </a>
                          @endif
                          </td>
                          <td>
                          @if(Gate::check('admin') || Gate::check('superAdmin'))
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#persetujuanModal{{$p->id}}">
                          <i class="fa fa-paper-plane"></i>
                          </button> |
                          @endif
                          <a class="btn btn-primary btn-sm" href="/editPertanyaan/{{$p->id}}">
                           <i class="ti-pencil"></i>
                          </a> | 
                          <a class="btn btn-danger btn-sm" href="/deletePertanyaan/{{$p->id}}">
                           <i class="ti-trash"></i>
                          </a>
                          </td>
                          
                        </tr>
                        @endforeach
                        </tbody>
                       
                    </table>
                </div>
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

@foreach($pertanyaan as $p)
<form class="form-sample" method="POST" action="/persetujuanPertanyaan/{{$p->id}}" enctype="multipart/form-data">
    <div class="modal fade bd-example-modal-lg" id="persetujuanModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Persetujuan Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                       <div class="col-sm-9">
                       <select name="status" id="status">
                         <option value="setuju">setuju</option>
                         <option value="tolak">tolak</option>
                         <option value="tunggu" >tunggu</option>
                        </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Note</label>
                          <div class="col-sm-9">
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="13" name="note"></textarea>
                          </div>
                        </div>

                      </div>
                    
                    </div>
              </div>
      <div class="modal-footer">
        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
</form>
@endforeach
            @endsection