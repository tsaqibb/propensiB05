<div class="container-fluid content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="text-center"><?php echo $this->session->userdata('user_name')?></h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href=""><i class="fa fa-users"></i> Kelas Anda</a>
                    </li>
                    <li role="presentation">
                        <a href="<?php echo base_url();?>guru/tambahkelas"><i class="fa fa-plus"></i> Tambah Kelas</a>
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
                                <a href="#published" aria-controls="published" role="tab" data-toggle="tab" aria-expanded="true" >Published</a>
                            </li>
                            <li role="presentation">
                                <a href="#draft" aria-controls="draft" role="tab" data-toggle="tab">Draft</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="published">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td class="statusid">ID</td>
                                                <td>Nama Kelas</td>
                                                <td class="statusdetil">Status</td>
                                                <td class="status_action">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($list_published_kelas as $kelas) : ?>
                                            <tr>
                                                <td><?php echo $kelas->id; ?></td>
                                                <td class="nama"><?php echo $kelas->nama ?></td>
                                                <?php if($kelas->status_kelas == 5) : ?>
                                                <td>
                                                    <span class="pending icon-circle" title="" data-original-title="Pending Unpublish"><i class="fa fa-ellipsis-h"></i></span>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>" class="link icon-circle" title="" data-original-title="Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                                <?php else: ?>
                                                <td></td>
                                                <td>
                                                    <a href="<?php echo base_url().'guru/edit_kelas/'.$kelas->id; ?>" class="manage icon-circle" title="" data-original-title="Edit"><i class="fa fa-gears"></i></a>
                                                    <a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>" class="link icon-circle" title="" data-original-title="Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                                <div id="class-notes">
                                    <p> Catatan: </p>
                                    <div><span class="manage icon-circle"><i class="fa fa-gears"></i></span> Edit Kelas </div>
                                    <div><span class="link icon-circle"><i class="fa fa-arrow-right"></i></span> Link untuk melihat Kelas Online yang sudah dibuat </div>
                                    <div><span class="pending icon-circle"><i class="fa fa-ellipsis-h"></i></span> Kelas dalam keadaan pending untuk dipindahkan ke dalam draft </div>
                                </div>
                            </div><!-- published -->
                            <div role="tabpanel" class="tab-pane" id="draft">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td class="statusid">ID</td>
                                                <td>Nama Kelas</td>
                                                <td class="statusdetil">Status</td>
                                                <td class="status_action">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($list_draft_kelas as $kelas) : ?>
                                            <tr>
                                                <td><?php echo $kelas->id ?></td>
                                                <td class="nama"><?php echo $kelas->nama ?></td>
                                                <td>
                                                    <?php if($kelas->status_kelas == 1 ) : ?>
                                                        <span class="pending icon-circle" title="Pending Approve"><i class="fa fa-ellipsis-h"></i></span>
                                                    <?php elseif($kelas->status_kelas == 2 ) : ?>
                                                        <span class="approved icon-circle" title="Approved"><i class="fa fa-check"></i></span>
                                                    <?php elseif($kelas->status_kelas == 3 ) : ?>
                                                        <span class="pending icon-circle" title="Pending Publish"><i class="fa fa-upload"></i></span>
                                                    <?php else : ?>
                                                        <span class="cancel icon-circle" title="Rejected"><i class="fa fa-close"></i></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($kelas->status_kelas == 0 || $kelas->status_kelas == 2) : ?>
                                                        <a href="<?php echo base_url().'guru/edit_kelas/'.$kelas->id; ?>" class="manage icon-circle" title="" data-original-title="Edit"><i class="fa fa-gears"></i></a>
                                                        <a href="<?php echo base_url().'guru/delete/'.$kelas->id; ?>"
                                                            class="cancel icon-circle delete-class" title="" data-original-title="Delete">
                                                                <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="pending icon-circle"><i class="fa fa-gears"></i></span>
                                                        <span class="pending icon-circle"><i class="fa fa-trash-o"></i></span>
                                                    <?php endif; ?>
                                                    
                                                    <a href="<?php echo base_url().'kelas/detail/'.$kelas->id; ?>"
                                                        class="link icon-circle" title="" data-original-title="Lihat Kelas">
                                                            <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                                <div id="class-notes">
                                    <p> Catatan: </p>
                                    <div><span class="manage icon-circle"><i class="fa fa-gears"></i></span> Edit Kelas (tidak bisa dilakukan jika dalam proses aproval/publikasi kelas) </div>
                                    <div><span class="cancel icon-circle"><i class="fa fa-trash-o"></i></span> Menghapus Kelas (tidak bisa dilakukan jika dalam proses aproval/publikasi kelas) </div>
                                    <div><span class="link icon-circle"><i class="fa fa-arrow-right"></i></span> Link untuk melihat Kelas Online yang sudah dibuat </div>
                                    <div><span class="pending icon-circle"><i class="fa fa-ellipsis-h"></i></span> Kelas masih dalam proses approval dari pihak ruangguru </div>
                                    <div><span class="pending icon-circle"><i class="fa fa-upload"></i></span> Kelas masih dalam proses untuk dipublikasikan </div>
                                </div>
                            </div><!-- pending publish -->
                            <div role="tabpanel" class="tab-pane" id="draft">Kelas tidak tersedia </div><!-- draft -->
                            <div role="tabpanel" class="tab-pane" id="past">Kelas tidak tersedia </div><!-- past -->
                        </div><!-- tab-content -->

                    </div><!-- tabpanel kelas -->
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div>
    </div>
</div> <!-- /container -->
<script type=text/javascript>
    $('.delete-class').click(function(){
        return confirm("Are you sure want to delete class?");
    });
</script>