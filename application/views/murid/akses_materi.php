<div class="container-fluid content kelas vendor">
    <div class="row">
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

                <?php if($open_materi->tipe == 'mp4') : ?>
                <div class="space-video">
                  <video class="videoplayer" controls>                  
                    <source src="<?php echo base_url().$open_materi->url;?>" type="video/mp4">         
                  </video>                             
                </div>           
                <?php elseif($open_materi->tipe == 'pdf') : ?>
                         
                <div class="space-pdf">
                  <object data="<?php echo base_url().$open_materi->url;?>" type="application/pdf" class="pdfviewer">
                  </object>
                </div>
                <?php endif; ?>
            </div>              
                      
          </div> 
          
          <div class="notes"> 
            <div class="panel panel-warning">
                <div class="panel-heading">
                 <h4 class="text-center"><i class="fa fa-info-circle"></i> Catatan </h4>
                </div>
                <div class="panel-body">
                   <?php echo $open_materi->notes;?>
                </div>
            </div>
          </div>           
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="group-materi"> 
              <h3> &nbsp;Daftar Materi  </h3>
              <ul class="list-group">
                <?php
                  $list_materi = $topik->resource->get();
                  foreach ($list_materi as $materi) : 
                ?>
                  <li class="list-group-item">
                    <span class="badge"> <?php echo $materi->tipe?></span>
                      <a href="<?php echo base_url().'kelas/aksesmateri/'.$materi->id; ?>">                                               
                        <p class-"text-uppercase"> <?php echo $materi->judul; ?></p>
                      </a>
                  </li>
                <?php
                  endforeach;
                ?>
              </ul>
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