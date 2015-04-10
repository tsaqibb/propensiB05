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
                        <a href="#tambah-kelas" aria-controls="tambah-kelas" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Kelas</a>
                    </li>
                </ul>
            </div><!-- sidebar -->

        </div>

        <div class="col-md-9 col-sm-12">
            <div class="panel panel-default">
                <h2 class="block-title text-uppercase">[Nama Kelas]</h2>
                <div class="panel-body">
                    <div role="tabpanel" class="sub-vendor">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
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
                        </ul><br>
                        
                        <div class="panel-heading heading-label">Term Pendaftaran</div>
                      
                        <div class="panel-partisipan">
                        <pseudo:before><pseudo:before>
                        <h4 class="review-title">Untuk mengikuti kelas ini, terdapat beberapa term yang harus diperhatikan :</h4>
                       
                            <ol>
                                <li>Data yang Anda masukkan ke dalam sistem ruangguru.com adalah benar dan dapat dipertanggungjawabkan</li>
                                <li>Mematuhi segala peraturan dari ruangguru.com dan kelas yang bersangkutan </li>
                                <li>Bersedia untuk membayar biaya pendaftaran kelas online pada waktu yang telah ditentukan.<br>
                                Anda dapat membayar dengan Cash ataupun Transfer. </li><br>
                            </ol>
                        </div> <!--panel term-->

                        <div class="panel-partisipan">
                            <div class="pinkfont text-16">Pilih metode pembayaran</div>
                            Anda tidak akan dikenakan biaya tambahan!<br>
                            
                                
                                    <button class="btn-payment2" id="payment_cash">
                                        <img src="http://kelas.ruangguru.com//images/payment/uang.png" width="30px">
                                        Cash
                                    </button>
                               
                                    <button href="#transfer_info" data-toggle="collapse" class="btn-payment2" id="payment_atm">
                                        <img src="http://kelas.ruangguru.com//images/payment/atm-bersama.png" width="25px">
                                        Bank Transfer
                                    </button>
                                
                                <!--                            <button data-toggle="collapse" data-parent="#accordion" href="#transfer_info" class="btn-payment2"id="payment_cash"><img src="http://kelas.ruangguru.com//images/payment/atm-bersama.png" width="25px"> Transfer</button>
                            --><br><br>

                        <!--<div id="cash" class="panel-collapse collapse">-->
                                <div id="cash_info" class="content-segment payment_info" style="display: block;">
                                    <p class="pinkfont bottom-10">
                                        Anda memiliki waktu <span>24 jam</span>
                                        dari sekarang untuk melaksanakan pembayaran.
                                    </p>
                                    <p>
                                        Jika dalam batas waktu tersebut, Anda belum melakukan pembayaran, maka pesanan Anda
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
                        <!--</div>-->

                        <!--<div id="transfer" class="panel-collapse collapse">-->
                                <div id="transfer_info" class="panel-collapse collapse" style="display: none;">
                                    <p class="pinkfont bottom-10">
                                        Anda memiliki waktu <span>24 jam</span>
                                        dari sekarang untuk melaksanakan pembayaran.
                                    </p>
                                    <p>
                                        Jika dalam batas waktu tersebut, Anda belum melakukan pembayaran, maka pesanan Anda
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
                       <!-- </div> -->

                        <div class="checkbox bottom-30">
                            <label>
                                <input type="checkbox" id="iagree">
                                Pendaftaran sudah sesuai.<br>
                                Saya menyepakati <a href="http://ruangguru.com/kebijakan-pembayaran" class="blue 
                                underline">persyaratan dan ketentuan</a> yang berlaku
                            </label><br><br>
                            <button type="submit" class=" fa fa-user btn btn-default main-button register"> DAFTAR</button>                 
                        </div>

                    </div> <!--panel methode-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>