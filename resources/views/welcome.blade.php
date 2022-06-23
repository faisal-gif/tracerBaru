<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tracer Study JTI Polinema</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{asset('hom/css/animate.css')}}">
  <link rel="shortcut icon" href="{{asset('images/logo_jti.png')}}" />

  <link rel="stylesheet" href="{{asset('hom/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('hom/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('hom/css/magnific-popup.css')}}">

  <link rel="stylesheet" href="{{asset('hom/css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{asset('hom/css/jquery.timepicker.css')}}">


  <link rel="stylesheet" href="{{asset('hom/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('hom/css/style.css')}}">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html"><span>Tracer</span>Study</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="/" class="nav-link">Beranda</a></li>
          <li class="nav-item"><a href="/about" class="nav-link">Tentang Kami</a></li>
          <li class="nav-item"><a href="/testimoni" class="nav-link">Alumni</a></li>
          <li class="nav-item"><a href="/kabarr" class="nav-link">Artikel</a></li>
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <div class="hero-wrap js-fullheight" style="background-image: url('images/polinema.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate">
          <span class="subheading">Selamat Datang</span>
          <h1 class="mb-4">Tracer Study Jurusan Teknologi Informasi</h1>
          <!-- <p class="caps">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
          <p class="mb-0"><a href="{{$kuis->link}}" class="btn btn-primary">Isi Kuisoner</a></p>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
      <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-5 order-md-last">
          <div class="login-wrap p-4 p-md-5">
          @if($errors->any())
<div class="alert alert-danger">
  <strong>Error</strong> {{$errors->first()}}
</div>
@endif
            <h3 class="mb-4">Daftar</h3>
            <form action="/buatUser" class="signup-form" method="POST">
            @csrf
              <div class="form-group">
                <label class="label" for="name">NIM</label>
                <input type="text" name="nim" class="form-control input100" placeholder="NIM">
                <span class="focus-input100"></span>
              </div>
              <div class="form-group">
                <label class="label" for="email">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <label class="label" for="password">Password</label>
                <input id="password-field" name="password" type="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <label class="label" for="password">Konfirmasi Password</label>
                <input id="password-field" type="password" class="form-control" placeholder="Confirm Password">
              </div>
              <div class="form-group d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary submit"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
            <p class="text-center">Sudah Punya Akun? <a href="#signin">Sign In</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-about img">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-12 about-intro">
          <div class="row">
            <div class="col-md-6 d-flex">
              <div class="d-flex about-wrap">
                <div class="img d-flex align-items-center justify-content-center"
                  style="background-image:url(images/polinema3.jpg);">
                </div>
                <div class="img-2 d-flex align-items-center justify-content-center"
                  style="background-image:url(images/polinema1.jpg);">
                </div>
              </div>
            </div>
            <div class="col-md-6 pl-md-5 py-5">
              <div class="row justify-content-start pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                  <span class="subheading">Hai Alumni!</span>
                  <h2 class="mb-4">Ucapan Selamat Datang</h2>
                  <p>Tracer Study Jurusan Teknologi Informasi dilakukan untuk memantau dan mengetahui masa transisi dari dunia kampus menuju dunia kerja pada lulusan Jurusan Teknologi Informasi. Hasil dari tracer study ini akan menjadi data acuan yang sangat berharga bagi Politeknik Negeri Malang khusunya Jurusan Teknologi Informasi dalam rangka pengembangan dan kemajuan pendidikan. Oleh karena itu, kami mohon kesediaan para alumni Jurusan Teknologi Informasi - Politeknik Negeri Malang yang terhormat untuk bekerjasama dalam mengisi kuesioner Tracer Study ini.</p>
                  <p><a href="{{$kuis->link}}" class="btn btn-primary">Isi Kuisioner</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section" style="margin-top: -150px; margin-bottom: -50px;">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Program Studi</span>
          <h2 class="mb-4">Jurusan Teknologi Informasi</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-3 col-lg-2">
          <a href="#" class="course-category img d-flex align-items-center justify-content-center"
            style="background-image: url(images/polinema1.jpg);">
            <div class="text w-100 text-center">
              <h3>Teknik Informatika</h3>
              <span>D4</span>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-lg-2">
          <a href="#" class="course-category img d-flex align-items-center justify-content-center"
            style="background-image: url(images/polinema2.jpg);">
            <div class="text w-100 text-center">
              <h3>Manajemen Informasi</h3>
              <span>D3</span>
            </div>
          </a>
        </div>
        <!-- <div class="col-md-3 col-lg-2">
    <a href="#" class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(images/work-3.jpg);">
       <div class="text w-100 text-center">
          <h3>Photography</h3>
          <span>100 course</span>
      </div>
  </a>
</div> -->
        <!-- <div class="col-md-12 text-center mt-5">
    <a href="#" class="btn btn-secondary">See All Courses</a>
</div> -->
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Kabar Jurusan</span>
          <h2 class="mb-4">Berita Terkini</h2>
        </div>
      </div>
      <div class="row d-flex">

      @foreach($kabar as $kab)
        <div class="col-lg-4 ftco-animate">
          <div class="blog-entry">
            <a href="/showKabar/{{$kab->id}}" class="block-20" style="background-image: url({{asset($kab->img)}});">
            </a>
            <div class="text d-block">
              <div class="meta">
                <p>
                  <a href="#"><span class="fa fa-calendar mr-2"></span>{{$kab->created_at->format('d, M Y')}}</a>
                  <a href="/showProfile/{{$kab->idUser}}"><span class="fa fa-user mr-2"></span>{{$kab->nama}}</a>
                 
                </p>
              </div>
              <h3 class="heading"><a href="/showKabar/{{$kab->id}}">{{ $kab->judul }}</a></h3>
             
              <p><a href="/showKabar/{{$kab->id}}" class="btn btn-secondary py-2 px-3">Read more</a></p>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/polinema.jpg); margin-top: -100px;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-online"></span></div>
            <div class="text">
              <strong class="number" data-number="2">0</strong>
              <span>Program Studi</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-graduated"></span></div>
            <div class="text">
              <strong class="number" data-number="400">0</strong>
              <span>Alumni</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-instructor"></span></div>
            <div class="text">
              <strong class="number" data-number="100">0</strong>
              <span>Dosen</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-tools"></span></div>
            <div class="text">
              <strong class="number" data-number="300">0</strong>
              <span>Hours Content</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section testimony-section bg-light">
    <div class="overlay" style="background-image: url(images/polinema2.jpg);"></div>
    <div class="container">
      <div class="row pb-4">
        <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Testimoni</span>
          <h2 class="mb-4">Kata Alumni</h2>
        </div>
      </div>
    </div>
    <div class="container container-2">
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
          @foreach ($testimonis as $testimonis)
            <div class="item">
            
              <div class="testimony-wrap py-4">
              
                <div class="text">
                <!-- <p>{{ Str::limit($testimonis->testimoni, 50) }}</p> -->
                <p>{{$testimonis->testimoni}}</p>
                  <div class="d-flex align-items-center">
                  @isset($testimonis->biodata)
                    <div class="user-img" style="background-image: url({{$testimonis->biodata->foto}})"></div>
                   
                    <div class="pl-3">
                      <p class="name">{{$testimonis->biodata->nama}}</p>
                      <span class="position">{{$testimonis->biodata->prodi}}</span>
                      @endisset
                    </div>
                  </div>
                </div>
               
              </div>
              
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-no-pt">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md pt-5">
          <div class="block-23 mb-3">
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
              <li><span class="icon fa fa-map-marker"></span><span class="text">Jurusan Teknologi Informasi
                Gedung Teknik Sipil lt. 5-8 - Politeknik Negeri Malang
                Jl. Soekarno Hatta No. 9 Malang 65141</span></li>
            </ul>
          </div>
        </div>
        <div class="col-md pt-5">
          <div class="block-23 mb-3">
            <ul class="list-unstyled">
              <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+62 (0341) 404424 – 404425</span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md pt-5">
          <div class="block-23 mb-3">
            <ul class="list-unstyled">
              <li><a href="#"><span class="icon fa fa-fax"></span><span
                class="text"> +62 (0341) 404420</span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md pt-5">
            <div class="block-23 mb-3">
              <ul>
                <li><a href="#"><span class="icon fa fa-envelope"></span><span
                      class="text">jti@polinema.ac.id</span></a></li>
              </ul>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with
            <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
              target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->   


  <script src="{{asset('hom/js/jquery.min.js')}}"></script>
  <script src="{{asset('hom/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('hom/js/popper.min.js')}}"></script>
  <script src="{{asset('hom/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('hom/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('hom/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('hom/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('hom/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('hom/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('hom/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('hom/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('hom/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('hom/js/google-map.js')}}"></script>
  <script src="{{asset('hom/js/main.js')}}"></script>

</body>

</html>