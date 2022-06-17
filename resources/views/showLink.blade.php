@extends('layouts.lay')
@section('content')

        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Link Perusahaan</h4>

                  <form method="post" action="/multipleLink">
                  {{ csrf_field() }}
                  <input type="text" class="form-control" name="link" id="">
	              	<br>
		            <input class="btn btn-success" type="submit" name="submit" value="Kirim"/> 
		            <br><br>
            <table class="table table-striped" id="posts-table">
              <thead>
                <tr>
                  <th scope="col"><input type="checkbox" id="checkAll"></th>
                  <th scope="col">NIM</th>
                  <th scope="col">Name</th>
                  <th scope="col">Link</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user as $u)
                  <tr>
                    <td><input type="checkbox" class="check" name='id[]' value="{{ $u->nim }}"></td>
                    <td>{{$u->nim}}</td>
                    <td>{{$u->nama}}</td>
                    <td>
                      @if($u->link !== null)
                          <a class="btn btn-success btn-sm" href="#">
                          ada link
                          </a>
                          @else
                          <a class="btn btn-secondary btn-sm" href="#">
                            tidak ada link
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
   
@section('script')

<script src="{{asset('Jquery-Table-Check-All-Plugin/dist/TableCheckAll.js')}}"></script>
        <script type="text/javascript">
     $("#checkAll").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
        </script>
@endsection
@endsection