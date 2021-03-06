<script type=text/javascript>
    function konfirmasipublish(){
        return confirm("Publish kelas ini?");
    }
</script>

<script type=text/javascript>
    function konfirmasireject(){
        return confirm("Reject kelas ini?");
    }
</script>

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
                        <h2 class="left">Pending Class Confirmation</h2>
                    </div>
                    <!-- End Box Head -->
                    <div class="table">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Nama Kelas (ID)</th>
                                    <th>Status Kelas</th>
                                    <th class="center">Action</th>
                                    <!-- <th class="center">Detail</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_kelas_pending as $kelas) : ?>
                                <tr>
                                    <!-- <td><a class="fancybox class" data-attd_type="class" data-class_id="2" href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>">
                                        <?php echo $kelas->id; ?></a>
                                    </td> -->
                                    <td>
                                        <div class="namakelas"><a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>"><?php echo $kelas->nama; ?> (<?php echo $kelas->id; ?>)</a></div>
                                    </td>
                                    <td>
                                        <?php 
                                        if ($kelas->status_kelas=='1') {
                                            echo "Pending Publish";
                                        }
                                        ?>
                                    </td>
                                    <td class="center action">
                                        <?php if($kelas->status_kelas=='1') : ?>
                                            <a href="<?php echo base_url().'admin/publish/'.$kelas->id; ?>" onclick="return konfirmasipublish()" class="ok icon-button" approve=""><i class="fa fa-check"></i>Publish</a>
                                            <a href="<?php echo base_url().'admin/reject/'.$kelas->id; ?>" onclick="return konfirmasireject()" class="no icon-button"><i class="fa fa-times"></i>Reject</a>      
                                        <?php endif; ?>
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