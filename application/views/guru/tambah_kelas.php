<div class="container-fluid content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="profile-name text-center">Halo, <?php echo $this->session->userdata('user_name')?></h4>
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
                    <div class="panel-group" id="accordion_edit_kelas">
                        <div class="panel panel-orange">
                            <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading" href="#detail_kelas">
                                <i class="fa fa-chevron-circle-down"></i>
                                Detail Kelas
                            </a>
                            <div id="detail_kelas" class="panel-collapse collapse in">
                                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>kelas/create_kelas">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Kelas</label>
                                        <div class="col-sm-8">
                                            <input id="nama_kelas" name="nama_kelas" type="text" class="form-control" id="Namakelas" placeholder="Nama dari kelas yang akan diselenggarakan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Deskripsi Kelas</label>
                                        <div class="col-sm-8">
                                            <textarea id="deskripsi_kelas" name="deskripsi_kelas" class="form-control" placeholder="Jelaskan secara singkat materi apa saja yang akan dijelaskan" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Harga</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan angka saja, mis: 50000. 0 jika kelas gratis">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="attachment" class="col-sm-3 control-label">Tags</label>
                                        <div class="col-sm-8">
                                            <input style="display: none;" id="class_tags" data-role="tagsinput" class="input-tags" name="class_tags" type="text">
                                        </div>
                                    </div>

                                    <!--<div class="btn btn-default main-button register" href="#materi" role="tab" data-toggle="tab">
                                        <i class="fa fa-upload"></i>
                                        Upload materi 
                                    </div> -->


                                    <button class="btn btn-default main-button register" role="submit">
                                        Create
                                    </button>

                                </form>
                            </div> 
                        </div> <!-- end panel -->


                        <div class="panel panel-orange">
                            <a data-toggle="collapse" data-parent="#accordion" class="judul-topik panel-heading" href="#materi">
                                <i class="fa fa-chevron-circle-down"></i>
                                Materi
                            </a>

                            <div id="materi" class="panel-collapse collapse ">
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

                                    <div class="panel panel-orange">
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
                                                        <a class="fancybox" href="#inline1">
                                                            <button type="button" class="btn btn-default" id="button1" >Tambah Materi</button>
                                                        </a>                                                    
                                                </ul>
                            <!-- FORM POP UP-->
                                                <div id="inline1" style="width:400px; display: none;">
                                                    <p class="text-14 bold text-center"> [Nama Topik] </p>
                                                    <form id="upload-materi" action="<?php echo base_url();?>guru/tambahmateri" method="POST" enctype="multipart/form-data">
                                                        <p>
                                                            <label for="nama-materi">Nama Materi </label>
                                                            <input type="text" class="form-control" id="namamateri" placeholder="Tuliskan Judul Materi disini" />
                                                        </p>
                                                        <p>
                                                            <label for="note-materi">Note Materi </label>
                                                            <input type="text" class="form-control" id="notemateri" placeholder="Tuliskan note untuk materi ini" />
                                                        </p>
                                                        <p>
                                                            <label for="nama-materi">Jenis Materi </label>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="optradio" id="video">Video</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="optradio" id="pdf">Pdf</label>
                                                                    </div>
                                                                </div>
                                                            </div>                                                              
                                                        </p>
                                                        <input type="file" name="file" id="myFile" multiple size="50" onchange="uploadMateri()">
                                                        <br>                                                        
                                                        <button type="submit" name="submit" class="btn btn-succes btn-lg">Simpan</button>
                                                    </form> 
                                                </div>
                            <!-- end FORM POP UP-->
                                               
                                              
                                                <p onclick="tambahMateri()"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Add more ... </p>
                                            </div>
                                        </div> <!-- end topik 1-->


    <?php
    if(isset($_GET['success']))
    {
        ?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
    }
    else if(isset($_GET['fail']))
    {
        ?>
        <label>Problem While File Uploading !</label>
        <?php
    }
    else
    {
       
    }
    ?>


    <?php
    echo basename($path) . "<br/>";
    $target_dir = "video/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

    
    if(isset($_POST['submit']))

{
    echo "berhasil";
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];

}
    move_uploaded_file($temp,"video/".$name);
    $url = "video/$name";
    mysql_query("INSERT INTO 'resources' VALUE ('','1','1','3002','1002','$name','$url','gampang')");


?>







                                    </div> <!-- end panel orange -->                                                                   
                                </div> <!-- end panel-group accrodion-->
                            </div> <!-- end materi -->
                        </div>
                    </div> <!-- end panel-group -->                  
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
