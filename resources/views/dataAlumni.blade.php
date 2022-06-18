@extends('layouts.lay')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Alumni</h4>
                  <a class="btn btn-primary btn-sm" href="/formDataAlumni"> Tambah </a>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#importModal">Import Excel</button>
                  
                  
            
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Angkatan</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dataAlum as $da)
                        <tr>
                        <td>
                        {{$da->nim}}
                          </td>
                          <td>
                          {{$da->nama}}
                          </td>
                          <td>
                          {{$da->prodi}}
                          </td>
                          <td>
                          {{$da->tahunLulus}}
                          </td>
                          <td>
                          {{$da->jk}}
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
              <!-- Modal -->
              <div class="modal fade bd-example-modal-lg" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Biodata Alumni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                 <form class="form-sample" method="POST" action="/importAlumni" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group row">
                       <div class="col-sm-9">
                        Isi Dengan Format Template dibawah
                        
                          </div>
                        </div>

                        <div class="form-group row">
                       <div class="col-sm-9">
                         <a href="{{asset('templateExcel/DATA ALUMNI.xlsx')}}">Template Data Alumni</a>
                      
                          </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Import Biodata</label>
                       <div class="col-sm-9">
                         <input type="file" name="importAlumni" id="" class="form-control">
                      
                          </div>
                        </div>
                      </div>
                    
                    </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="save" id="save" class="btn btn-primary" value="Import" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
</form>
            @endsection