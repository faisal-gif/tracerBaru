@extends('layouts.lay')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Pengisi</h4>
                  <div class="table-responsive pt-3">
                 
                          <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>
                            Tanggal Isi
                          </th>
                          <th>
                            Nama Pengisi
                          </th>
                          <th>
                            Email Pengisi
                          </th>
                          
                        </tr>
                      </thead>
                     
                      <tbody>
                      @foreach($jawaban as $j)
                        <tr>
                          <td>
                          {{$j->created_at}}
                          </td>
                          <td>
                          
                          {{optional($j->biodata)->nama}}
                          </td>
                          <td>
                          {{$j->email}}
                          </td>
                         
                        </tr>
                        @endforeach 
              
                      </tbody>
                     
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
@endsection