<!--
=========================================================
Material Kit - v2.0.7
=========================================================

Product Page: https://www.creative-tim.com/product/material-kit
Copyright 2020 Creative Tim (https://www.creative-tim.com/)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('frontend/img/covid.png')}}">
  <link rel="icon" type="image/png" href="{{asset('frontend/img/covid.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Covid
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('frontend/css/material-kit.css?v=2.0.7')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('frontend/demo/demo.css')}}" rel="stylesheet" /> 
</head>

<body class="index-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#">
         Lawan Coronavirus </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://127.0.0.1:8000/">
                Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#indo">
              Indonesia
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#global">
              Global
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">
              Information
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="">
              About
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url({{asset('frontend/img/kopit.png')}});">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>Lawan Covid.</h1>
            <br>
            <h3>Coronavirus Global & Indonesia Live Data.</h3>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <div class="main main-raised">
    <div class="container counts" id="counts">

      <div class="row">

      <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
          <div class="count-box">
          <h4>POSITIF</h4>
         
          <h3 data-toggle="counter-up"><?php echo $positif['value'] ?></h3>
         
          <p class="count-box">Orang</p>
          </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
          <div class="count-box">
          <h4>SEMBUH</h4>
          
          <h3 data-toggle="counter-up"><?php echo $sembuh['value'] ?></h3>
          
          <p class="count-box">Orang</p>
          </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
          <div class="count-box">
          <h4>MENINGGAL</h4>
          
          <h3 data-toggle="counter-up"><?php echo $meninggal['value'] ?></h3>
          
          <p class="count-box">Orang</p>
          </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
        <div class="count-box">
        <h4>INDONESIA</h4>
        <h5 data-toggle="counter-up"><b>{{$posi}}</b>&nbsp; POSITIF,<b>{{$sem}}</b>&nbsp; SEMBUH,<b>{{$meni}}</b>&nbsp;MENINGGAL</h5>
        </div>
    </div>

  </div>
  <div class="space-50"></div>
  <div class="col text-center">
      <h6><p>Update terakhir : {{ $tanggal }}</p></h6>
  </div>
</div>
    <div  class="section section-basic">
      <div  class="container">
        <div id ="indo" class="row row-cards">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                        <div class="card">
                            <div class="card-header ">
                                <h3 class="card-title">Kasus Coronavirus Indonesia</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive service">
                                    <table class="table table-dark fixed_header table-bordered table-hover mb-0 text-nowrap css-serial">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>NO.</th>
                                                <th>Provinsi</th>
                                                <th>Positif</th>
                                                <th>Sembuh</th>
                                                <th>Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                            $no= 1;
                                          @endphp
                                          @foreach($provinsi as $tampil)
                                           
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$tampil->nama_provinsi}}</td>
                                                <td>{{number_format($tampil->jumlah_positif)}}</td>
                                                <td>{{number_format($tampil->jumlah_sembuh)}}</</td>
                                                <td>{{number_format($tampil->jumlah_meninggal)}}</</td>
                                            </tr>
                                        </tbody> 
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="space-50"></div>
        <div id ="global" class="row row-cards">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                        <div class="card">
                            <div class="card-header ">
                                <h3 class="card-title">Kasus Coronavirus Global</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive service">
                                    <table class="table table-dark fixed_header table-bordered table-hover mb-0 text-nowrap css-serial">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>NO.</th>
                                                <th>Negara</th>
                                                <th>Positif</th>
                                                <th>Sembuh</th>
                                                <th>Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                        
                                        @foreach($dunia as $data)
                                            <tr>
                                                <td> <?php echo $no++ ?></td>
                                                <td> <?php echo $data['attributes']['Country_Region'] ?></td>
                                                <td> <?php echo number_format($data['attributes']['Confirmed']) ?></td>
                                                <td><?php echo number_format($data['attributes']['Recovered'])?></td>
                                                <td><?php echo number_format($data['attributes']['Deaths'])?></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="space-70"></div>
        <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Beberapa lembaga mengenai tentang coronavirus</h2>
        
        </div>

        <div class="row">
          <div class="col-md-12 col-xl-6">
            <a href="https://www.unicef.org/indonesia/id/coronavirus">
            <div class="card text-white bg-un">
              <div class="card-body">
                <h3 class="card-title">Novel coronavirus (COVID-19): Hal-hal yang perlu Anda ketahui</h3>
                <p class="card-text">Unicef Indonesia</p>
              </div>
            </div>
          </div></a><!-- COL END -->
          <div class="col-md-12 col-xl-6">
            <a href="https://jeo.kompas.com/daftar-rumah-sakit-rujukan-per-provinsi-dan-nomor-kontaknya-untuk-wabah-corona">
            <div class="card text-white bg-kom">
              <div class="card-body">
                <h3 class="card-title">Daftar Rumah Sakit Rujukan Penanganan Virus Corona</h3>
                <p class="card-text">Kompas</p>
              </div>
            </div>
          </div></a><!-- COL END -->
          <div class="col-md-12 col-xl-6">
            <a href="https://infeksiemerging.kemkes.go.id/">
            <div class="card text-white bg-kes">
              <div class="card-body">
                <h3 class="card-title">Media Informasi Resmi Penyakit Infeksi Emerging</h3>
                <p class="card-text">Kementrian Kesehatan </p>
              </div>
            </div>
          </div></a><!-- COL END -->
          <div class="col-md-12 col-xl-6">
            <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">
            <div class="card text-white bg-who">
              <div class="card-body">
                <h3 class="card-title">Coronavirus Disease (COVID-19) Advice for The Public</h3>
                <p class="card-text">WHO</p>
              </div>
            </div>
          </div></a><!-- COL END -->
          

        
      </div>
    </section>
        <div class="space-70"></div>
        <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <h3>Pertanyaan yang Sering <span>Ditanya</span></h3>
          <p>Berikut beberapa jawaban dari pertanyaan yang sering di tanya</p>
        </div>

        <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

          <li>
            <a data-toggle="collapse" class="" href="#faq1">Apa itu Coronavirus atau Covid-19? <i class="icofont-simple-up"></i></a>
            <div id="faq1" class="collapse" data-parent=".faq-list">
              <p>
              Virus korona adalah sebutan untuk jenis virus yang dapat menyebabkan penyakit pada hewan dan manusia. 
              Disebut korona karena bentuknya yang seperti mahkota (korona ~ crown = mahkota dalam bahasa Latin).
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">Bagaimana COVID-19 menular? <i class="icofont-simple-up"></i></a>
            <div id="faq2" class="collapse" data-parent=".faq-list">
              <p>
                Penularan terjadi melalui droplet (butir-butir tetesan cairan) dari hidung atau mulut yang menyebar saat pembawa virus COVID-19 batuk, bersin atau meler. 
                Tetesan cairan tersebut akan menempel pada benda atau permukaan di sekitarnya. Dan kemudian masuk ke mulut, hidung atau mata. 
                Atau menyentuh permukaan bekas terkena butir cairannya dengan tangan lalu tangan mengusap mulut, hidung atau mata. 
                Inilah alasan pentingnya sering-sering cuci tangan dan jangan menyentuh muka dengan tangan. <br>

                Orang sehat dapat tertular saat tangan mereka menyentuh permukaan yang terkena tetesan tersebut dan kemudian tanpa sadar menyentuh mata, 
                mulut, ataupun hidung (selaput lendir). Virus juga bisa masuk saat orang sehat secara tidak sengaja menghirup tetesan cairan saat si pembawa virus batuk atau bersin.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">Kita harus bagaimana?  <i class="icofont-simple-up"></i></a>
            <div id="faq3" class="collapse" data-parent=".faq-list">
              <p>
                  1. Ketika keluar rumah, pakailah masker. Jika bersin, tutup mulut dan hidung dengan tisu dan buang tisunya sesegera mungkin.  <br>
                  2. Rajinlah mencuci tangan dengan sabun atau pembersih tangan berbasis alkohol min. 60% <br>
                  3. Jaga jarak dengan orang yang tampak sakit sepanjang kurang lebih 1 meter <br>
                  4. Jika sakit, pastikan untuk tidak menyebarkan virus ke orang lain dengan mengurangi bepergian. 
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed">Jika seseorang terinfeksi virus ini, berapa lama sampai muncul gejala? <i class="icofont-simple-up"></i></a>
            <div id="faq4" class="collapse" data-parent=".faq-list">
              <p>
              Masa inkubasi (dari masuknya virus ke dalam tubuh sampai munculnya gejala awal) adalah 1 – 14 hari, dengan rata-rata timbulnya gejala selama 5 hari.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed">Seberapa banyak pasien yang akan mengalami gejala serius? <i class="icofont-simple-up"></i></a>
            <div id="faq5" class="collapse" data-parent=".faq-list">
              <p>
                Dari data yang tersedia saat ini, kita belum bisa menyimpulkan secara persis seberapa parah wabah COVID-19 ini. 
                Tingkat keparahan dan mortalitas suatu wabah juga akan sangat tergantung pada kapasitas sistem kesehatan publik setempat dalam menangani kasus yang ada. 
                Namun, temuan awal mengindikasikan bahwa tingkat keparahan COVID-19 lebih rendah dibandingkan SARS. 
                Berdasarkan data dari 44 ribu pasien yang dirilis oleh Centre of Disease Control di Tiongkok, 
                proporsi pasien dengan gejala ringan/serius/kritis dan tingkat kematiannya adalah sebagai berikut: <br><br>
                -Gejala ringan seperti flu biasa: 81% (tingkat kematian: 0) <br>
                -Gejala lebih serius seperti sesak napas dan pneumonia (radang paru-paru): 14% (tingkat kematian: 0) <br>
                -Perlu masuk ICU dengan kondisi kritis karena gagal pernapasan, syok septik, dan gagal multi-organ: 5% (tingkat kematian: 50%)
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq6" class="collapsed">Apa yang harus saya sampaikan kepada tenaga medis jika saya batuk pilek demam dan sulit bernafas? <i class="icofont-simple-up"></i></a>
            <div id="faq6" class="collapse" data-parent=".faq-list">
              <p>
                1. Riwayat perjalanan (jika ada, ke Tiongkok atau negara-negara yang sudah terjangkit COVID-19, seperti Singapura, Jepang, Korea Selatan, dan Italia) <br>
                2. Kapan gejala mulai timbul <br> 
                3. Adakah kontak selama 14 hari terakhir dengan seseorang yang memiliki gejala pernapasan dan baru datang dari salah satu daerah yang ditemukan memiliki kasus COVID-19
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section>
      </div>
    </div>
    
  <footer class="footer" data-background-color="black">
    <div class="container">
      <!-- <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com/">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/blog">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav> -->
      <div class="copyright float-center">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, Designed <i class="material-icons">favorite</i> by
        <a href="https://www.instagram.com/penduduk.bumi_/" target="_blank">AndrianRamdani</a> for a better web.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{asset('frontend/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('frontend/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('frontend/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('frontend/js/plugins/moment.min.js')}}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{asset('frontend/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('frontend/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('frontend/js/material-kit.js?v=2.0.7')}}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>