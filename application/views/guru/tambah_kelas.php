<div class="container-fluid content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="profile-name text-center"><?php echo $this->session->userdata('user_name')?></h4>
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
                <h2 class="block-title text-uppercase">Tambah Kelas</h2>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>guru/create_kelas">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Kelas</label>
                            <div class="col-sm-8">
                                <input id="nama_kelas" name="nama_kelas" type="text" class="form-control" id="Namakelas" placeholder="Nama dari kelas yang akan diselenggarakan" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Deskripsi Kelas</label>
                            <div class="col-sm-8">
                                <textarea id="deskripsi_kelas" name="deskripsi_kelas" class="form-control" placeholder="Jelaskan secara singkat materi apa saja yang akan dijelaskan" rows="3" required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan angka saja, mis: 50000. 0 jika kelas gratis" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="attachment" class="col-sm-3 control-label">Tags</label>
                            <div class="col-sm-8">
                                <input style="display: none;" id="class_tags" data-role="tagsinput" class="input-tags" name="class_tags" type="text" required="required">
                            </div>
                        </div>

                        <button class="btn main-button submit" role="submit">
                            Submit
                        </button>
                    </form>
                 </div><!-- panel-body -->
            </div><!-- panel -->
        </div> <!-- end col-md -->
    </div> <!-- end row -->
</div> <!-- /container -->



<script>
    function uploadMateri(){
        var x = document.getElementById("myFile");
        var txt = "";
        if('files' in x){
            if(x.files.length == 0){
                txt ="Pilih materi yang akan diupload";
            }
            if(x.files.length > 1 ){
                txt ="Pilih satu materi untuk diupload";
            }
            else{
                
                var file = x.files;
                if ('name' in file){
                    txt += " aaa"+file.name+" <br>";
                }
                if('size' in file){
                    txt += "size : "+ file.size ;
                }
            }
        }
        document.getElementById("hasil").innerHTML = txt;

    }
</script>



<script>
    function tambahMateri(){
        var a = "<ul class='list-groups'><a href='#'><button type='button' class='btn btn-default' id='button1' onclick='tambahTopik()'>Tambah Materi</button></a></ul>";
        var b = "<a href='#'><button type='button' class='btn btn-default' id='button1' onclick='tambahTopik()'>Tambah Materi</button></a>";
        var c = "<button type='button' class='btn btn-default' id='button1' onclick='tambahTopik()'>Tambah Materi</button>";
        $(".panel-body").append(a);
    }

</script>
