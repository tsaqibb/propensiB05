<script>
  function toggle(source) {
    checkboxes = document.getElementsByTagName('input');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
  }
</script>

<script type=text/javascript>
  function konfirmasi()
    {
      var r=confirm("Apakah Anda yakin ingin menonaktifkan murid tersebut?");
      if (r==true){
        alert("Deactivated berhasil");
      }
      else{
        alert("Deactivated Anda telah dibatalkan");
      }
    }
</script>
<div class="container content kelas vendor">
    <div class="row">
        
        <div class="col-sm-12 col-md-3">
            
            <div class="sidebar">
                <br>
                <h4 class="text-center">Halo, [Nama User]</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#kelas" aria-controls="profil" role="tab" data-toggle="tab"><i class="fa fa-users"></i> Kelas Anda</a>
                    </li>
                    <li role="presentation">
                        <a href="#tambahkelas" aria-controls="tambah-kelas" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Kelas</a>
                    </li>
                </ul>
            </div><!-- sidebar -->
        
        </div>
        
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-default">
                <h2 class="block-title text-uppercase"><?php echo $data_kelas->nama; ?><a href="<?php echo base_url();?>daftar" class=" fa fa-user btn btn-default main-button register3"> DAFTAR</a></h2>
                <div class="panel-body">
                    <div role="tabpanel" class="sub-content">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#detil" aria-controls="detil" role="tab" data-toggle="tab" aria-expanded="true" >Detail</a>
                            </li>
                            <li role="presentation">
                                <a href="#materi" aria-controls="materi" role="tab" data-toggle="tab">Materi</a>
                            </li>
                            <li role="presentation">
                                <a href="#review" aria-controls="review" role="tab" data-toggle="tab">Review</a>
                            </li>
                            <li role="presentation">
                                <a href="#partisipan" aria-controls="partisipan" role="tab" data-toggle="tab">Murid</a>
                            </li>
                            <li role="presentation">
                                <a href="#feedback" aria-controls="feedback" role="tab" data-toggle="tab">Feedback</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                        <!--detil kelas-->
                            <div role="tabpanel" class="tab-pane active" id="detil">
                                <h5 class="title-label">Deskripsi</h5>
                                <p>
                                <?php echo $data_kelas->deskripsi; ?>
                                </p>
                                <h5 class="title-label">Harga</h5>
                                <p>Rp <?php echo $data_kelas->harga; ?>,00</p>
                                <h5 class="title-label">Tag</h5>
                                <br>
                                <i class="tag">#MTK</i>
                                <i class="tag">#IPA</i>
                                <i class="tag">#SMA</i>
                                <i class="tag">#aljabar</i>
                                <i class="tag">#trigonometri</i>
                                <br><br>
                                <h5 class="title-label">Guru</h5><br>
                                <?php 
                                echo $data_kelas->teacher->nama; ?>
                            </div><!-- detil-kelas -->

                            <!-- start Tab Materi -->
                           <div role="tabpanel" class="tab-pane tab-panemateri" id="materi">
                              <div class="panel-group" id="accordion">
                               
                                <?php 
                                $list_topik = $data_topik;
                               
                                foreach ( $list_topik as $topik ):
                                ?>
                                 <div class="panel panel-topik">
                                    <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                        href="#topik<?php echo $topik->id; ?>">
                                        <i class="fa fa-chevron-circle-down"></i>
                                   <?php echo $topik->judul; ?>
                                    </a>
                                    <div id="topik<?php echo $topik->id; ?>" class="panel-collapse collapse">
                                       <div class="panel-body">
                                        <?php  $list_materi = $topik->resource->get();
                                        foreach ($list_materi as $materi) :
                                        ?>
                                          <ul class="list-groups">
                                             <a href="<?php echo base_url();?>murid/aksesmateri/<?php echo $materi->id; ?>">
                                             <li class="list-group-item"> <?php echo $materi->judul; ?></li>
                                             </a>
                                          </ul>
                                        <?php endforeach ?>
                                        
                                       </div>
                                    </div>
                                 </div>

                                 <?php
                                  endforeach;
                                 ?>

                              </div> 
                            </div><!-- end tab materi -->
                            
                            <!-- tab review -->
                            <div role="tabpanel" class="tab-pane" id="review">
                              Bagian ini akan menjelaskan review dari kelas
                            </div><!-- end tab review -->
                            
                            <!--tab partisipan-->
                            <div role="tabpanel" class="tab-pane" id="partisipan">
                              <div class="tab-content">
                                <div class ="row"><h3 class="block-title text-uppercase">Daftar Murid</h3><a href="#" type="button" class="main-button register2" onclick="konfirmasi()">Deactivate all</a></div>
                                <?php foreach ($list_partisipan as $daftar) :
                                  $student = $daftar->student->get();
                                ?>
                                  <div class="actived-partisipan">
                                  <div class="row">
                                    <div class="nama"><?php echo $student->nama; ?>
                                    <br><a href=""><span><?php echo $daftar->student_id; ?></span></a>
                                        <a class ="matkul" href=""><?php echo $student->e_mail; ?></a>
                                    </div>
                                    <span>
                                        <a href="#" onclick="konfirmasi()" class="approve icon-button"><i class="fa fa-check"></i>Deactivate</a>
                                    </span>

                                    <img src="<?php echo base_url();?>images/user.png" class="img-circle" alt="Circular Image">
                                  </div>
                                  </div>
                                <?php endforeach; ?>
                              </div> 
                            </div><!-- tab-partisipan -->
                            
                            <!-- tab feedback -->
                            <div role="tabpanel" class="tab-pane" id="feedback">
                                <div class="panel-body-feedback">
                                    <div class="chat">
                                        
                                        <div class="feedback-package">
                                            <div class="left clearfix">
                                                <div class="panel-feedback clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font">Admin</strong> <small class="pull-right text-muted">
                                                            <span class="fa fa-clock-o"></span>17 mins ago</small>
                                                    </div>
                                                    <span class="chat-img pull-left">
                                                        <i class="admin-circle"></i>
                                                    </span>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                        dolor, quis ullamcorper ligula sodales.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right clearfix">
                                                <div class="panel-tanggapan clearfix">
                                                    <div class="header">
                                                        <small class=" text-muted"><span class="fa fa-clock-o"></span>16 mins ago</small>
                                                        <strong class="pull-right primary-font">Dev Patel</strong>
                                                    </div>
                                                    <span class="chat-img pull-right">
                                                        <i class="guru-circle"></i>
                                                    </span>
                                                    <p class="isi-tanggapan">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                        dolor, quis ullamcorper ligula sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                        dolor, quis.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <br> <!--feedback package -->

                                        <div class="feedback-package">
                                            <div class="left clearfix">
                                                <div class="panel-feedback clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font">Admin</strong> <small class="pull-right text-muted">
                                                            <span class="fa fa-clock-o"></span>12 mins ago</small>
                                                    </div>
                                                    <span class="chat-img pull-left">
                                                        <i class="admin-circle"></i>
                                                    </span>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                        dolor, quis ullamcorper ligula sodales.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right clearfix">
                                                <div class="panel-tanggapan clearfix">
                                                    <div class="header">
                                                        <small class=" text-muted"><span class="fa fa-clock-o"></span>11 mins ago</small>
                                                        <strong class="pull-right primary-font">Dev Patel</strong>
                                                    </div>
                                                    <span class="chat-img pull-right">
                                                        <i class="guru-circle"></i>
                                                    </span>
                                                    <p class="isi-tanggapan">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                        dolor, quis ullamcorper ligula sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                        dolor, quis ullamcorper ligula sodales.
                                                    </p>
                                                </div>
                                            </div>
                                        </div> <!-- feedback package-->
                                        
                                        <br>
                                            <div class="feedback-package">
                                            <div class="left clearfix">
                                                <div class="panel-feedback clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font">Admin</strong> <small class="pull-right text-muted">
                                                            <span class="fa fa-clock-o"></span>10 mins ago</small>
                                                    </div>
                                                    <span class="chat-img pull-left">
                                                        <i class="admin-circle"></i>
                                                    </span>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                        dolor, quis ullamcorper ligula sodales.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <div class="input-group">
                                                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Berikan pesan Anda di sini...">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary btn-sm" id="btn-chat">
                                                            Kirim</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- tab-feedback -->
                        </div><!-- tab-content -->
                    </div><!-- tabpanel kelas -->
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div> <!-- col -->
    </div> <!-- row -->
</div> <!-- /container -->