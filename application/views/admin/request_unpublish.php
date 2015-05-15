<script type=text/javascript>
    function unpublish(){
        return confirm("Unpublish kelas ini?");
    }
</script>

<script type=text/javascript>
    function reject(){
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
                <div class="box unpub">
                    <!-- Box Head -->
                    <div class="box-head unpub">
                        <h2 class="left">Class Confirmation</h2>
                    </div>
                    <!-- End Box Head -->
                    <div class="table unpub">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <!-- <th>ID Kelas</th> -->
                                    <th>Nama Kelas (ID)</th>
                                    <th>Status Kelas</th>
                                    <th class="center">E-mail Guru</th>
                                    <th class="center">Action</th>
                                    <!-- <th class="center">Detail</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_kelas_request_unpublish as $kelas) : ?>
                                <tr>
                                    <!-- <td><a class="fancybox class" data-attd_type="class" data-class_id="2" href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>">
                                        <?php echo $kelas->id; ?></a>
                                    </td> -->
                                    <td>
                                        <div class="namakelas"><a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>"><?php echo $kelas->nama; ?> (<?php echo $kelas->id; ?>)</a></div>
                                    </td>
                                    <td>
                                        <?php echo "Requested to Unpublish"; ?>
                                    </td>
                                    <td class="center action">
                                        <?php 
                                        $alamatemail = $kelas->teacher->get()->email;
                                        echo $alamatemail 
                                         ?>
                                    </td>
                                    <td class="center action">
                                        <a href="<?php echo base_url().'admin/unpublish/'.$kelas->id; ?>" class="ok icon-button" onclick="return unpublish()"><i class="fa fa-check"></i>Unpublish</a>
                                        <a href="<?php echo base_url().'admin/reject/'.$kelas->id; ?>" class="no icon-button" onclick="return reject()"><i class="fa fa-times"></i>Reject</a>   
                                    </td>
                                    <!-- <td class="center">
                                        <a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>" data-id="6">Detail<i class="fa fa-arrow-right"></i></a><br>
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