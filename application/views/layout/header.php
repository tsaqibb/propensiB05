<?php require_once APPPATH.'third_party/datamapper/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Online Ruangguru</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.fancybox.css" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-tagsinput.css" type="text/css">
        <script type="application/javascript" src="<?php echo base_url();?>js/jquery-2.1.1.min.js"></script>
        <script type="application/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        <script type="application/javascript" src="<?php echo base_url();?>js/bootstrap-tagsinput.min.js"></script>
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/jquery.fancybox.pack.js"></script>
        <script src="<?php echo base_url();?>js/jquery.fancybox-media.js"></script>        
        <script src="<?php echo base_url();?>js/jquery.fancybox.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        








    </head>
    <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <a class="navbar-brand visible-xs" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo-kelas-2.png" height="60"></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand hidden-xs" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo-kelas-2.png" height="60"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <button data-target=".navbar-collapse" data-toggle="collapse" class="close-toggle visible-xs" type="button">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <ul class="nav navbar-nav navbar-left">
                            <li class="active"><a href="<?php echo base_url();?>">Kelas Online</a></li>
                            <li><a href="http://www.ruangguru.com/cari_guru">Privat</a></li>
                            <li><a href="http://www.kelas.ruangguru.com">Kelas Berkelompok</a></li>
                            <li><a href="http://www.ruangguru.com/faq">FAQ</a></li>
                            <li><a href="http://www.ruangguru.com/kontak-kami">Kontak</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="user-login">
                                Halo, <a href="#">
                                    Nama User</a>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </nav>