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
                                    <th>ID Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Status Kelas</th>
                                    <th class="center">Action</th>
                                    <th class="center">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_kelas_pending as $kelas) : ?>
                                <tr>
                                    <td><a class="fancybox class" data-attd_type="class" data-class_id="2" href="#class_detail">
                                        <?php echo $kelas->id; ?></a>
                                    </td>
                                    <td>
                                        <?php echo $kelas->nama; ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if ($kelas->status_kelas=='1') {
                                            echo "Pending Approve"; 
                                        }       
                                        elseif ($kelas->status_kelas=='3') {
                                            echo "Pending Publish";
                                        }
                                        ?>
                                    </td>
                                    <td class="center action">
                                        <?php if($kelas->status_kelas=='1') : ?>
                                            <a href="#" class="ok icon-button" approve=""><i class="fa fa-check"></i>Approve</a>
                                            <a href="#" class="no icon-button"><i class="fa fa-times"></i>Reject</a>
                                        <?php endif; ?>

                                        <?php if($kelas->status_kelas=='3') : ?>
                                             <a href="#" class="ok icon-button" approve=""><i class="fa fa-check"></i>Publish</a>
                                             <a href="#" class="no icon-button"><i class="fa fa-times"></i>Reject</a>      
                                        <?php endif; ?>
                                        
                                        

                                    </td>
                                    <td class="center">
                                        <a class="ico edit" href="#detail_vendor" data-id="6">Detail</a><br>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="detail_attendance" class="col-md-4" style="max-width:500px;display: none;height:100%;overflow-x:hidden;">
                    <h2>Details!</h2>
                    <hr>
                    <div id="detail_fill"></div>
                </div>
                <div id="class_detail" style="width: 500px; min-height: 600px; display: none;">
                    <h3>Detail kelas:</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="cl">&nbsp;</div>            
            </div>
        </div>
        <!-- Main -->
    </div>
</div>