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
                  <form class="form-sample" method="POST" action="/prosesForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Form</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Form</label>
                          <div class="col-sm-9">
                          <select name="jenisForm" class="form-control">
                            <option value="alumni">Alumni</option>
                            <option value="perusahaan">Perusahaan</option>
                          </select>
                          </div>
                        </div>
                        
                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                    </form>
        </div>
    </div>
</div>
@endsection