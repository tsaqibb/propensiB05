<div class="container content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="text-center">Halo, [Nama Guru]</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation">
                        <a href="<?php echo base_url();?>guru/kelas" aria-controls="profil" role="tab" data-toggle="tab"><i class="fa fa-users"></i> Kelas Anda</a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="#tambah-kelas" aria-controls="tambah-kelas" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Kelas</a>
                    </li>
                </ul>
            </div><!-- sidebar -->
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-default">
                <h2 class="block-title text-uppercase">Kelas</h2>
                <div class="panel-body">
                    <div role="tabpanel" class="sub-content">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#detil-kelas" aria-controls="detil-kelas" role="tab" data-toggle="tab" aria-expanded="true" >Detil Kelas</a>
                            </li>
                            <li role="presentation">
                                <a href="#materi" aria-controls="materi" role="tab" data-toggle="tab">Materi</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="detil-kelas">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="Namakelas" class="col-sm-3 control-label">Nama Kelas</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="Namakelas" placeholder="Nama dari kelas yang akan diselenggarakan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Seo" class="col-sm-3 control-label">Deskripsi Kelas</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" placeholder="Jelaskan secara singkat materi apa saja yang akan dijelaskan" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Seo" class="col-sm-3 control-label">Harga</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="Seo" placeholder="Masukkan angka saja, mis: 50000. 0 jika kelas gratis">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="attachment" class="col-sm-3 control-label">Tags</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="tag" placeholder="">
                                        </div>
                                    </div>
                                </form>
                                <div id="class-notes">
                                    <div class="btn btn-default main-button register">
                                        Upload materi >>
                                    </div>
                                </div>
                            </div><!-- published -->
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
                            <div role="tabpanel" class="tab-pane" id="draft">Kelas tidak tersedia </div><!-- draft -->
                            <div role="tabpanel" class="tab-pane" id="past">Kelas tidak tersedia </div><!-- past -->
                        </div><!-- tab-content -->

                    </div><!-- tabpanel kelas -->
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div>
    </div>
</div> <!-- /container -->