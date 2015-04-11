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
                <h2 class="block-title text-uppercase">[Nama Kelas]<a href="<?php echo base_url();?>daftar" class=" fa fa-user btn btn-default main-button register3"> DAFTAR</a></h2>
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
                                Kelas ini akan menjelaskan bla bla bla bla dan bla bla bal bla bla.
                                Selain itu juga akan dijelaskan bal bla bla bla bla dan bla bla bal bla bla.
                                Murid diharapkan bisa bla bla bla bla dan bla bla bal bla bla setelah mengikuti seluruh pelajaran.
                                </p>
                                <h5 class="title-label">Harga</h5>
                                <p>Rp 300.000,00</p>
                                <h5 class="title-label">Tag</h5>
                                <br>
                                <i class="tag">#MTK</i>
                                <i class="tag">#IPA</i>
                                <i class="tag">#SMA</i>
                                <i class="tag">#aljabar</i>
                                <i class="tag">#trigonometri</i>
                                <br><br><br>
                            </div><!-- detil-kelas -->

                            <!-- start Tab Materi -->
                           <div role="tabpanel" class="tab-pane tab-panemateri" id="materi">
                              <div class="panel-group" id="accordion">
                                 <div class="panel panel-topik">
                                    <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                        href="#matematikasma">
                                        <i class="fa fa-chevron-circle-down"></i>
                                        Matematika SMA 
                                    </a>
                                    <div id="matematikasma" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <ul class="list-groups">
                                             <a href="#">
                                             <li class="list-group-item">Aljabar</li>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <li class="list-group-item">Persamaan Kuadrat</li>
                                             </a>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="panel panel-topik">
                                    <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                        href="#matematikasmp">
                                        <i class="fa fa-chevron-circle-down"></i>
                                           Matematika SMP
                                    </a>
                                    <div id="matematikasmp" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <ul class="list-groups">
                                             <a href="#">
                                             <li class="list-group-item">Aljabar</li>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <li class="list-group-item">Persamaan Kuadrat</li>
                                             </a>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="panel panel-topik">
                                       <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                          href="#matematikasd"><i class="fa fa-chevron-circle-down"></i>
                                             Matematika SD</a>
                                    <div id="matematikasd" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <ul class="list-groups">
                                             <a href="#">
                                             <li class="list-group-item">Aljabar</li>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <li class="list-group-item">Persamaan Kuadrat</li>
                                             </a>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="panel panel-topik">
                                       <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                          href="#topik1"><i class="fa fa-chevron-circle-down"></i>
                                             Topik 1</a>
                                    <div id="topik1" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <ul class="list-groups">
                                             <a href="#">
                                             <li class="list-group-item">Aljabar</li>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <li class="list-group-item">Persamaan Kuadrat</li>
                                             </a>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-topik">
                                       <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                          href="#topik2"><i class="fa fa-chevron-circle-down"></i>
                                             Topik 2</a>
                                    <div id="topik2" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <ul class="list-groups">
                                             <a href="#">
                                             <li class="list-group-item">Aljabar</li>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <li class="list-group-item">Persamaan Kuadrat</li>
                                             </a>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-topik">
                                       <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                          href="#topik3"><i class="fa fa-chevron-circle-down"></i>
                                             Topik 3</a>
                                    <div id="topik3" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <ul class="list-groups">
                                             <a href="#">
                                             <li class="list-group-item">Aljabar</li>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <li class="list-group-item">Persamaan Kuadrat</li>
                                             </a>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-topik">
                                       <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                          href="#topik4"><i class="fa fa-chevron-circle-down"></i>
                                             Topik 4</a>
                                    <div id="topik4" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <ul class="list-groups">
                                             <a href="#">
                                             <li class="list-group-item">Aljabar</li>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <li class="list-group-item">Persamaan Kuadrat</li>
                                             </a>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                            </div><!-- end tab materi -->
                            
                            <div role="tabpanel" class="tab-pane" id="review">
                              Bagian ini akan menjelaskan review dari kelas
                            </div><!-- end tab review -->
                            
                            <!--tab partisipan-->
                            <div role="tabpanel" class="tab-pane" id="partisipan">
                              <div class="tab-content">
                                <h3 class="block-title text-uppercase">Daftar Murid</h3><br>
                                  <div class="actived-partisipan">
                                    <span class="nama">Agustina Fransiska Kusumaningtyas <a href=""> 1206238715</a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com </a>
                                            <small class="matkul text-muted"></small>
                                    </span>
                                    <img src="<?php echo base_url();?>images/user.png" class="img-circle" alt="Circular Image">
                                  </div>
                                  <div class="actived-partisipan">
                                    <span class="nama">Agustina Fransiska Kusumaningtyas <a href=""> 1206238715</a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com </a>
                                            <small class="matkul text-muted"></small>
                                    </span>
                                    <img src="<?php echo base_url();?>images/user.png" class="img-circle" alt="Circular Image">
                                  </div>
                                  <div class="actived-partisipan">
                                    <span class="nama">Agustina Fransiska Kusumaningtyas <a href=""> 1206238715</a>
                                            <a class ="matkul" href="">retnowatiwahyu@gmail.com </a>
                                            <small class="matkul text-muted"></small>
                                    </span>
                                    <img src="<?php echo base_url();?>images/user.png" class="img-circle" alt="Circular Image">
                                  </div>          
                              </div> 
                            </div><!-- tab-partisipan -->
                            
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