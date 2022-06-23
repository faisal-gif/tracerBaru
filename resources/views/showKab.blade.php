@extends('layouts.lay')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Kabar Berita</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Tanggal Unggah
                          </th>
                          <th>
                            Judul
                          </th>
                          <th>
                            Detail
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      @foreach($kabar as $k)
                      <tbody>
                        <tr>
                          <td>
                          {{$k->created_at->format('d, M Y')}}
                          </td>
                          <td>
                          {{$k->judul}}
                          </td>
                          <td>
                          <a class="nav-link btn btn-primary btn-sm" href="/showKabar/{{$k->id}}" >
                            Detail
                          </td>
                          <td>
                            @if($k->status === 'setuju')
                          <a class="btn btn-success btn-sm" href="#">
                           Setuju
                          </a>
                          @elseif($k->status === 'tolak')
                          <a class="btn btn-danger btn-sm" href="#">
                           Tolak
                          </a>
                          @else
                          <a class="btn btn-secondary btn-sm" href="#">
                           Tunggu
                          </a>
                          @endif
                          </td>
                          <td>
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{$k->id}}">
                          <i class="fa fa-paper-plane"></i>
                          </button>
                          |
                          <a class="btn btn-danger btn-sm" href="/deleteKabar/{{$k->id}}">
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
            @foreach($kabar as $k)
    <div class="modal fade bd-example-modal-lg" id="exampleModal{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Persetujuan Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                 <form class="form-sample" method="POST" action="/persetujuanKabar/{{$k->id}}" enctype="multipart/form-data">
                 
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
                          <label class="col-sm-2 col-form-label">Catatan</label>
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