@extends('layouts.lay')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Alumni Terdaftar</h4>
                  <a class="btn btn-primary btn-sm" href="/formBiodata"> Tambah </a>
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#importModal">Import Excel</button>
                  
            
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Tahun Lulus</th>
                <th>Detail</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($alum as $a)
                        <tr>
                        <td>
                        {{$a->nim}}
                          </td>
                          <td>
                          {{$a->nama}}
                          </td>
                          <td>
                          {{$a->prodi}}
                          </td>
                          <td>
                          {{$a->tahunLulus}}
                          </td>
                          <td>
                          <button type="button" class="nav-link btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$a->nim}}">
                          Detail
                        </button>
                        
                          </td>
                          <td>
                          <a class="btn btn-success btn-sm" href="/editAlum/{{$a->nim}}">
                           <i class="ti-pencil"></i>
                          </a>
                          |
                          <a class="btn btn-danger btn-sm" href="/deleteAlum/{{$a->nim}}">
                           <i class="ti-trash"></i>
                          </a>
                          </td>
                          
                          
                        </tr>
                        @endforeach
                        </tbody>
                        
                      
          
        
    </table>
    @foreach($alum as $b)
    <div class="modal fade bd-example-modal-lg" id="exampleModal{{$b->nim}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$b->nama}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label><h6> Foto </h6></label>
        <br>
      <img id="blah" src="{{$b->foto}}" alt="your image"  width="250" />

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

              <br>

      <table>
        <thead>
          <th>Domisili</th>
      </thead>
      <tr>
        <td>
          Provinsi : {{$b->provinsi}}
            <br>
          Kota : {{$b->kota}}
            <br>
          Alamat : {{$b->alamat}}
            <br>
          Kode Pos : {{$b->kodePos}}
        </td>
      </tr>
      </table>

            <br>
                        
      <table>
        <thead>
        <th>Pekerjaan</th>
      </thead>
      <tr>
        <td>
          Nama Pekerajaan : {{$b->pekerjaan}}
            <br>
          Jenis Pekerajaan : {{$b->jp}}
            <br>
          Nama Perusahaan : {{$b->namaPerusahaan}}
            <br>
          Alamat Perusahaan : {{$b->alamatPerusahaan}}
        </td>
      </tr>
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
@endforeach
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
                 <form class="form-sample" method="POST" action="/importBio" enctype="multipart/form-data">
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
                         <a href="{{asset('templateExcel/ALL BIODATA.xlsx')}}">Template Alumni</a>
                      
                          </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Import Biodata</label>
                       <div class="col-sm-9">
                         <input type="file" name="importBiodata" id="" class="form-control">
                      
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