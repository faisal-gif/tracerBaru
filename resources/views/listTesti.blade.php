@extends('layouts.lay')
@section('content')
<h3 style="font-size: 30px;">List Kata Alumni</h3><br><br>
<style>
/* #selengkapnya {display: none;} */
</style>
<table class="table table-bordered table-hover table-responsive">
  <tr>
    <th style="width:50%;">Nama</th>
    <th style="width:50%;">Kata Alumni</th>
    <th colspan="3" style="text-align:center;">Aksi</th>
  </tr>
  <!-- @foreach($testimonis as $testim) 
  <tr>
  
    <td>{{optional($testim->biodata)->nama}}</td>

    <td><p>{{ Str::limit($testim->testimoni, 50) }}</p></td>
    <td>

          <form method="POST" action="{{ url('listTestii/delete', $testim->id_testimoni ) }}">
              @csrf
            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"><i class='fa fa-trash'></i></button>
          </form> </td>
    
          <td>
          <form method="POST" action="{{ url('listTestii/update', $testim->id_testimoni) }}">
              @csrf
              <button class="btn btn-info btn-sm" onclick="return confirm('Apakah data yang di setujui sudah benar?');"><i class="fa fa-paper-plane"></i></button>  
          </form> </td>

          <td>
          @if ($message = Session::get('sukses'))
				    <div class="alert alert-success alert-block">
					    <button type="button" class="close" data-dismiss="alert">×</button> 
					    <strong>{{ $message }}</strong>
				    </div>
				  @endif
            <a href="/pesan" class="btn btn-success">SUKSES</a> </td>
  </td>

  <p class="card-text"><small class="text-muted">status : {{$testim->status}}</small></p>
  @endforeach -->

  @foreach($testimonis as $testim) 
  
                      <tbody>
                      
                        <tr>
                      
                          <td>
                          {{optional($testim->biodata)->nama}} 
                          <!-- ini -->
                            
                          </td>
                        
                          <td style="width:50%;">
                          {{ Str::limit($testim->testimoni, 50) }}
                          
                          </td>
                          <td>
                          <!-- <a class="nav-link btn btn-info btn-sm" href="/show/{{$testim->id}}" >
                            Detail -->
                            <button type="submit" class="nav-link btn btn-primary btn-sm" data-toggle="modal" data-target="#contohModal{{$testim->id}}">Detail</button>
                          </td>
                          <td>
                            @if($testim->status === 'setuju')
                          <a class="btn btn-success btn-sm" href="#">
                           Yes
                          </a>
                          @elseif($testim->status === 'tolak')
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
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{$testim->id}}">
                          <i class="fa fa-paper-plane"></i>
                          </button>
                          |
                          <a class="btn btn-danger btn-sm" href="/listTestii/delete/{{$testim->id}}" >

                          <!-- <a method="POST" class="btn btn-danger btn-sm" href="/listTestii/delete/{id_testimoni}}"> -->
                          <i class="ti-trash"></i>
                          </a>
                          </td>  
                        </tr>
                               
               @endforeach

               @foreach($testimonis as $testim) 
    <div class="modal fade bd-example-modal-lg" id="exampleModal{{$testim->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Persetujuan Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                 <form class="form-sample" method="POST" action="/listTestii/persetujuanTesti/{{$testim->id}}" enctype="multipart/form-data">
                 
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
</table>

@foreach($testimonis as $testim) 
<div class="modal fade" id="contohModal{{$testim->id}}" role="dialog" arialabelledby="modalLabel" area-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    {{$testim->testimoni}}
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button> 
                  </div>
                </div>
              </div>
            </div>
@endforeach
        
@endsection