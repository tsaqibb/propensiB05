<div class="container content kelas vendor">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="block-title-gallery text-center">Galeri Kelas</h3>
        </div>
    </div>
    <div class="row">
<?php
    foreach ($list_kelas as $kelas) :
?>
    <div class="col-sm-4">
        <div class="content-grid">
        <a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>">
            <div class="grid-top" style="background-image: url(../images/class/<?php if(!empty($kelas->gambar)) { echo $kelas->gambar; } else { echo 'image_300x300.gif'; }?>)">
                <div class="grid-title-wrap" style="width: 100%">
                    <h3 class="grid-title"><?php echo $kelas->nama; ?></h3>
                </div><!-- grid-title-wrap -->
            </div><!-- grid-top -->  
        </a>
            <div class="grid-bottom">
            <span class="price">Rp <?php echo $kelas->harga; ?>,-/sesi</span>
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
                        <?php
                            $guru = $kelas->teacher->get();
                            echo character_limiter($guru->nama, 25);
                        ?>
                    </a>
                <!-- <div class="rating-right">
                    <div class="icon tag"><i class="fa fa-star"></i></div>
                        <b>0</b> (0 review)
                    </div> -->
                </div>
            </div><!-- grid-bottom -->
        </div><!-- content-grid -->
    </div><!-- col-sm-4 -->
<?php
    endforeach;
?>
    </div><!--row-->
</div> <!-- /container -->