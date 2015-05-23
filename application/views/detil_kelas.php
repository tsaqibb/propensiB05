<?php
    $type_user = $this->session->userdata('user_type');
    $id_kelas=$this->session->userdata('course_id');
    $id_murid=$this->session->userdata('user_id');
    $registered = false;
    
    if($type_user == "murid"){
        foreach ($partisipan_all as $partisipan) :
            if($id_murid == $partisipan->student_id && $id_kelas == $partisipan->course_id):
                $registered=true;
                break;
            endif;
        endforeach;
    }
    elseif($type_user == "admin" || $type_user == "guru") {
        $registered =true;
    }
?>
<div class="container content kelas">
    <div class="row">
        <div class="col-md-8"><br>
            <h2 class="entry-title"><?php echo $data_kelas->nama; ?></h2>
            <div class="add-info">
            </div><!-- add-info -->
        </div>
        <div class="col-md-8">
            <div class="hero-detail">
                <div class="photo img-wrap">
                    <img src="<?php echo base_url(); ?>images/image_300x300.gif" alt="Class Logo" class="img-responsive">
                </div>
            </div>
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
                        <div id="topik<?php echo $topik->id; ?>" class="panel-collapse collapse in">
                           <div class="panel-body">
                            <?php  $list_materi = $topik->resource->get();
                            foreach ($list_materi as $materi) :
                            ?>
                              <ul class="list-groups">
                                <?php 
                                if($registered) : ?>
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
                           </div><!--panel body-->
                        </div>
                     </div><!--panel orange-->

                     <?php
                      endforeach;
                     ?>

                  </div> 
                </div><!-- end tab materi -->
                    
                
            </div><!-- tabpanel detail-kelas -->
            
            <?php 
            $session_role = $this->session->userdata('user_type');
            $id_guru=$this->session->userdata('user_id');
                if($id_guru==$data_kelas->teacher_id || $session_role == 'admin') :?>
                
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
                        </div><!--chat -->
                        <div class="panel-footer">
                            <div class="container-fluid">
                                <form class="form-horizontal input-group" method="post" action="<?php echo base_url(); ?>kelas/add_feedback/<?php echo $data_kelas->id; ?>">
                                    <input name ="pesan" id="pesan" type="text" class="form-control" required placeholder="Berikan pesan Anda di sini...">
                                    <span class="input-group-btn">
                                        <button role="submit" class="btn btn-primary" id="btn-chat">Kirim</button>
                                    </span>
                                </form>
                            </div>
                        </div><!-- panel footer-feedback-->
                    </div>
                </div>
            </div><!-- tab-feedback -->
            <?php endif ?>
            
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
                                <?php 
                                ?>
                        </span>
                    </div><!-- rating -->
                </div><!-- rating-wrap -->
                <div class="testimonial-wrap review-item">
                    <h4 class="review-title">Testimonial</h4>
                    <?php foreach ($list_partisipan as $course_student) : ?>
                    <?php 
                        $komentar_review = $course_student->review->get();
                        $approval_review = $komentar_review->status;
                        if($approval_review == '1') : 
                    ?>
                    <div class="testimonial-item">
                        <h5 class="username">
                            <strong>
                                <?php 
                                    $student = $course_student->student->get();
                                    $nama_murid = $student->nama;
                                    echo $nama_murid;
                                ?>
                            </strong> |
                            <a href="<?php echo base_url().'kelas/detail/'.$data_kelas->id; ?>"><?php echo $data_kelas->nama; ?></a>
                        </h5>
                        <p>
                            <?php
                                $testimoni = $review->comment->get();
                                echo $testimoni->komentar;
                            ?>
                        </p>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>   
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
            elseif($type_user == 'murid') :?>
                <span class="register_class">
                    <div class="detail-label btn-orange text-center">
                        <i class="fa fa-user"></i>
                            <h3 class="entry-detail-label text-20">Registered</h3>
                    </div><!-- detail-label -->
                </span>
            <?php endif;?>
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
                    <img src="<?php echo base_url();?>images/user.png" class="img-responsive logo-vendor" style="margin-left: 14px;">
                    <h4>
                        <?php 
                        $guru = $data_kelas->teacher->get();
                        echo $guru->nama; ?>
                    </h4>
                    <p>
                    <?php echo substr($guru->bio, 0).'...'; ?></p>
                </div>
            </div><!-- panel -->

            <div class="panel panel-default blue">
                <div class="panel-heading heading-label text-center"><i class="fa fa-male"></i> Daftar Murid</div>
                <div class="panel-body">
                    <?php foreach ($list_partisipan as $daftar) :
                        $student = $daftar->student->get();
                        $course= $daftar->course_id; 
                    ?>
                    <div class="actived-partisipan">
                        <div>
                            <div class="nama text-center"><?php echo $student->nama; ?>
                            </div>
                            <img src="<?php echo base_url();?>images/user.png" class="img-circle" alt="Circular Image">
                        </div>
                    </div>
                    <?php endforeach; ?> 
                </div>
            </div>
        </div>
    </div> <!-- row -->
</div> <!-- /container -->
