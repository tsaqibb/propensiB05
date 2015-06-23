<script type="text/javascript">
  <?php
      $class_tags = $data_kelas->classes_tag->get();
      $tags = array();
      foreach ($class_tags as $class_tag ) :
        $tag = $class_tag->tag->get(); ?>    
  $('#class_tags').tagsinput('add',
      "<?php echo $tag->subjek; ?>");
  <?php endforeach; ?>
    
</script>
<div class="container content guru">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="text-center"><?php echo $this->session->userdata('user_name') ?></h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="<?php echo base_url();?>guru/kelas"><i class="fa fa-users"></i> Kelas Anda</a>
                    </li>
                    <li role="presentation">
                        <a href="<?php echo base_url();?>guru/tambahkelas"><i class="fa fa-plus"></i> Tambah Kelas</a>
                    </li>
                </ul>
            </div><!-- sidebar -->
        </div>  
        <div class="col-md-9 col-sm-12 kelas">
            <div class="panel panel-default">
                <h2 class="block-title text-uppercase"><?php echo $data_kelas->nama; ?></h2>
                <span class="info">Status:
                <?php if($data_kelas->status_kelas == 0) : ?>
                    <b class="rejected"> Draft</b>
                <?php elseif($data_kelas->status_kelas == 1) : ?>
                    <b class="pending"> Pending Publish</b>
                <?php elseif($data_kelas->status_kelas == 2) : ?>
                    <b class="publish"> Published</b>
                <?php elseif($data_kelas->status_kelas == 3) : ?>
                    <b class="publish"> Pending Unpublish</b>
                <?php endif; ?>
                </span>
                <!-- Detil Kelas -->
                <div class="section-row">Detil Kelas</div>
                <div class="sub-content" id="detil-kelas">
                  <form class="form-horizontal" method="post" action="<?php echo base_url();?>guru/update_kelas/<?php echo $data_kelas->id; ?>">
                    <div class="form-group">
                      <label for="Namakelas" class="col-sm-4 control-label">Nama Kelas</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama dari kelas yang akan diselenggarakan"
                            value="<?php echo $data_kelas->nama; ?>" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Deskripsi Kelas</label>
                      <div class="col-sm-8">
                        <textarea id="deskripsi_kelas" name="deskripsi_kelas" class="form-control txt_message" placeholder="Jelaskan secara singkat materi apa saja yang akan dijelaskan" rows="3" required="required">
                          <?php echo $data_kelas->deskripsi; ?>
                        </textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Harga</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan angka saja, mis: 50000. 0 jika kelas gratis"
                            value="<?php echo $data_kelas->harga; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Foto</label>
                      <div class="col-sm-8">
                        <?php if(!empty($data_kelas->gambar)) echo "<img src='".base_url().$data_kelas->gambar."' class='img-responsive'>"?>
                        <input type="file" name="myFile" id="myFile" multiple size="50">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="attachment" class="col-sm-4 control-label">Tags</label>
                      <div class="col-sm-8">
                        <input id="class_tags" name="class_tags" type="text" class="form-control" 
                          value="<?php
                            $class_tags = $data_kelas->classes_tag->get();
                            $tags = array();
                            foreach ($class_tags as $class_tag ) {
                              $tag = $class_tag->tag->get();
                              echo $tag->subjek.',';
                            }?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-4"></div>
                      <div class="col-md-8 right">
                        <button class="btn btn-default-orange save" role="submit">
                          <i class="fa fa-floppy-o"></i>
                          Save 
                        </button>
                        <?php if($data_kelas->status_kelas == 0) : ?>
                          <div><a class="btn btn-default-blue" href="<?php echo base_url().'kelas/request/'.$data_kelas->id; ?>">
                            <i class="fa fa-upload"></i>Request to Publish</a>
                          </div>
                        <?php elseif($data_kelas->status_kelas ==2) : ?>
                          <div><a class="btn btn-default-blue" href="<?php echo base_url().'kelas/request/'.$data_kelas->id; ?>">
                            <i class="fa fa-exclamation-triangle"></i>Request to Unpublish</a>
                          </div>
                        <?php elseif($data_kelas->status_kelas ==1) : ?>
                          <div class="btn btn-default-blue">
                            <i class="fa fa-exclamation-triangle"></i>Pending Publish
                          </div>
                        <?php elseif($data_kelas->status_kelas ==3) : ?>
                          <div class="btn btn-default-blue">
                            <i class="fa fa-exclamation-triangle"></i>Pending Unpublish
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </form>
                </div><!-- end detil Kelas -->

                <h4 class="section-row" id="materi">Materi</h4>
                <div class="sub-content tab-panemateri" id="materi">
                  <div class="panel-group" id="accordion">
                      <form id="create-topik" method="POST" action="<?php echo base_url();?>kelas/create_topik/<?php echo $data_kelas->id;?>">                                 
                        <div class="row">
                          <div class="col-md-6">
                          </div>                                  
                          <div class="col-md-4">
                            <input class="form-control form-topik" required="" name="judul_topik" type="text" id="judul_topik" placeholder="Tuliskan nama topik disini" pattern="[a-zA-Z0-9\s]+" >
                          </div>
                          <div class="col-md-2">      
                            <button role="submit" class="btn btn-primary btn-topik" id="button1" onclick="spaceFunction()"><i class="fa fa-pencil-square-o"></i>Buat Topik</button>
                          </div>                                  
                        </div>                             
                      </form>                               
                    <br/>

                    <div class="panel panel-orange">
                       <?php 
                            $list_topik = $data_topik;                               
                              foreach ($list_topik as $topik):
                              ?>
                        <div class="panel-judul-topik">
                          <div class="row">   
                            <div class="col-md-10">                                         
                              <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                              href="#<?php echo $topik->id; ?>"><i class="fa fa-chevron-circle-down"></i>
                                 <?php echo $topik->judul;?> </a> 
                            </div>
                            <div class="col-md-2 right">
                                  <a href="<?php echo base_url();?>kelas/delete_topik/<?php echo $topik->id;?>" class="btn-delete-topik" >
                                    
                                   <span class="cancel icon-circle" style="margin-top:3px; margin-left:50px;" title="Hapus Topik"><i class="fa fa-trash-o"></i></span>                                      
                               </a>
                            </div>
                          </div>
                        </div>

                          <div id="<?php echo $topik->id;?>" class="panel-collapse collapse">
                           <div class="panel-body">
                            <?php  $list_materi = $topik->resource->get();
                            foreach ($list_materi as $materi) :
                            ?>
                              <ul class="list-groups"> 
                                <div class="col-md-8">                                
                                  <a href="<?php echo base_url();?>kelas/aksesmateri/<?php echo $materi->id; ?>">
                                 <li class="list-group-item"> <?php echo $materi->judul; ?></li>
                                 </a>
                                </div>
                                <div class="col-md-3 ">
                                  <a href="<?php echo base_url();?>kelas/delete_materi/<?php echo $materi->id;?>" class="btn-delete-materi" > 
                                     <i class="fa fa-trash fa-5" style="margin-top:10px; margin-left:5px;" title="hapus materi"></i>
                                  </a>
                                </div>
                              </ul>
                            <?php endforeach;?>
                              <ul class="list-groups">
                                  <a href="#inline<?php echo $topik->id; ?>" class="fancybox">
                                 <button role="submit" class="btn btn-default" id="button1" style="margin-left:14px; margin-top:5px;" onclick="">Tambah Materi</button>
                                 </a>
                              </ul>
                              <div id="inline<?php echo $topik->id; ?>" style="width:400px; display: none;">
                                <div class="panel">
                                  <h2 class="text-14 bold text-center block-title text-uppercase"> <?php echo $topik->judul;?> </h2>
                                </div>
                                    <form id="upload-materi" action="<?php echo base_url();?>kelas/create_materi/<?php echo $topik->id;?>" method="POST" enctype="multipart/form-data">
                                    <p>
                                    <label for="nama-materi">Nama Materi </label>
                                      <input type="text" required="" autofocus="" class="form-control" id="namamateri" name="namamateri" placeholder="Tuliskan Judul Materi disini" pattern="[a-zA-Z0-9\s]+" />
                                    </p>
                                    <p>
                                    <label for="note-materi">Note Materi </label>
                                      <input type="text" required="" class="form-control" id="notemateri" name="notemateri" placeholder="Tuliskan note untuk materi ini" pattern="[a-zA-Z0-9\s]+"/>
                                    </p>
                            
                                <input type="file" required="" name="myFile" id="myFile" multiple size="50">
                                <br>                                                        
                                <button type="submit" role="submit" id="submit" name="submit" class="btn btn-warning">Simpan</button>
                                </form>
                                <br>
                                <p class="text-warning"> * Format file yang diizinkan hanya mp4 dan pdf ! </p> 
                                <p class="text-warning"> * Untuk penamaan file tidak boleh menggunakan spasi !  </p>
                              </div>
                            </div>
                          </div>
                          <br/>
                            <?php endforeach;?>
                    </div>
                  </div>
                </div> <!-- end tab panel materi -->
            </div><!-- panel -->
        </div>        
    </div>
</div> <!-- /container -->

<script type=text/javascript>
    $('.btn-delete-materi').click(function(){
        return confirm("Are you sure want to delete materi?");
    });

    $('.btn-delete-topik').click(function(){
        return confirm("Are you sure want to delete topik?");
    });


    function spaceFunction(){
      if(judul_topik.trim() === " " || judul_topik === null ){
        alert("isi menggunakan alphabet");
        return false;
      }
    }

</script>