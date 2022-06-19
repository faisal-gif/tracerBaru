<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tracer Study</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('ad/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('ad/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('ad/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('ad/vendors/ti-icons/css/themify-icons.css')}}">

  
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('ad/css/vertical-layout-light/style.css')}}">
  <link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('images/logo_jti.png')}}" />
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/"><img src="{{asset('images/logo.png')}}" class="mr-2" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
       
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              @if(Auth::user()->biodata === null)
              <img src="{{asset('images/logo_jti.png')}}" alt="profile"/>
              @else
              <img src="{{asset(Auth::user()->biodata->foto)}}" alt="profile"/>
              @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="/editProfile/{{ Auth::user()->id }}">
                <i class="ti-settings text-primary"></i>
                Profile
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </div>
          </li>
         
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @if(Gate::check('admin') || Gate::check('jurusan') || Gate::check('prodi') || Gate::check('superAdmin') || Gate::check('akreditasi'))
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/home/{{ Auth::user()->id }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @endif
          @if(Gate::check('alumni'))
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/alumniDash/{{ Auth::user()->id }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @endif
        @if(Gate::check('admin') || Gate::check('superAdmin'))
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Biodata Alumni</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/showBiodata">All Biodata</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/dataAlumni">Data Alumni</a></li>
              </ul>
            </div>
          </li>
          @endif
          @if(Gate::check('alumni') || Gate::check('admin') || Gate::check('jurusan') || Gate::check('prodi') || Gate::check('superAdmin') || Gate::check('akreditasi'))
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-kabar" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Kabar Jurusan</span>
              <i class="menu-arrow"></i>
            </a>
           
            <div class="collapse" id="form-kabar">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/formKabar">Input Kabar</a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/kabarKu/{{ Auth::user()->id }}">Daftar Kabar</a></li>
              </ul>
              @endif
            @if(Gate::check('admin') || Gate::check('superAdmin'))
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/filterKab">Persetujuan</a></li>
              </ul>
              @endif
            </div>
          </li>
         
          <li class="nav-item">
          @if(Gate::check('alumni') || Gate::check('superAdmin') || Gate::check('admin'))
            <a class="nav-link" data-toggle="collapse" href="#form-testimoni" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Kata Alumni</span>
              <i class="menu-arrow"></i>
            </a>
            @endif
            @if(Gate::check('alumni') || Gate::check('superAdmin'))
            <div class="collapse" id="form-testimoni">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/formAlumni">Form Kata Alumni</a></li>
              </ul>
            </div>
             @endif
             @if(Gate::check('admin') || Gate::check('superAdmin'))
            <div class="collapse" id="form-testimoni">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/listTestii">List Kata Alumni</a></li>
              </ul>
            </div>
            @endif
          </li>
          @if(Gate::check('admin') || Gate::check('jurusan') || Gate::check('prodi') || Gate::check('superAdmin') || Gate::check('akreditasi'))
           
                <li class="nav-item">
                <a class="nav-link" href="/listForm" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Form</span>
            </a>
                </li>
              
          
          <li class="nav-item">
            <a class="nav-link" href="/showPengisi" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">List Penjawab</span>
            </a>
          </li>
          @endif
          @if(Gate::check('admin') || Gate::check('superAdmin'))


          <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#form-link" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Link Form</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-link">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/formLink">Link Alumni</a></li>
              </ul>
            </div>
            <div class="collapse" id="form-link">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/showLink">Link Perusahaan</a></li>
              </ul>
            </div>

          </li>
          @endif
          @if(Gate::check('superAdmin'))
          <li class="nav-item">
            <a class="nav-link" href="/showUser" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">showUser</span>
            </a>
          </li>
          @endif
          @if(Gate::check('alumni'))
          <li class="nav-item">
          @foreach(\App\kirimForm::all() as $l)
            <a class="nav-link" href="{{$l->link}}/{{ Auth::user()->id }}" aria-controls="form-elements">
            @endforeach
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Isi Form</span>
            </a>
          </li>
          @endif
          

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           
          @yield('content')
        </div>  
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © JTI Polinema </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">jti@polinema.ac.id </span>
            <!-- <i class="ti-heart text-danger ml-1"></i> -->
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('ad/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('ad/vendors/chart.js/Chart.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('ad/js/off-canvas.js')}}"></script>
  <script src="{{asset('ad/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('ad/js/template.js')}}"></script>
  <script src="{{asset('ad/js/settings.js')}}"></script>
  <script src="{{asset('ad/js/todolist.js')}}"></script>
  <script src="{{asset('tab/tableJs.js')}}"></script>
  <script src="{{asset('ad/vendors/chart.js/Chart.min.js')}}"></script>

  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('ad/js/dashboard.js')}}"></script>
  <script src="{{asset('ad/js/Chart.roundedBarCharts.js')}}"></script>
  @yield('script')
  <script>
$(document).ready(function() {
  $('#example').DataTable( {
    destroy: true,
    paging: false

} );
} );
</script>
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

  <!-- End custom js for this page-->
</body>

</html>

