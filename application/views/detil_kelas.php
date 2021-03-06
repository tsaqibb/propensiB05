
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
      return confirm("Apakah Anda yakin ingin menonaktifkan murid tersebut?");
    }
</script>

<script type=text/javascript>
    function konfirmasi_rating(){
        var star_value;
        star_value = $('input:radio[name=rating-input-1]:checked').val();
        return confirm("Rate kelas ini " + star_value + "?");
    }
</script>

<script type=text/javascript>
    function konfirmasi_komentar(){
        return confirm("Kirim komentar?");
    }
    function konfirmasi_tanggapan(){
        return confirm("Anda yakin ingin memberi tanggapan komentar?");
    }
</script>

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

    $class_rating = 0.0;
    $total_rates = 0;
    $no_of_review = 0;
    $review_exists = false;
    foreach ($list_partisipan as $data_murid_kelas) :
        $no_of_review = $no_of_review + 1;
        $total_rates = $total_rates + $data_murid_kelas->rating;

        if($id_murid == $data_murid_kelas->student_id && $id_kelas == $data_murid_kelas->course_id && $data_murid_kelas->rating != 0):
            $review_exists = true;
        endif;
        
    endforeach; 

    if ($no_of_review > 0){
        $class_rating = $total_rates/$no_of_review;
    }
?>
<div class="container content kelas">
    <div class="row">
        <div class="col-md-8">
            <h2 class="entry-title"><?php echo $data_kelas->nama; ?></h2>
            <div class="add-info">
                <div class="info-label">
                    <i class="fa fa-star"></i> <?php echo $class_rating."/5 (".$no_of_review." reviewers)"; ?> 
                    <i class="fa fa-user"></i> <?php echo count($list_partisipan); ?>
                </div>
                <?php
                $list_classes_tag = $data_kelas->classes_tag->get();
                if(!empty($list_classes_tag)) :
                ?>
                <span class="tag-label text-uppercase">Tag :
                <?php
                    foreach ($list_classes_tag as $classes_tag) :
                        $tag = $classes_tag->tag->get();
                ?>
                        <a class="#<php echo $tag->subjek; ?>">
                            <?php echo $tag->subjek; ?>
                        </a>&nbsp;
                <?php endforeach; ?>
                </span>
                <?php endif; ?>
            </div><!-- add-info -->
        </div>
        <div class="col-md-8">
            <div class="hero-detail">
                <div class="img-wrap">
                    <img src="<?php echo base_url().'images/class/';
                    if(!empty($data_kelas->gambar)) {
                        echo $data_kelas->gambar;
                    }
                    else {
                        echo 'image_300x300.gif';
                    } ?>" alt="Class Logo" class="img-responsive">
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
                    $count_topic = 1;
                    foreach ( $list_topik as $topik ):
                    ?>
                        <div class="panel panel-orange">
                        <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                            href="#topik<?php echo $topik->id; ?>">
                            <i class="fa fa-chevron-circle-down"></i>
                            <?php echo $count_topic++.'. '.$topik->judul; ?>
                        </a>
                            <div id="topik<?php echo $topik->id; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p><?php echo $topik->deskripsi; ?></p>
                            <?php  $list_materi = $topik->resource->get();
                            $count_materi =1;
                            foreach ($list_materi as $materi) :
                            ?>
                              <ul class="list-groups">
                                <?php 
                                if($registered) : ?>
                                     <a href="<?php echo base_url();?>kelas/aksesmateri/<?php echo $materi->id; ?>">
                                        <li class="list-group-item"> <?php echo $count_materi++.'. '.$materi->judul; ?></li>
                                     </a>
                                 <?php else : ?>
                                     <span>
                                        <li class="list-group-item"> <?php echo $count_materi++.'. '.$materi->judul; ?></li>
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
                 
            <div class="sub-content detail-kelas feedback-part"><!-- tab feedback -->
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
            
            <div id="review" class="review-wrap">
                <div class="rating-wrap review-item">
                    <?php if($review_exists == false && $registered == true && $type_user == "murid") : ?>
                    <h4 class="review-title">Berikan review Anda untuk kelas ini</h4>
                        <form action="<?php echo base_url(); ?>kelas/add_review/<?php echo $list_partisipan->id; ?>" method="POST">
                            <span class="rating">                                
                                <input type="radio" value="5" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                                <label for="rating-input-1-5" class="rating-star"></label> 
                                <input type="radio" value="4" class="rating-input" id="rating-input-1-4" name="rating-input-1"/>
                                <label for="rating-input-1-4" class="rating-star"></label>
                                <input type="radio" value="3" class="rating-input" id="rating-input-1-3" name="rating-input-1"/>
                                <label for="rating-input-1-3" class="rating-star"></label>
                                <input type="radio" value="2" class="rating-input" id="rating-input-1-2" name="rating-input-1"/>
                                <label for="rating-input-1-2" class="rating-star"></label>
                                <input type="radio" value="1" class="rating-input" id="rating-input-1-1" name="rating-input-1"/>
                                <label for="rating-input-1-1" class="rating-star"></label>
                            </span>
                            <span class="rating">
                                <textarea class="form-control" rows="5" id="comment" placeholder="Berikan review Anda di sini..." name="comment-review"></textarea>
                            </span>
                            <span class="rating">
                                <button name="rating_kelas" type="submit" class="btn btn-primary" id="btn-chat" onclick="return konfirmasi_rating()">Kirim</button>
                            </span>
                        <?php endif; ?>
                        <?php foreach ($list_partisipan as $data_murid_kelas) : ?>
                        <?php if($review_exists == true && $data_murid_kelas->student_id == $id_murid && $data_murid_kelas->course_id == $data_kelas->id) {
                                $review_val = 0;
                                $review_val = $data_murid_kelas->rating;
                                if ($review_val == 5) { ?>
                                <form action="<?php echo base_url(); ?>kelas/add_review/<?php echo $list_partisipan->id; ?>" method="POST">
                                    <span class="rating">
                                        <legend>Rating yang Anda berikan</legend>
                                        <input checked type="radio" value="5" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                                        <label for="rating-input-1-5" class="rating-star"></label>
                                        <input type="radio" value="4" class="rating-input" id="rating-input-1-4" name="rating-input-1"/>
                                        <label for="rating-input-1-4" class="rating-star"></label>
                                        <input type="radio" value="3" class="rating-input" id="rating-input-1-3" name="rating-input-1"/>
                                        <label for="rating-input-1-3" class="rating-star"></label>
                                        <input type="radio" value="2" class="rating-input" id="rating-input-1-2" name="rating-input-1"/>
                                        <label for="rating-input-1-2" class="rating-star"></label>
                                        <input type="radio" value="1" class="rating-input" id="rating-input-1-1" name="rating-input-1"/>
                                        <label for="rating-input-1-1" class="rating-star"></label>
                                    <span class="rating">
                                        <textarea class="form-control" rows="5" id="comment" placeholder="Berikan review Anda di sini..." name="comment-review"></textarea>
                                    </span>
                                    <span class="rating">
                                        <button name="rating_kelas" type="submit" class="btn btn-primary" id="btn-chat" onclick="return konfirmasi_rating()">Kirim</button>
                                    </span>
                                </form>
                                <?php }
                                else if($review_val == 4) { ?>
                                <form action="<?php echo base_url(); ?>kelas/add_review/<?php echo $list_partisipan->id; ?>" method="POST"> 
                                    <span class="rating">
                                        <legend>Rating yang Anda berikan</legend>
                                        <input type="radio" value="5" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                                        <label for="rating-input-1-5" class="rating-star"></label>
                                        <input checked type="radio" value="4" class="rating-input" id="rating-input-1-4" name="rating-input-1"/>
                                        <label for="rating-input-1-4" class="rating-star"></label>
                                        <input type="radio" value="3" class="rating-input" id="rating-input-1-3" name="rating-input-1"/>
                                        <label for="rating-input-1-3" class="rating-star"></label>
                                        <input type="radio" value="2" class="rating-input" id="rating-input-1-2" name="rating-input-1"/>
                                        <label for="rating-input-1-2" class="rating-star"></label>
                                        <input type="radio" value="1" class="rating-input" id="rating-input-1-1" name="rating-input-1"/>
                                        <label for="rating-input-1-1" class="rating-star"></label>
                                    </span>
                                    <span class="rating">
                                        <textarea class="form-control" rows="5" id="comment" placeholder="Berikan review Anda di sini..." name="comment-review"></textarea>
                                    </span>
                                    <span class="rating">
                                        <button name="rating_kelas" type="submit" class="btn btn-primary" id="btn-chat" onclick="return konfirmasi_rating()">Kirim</button>
                                    </span>
                                </form> 
                                <?php }
                                else if($review_val == 3) { ?>
                                <form action="<?php echo base_url(); ?>kelas/add_review/<?php echo $list_partisipan->id; ?>" method="POST">
                                     <span class="rating">
                                        <legend>Rating yang Anda berikan</legend>
                                        <input type="radio" value="5" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                                        <label for="rating-input-1-5" class="rating-star"></label>
                                        <input type="radio" value="4" class="rating-input" id="rating-input-1-4" name="rating-input-1"/>
                                        <label for="rating-input-1-4" class="rating-star"></label>
                                        <input checked type="radio" value="3" class="rating-input" id="rating-input-1-3" name="rating-input-1"/>
                                        <label for="rating-input-1-3" class="rating-star"></label>
                                        <input type="radio" value="2" class="rating-input" id="rating-input-1-2" name="rating-input-1"/>
                                        <label for="rating-input-1-2" class="rating-star"></label>
                                        <input type="radio" value="1" class="rating-input" id="rating-input-1-1" name="rating-input-1"/>
                                        <label for="rating-input-1-1" class="rating-star"></label>
                                        </span>
                                    <span class="rating">
                                        <textarea class="form-control" rows="5" id="comment" placeholder="Berikan review Anda di sini..." name="comment-review"></textarea>
                                    </span>
                                    <span class="rating">
                                        <button name="rating_kelas" type="submit" class="btn btn-primary" id="btn-chat" onclick="return konfirmasi_rating()">Kirim</button>
                                    </span>
                                </form> 
                                <?php }
                                else if($review_val == 2) { ?>
                                <form action="<?php echo base_url(); ?>kelas/add_review/<?php echo $list_partisipan->id; ?>" method="POST">
                                     <span class="rating">
                                        <legend>Rating yang Anda berikan</legend>
                                        <input type="radio" value="5" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                                        <label for="rating-input-1-5" class="rating-star"></label>
                                        <input type="radio" value="4" class="rating-input" id="rating-input-1-4" name="rating-input-1"/>
                                        <label for="rating-input-1-4" class="rating-star"></label>
                                        <input type="radio" value="3" class="rating-input" id="rating-input-1-3" name="rating-input-1"/>
                                        <label for="rating-input-1-3" class="rating-star"></label>
                                        <input checked type="radio" value="2" class="rating-input" id="rating-input-1-2" name="rating-input-1"/>
                                        <label for="rating-input-1-2" class="rating-star"></label>
                                        <input type="radio" value="1" class="rating-input" id="rating-input-1-1" name="rating-input-1"/>
                                        <label for="rating-input-1-1" class="rating-star"></label>
                                    </span>
                                    <span class="rating">
                                        <textarea class="form-control" rows="5" id="comment" placeholder="Berikan review Anda di sini..." name="comment-review"></textarea>
                                    </span>
                                    <span class="rating">
                                        <button name="rating_kelas" type="submit" class="btn btn-primary" id="btn-chat" onclick="return konfirmasi_rating()">Kirim</button>
                                    </span>
                                </form> 
                                <?php }
                                else if($review_val == 1) { ?>
                                <form action="<?php echo base_url(); ?>kelas/add_review/<?php echo $list_partisipan->id; ?>" method="POST">
                                     <span class="rating">
                                        <legend>Rating yang Anda berikan</legend>
                                        <input type="radio" value="5" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                                        <label for="rating-input-1-5" class="rating-star"></label>
                                        <input type="radio" value="4" class="rating-input" id="rating-input-1-4" name="rating-input-1"/>
                                        <label for="rating-input-1-4" class="rating-star"></label>
                                        <input type="radio" value="3" class="rating-input" id="rating-input-1-3" name="rating-input-1"/>
                                        <label for="rating-input-1-3" class="rating-star"></label>
                                        <input type="radio" value="2" class="rating-input" id="rating-input-1-2" name="rating-input-1"/>
                                        <label for="rating-input-1-2" class="rating-star"></label>
                                        <input checked type="radio" value="1" class="rating-input" id="rating-input-1-1" name="rating-input-1"/>
                                        <label for="rating-input-1-1" class="rating-star"></label>
                                    </span>
                                    <span class="rating">
                                        <textarea class="form-control" rows="5" id="comment" placeholder="Berikan review Anda di sini..." name="comment-review"></textarea>
                                    </span>
                                    <span class="rating">
                                        <button name="rating_kelas" type="submit" class="btn btn-primary" id="btn-chat" onclick="return konfirmasi_rating()">Kirim</button>
                                    </span>
                                </form> 
                                <?php } } ?>
                        <?php endforeach; ?> <!-- rating -->
                </div><!-- rating-wrap -->
                <div class="testimonial-wrap review-item">
                    <h4 class="review-title">Testimonial</h4>
                    
                    <?php foreach ($list_partisipan as $data_murid_kelas) :
                        $komentar_review = $data_murid_kelas->review->get();
                        $approval_review = $komentar_review->status;
                        if($approval_review == '1') : 
                    ?>
                    <div class="testimonial-item">
                        <h5 class="username">
                            <strong>
                                <?php 
                                    $data_murid = $data_murid_kelas->student->get();
                                    $nama_murid = $data_murid->nama;
                                    $nama_arr = explode(' ', $nama_murid);
                                    $nama_murid = $nama_arr[0];
                                    if(!empty($nama_arr[1])) {
                                        $nama_murid = $nama_murid.' '.$nama_arr[1][0].'.';
                                    }
                                    echo $nama_murid;
                                ?>
                            </strong> |
                            <a href="<?php echo base_url().'kelas/detail/'.$data_kelas->id; ?>"><?php echo $data_kelas->nama; ?></a>
                        </h5>
                        <p>
                            <?php
                                echo $komentar_review->komentar;
                            ?>
                        </p>
                        <?php
                        if($this->session->userdata('user_type') == "guru" &&
                          $this->session->userdata('user_id') == $data_kelas->teacher_id) :
                            if(empty($komentar_review->tanggapan)) :
                        ?>
                        <div class="rating">
                            <form method="post" action="<?php echo base_url(); ?>guru/respond_comment/<?php echo $komentar_review->id; ?>">
                                <textarea class="form-control" rows="5" id="tanggapan" placeholder="Berikan tanggapan Anda di sini..." name="tanggapan"></textarea>
                                <button name="rating_kelas" type="submit" class="btn btn-primary" id="btn-chat" onclick="return konfirmasi_tanggapan()">Kirim</button>
                            </form>
                        </div>
                        <?php 
                            else :
                        ?>    
                        <div class="tanggapan">
                            <p>
                                <strong>
                                    Tanggapanmu : 
                                </strong>
                                <?php
                                    echo $komentar_review->tanggapan;
                                ?>
                            </p>
                        </div>
                        <?php 
                            endif;
                        endif; ?>
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

            <!-- <div class="panel panel-default blue">
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
            </div> -->

            <!-- <div class="panel panel-default blue">
                <div class="panel-heading heading-label text-center"><i class="fa fa-thumbs-up"></i>Review</div>
                <div class="panel-body">
                    <div class="rating-view">
                        <?php if ($class_rating > 0.0 && $class_rating < 0.3) : ?>
                        <i class="fa fa-star-o fa-1x"></i>
                        <i class="fa fa-star-o fa-1x"></i>
                        <i class="fa fa-star-o fa-1x"></i>
                        <i class="fa fa-star-o fa-1x"></i>
                        <i class="fa fa-star-o fa-1x"></i>
                        <?php endif; ?>
                        <?php if ($class_rating > 0.2 && $class_rating < 1.6) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif; ?>
                        <?php if($class_rating > 1.5 && $class_rating < 2.6) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif; ?>
                        <?php if($class_rating > 2.5 && $class_rating < 3.6) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif; ?>
                        <?php if($class_rating > 3.5 && $class_rating < 4.6) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star-o fa-2x"></i>
                        <?php endif; ?>
                        <?php if($class_rating > 4.5) : ?>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <i class="fa fa-star fa-2x"></i>
                        <?php endif; ?>
                    </div>
                    <h4 class="rating-tally">
                            <?php echo round($class_rating, 2)." dari $no_of_review rating" ?>
                        </h4>
                </div>
            </div> --><!-- panel -->
        </div>
    </div> <!-- row -->
</div> <!-- /container -->
