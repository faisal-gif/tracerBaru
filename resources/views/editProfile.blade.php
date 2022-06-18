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
@if($errors->any())
<div class="alert alert-danger">
  <strong>Error</strong> {{$errors->first()}}
</div>
@endif
                  <h4 class="card-title">Biodata Alumni</h4>
                  
                   
                    <p class="card-description">
                    Account
                    </p>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <div class="col-sm-9">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#accModal">
                    Edit Account
                    </button>
                    </div>
                    </div>
                    </div>
                    
                      
                      </div>
                      <form class="form-sample" method="POST" action="/updateAlum" enctype="multipart/form-data">
                    <p class="card-description">
                    @csrf
                    Data Diri
                    </p>
                    @foreach($bio as $b)
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                          <img id="blah" src="{{asset($b->foto)}}" alt="your image"  width="150" height="150"/>
                          </div>
                        </div>
                      </div>
                      
                      </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Foto</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" name="foto" onchange="readURL(this);"/>
                            <input type="hidden" name="x" value="{{$b->foto }}" /></td>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NIM</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nim" value="{{$b->nim}}" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">No HP</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="noHp" value="{{$b->noHp}}" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" value="{{$b->nama}}" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kota Lahir</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="kotaLahir" value="{{$b->kotaLahir}}" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="jk">
                              <option>{{$b->jk}}</option>
                              <option>Laki-laki</option>
                              <option>Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="tanggalLahir" value="{{$b->tanggalLahir}}"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Prodi</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="prodi">
                              <option>{{$b->prodi}}</option>
                              <option>Manajemen Informatika</option>
                              <option>Teknik Informatika</option>

                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tahun Lulus</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="tahunLulus">
                              <option>{{$b->tahunLulus}}</option>
                              <option>2012</option>
                              <option>2011</option>

                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description">
                    Domisili
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamat" value="{{$b->alamat}}"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kode Pos</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="kodePos" value="{{$b->kodePos}}"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Provinsi</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="provinsi">
                              <option>{{$b->provinsi}}</option>
                              <option>Jawa Timur</option>
                              <option>Jawa Barat</option>
                              <option> DKI Jakarta</option>
                              <option>Kalimantan Selatan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kota / Kabupaten</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="kota">
                              <option>{{$b->kota}}</option>
                              <option>Malang</option>
                              <option>Madiun</option>
                              <option>Surabaya</option>
                              <option>Blitar</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description">
                    Pekerajaan
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pekerjaan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="pekerjaan" value="{{$b->pekerjaan}}" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Pekerajaan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="jp" value="{{$b->jp}}" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="namaPerusahaan" value="{{$b->namaPerusahaan}}" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamatPerusahaan" value="{{$b->alamatPerusahaan}}" />
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary mb-2">Save</button>
                    <a href="/home" class="btn btn-danger mb-2">close</a>
                  </form>
                </div>
              </div>
            </div>

                   <!-- Modal -->
                   <form class="form-sample" method="POST" action="/accEdit" enctype="multipart/form-data">
                   <div class="modal fade bd-example-modal-lg" id="accModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        
                      
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                       <div class="col-sm-9">
                       <input type="text" class="form-control" name="userName" value="{{ Auth::user()->username }}">
                       <input type="hidden" class="form-control" name="id" value="{{ Auth::user()->id }}">
                          </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password Lama</label>
                       <div class="col-sm-9">
                       <input type="password" class="form-control" name="oldPassword" >
                          </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password Baru</label>
                       <div class="col-sm-9">
                       <input type="password" class="form-control" name="newPassword" >
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

            @section('script')
<script>
       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection
@endsection