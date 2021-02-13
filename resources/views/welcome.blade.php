
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Covid</title>
<!-- 
Journey Template 
http://www.templatemo.com/tm-511-journey
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{asset('assets/frontend/font-awesome-4.7.0/css/font-awesome.min')}}">                <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/datepicker.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/slick/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/templatemo-style.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/frontend/css/skin-modes.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/frontend/css/newstyle.css')}}">                                   <!-- Templatemo style -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/tab.css')}}"> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
      </head>

      <body>
      <?php
        $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
        $positif = json_decode($datapositif, TRUE);
        $datasembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
        $sembuh = json_decode($datasembuh, TRUE);
        $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
        $meninggal = json_decode($datameninggal, TRUE);
        $dataid = file_get_contents("https://api.kawalcorona.com/indonesia");
        $id = json_decode($dataid, TRUE);
        $dataidprovinsi = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");
        $idprovinsi = json_decode($dataidprovinsi, TRUE);
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $data = json_decode($datadunia, TRUE);
    ?>
        <div class="tm-main-content" id="top">
            <div class="tm-top-bar-bg"></div>    
            <div class="tm-top-bar" id="tm-top-bar">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-expand-lg narbar-light">
                            <a class="navbar-brand mr-auto" href="#">
                                <img src="{{asset('assets/frontend/img/covid.jpg')}}" alt="Site logo">
                                Covid-19
                            </a>
                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                                <ul class="navbar-nav ml-auto">
                                  <li class="nav-item">
                                    <a class="nav-link active" href="#top">Home<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-2">About</a>
                                </li>
                            </ul>
                        </div>                            
                    </nav>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- .tm-top-bar -->

        <div class="tm-page-wrap mx-auto">
            <section class="tm-banner">
                <div class="tm-container-outer tm-banner-bg">
                    <div class="container">

                        <div class="row tm-banner-row tm-banner-row-header">
                            <div class="col-xs-12">
                                <div class="tm-banner-header">
                                    <h1 class="text-uppercase tm-banner-title">Lawan COVID-19</h1>
                                    <img src="{{asset('assets/frontend/img/dots-3.png')}}" alt="Dots">
                                    <p class="tm-banner-subtitle">Coronavirus Global & Indonesia Live Data.</p>
                                    <a href="javascript:void(0)" class="tm-down-arrow-link"><i class="fa fa-2x fa-angle-down tm-down-arrow"></i></a>       
                                </div>    
                            </div>  <!-- col-xs-12 -->                      
                        </div> <!-- row -->
                        <div class="row tm-banner-row" id="tm-section-search">
                                        <!-- ======= Counts Section ======= -->
                                        
                                        <div class="container counts" id="counts">

                                            <div class="row">

                                            <div class="col-lg-4 col-md-8 mt-5 mt-md-0">
                                                <div class="count-box">
                                                <p>Positif</p>
                                                <span data-toggle="counter-up"><?php echo $positif['value'] ?></span>
                                                <p>Orang</orang>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-8 mt-5 mt-md-0">
                                                <div class="count-box">
                                                <p>Sembuh</p>
                                                <span data-toggle="counter-up"><?php echo $sembuh['value'] ?></span>
                                                <p>Orang</orang>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-8 mt-5 mt-lg-0">
                                                <div class="count-box">
                                                <p>Meninggal</p>
                                                <span data-toggle="counter-up"><?php echo $meninggal['value'] ?></span>
                                                <p>Orang</orang>
                                                </div>
                                            </div>

                                            </div>

                                        </div><!-- End Counts Section -->                         

                        </div> <!-- row -->
                        <div class="tm-banner-overlay"></div>
                    </div>  <!-- .container -->                   
                </div>     <!-- .tm-container-outer -->                 
            </section>

            <!-- <section class="p-5 tm-container-outer tm-bg-gray">            
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">      
                        <h2 class="text-uppercase mb-4"><strong>Lawan Covid.</strong></h2>                  
                            <h3 class="text-uppercase mb-4">Coronavirus Global & Indonesia <strong>Live Data.</strong></h3>                           
                        </div>
                    </div>
                </div>            
            </section> -->
            <section class="p-5 tm-container-outer tm-bg-gray"> 
                <div class="row row-cards">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                        <div class="card">
                            <div class="card-header ">
                                <h3 class="card-title">Kasus Coronavirus Indonesia</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive service">
                                    <table class="table table-dark table-bordered table-hover mb-0 text-nowrap css-serial">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th class="atasbro">NO.</th>
                                                <th class="atasbro">Provinsi</th>
                                                <th class="atasbro">Positif</th>
                                                <th class="atasbro">Sembuh</th>
                                                <th class="atasbro">Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <section class="p-5 tm-container-outer tm-bg-gray"> 
                <div class="row row-cards">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                        <div class="card">
                            <div class="card-header ">
                                <h3 class="card-title">Kasus Coronavirus Global</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive service">
                                    <table class="table table-dark table-bordered table-hover mb-0 text-nowrap css-serial">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th class="atasbro">NO.</th>
                                                <th class="atasbro">Negara</th>
                                                <th class="atasbro">Positif</th>
                                                <th class="atasbro">Sembuh</th>
                                                <th class="atasbro">Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                        for ($i= 0; $i <= 191; $i++){
                                        ?>
                                            <tr>
                                                <td> </td>
                                                <td> <?php echo $data[$i]['attributes']['Country_Region'] ?></td>
                                                <td> <?php echo $data[$i]['attributes']['Confirmed'] ?></td>
                                                <td><?php echo $data[$i]['attributes']['Recovered']?></td>
                                                <td><?php echo $data[$i]['attributes']['Deaths']?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 

           
            <footer class="tm-container-outer">
                <p class="mb-0">Copyright © <span class="tm-current-year">2018</span> Your Company 
                    
                . Designed by <a rel="nofollow" href="https://www.instagram.com/penduduk.bumi_/" target="_parent">Penduduk.bumi_</a></p>
            </footer>
        </div>
    </div> <!-- .main-content -->

    <!-- load JS files -->
    <script src="{{asset('assets/frontend/js/jquery-1.11.3.min.js')}}"></script>             <!-- jQuery (https://jquery.com/download/) -->
    <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>                    <!-- https://popper.js.org/ -->       
    <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>                 <!-- https://getbootstrap.com/ -->
    <script src="{{asset('assets/frontend/js/datepicker.min.js')}}"></script>                <!-- https://github.com/qodesmith/datepicker -->
    <script src="{{asset('assets/frontend/js/jquery.singlePageNav.min.js')}}"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
    <script src="{{asset('assets/frontend/slick/slick.min.js')}}"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
    <script src="{{asset('assets/frontend/js/jquery.scrollTo.min.js')}}"></script>           <!-- https://github.com/flesler/jquery.scrollTo -->
    <script> 
        /* Google Maps
        ------------------------------------------------*/
       

    </script>             

</body>
</html>