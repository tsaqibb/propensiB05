<div class="container-fluid content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="profile-name text-center">Halo, [Nama Guru]</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation">
                        <a href="<?php echo base_url();?>guru/kelas"><i class="fa fa-users"></i> Kelas Anda</a>
                    </li>
                    <li role="presentation" class="active">
                        <a href=""><i class="fa fa-plus"></i> Tambah Kelas</a>
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
                                <a href="#detil-kelas" aria-controls="detil-kelas" role="tab" data-toggle="tab" aria-expanded="true">Detil Kelas</a>
                            </li>
                            <li role="presentation">
                                <a href="#materi" aria-controls="materi" role="tab" data-toggle="tab">Materi</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="detil-kelas">
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


                                
                        <div role="tabpanel" class="tab-pane tab-panemateri active " id="materi">
                              <div class="panel-group" id="accordion">   

                                <div class="panel panel-btn">
                                    <div class="row">
                                    <div class="col-md-5">
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" id="lg" placeholder="Tuliskan nama topik disini">
                                    </div>
                                    <div class="col-md-2">      
                                        <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()"><i class="fa fa-pencil-square-o"></i>Tambah Topik</button>
                                    </div>
                                    </div>
                                </div>

                                <br>
   
                               

                                <div class="panel panel-topik">
                                    <div class="panel-judul-topik">
                                      <div class="row">   
                                        <div class="col-md-10">                                                           
                                    <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                          href="#topik1"><i class="fa fa-chevron-circle-down"></i>
                                             Topik 1 </a> 
                                        </div>
                                        <div class="col-md-2">
                                             <span class="hapus-topik pull-right">Hapus Topik <i class="fa fa-times"></i></span>
                                        </div>
                                           </div>
                                     </div>

                                     <div id="topik1" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <ul class="list-groups">
                                             <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>

                                          <p onclick="tambahMateri()"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add more ... </p>
                                       </div>
                                    </div>
                                 </div>
                               </div>

                                <div class="panel panel-topik">
                                    <div class="panel-judul-topik">
                                      <div class="row">   
                                        <div class="col-md-10">                                                           
                                    <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading"
                                          href="#topik2"><i class="fa fa-chevron-circle-down"></i>
                                             Topik 1 </a> 
                                        </div>
                                        <div class="col-md-2">
                                             <span class="hapus-topik pull-right">Hapus Topik <i class="fa fa-times"></i></span>
                                        </div>
                                           </div>
                                     </div>
                                     
                                     <div id="topik2" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          <ul class="list-groups">
                                             <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>
                                          <ul class="list-groups">
                                            <a href="#">
                                             <button type="button" class="btn btn-default" id="button1" onclick="tambahTopik()">Tambah Materi</button>
                                             </a>
                                          </ul>

                                          <p onclick="tambahMateri()"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add more ... </p>
                                       </div>
                                    </div>
                                 </div>
                               </div>
                            </div><!-- end tab materi -->

                           
                        </div><!-- tab-content -->

                    </div><!-- tabpanel kelas -->
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div>
    </div>
</div> <!-- /container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    function tambahMateri(){
        var a = "<ul class='list-groups'><a href='#'><button type='button' class='btn btn-default' id='button1' onclick='tambahTopik()'>Tambah Materi</button></a></ul>";
        var b = "<a href='#'><button type='button' class='btn btn-default' id='button1' onclick='tambahTopik()'>Tambah Materi</button></a>";
        var c = "<button type='button' class='btn btn-default' id='button1' onclick='tambahTopik()'>Tambah Materi</button>";
        $(".panel-body").append(a);

    }

</script>