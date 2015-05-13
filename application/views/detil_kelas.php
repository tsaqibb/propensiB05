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
      if (r){
        alert("Deactivated berhasil");
      }
      else{
        alert("Deactivated Anda telah dibatalkan");
        return false;
      }
    }
</script>
<?php
    $type_user = $this->session->userdata('user_type');
    $id_kelas=$this->session->userdata('course_id');
    $id_murid=$this->session->userdata('user_id');
    $registered = false;
    
    if($type_user == "murid"){
        foreach ($partisipan_all as $partisipan):
            /*$student = $partisipan->student->get();
            $id_student = $partisipan->get_by_id($studen);*/
            if($id_murid == $partisipan->student_id):
                $registered=true;
                break;
            endif;
        endforeach;
    }
    elseif($type_user == "admin") {
        $registered =true;
    }
?>
<div class="container content kelas">
    <div class="row">
        <div class="col-md-8">
            <h2 class="entry-title"><?php echo $data_kelas->nama; ?></h2>
            <div class="add-info">
                <span class="info-label text-uppercase">Tag :
                    <?php
                        $list_classes_tag = $data_kelas->classes_tag->get();
                        foreach ($list_classes_tag as $classes_tag) :
                            $tag = $classes_tag->tag->get();
                        ?>
                            <a class="#<php echo $tag->subjek; ?>">
                                <?php echo $tag->subjek; ?>
                            </a>&nbsp;
                    <?php endforeach; ?>
                </span>
            </div><!-- add-info -->
        </div>
        <div class="col-md-8">
            <div class="hero-detail">
                <div class="img-wrap">
                    <img src="<?php echo base_url(); ?>images/image_300x300.gif" alt="Class Logo" class="img-responsive">
                </div>
            </div>
            <div role="tabpanel" class="sub-content detail-kelas">
                <div class="" id="description">
                    <h5 class="title-label">Deskripsi</h5>
                    <p>
                    <?php echo $data_kelas->deskripsi; ?>
                    </p>
                </div><!-- detil-kelas -->

                <!-- start Tab Materi -->
                <div class="tab-panemateri" id="materi">
                  <h5 class="title-label">Kurikulum</h5>
                  <div class="panel-group" id="accordion">
                    <?php 
                    $list_topik = $data_topik;
                    foreach ( $list_topik as $topik ):
                    ?>
                     <div class="panel panel-orange">
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
                                 <?php if($registered) : ?>
                                     <a href="<?php echo base_url();?>murid/aksesmateri/<?php echo $materi->id; ?>">
                                        <li class="list-group-item"> <?php echo $materi->judul; ?></li>
                                     </a>
                                 <?php else : ?>
                                     <span>
                                        <li class="list-group-item"> <?php echo $materi->judul; ?></li>
                                     </span>
                                 <?php endif; ?>
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
                    
                <!--tab partisipan-->
                <div id="partisipan">
                  <div class="tab-content">
                    <h5 class="title-label">Daftar Murid</h5>
                    <br>
                    <?php
                  $type_user = $this->session->userdata('user_type');
                    if ($type_user == "admin"):?>
                    <a href="<?php echo base_url()."kelas/setAllNonActive/"; ?>" type="button" class="main-button register2" >Deactivate all</a>
               <?php endif; ?> 
                    </div>
                    <?php foreach ($list_partisipan as $daftar) :
                        $student = $daftar->student->get();
                    $course= $daftar->course_id; 
                    ?>
                      <div class="actived-partisipan">
                      <div class="row">
                        <div class="nama"><?php echo $student->nama; ?>
                        <br><a href=""><span><?php echo $daftar->student_id; ?></span></a>
                            <a class ="matkul" href=""><?php echo $student->email; ?></a>
                        </div>
                         <span>
                        <?php
                        $type_user = $this->session->userdata('user_type');
                    if ($type_user == "admin"):?>
                            <a href="<?php echo base_url()."kelas/setNonActive/".$daftar->student_id."/".$daftar->course_id; ?>" class="approve icon-button"><i class="fa fa-times"></i>Deactivate</a>
                        <?php endif; ?>
                        </span> 
                        <img src="<?php echo base_url();?>images/user.png" class="img-circle" alt="Circular Image">
                      </div>
                      </div>
                    <?php endforeach; ?> 
                </div><!-- tab-partisipan -->
            </div><!-- tabpanel detail-kelas -->
            
            <?php $session_role = $this->session->userdata('user_type'); ?>
            <?php if($session_role == 'guru' || $session_role == 'admin') : ?>
            <div class="sub-content detail-kelas"><!-- tab feedback -->
                <div id="feedback">
                    <h4 class="feedback-title">Feedback</h4>
                    <div class="panel-body-feedback">
                        <div class="chat">
                            <br>
                            <?php foreach ($list_feedback as $feedback) : ?>
                            <div class="feedback-package">
                            <?php if($feedback->role=='0') : ?>
                                <div class="panel-feedback clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Admin</strong>
                                        <small class="pull-right text-muted">
                                            <?php
                                                $time_now = strtotime(date('Y-m-d H:i:s'));
                                                $time_sent = strtotime($feedback->waktu_kirim);
                                                $time_elapsed = ($time_now - $time_sent);                                 
                                                $years = 60*60*24*365;
                                                $months = 60*60*24*30;
                                                $days = 60*60*24;
                                                $hours = 60*60;
                                                $minutes = 60;

                                                if(floor($time_elapsed/$years) > 1)
                                                {
                                                    echo floor($time_elapsed/$years)." years ago";
                                                }
                                                else if(floor($time_elapsed/$years) > 0)
                                                {
                                                    echo floor($time_elapsed/$years)." year ago";
                                                }
                                                else if(floor($time_elapsed/$months) > 1)
                                                {
                                                    echo floor($time_elapsed/$months)." months ago";
                                                }
                                                else if(floor(($time_elapsed/$months)) > 0)
                                                {
                                                    echo floor(($time_elapsed/$months))." month ago";
                                                }
                                                else if(floor(($time_elapsed/$days)) > 1)
                                                {
                                                    echo floor(($time_elapsed/$days))." days ago";
                                                }
                                                else if (floor(($time_elapsed/$days)) > 0) 
                                                {
                                                    echo floor(($time_elapsed/$days))." day ago";
                                                }
                                                else if (floor(($time_elapsed/$hours)) > 1) 
                                                {
                                                    echo floor(($time_elapsed/$hours))." hours ago";
                                                }
                                                else if (floor(($time_elapsed/$hours)) > 0) 
                                                {
                                                    echo floor(($time_elapsed/$hours))." hour ago";
                                                }
                                                else if (floor(($time_elapsed/$minutes)) > 1) 
                                                {
                                                    echo floor(($time_elapsed/$minutes))." minutes ago";
                                                }
                                                else if (floor(($time_elapsed/$minutes)) > 0) 
                                                {
                                                    echo floor(($time_elapsed/$minutes))." minute ago";
                                                }
                                                else if (floor(($time_elapsed)) > 1) 
                                                {
                                                    echo floor(($time_elapsed))." seconds ago";
                                                }else
                                                {
                                                    echo "Few seconds ago";
                                                }
                                            ?>
                                            <span class="fa fa-clock-o"></span>
                                        </small>
                                    </div>
                                    <span class="chat-img pull-left">
                                        <i class="admin-circle"></i>
                                    </span>
                                    <p>
                                        <?php echo $feedback->pesan; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <?php if($feedback->role=='1') : ?>
                                <div class="panel-tanggapan clearfix">
                                    <div class="header">
                                        <span class="fa fa-clock-o"></span>
                                        <small class="text-muted">
                                        <?php
                                            $time_now = strtotime(date('Y-m-d H:i:s'));
                                            $time_sent = strtotime($feedback->waktu_kirim);
                                            $time_elapsed = ($time_now - $time_sent);                                 
                                            $years = 60*60*24*365;
                                            $months = 60*60*24*30;
                                            $days = 60*60*24;
                                            $hours = 60*60;
                                            $minutes = 60;

                                            if(floor($time_elapsed/$years) > 1)
                                            {
                                                echo floor($time_elapsed/$years)." years ago";
                                            }
                                            else if(floor($time_elapsed/$years) > 0)
                                            {
                                                echo floor($time_elapsed/$years)." year ago";
                                            }
                                            else if(floor($time_elapsed/$months) > 1)
                                            {
                                                echo floor($time_elapsed/$months)." months ago";
                                            }
                                            else if(floor(($time_elapsed/$months)) > 0)
                                            {
                                                echo floor(($time_elapsed/$months))." month ago";
                                            }
                                            else if(floor(($time_elapsed/$days)) > 1)
                                            {
                                                echo floor(($time_elapsed/$days))." days ago";
                                            }
                                            else if (floor(($time_elapsed/$days)) > 0) 
                                            {
                                                echo floor(($time_elapsed/$days))." day ago";
                                            }
                                            else if (floor(($time_elapsed/$hours)) > 1) 
                                            {
                                                echo floor(($time_elapsed/$hours))." hours ago";
                                            }
                                            else if (floor(($time_elapsed/$hours)) > 0) 
                                            {
                                                echo floor(($time_elapsed/$hours))." hour ago";
                                            }
                                            else if (floor(($time_elapsed/$minutes)) > 1) 
                                            {
                                                echo floor(($time_elapsed/$minutes))." minutes ago";
                                            }
                                            else if (floor(($time_elapsed/$minutes)) > 0) 
                                            {
                                                echo floor(($time_elapsed/$minutes))." minute ago";
                                            }
                                            else if (floor(($time_elapsed)) > 1) 
                                            {
                                                echo floor(($time_elapsed))." seconds ago";
                                            }else
                                            {
                                                echo "Few seconds ago";
                                            }
                                        ?>
                                        
                                        </small>
                                        <strong class="pull-right primary-font"> <span> <?php echo $data_kelas->teacher->get()->nama; ?> </span> </strong>
                                    </div>
                                    <span class="chat-img pull-right">
                                        <i class="guru-circle"></i>
                                    </span>
                                    <p class="isi-tanggapan">
                                        <?php echo $feedback->pesan; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            </div> <!--feedback package -->                            
                            <?php endforeach; ?>
                        </div>
                        <div class="panel-footer">
                            <div class="container-fluid">
                                <form class="form-horizontal input-group" method="post" action="<?php echo base_url(); ?>kelas/add_feedback/<?php echo $data_kelas->id; ?>">
                                    <input name ="pesan" id="pesan" type="text" class="form-control" required placeholder="Berikan pesan Anda di sini...">
                                    <span class="input-group-btn">
                                        <button role="submit" class="btn btn-primary" id="btn-chat">Kirim</button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- tab-feedback -->
                <?php endif ?>
            </div><!-- tabpanel detail-kelas -->
            <div class="review-wrap">
                <div class="rating-wrap review-item">
                    <h4 class="review-title">Rating</h4>
                    <div class="rating pull-left">
                        <i class="fa fa-star fa-3x"></i>
                        <i class="fa fa-star fa-3x"></i>
                        <i class="fa fa-star fa-3x"></i>
                        <i class="fa fa-star-o fa-3x"></i>

                        <i class="fa fa-star-o fa-3x"></i>

                        <span class="rate">
                                <b>3.0</b> dari 3 review
                        </span>
                    </div><!-- rating -->
                </div><!-- rating-wrap -->
                <div class="testimonial-wrap review-item">
                    <h4 class="review-title">Testimonial</h4>
                    <div class="testimonial-item">
                        <h5 class="username">
                            <strong>Siti A.</strong> |
                            <a href="http://kelas.rg/kelas/web-programming-basic">Web Programming - Basic</a>
                        </h5>
                        <p><b>Judul Review - </b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                    <div class="testimonial-item">
                        <h5 class="username">
                            <strong>Ivan U.</strong> |
                            <a href="http://kelas.rg/kelas/buat">Kelas 4</a>
                        </h5>
                        <p><b>Judul Review - </b>Review kedua. text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div><!-- testimonial-wrap -->
            </div>
        </div> <!-- col-md-8 -->
        <div class="col-md-4">
            <div class="price-big-wrap detail-label label-yellow text-center">
                <i class="fa fa-tag"></i>
                <h3 class="entry-detail-label text-center text-20" style="line-height: 13px;">
                    Rp <?php echo $data_kelas->harga; ?>,-
                </h3>
            </div><!-- detail-label -->
            <?php
            if ($registered == false) :?>
                <a href="<?php echo base_url();?>daftar" class="register_class">
                    <div class="detail-label btn-orange text-center">
                        <i class="fa fa-user"></i>
                        <h3 class="entry-detail-label text-20">Daftar Sekarang</h3>
                    </div><!-- detail-label -->
                </a>
            <?php
            elseif($type_user == 'murid') : ?>
                <span class="register_class">
                    <div class="detail-label btn-orange text-center">
                        <i class="fa fa-user"></i>
                        <h3 class="text-20">SUDAH TERDAFTAR</h3>
                    </div><!-- detail-label -->
                </span>
            <?php
            endif; ?>
            <div class="panel panel-default blue">
                <div class="panel-heading heading-label text-center"><i class="fa fa-question-circle" data-original-title="" title=""></i> Butuh Bantuan ?</div>
                <div class="panel-body">
                    <p>Peroleh informasi dan bantuan terkait kelas dari tim layanan konsumen kami! </p>
                    <h5 class="support">
                        <a href="tel:+622192003040">
                            <i class="fa fa-phone-square"></i>021-9200-3040
                        </a>
                    </h5>
                    <h5 class="support">
                        <a href="mailto:online@ruangguru.com">
                            <i class="fa fa-envelope"></i>online@ruangguru.com
                        </a>
                    </h5>
                </div>
            </div><!-- panel -->
            <div class="panel panel-default blue">
                <div class="panel-heading heading-label text-center"><i class="fa fa-male"></i> Penyelenggara</div>
                <div class="panel-body">
                    <img src="<?php echo base_url(); ?>images/image_300x300.gif" class="img-responsive logo-vendor" alt="">
                    <h4>
                        <?php 
                        $guru = $data_kelas->teacher->get();
                        echo $guru->nama; ?>
                    </h4>
                    <p>
                    <?php echo substr($guru->bio, 200).'...'; ?></p>
                </div>
            </div><!-- panel -->
        </div>
    </div> <!-- row -->
</div> <!-- /container -->
