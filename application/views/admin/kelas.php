<div class="container content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="text-center">Halo, [Nama Admin]</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="" aria-controls="profil" role="tab" data-toggle="tab"><i class="fa fa-users"></i> Kelas</a>
                    </li>
                    <li role="presentation">
                        <a href="<?php echo base_url();?>admin/partisipan" aria-controls="reponsible" role="tab" data-toggle="tab"><i class="fa fa-male"></i> Calon Partisipan</a>
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
                                <a href="#pending-pub" aria-controls="pending-pub" role="tab" data-toggle="tab">Pending Publish</a>
                            </li>
                            <li role="presentation">
                                <a href="#pending-unpub" aria-controls="pending-unpub" role="tab" data-toggle="tab">Pending Unpublish</a>
                            </li>
                            <li role="presentation">
                                <a href="#pending-approve" aria-controls="pending-approve" role="tab" data-toggle="tab">Pending Approve</a>
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
                                                <td>Action</td>
                                                <td class="statusdetil">Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="nama">Web Programming - Basic</td>
                                                <td class="status">
                                                    <a href="#" class="cancel icon-button"><i class="fa fa-times"></i>Unpublish</a>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="nama">Web Programming - Advance</td>
                                                <td class="status">
                                                    <a href="#" class="cancel icon-button"><i class="fa fa-times"></i>Unpublish</a>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                                <div id="class-notes">
                                    <p> Catatan: </p>
                                    <ol>
                                        <li>
                                            Untuk kelas yang sudah <em>live</em>, Anda tidak diizinkan untuk melakukan perubahan. 
                                            Jika Anda ingin mengubah detilnya, kelas Anda harus menjadi draft kembali
                                        </li>
                                    </ol>
                                </div>
                            </div><!-- published -->
                            <div role="tabpanel" class="tab-pane " id="pending-pub">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td class="statusid">ID</td>
                                                <td>Nama Kelas</td>
                                                <td>Action</td>
                                                <td class="statusdetil">Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="nama">Java Programming - Basic</td>
                                                <td class="status">
                                                    <a href="#" class="approve icon-button"><i class="fa fa-upload"></i>Publish</a><br></br>
                                                    <a href="#" class="cancel icon-button" title=""><i class="fa fa-times"></i>Unpublish</a>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="nama">Java Programming - Advance</td>
                                                <td class="status">
                                                    <a href="#" class="approve icon-button"><i class="fa fa-upload"></i>Publish</a><br></br>
                                                    <a href="#" class="cancel icon-button"><i class="fa fa-close"></i>Unpublish</a>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                                <div id="class-notes">
                                    <p> Catatan: </p>
                                    <ol>
                                        <li>
                                            Jika Anda memilih pilihan <em>Unpublish</em>, status kelas akan diubah menjadi <em>Unapproved</em>.
                                        </li>
                                    </ol>
                                </div>
                            </div><!-- pending publish -->
                            <div role="tabpanel" class="tab-pane " id="pending-unpub">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td class="statusid">ID</td>
                                                <td>Nama Kelas</td>
                                                <td>Action</td>
                                                <td class="statusdetil">Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <td>1</td>
                                                <td class="nama">Tes Kelas - Advance</td>
                                                <td class="status">
                                                    <a href="#" class="approve icon-button"><i class="fa fa-check"></i>Unpublish</a><br></br>
                                                    <a href="#" class="cancel icon-button"><i class="fa fa-times"></i>Reject</a>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                                <div id="class-notes">
                                    <p> Catatan: </p>
                                    <ol>
                                        <li>
                                            Jika Anda memilih pilihan <em>Reject</em>, status kelas akan kembali menjadi <em>Publish</em>. Jika Anda memilih pilihan <em>Unpublish</em>, status kelas akan diubah menjadi <em>Approved</em>
                                        </li>
                                    </ol>
                                </div>
                            </div><!-- pending unpublish -->
                            <div role="tabpanel" class="tab-pane " id="pending-approve">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td class="statusid">ID</td>
                                                <td>Nama Kelas</td>
                                                <td>Action</td>
                                                <td class="statusdetil">Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="nama">Tes Kelas - Basic</td>
                                                <td class="status">
                                                    <a href="#" class="approve icon-button"Approve><i class="fa fa-check"></i>Approve</a> <br></br>
                                                    <a href="#" class="cancel icon-button"><i class="fa fa-times"></i>Unapprove</a>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                                <div id="class-notes">
                                    <p> Catatan: </p>
                                    <ol>
                                        <li>
                                            Jika Anda memilih pilihan <em>Unapprove</em>, status kelas akan kembali menjadi <em>Unapproved</em>
                                        </li>
                                    </ol>
                                </div>
                            </div><!-- pending approve -->
                            <div role="tabpanel" class="tab-pane" id="draft">Kelas tidak tersedia </div><!-- draft -->
                            <div role="tabpanel" class="tab-pane" id="past">Kelas tidak tersedia </div><!-- past -->
                        </div><!-- tab-content -->

                    </div><!-- tabpanel kelas -->
                </div><!-- panel-body -->
            </div><!-- panel -->
        </div>
    </div>
</div> <!-- /container -->