<div class="container-fluid content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="profile-name text-center">Nama User</h4>
              

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
                <h3> &nbsp;Daftar Materi  </h3>
                 <?php
                    $list_materi = $topik->resource->get();
                    foreach ($list_materi as $materi) : 
                    ?>

                <ul class="list-group">
                   
                    <li class="list-group-item"><span class="badge"> <?php echo $materi->tipe?></span><a href="<?php echo base_url().'murid/aksesmateri/'.$materi->id; ?>"> <?php echo $materi->judul; ?> </a></li>

                   <?php
                     endforeach;
                    ?>
                </ul>
            </div>
        </div>

        <div class="col-sm-12 col-md-9">
            <div class="panel panel-default panel-content">
                 <div class="panel heading-materi">                                  
                    <div class="bredcrumbs">
                      <ul>
                        <li>  Now, You are in : </li>
                        <li>  <a href="<?php echo base_url();?>kelas/detail/<?php echo $kelas->id;?>"> <?php echo $kelas->nama;?> &nbsp;</a> </i>  </li>
                        <li> <i class="fa fa-hand-o-right"></i> &nbsp;</li>
                        <li>  <?php echo $topik->judul;?> &nbsp;  </li>
                        <li> <i class="fa fa-hand-o-right"></i> &nbsp;</li>
                        <li>  <?php echo $open_materi->judul; ?> &nbsp;</li>
                      </ul>
                    </div>
              </div>      
            
            <div class="panel content-video">

                <?php if($materi->tipe == 'mp4') : ?>
                <div class="space-video">
                 <video class="videoplayer" controls>                  
                  <source src="<?php echo base_url().$open_materi->url; ?>" type="video/mp4">         
                </video>                             
              </div>           
          <?php elseif($materi->tipe == 'pdf') : ?>
                         
              <div class="space-pdf">
                  <object data="<?php echo base_url().$open_materi->url; ?>" type="application/pdf" class="pdfviewer">
                  </object>
              </div>
         <?php endif; ?>
              
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
 
