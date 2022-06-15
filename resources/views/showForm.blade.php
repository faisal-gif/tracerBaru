@extends('layouts.lay')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Form</h4>
                  @if(Gate::check('admin') || Gate::check('superAdmin'))
                  <a class="btn btn-success btn-sm " href="/buatForm"> Tambah </a>
                  @endif
                  <div class="table-responsive pt-3">
                  <table id="example" class="table table-striped table-bordered" width="100" >
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Form</th>
                <th>Jenis Form</th>
                <th>Pertanyaan</th>
                <th>Hasil Form</th>
                <th>Copy Link Form</th>
                <th>Rekap Jawaban</th>
                
            </tr>
        </thead>
        <tbody>
        @foreach($form as $i)
                        <tr>
                        <td>
                        {{$i->created_at->format('d, M Y')}}
                          </td>
                          <td>
                          {{$i->namaForm}}
                          </td>
                          <td>
                          {{$i->jenisForm}}
                          </td>
                          <td>
                          <a class="btn btn-primary btn-sm" href="/showPertanyaan/{{$i->jenisForm}}/{{$i->id}}">
                           <i class="ti-pencil"></i>
                          </a>
                          </td>
                           <td>
                          <a class="btn btn-primary " href="/pertanyaan/{{$i->jenisForm}}/{{$i->id}}">
                          Hasil Pertanyaan
                          </a>
                         
                          
                          <td>
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#copyModal{{$i->id}}">
                          <i class="ti-notepad"></i>
                        </button>
                          
                          </td>
                          <td>
                          @if(Gate::check('admin') || Gate::check('superAdmin'))
                          <a class="btn btn-primary " href="/showJawaban/{{$i->id}}">
                          Rekap jawaban
                          </a>
                          @endif
                          @if(Gate::check('jurusan') || Gate::check('prodi'))
                          <a class="btn btn-primary " href="/showJawabanUser/{{ Auth::user()->id }}/{{$i->id}}">
                          Rekap jawaban
                          </a>
                          @endif
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @foreach($form as $i)
              <!-- Modal -->
              <div class="modal fade bd-example-modal-lg" id="copyModal{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Biodata Alumni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              
                    <div class="row">
                      <div class="col-md-6">
                        
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Copy Link</label>
                       <div class="col-sm-9">
                         <input type="text" name="copy" id="copy{{$i->id}}" value="{{ route('pertanyaan', [$i->jenisForm,$i->id]) }}" class="form-control">
                         <button onclick="copyToClipboard('copy{{$i->id}}')"  class="btn btn-primary">
                          <i class="ti-notepad"></i>
                          </button>
                          </div>
                        </div>
                      </div>
                    
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
@endforeach
            @endsection
         @section('script')
         <script>
         function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
    }
            </script>

         @endsection
