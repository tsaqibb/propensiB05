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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'.'?>/css/jquery.fancybox.css" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-tagsinput.css" type="text/css">

        <!-- Javascript -->
        <script type="application/javascript" src="<?php echo base_url();?>js/jquery-2.1.1.min.js"></script>
        <script type="application/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        <script type="application/javascript" src="<?php echo base_url();?>js/bootstrap-tagsinput.min.js"></script>

        <script src="<?php echo base_url();?>js/jquery.fancybox.pack.js"></script>
  
        <script type="application/javascript" src="<?php echo base_url()?>js/utility.js"></script>

        <!--Add Fancybox -->
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.fancybox-media.js"></script>
        <script type="application/javascript">
        var sTO = null;
        $(document).ready(function() {
            if($('.notification').is('.on')) {
                var timeout = $('.notification > div').is('.error')?
                        30000:$('.notification > div').is('.warning')?20000:10000;
                sTO = setTimeout('removeNotification()', timeout);
            }
            $('.close-notif').click(function(e){
                e.preventDefault();
                clearTimeout(sTO);
                removeNotification();
            });
        });
        </script>

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">



       <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
       <script src="<?php echo base_url();?>js/bootstrap.min.js"></script> 
        -->
    </head>
    <body>
        <?php
$notice = strlen($this->session->flashdata('status.error'))?'error':
        (strlen($this->session->flashdata('status.warning'))?'warning':
                (strlen($this->session->flashdata('status.notice'))?'notice':''));
?>
        <div class="notification <?php echo !empty($notice)?'on':'';
        echo $this->session->flashdata('status.large')=='TRUE'?' large':''; ?>">
            <div class="<?php echo $notice;?>">
                <div class="message">
                    <div class="row">
                        <div class="col-sm-7 col-sm-offset-2 col-xs-12">
                            <strong id="notification-title">
                                <?php echo ucfirst($notice) ;?>
                            </strong>
                            <span id="notification-message">
                                <?php echo $this->session->flashdata('status.'.$notice)?>
                            </span>
                            <span class="pull-right visible-xs-block close-notif">
                                <i class="fa fa-close"></i> Close
                            </span>
                        </div>
                        <div class="col-sm-1 hidden-xs close-notif" style="text-align: right">
                            <i class="fa fa-close"></i> Close
                        </div>
                        <div class="col-sm-offset-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<?php
    if($this->session->userdata('is_logged_in') == FALSE) : // Not logged in
?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown sign-in">
                            <a href="#" class="dropdown-toggle btn-blue" data-toggle="dropdown" role="button" aria-expanded="false">Masuk</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a class="fancybox" href="#login_murid">sbg Murid</a>
                                </li>
                                <li>
                                    <a class="fancybox" href="#login_guru">sbg Guru</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown register">
                            <a href="#" class="dropdown-toggle btn-orange" data-toggle="dropdown" role="button" aria-expanded="false">Daftar</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="ruangguru.com/murid/registrasi">sbg Murid</a>
                                </li>
                                <li>
                                    <a href="ruangguru.com/guru/reg_guru">sbg Guru</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
<!-- Fancy Log -->
            <div id="login_murid" style="width:400px;display: none;">
                <p class="text-14 bold">Masuk sebagai Murid</p>
                <form id="login_form_murid" name="login_form_murid" method="post" action="<?php echo base_url();?>user/login_submit/murid">
                    <p>
                        <label for="login_name">Masuk: </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="emailanda@email.com" />
                    </p>
                    <p>
                        <label for="login_pass">Password: </label>
                        <input type="password" class="form-control" id="password" name="password" />
                        <a class="normal-link" href="ruangguru.com/murid/reset_password">Lupa Password?</a>
                    </p>
                    <p>
                        <button type="submit" class="btn btn-success btn-lg">Masuk</button>
                    </p>
                </form>
            </div>
            <div id="login_guru" style="width:400px;display: none;">
                <p class="text-14 bold">Masuk sebagai Guru</p>
                <form id="login_form_murid" name="login_form_murid" method="post" action="<?php echo base_url();?>user/login_submit/guru">
                    <p>
                        <label for="login_name">Masuk: </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="emailanda@email.com" />
                    </p>
                    <p>
                        <label for="login_pass">Password: </label>
                        <input type="password" class="form-control" id="password" name="password" />
                        <a class="normal-link" href="ruangguru.com/guru/reset_password">Lupa Password?</a>
                    </p>
                    <p>
                        <button type="submit" class="btn btn-success btn-lg">Masuk</button>
                    </p>
                </form>
            </div>
<?php
    else: // logged in
        switch($this->session->userdata('user_type')):
            case        'guru':
                $profile = base_url().'profile';
                break;
            case        'murid':
                $profile = base_url().'murid';
                break;
            case        'admin':
                $profile = base_url().'admin';
                break;
        endswitch;
        $logout = base_url().'user/logout';
?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="user-login">
                            Halo, <a href="<?php echo $profile?>">
                                <?php echo $this->session->userdata('user_name');?>
                            </a>
                        </li>
                        <li class="sign-out">
                            <a href="<?php echo $logout;?>">Logout</a>
                        </li>
                    </ul>
<?php
    endif;
?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </nav>