@extends('layouts.lay')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">

              <div class="card">
              
                <div class="card-body">
                @if($errors->any())
<div class="alert alert-danger">
  <strong>Data Tidak disimpan</strong> {{$errors->first()}}
</div>
@endif
@if (\Session::has('success'))
<div class="alert alert-success">
    <strong>Data Tersimpan</strong> {!! \Session::get('success') !!}
  </div>
@endif
                  <h4 class="card-title">Pengguna</h4>
                  <div class="table-responsive pt-3">
                  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#inputModal">
                  Tambah
                          </button>
                          
                          <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>
                          Id Pengguna
                          </th>
                          <th>
                            Nama Pengguna
                          </th>
                          <th>
                            username
                          </th>
                          <th>
                            Role
                          </th>
                          <th>
                            Aksi
                          </th>
                        </tr>
                      </thead>
                     
                      <tbody>
                      @foreach($user as $u)
                        <tr>
                          <td>
                          {{$u->id}}
                          </td>
                          <td>
                          {{$u->name}}
                          </td>
                          <td>
                          {{$u->email}}
                          </td>
                          <td>
                          {{$u->roles}}  
                          </td>
                          <td>
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{$u->id}}">
                           <i class="ti-pencil"></i>
                          </button> | 
                          <a class="btn btn-danger btn-sm" href="/deleteUser/{{$u->id}}">
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
              <div class="modal fade bd-example-modal-lg" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                 <form class="form-sample" method="POST" action="/registerUser" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                       <div class="col-sm-9">
                      <input type="text" class="form-control" name="name">
                        
                          </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                       <div class="col-sm-9">
                       <input type="text" class="form-control" name="userName" >
                          </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password</label>
                       <div class="col-sm-9">
                       <input type="password" class="form-control" name="password" >
                          </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Roles</label>
                       <div class="col-sm-9">
                       <select class="form-control" name="roles">
                              <option value="admin">admin</option>
                              <option value="jurusan">jurusan</option>
                              <option value="prodi">kurikulum</option>
                              <option value="akreditasi">akreditasi</option>
                            </select>
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
@foreach($user as $u)
 <!-- Modal -->
 <form class="form-sample" method="POST" action="/editUser" enctype="multipart/form-data">
 <div class="modal fade bd-example-modal-lg" id="editModal{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                      <input type="hidden" class="form-control" name="id" value="{{$u->id}}">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                       <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" value="{{$u->name}}">
                        
                          </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                       <div class="col-sm-9">
                       <input type="text" class="form-control" name="userName" value="{{$u->email}}">
                          </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password Baru</label>
                       <div class="col-sm-9">
                       <input type="password" class="form-control" name="password">
                          </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Roles</label>
                       <div class="col-sm-9">
                       <select class="form-control" name="roles">
                              <option value="admin" {{ $u->roles == 'admin' ? 'selected' : '' }}>admin</option>
                              <option value="jurusan" {{ $u->roles == 'jurusan' ? 'selected' : '' }}>jurusan</option>
                              <option value="prodi" {{ $u->roles == 'prodi' ? 'selected' : '' }}>kurikulum</option>
                              <option value="alumni" {{ $u->roles == 'alumni' ? 'selected' : '' }}>alumni</option>
                              <option value="akreditasi" {{ $u->roles == 'akreditasi' ? 'selected' : '' }}>akreditasi</option>
                          </select>
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