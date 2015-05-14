<script type=text/javascript>
    function konfirmasiapprove(){
        return confirm("Approve kelas ini?");
    }
</script>

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
                <div class="box review">
                    <!-- Box Head -->
                    <div class="box-head">
                        <h2 class="left">Pending Review Confirmation</h2>
                    </div>
                    <!-- End Box Head -->
                    <div class="table">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>ID Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Guru(ID)</th>
                                    <th>Reviewer(ID)</th>
                                    <th class="large">Komentar</th>
                                    <th class="center">Action</th>
                                    <th class="center">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_pending_comment as $comment) :
                                    $review = $comment->review->get();
                                    $course = $review->course->get();
                                    $student = $review->student->get();
                                    $teacher = $course->teacher->get();
                                ?>
                                <tr>
                                    <td><a class="fancybox class" data-attd_type="class" data-class_id="2" href="<?php echo base_url().'kelas/detail/'.$course->id; ?>">
                                        <?php echo $course->id; ?></a>
                                    </td>
                                    <td>
                                        <?php echo $course->nama; ?>
                                    </td>
                                    <td>
                                        <?php echo $teacher->nama."(".$teacher->id.")"; ?>
                                    </td>
                                    <td>
                                        <?php echo $student->nama."(".$student->id.")"; ?>
                                    </td>
                                    <td>
                                        <?php echo $comment->komentar; ?>
                                    </td>
                                    <td class="center action">
                                        <a href="<?php echo base_url().'admin/approve_review/'.$comment->id; ?>" onclick="return konfirmasiapprove()" class="ok icon-button" approve=""><i class="fa fa-check"></i>Approve</a>
                                        <a href="<?php echo base_url().'admin/reject_review/'.$comment->id; ?>" onclick="return konfirmasireject()" class="no icon-button"><i class="fa fa-times"></i>Reject</a>
                                    </td>
                                    <td class="center">
                                        <a href="<?php echo base_url().'kelas/detail/3002/'.$course->id; ?>" data-id="6">Detail<i class="fa fa-arrow-right"></i></a><br>
                                    </td>
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