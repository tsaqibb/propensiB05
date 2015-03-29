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
                    <h3 class="profile-name text-center">Halo, [Nama]</h3>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#kelas" aria-controls="profil" role="tab" data-toggle="tab"><i class="fa fa-user"></i> Kelas</a>
                        </li>
                        <li role="presentation">
                            <a href="#partisipan" aria-controls="reponsible" role="tab" data-toggle="tab"><i class="fa fa-male"></i> Partisipan</a>
                        </li>
                    </ul>
                </div><!-- sidebar -->
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="panel panel-default">
                    <h2 class="block-title text-uppercase">Kelas</h2>
                    <div class="panel-body">
                        <div role="tabpanel" class="sub-vendor">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#published" aria-controls="published" role="tab" data-toggle="tab">Published</a>
                                </li>
                                <li role="presentation">
                                    <a href="#pending-pub" aria-controls="draft" role="tab" data-toggle="tab">Pending Publish</a>
                                </li>
                                <li role="presentation">
                                    <a href="#pending-unpub" aria-controls="past" role="tab" data-toggle="tab">Pending Unpublish</a>
                                </li>
                                <li role="presentation">
                                    <a href="#pending-approve" aria-controls="past" role="tab" data-toggle="tab">Pending Approve</a>
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
                                                    <td>Action</td>
                                                    <td>Go to web</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Web Programming - Basic</td>
                                                    <td class="status">
                                                        <a href="#" class="publish icon-circle" title="Request Unpublish"><i class="fa fa-download"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Web Programming - Advance</td>
                                                    <td class="status">
                                                        <span class="pending icon-circle" title="Pending Unpublish"><i class="fa fa-ellipsis-h"></i></span>
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
                                                Untuk kelas yang sudah live, Anda tidak diizinkan untuk melakukan perubahan. Jika Anda ingin mengubah detilnya, kelas Anda harus menjadi draft kembali
                                            </li>
                                        </ol>
                                    </div>
                                </div><!-- published -->
                                <div role="tabpanel" class="tab-pane " id="pending-pub">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <td>ID</td>
                                                    <td>Nama Kelas</td>
                                                    <td>Action</td>
                                                    <td>Go to web</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Java Programming - Basic</td>
                                                    <td class="status">
                                                        <a href="#" class="publish icon-circle" title="Request publish"><i class="fa fa-upload"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Java Programming - Advance</td>
                                                    <td class="status">
                                                        <span class="pending icon-circle" title="Pending Unpublish"><i class="fa fa-ellipsis-h"></i></span>
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
                                                Untuk kelas yang sudah live, Anda tidak diizinkan untuk melakukan perubahan. Jika Anda ingin mengubah detilnya, kelas Anda harus menjadi draft kembali
                                            </li>
                                        </ol>
                                    </div>
                                </div><!-- pending publish -->
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
