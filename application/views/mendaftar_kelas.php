<script type=text/javascript>
    function validasi(){
        if (document.getElementById('iagree').checked){
            return confirm("Apakah Anda yakin akan mendaftar?");
        }
        else
            (alert("Anda belum menyetujui term"));
    }
</script>

<div class="container content kelas vendor">
    <div class="row">
        
       <!--  <div class="col-sm-12 col-md-3"> -->
            
<!--             <div class="sidebar">
                <br>
                <h4 class="text-center">Halo, [Nama User]</h4> -->
                <!-- Nav tabs -->
                <!-- <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#kelas" aria-controls="profil" role="tab" data-toggle="tab"><i class="fa fa-users"></i> Kelas Anda</a>
                    </li>
                    <li role="presentation">
                        <a href="#tambah-kelas" aria-controls="tambah-kelas" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Kelas</a>
                    </li>
                </ul>
            </div> --><!-- sidebar -->

        <!-- </div> -->

        <div class="col-md-12 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div role="tabpanel" class="sub-vendor">
                        <!-- Nav tabs -->
                        <!-- <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" >
                                <a href="<?php echo base_url();?>kelas" aria-controls="detil" role="tab" data-toggle="tab" aria-expanded="true">Detail</a>
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
                        </ul> -->
                        <h3 class="block-title text-center" style="margin-left:0px;">Selamat Datang</h3>
                        <br>
                        
                        <div class="panel-heading heading-label">Term Pendaftaran</div>
                      
                        <div class="panel-partisipan">
                        <h4 class="review-title">Untuk mengikuti kelas ini, terdapat beberapa term yang harus diperhatikan :</h4>
                       
                            <ol>
                                <li>Data yang Anda masukkan ke dalam sistem ruangguru.com adalah benar dan dapat dipertanggungjawabkan</li>
                                <li>Mematuhi segala peraturan dari ruangguru.com dan kelas yang bersangkutan </li>
                                <li>Bersedia untuk membayar biaya pendaftaran kelas online pada waktu yang telah ditentukan.<br>
                                Anda dapat membayar dengan Cash ataupun Transfer. </li><br>
                            </ol>
                        </div> <!--panel term-->

                        <br>
                            <div class="pinkfont text-16">Pilih metode pembayaran</div>
                            Anda tidak akan dikenakan biaya tambahan!<br>

                            <div id="accordion">
                            <div class="panel panel-topik">
                                <button data-parent="#accordion" data-toggle="collapse" href="#cash" class="btn-payment2">
                                <img src="http://kelas.ruangguru.com//images/payment/uang.png" width="30px">Cash </button>
                                    <div id="cash" class="panel-collapse collapse text">
                                        <p class="pinkfont bottom-10">
                                            Anda memiliki waktu <span>24 jam</span>
                                            dari sekarang untuk melaksanakan pembayaran.
                                        </p>
                                        <p>
                                            Jika dalam batas waktu tersebut, Anda belum melakukan pembayaran, <br>maka pesanan Anda
                                            akan dianggap dibatalkan, dan Anda harus mengulang proses pemesanan dari awal.
                                        </p>
                                        <p>
                                            Anda dapat melakukan pembayaran langsung ke:
                                        </p>
                                        <p>
                                            <span class="pinkfont">Ruangguru.com HQ</span><br>
                                            d/a Jalan Tebet Raya 32A Jakarta Selatan<br>
                                            (patokan: depan Wisma Tebet)<br>
                                            Telp: 021-9200-3040
                                        </p>
                                    </div>
                                
                                <button data-parent="#accordion" data-toggle="collapse" href="#transfer" class="btn-payment2">
                                <img src="http://kelas.ruangguru.com//images/payment/atm-bersama.png" width="25px">Bank Transfer </button>
                                    <div id="transfer" class="panel-collapse collapse text">
                                        <p class="pinkfont bottom-10">
                                            Anda memiliki waktu <span>24 jam</span>
                                            dari sekarang untuk melaksanakan pembayaran.
                                        </p>
                                        <p>
                                            Jika dalam batas waktu tersebut, Anda belum melakukan pembayaran, <br>maka pesanan Anda
                                            akan dianggap dibatalkan, dan Anda harus mengulang proses pemesanan dari awal.
                                        </p>
                                        <p>
                                            Anda dapat melakukan transfer ke salah satu rekening Bank dibawah ini.
                                        </p>
                                        <p>
                                            <span class="pinkfont">BANK BCA</span><br>
                                            No. Rekening: 2611-3655-11<br>
                                            Atas nama: PT. RUANG RAYA INDONESIA
                                        </p>
                                        <p>
                                            <span class="pinkfont">BANK Mandiri</span><br>
                                            No. Rekening: 157-00-0398209-8<br>
                                            Atas nama: PT. RUANG RAYA INDONESIA
                                        </p>
                                        <p>
                                            <span class="pinkfont">BANK BNI</span><br>
                                            No. Rekening: 033-1469330<br>
                                            Atas nama: PT. RUANG RAYA INDONESIA
                                        </p>
                                        <p>
                                            <span class="pinkfont">BANK BRI</span><br>
                                            No. Rekening: 2080-01-000124-30-3<br>
                                            Atas nama: PT. RUANG RAYA INDONESIA
                                        </p>
                                        <p>
                                            <span class="pinkfont">BANK Permata</span><br>
                                            No. Rekening: 411-0463893<br>
                                            Atas nama: PT. RUANG RAYA INDONESIA
                                        </p>
                                        <p class="bottom-10">
                                            Setelah transfer, Anda dapat melakukan konfirmasi pembayaran.<br>
                                            (link untuk konfirmasi juga kami kirimkan melalui email)
                                        </p>
                                    </div>
                              </div>
                            </div>
                            <div class="checkbox bottom-30">
                                <form class="form-horizontal" method="post" action="<?php echo base_url();?>daftar">
                                <label>
                                    <input type="checkbox" id="iagree">
                                    Pendaftaran sudah sesuai.<br>
                                    Saya menyepakati <a href="http://ruangguru.com/kebijakan-pembayaran" class="blue 
                                    underline">persyaratan dan ketentuan</a> yang berlaku
                                </label>
                                <br><br>


                               <script type="text/javascript">
                               /*function x(){
                               document.getElementById("submit").style.background='orange';
                                }*/
                                    $("#iagree").change(function(){
                                        if($("#submit").attr("style") == "background: grey") {
                                            $("#submit").attr("style", "background: orange");
                                            $("#submit").removeAttr("disabled");
                                        }
                                        else
                                        {
                                            $("#submit").attr("style", "background: grey");
                                            $("#submit").attr("disabled", "disabled");
                                        }
                                    });
                                </script><br><br><br>
                                <button id="submit" type="submit" class="grey" style="background: grey" disabled="disabled" onclick="return validasi()">Lanjutkan</button>           
                            </form>
                            <a class="fa fa-arrow-left main-button" style="height:30px; margin-left:350px; padding: 6px;" href="<?php echo base_url();?>kelas"> Kembali ke Galeri Kelas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
