<div id="container" class="kelas-online">
    <div class="shell">
        <!-- Main -->
        <div id="main">
            <div class="cl">&nbsp;</div>
            <!-- Content -->
            <div id="content">
                <!-- Box -->
                <div class="box">
                    <!-- Box Head -->
                    <div class="box-head">
                        <h2 class="left">Class Confirmation</h2>
                    </div>
                    <!-- End Box Head -->
                    <div class="table">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <!-- <th>ID Kelas</th> -->
                                    <th>Nama Kelas (ID)</th>
                                    <th>Status Kelas</th>
                                    <th>Daftar Murid</th>
                                    <th class="center">Email Guru</th>
                                    <!-- <th class="center">Detail</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_kelas_published as $kelas) : ?>
                                <tr>
                                    <!-- <td><a class="fancybox class" data-attd_type="class" data-class_id="2" href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>">
                                        <?php echo $kelas->id; ?></a>
                                    </td> -->
                                    <td>
                                        <div class="namakelas"><a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>"><?php echo $kelas->nama; ?> (<?php echo $kelas->id; ?>)</a></div>
                                    </td>
                                    <td>
                                        <?php 
                                        if ($kelas->status_kelas=='2') {
                                            echo "Published"; 
                                        }       
                                        ?>
                                    </td>

                                     <td class="center">
                                        <a href="<?php echo base_url().'admin/daftarmurid/'.$kelas->id; ?>" data-id="6">Daftar Murid<i class="fa fa-arrow-right"></i></a><br>
                                    </td>

                                    <td class="center action">
                                        <?php
                                        $alamatemail = $kelas->teacher->get()->email;
                                         echo $alamatemail ?>
                                    </td>
                                    <!-- <td class="center">
                                        <a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>" data-id="6">Detail Kelas<i class="fa fa-arrow-right"></i></a><br>
                                    </td> -->
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="cl">&nbsp;</div>            
            </div>
        </div>
        <!-- Main -->
    </div>
</div>