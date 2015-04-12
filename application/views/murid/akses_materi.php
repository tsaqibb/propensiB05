<div class="container content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="profile-name text-center">Hello Gama</h4>
              

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                                        <li >
                        <a href="<?php echo base_url();?>murid/galerikelas"><i class="fa fa-list"></i> Galeri Kelas</a>
                    </li>
                    <li class="active">
                        <a href=""><i class="fa fa-users"></i> Kelas Anda</a>
                    </li>
                </ul>
            </div><!-- sidebar -->



            <div class="group-materi">
                <h3> &nbsp;Daftar Materi </h3>
                <ul class="list-group">
                    <li class="list-group-item"><span class="badge"> pdf</span><a href=""> Persamaan garis lurus </a></li>
                    <li class="list-group-item"><span class="badge"> video</span><a href=""> Fungsi Kuadrat </a></li>  
                    <li class="list-group-item"><span class="badge">video</span><a href=""> Matriks </a></li>
                    <li class="list-group-item"><span class="badge"> pdf</span> <a href="">Integral </a></li>
                    <li class="list-group-item"><span class="badge"> video</span> <a href=""> Lingkaran </a></li>  
                    <li class="list-group-item"><span class="badge">video</span> <a href="">Trigonometri </a></li>
                </ul>
            </div>
        </div>

        <div class="col-sm-12 col-md-9">
            <div class="panel panel-default panel-content">
                 <div class="panel heading-materi">                                  
                    <div class="bredcrumbs">
                      <ul>
                        <li>  Now, You are in : </li>
                        <li>  <a href="#"> Nama Kelas &nbsp;</a> </i>  </li>
                        <li> <i class="fa fa-hand-o-right"></i> &nbsp;</li>
                        <li>  <a href="#">Topik &nbsp; </a> </li>
                        <li> <i class="fa fa-hand-o-right"></i> &nbsp;</li>
                        <li>  Nama Materi &nbsp;</li>
                      </ul>
                    </div>
              </div>      
            
            <div class="panel content-video">
              <div class="space-video">
                <video class="videoplayer" controls>                  
                  <source src="<?php echo base_url(); ?>/video1.mp4" type="video/mp4">         
                </video>
              </div>
            </div>
        </div>
               
            </div>
        </div>
    </div>
</div> <!-- /container -->
    
   
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
    jQuery(document).ready(function($){
        $('.icon-circle').tooltip();
    });
    </script>
 
