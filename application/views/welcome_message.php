<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Ruang Guru</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script type="text/javascript" src="js/jquery.fancybox.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen"/>
        <script type="text/javascript" src="js/jquery.fancybox-media.js?v=1.0.6"></script>

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">

    </head>

    <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <a class="navbar-brand visible-xs" href="#"><img src="images/logo-kelas-2.png" height="60"></a>
                    <button type="button" class="filter-toggle collapsed visible-xs" data-toggle="collapse" data-target="#list-orange" aria-expanded="false" aria-controls="navbar">Filter</button>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-xs" href="#"><img src="images/logo-kelas-2.png" height="60"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="close-toggle visible-xs" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active"><a href="#">Kelas</a></li>
                        <li><a href="#about">Privat</a></li>
                        <li><a href="#contact">FAQ</a></li>
                        <li><a href="#contact">Kontak</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="user-login">
                            Hello, <a href="#">Kelas</a>
                        </li>
                        <li class="sign-out">
                            <a href="#">Sign Out</a>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </nav>


    <div class="container content kelas vendor">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="sidebar">
                    <div class="profile-image-wrap">
                        <img src="images/user.png" alt="" class="img-responsive">
                        <a href="#"><span class="edit"><i class="fa fa-pencil"></i></span></a>
                    </div>
                    <h3 class="profile-name text-center">Nama Vendor</h3>

                    <div class="progress">
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        60% 
                      </div>
                    </div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation">
                            <a href="#profil" aria-controls="profil" role="tab" data-toggle="tab"><i class="fa fa-user"></i> Profil</a>
                        </li>
                        <li role="presentation">
                            <a href="#reponsible" aria-controls="reponsible" role="tab" data-toggle="tab"><i class="fa fa-male"></i> Penganggungjawab</a>
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-users"></i> Kelas Anda</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus"></i> Tambah Kelas</a>
                        </li>
                    </ul>
                </div><!-- sidebar -->
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="panel panel-default">
                    <h2 class="block-title text-uppercase">PROFIL PENYELENGGARA</h2>
                    <div class="panel-body">
                        <div role="tabpanel" class="sub-vendor">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#published" aria-controls="published" role="tab" data-toggle="tab">Published</a>
                                </li>
                                <li role="presentation">
                                    <a href="#draft" aria-controls="draft" role="tab" data-toggle="tab">Draft</a>
                                </li>
                                <li role="presentation">
                                    <a href="#past" aria-controls="past" role="tab" data-toggle="tab">Past</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="published">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <td>ID</td>
                                                    <td>Nama Kelas</td>
                                                    <td>Harga Kelas (Rp)</td>
                                                    <td>Jumlah Sesi</td>
                                                    <td>Tipe Kelas</td>
                                                    <td>Jumlah Murid</td>
                                                    <td>Status</td>
                                                    <td>Pengaturan</td>
                                                    <td>Go to web</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Web Programming - Basic</td>
                                                    <td>75,000,-</td>
                                                    <td>5</td>
                                                    <td>Series</td>
                                                    <td><a href="#">1 Orang</a></td>
                                                    <td class="status">
                                                        <span class="approved icon-circle" title="Approved"><i class="fa fa-check"></i></span>
                                                        <a href="#" class="unpublish icon-circle" title="Request Unpublish"><i class="fa fa-download"></i> </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="manage icon-circle" title="Pengaturan"><i class="fa fa-gears"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>CV and Cover Letter Writing</td>
                                                    <td>0,-</td>
                                                    <td>0</td>
                                                    <td>Single</td>
                                                    <td><a href="#">0 Orang</a></td>
                                                    <td class="status">
                                                        <span class="pending icon-circle" title="Pending"><i class="fa fa-ellipsis-h"></i></span>
                                                        <a href="#" class="publish icon-circle" title="Publish Class"><i class="fa fa-upload"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="manage icon-circle" title="Pengaturan"><i class="fa fa-gears"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- table-responsive -->
                                    <div id="class-notes">
                                        <p> Catatan: </p>
                                        <ol>
                                            <li>
                                                Untuk kelas yang sudah live, Anda hanya dapat mengedit dengan mengubah foto. Jika Anda ingin mengubah detilnya, <a class="blue underline" href="mailto:info@ruangguru.com?Subject=Edit%20Kelas">hubungi kami</a>
                                            </li>
                                            <li>
                                                Anda hanya dapat melihat daftar murid dan menghubungi mereka yang sudah melakukan pembayaran. Untuk melihat daftar murid , klik "<b>Jumlah Murid</b>"
                                            </li>
                                        </ol>
                                    </div>
                                </div><!-- published -->
                                <div role="tabpanel" class="tab-pane" id="draft">Kelas tidak tersedia </div><!-- draft -->
                                <div role="tabpanel" class="tab-pane" id="past">Kelas tidak tersedia </div><!-- past -->
                            </div><!-- tab-content -->

                        </div><!-- tabpanel kelas -->
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div>
        </div>
    </div> <!-- /container -->
    
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="footer-label">Ruangguru.com</h4>
                    <p>Ruangguru adalah sebuah website yang menghubungkan calon murid untuk menemukan calon guru yang berkualitas</p>
                </div>
                <div class="col-sm-5">
                    <div class="footer-link">
                        <a href="">Tentang Kami</a> | <a href="lowongan" class="underline bold">Lowongan</a> | <a href="http://ruangguru.tumblr.com" target="_blank" rel='nofollow'>Blog</a> | <a href="kebijakan_privasi" target="_blank">Kebijakan Privasi</a> | <a href="http://indonesianfutureleaders.org/" target="_blank" rel='nofollow'>Mitra</a> | <a href="kontak_kami" target="_blank" rel='nofollow'>Kontak</a>
                    </div>
                    <div id="footer-addr">
                        <p> PT. Ruang Raya Indonesia </p>
                        <p> Jalan Tebet Raya No. 32 A, Jakarta Selatan, Indonesia - 12820 </p>
                        <p> Ph. +62 21 9200 3040 | e. info@ruangguru.com </p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-about-detail">
                        <span id="socmed-icon">
                        <a href="http://www.facebook.com/ruanggurucom" target="_blank" rel='nofollow'><img src="images/fb-icon.png"/></a>&nbsp;<a href="http://www.twitter.com/ruangguru" target="_blank" rel='nofollow'><img src="images/twitter-icon.png"/></a>&nbsp;<a href="http://ruangguru.tumblr.com" target="_blank" rel='nofollow'><img src="images/tumblr-icon.png"/></a>&nbsp;<a href="http://www.instagram.com/ruangguru" target="_blank" rel='nofollow'><img src="images/insta-icon.png"/></a>
                        </span>
                    </div>
                    <div class="footer-copyright">
                        <p class="text-12">
                             &copy; 2014 <a href="http://ruangguru.com/">Ruangguru.com</a>. All rights reserved.
                        </p>
                    </div><!-- footer-copyright -->
                </div>
                <div class="col-sm-6 text-left">
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
        </div>
    </div><!-- footer -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    jQuery(document).ready(function($){
        $('.icon-circle').tooltip();
    });
    </script>
  </body>
</html>
