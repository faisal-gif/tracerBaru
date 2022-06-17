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
                  <h4 class="card-title">Kabar Jurusan</h4>
                  <form class="form-sample" method="POST" action="/inpKabar" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" name="idUser" value="{{ Auth::user()->id }}"/>
                    <p class="card-description">
                    Kabar Jurusan
                    </p>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                          <img id="blah" src="https://www.freeiconspng.com/uploads/profile-icon-9.png" alt="your image"  width="780" height="200"/>
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
                          </div>
                        </div>
                      </div>
                 
                  </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Judul</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="judul"/>
                          </div>
                        </div>
                      </div>                
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="tag">
                              <option>Lowongan Pekerjaan</option>
                              <option>Lowongan Magang</option>
                              <option>Seminar</option>
                            </select>
                          </div>
                        </div>
                      </div>                
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Isi</label>
                          <div class="col-sm-9">
                          <textarea class="form-control" id="summernote" name="isi"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                      <button type="submit" class="btn btn-primary mb-2">Save</button>
                  </form>
                </div>
              </div>
            </div>
@section('script')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>   
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
        };
$('#summernote').summernote({
        height: 500
    });
</script>

@endsection
@endsection