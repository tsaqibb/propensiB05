<div class="container content kelas vendor">
    <div class="row">
<?php
    //var_dump($kelas); exit;
    $this->load->helper('text');
    foreach ($list_kelas as $kelas) :
?>
        <div class="col-sm-4">
            <div class="content-grid">
                <a href="#kelas/ddp">
                    <div class="grid-top">
                        <div class="rating">
                            <div class="icon tag">
                                <i class="fa fa-star blue"></i>
                                <i class="fa fa-star blue"></i>
                                <i class="fa fa-star blue"></i>
                                <i class="fa fa-star blue"></i>
                                <i class="fa fa-star blue"></i>
                            </div>
                        </div><!-- rating -->
                        <div class="grid-title-wrap" style="width: 100%">
                            <h3 class="grid-title"><?php echo $kelas->nama; ?></h3>
                        </div><!-- grid-title-wrap -->
                    </div><!-- grid-top -->  
                </a>
                <div class="grid-bottom">
                    <span class="price">Rp <?php echo $kelas->harga; ?>,-</span>
                    <a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>">
                        <span class="details">Details</span>
                    </a>
                    <div class="description">
                        <div class="description-icon icon"><i class="fa fa-question-circle"></i></div>
                        <span class="desc">
                            <?php echo character_limiter($kelas->deskripsi, 150); ?>
                        </span>
                    </div><!-- description -->
                    <div class="nama-guru" data-toggle="tooltip" data-placement="right"
                      title="<?php echo $kelas->teacher->nama?>" data-original-title="<?php echo $kelas->teacher->nama?>">
                        <div class="icon tag"><i class="fa fa-user fa-2"></i></div>
                        <a href="#">
                            <?php echo character_limiter($kelas->teacher->nama, 25); ?>
                        </a>
                    </div>
                </div><!-- grid-bottom -->
            </div><!-- content-grid -->
        </div><!-- col-sm-4 -->
<?php
    endforeach;
?>
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
  </body>
</html>
