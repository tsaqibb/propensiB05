<div class="container content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="text-center">Halo, [Nama Guru]</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="" aria-controls="profil" role="tab" data-toggle="tab"><i class="fa fa-users"></i> Kelas Anda</a>
                    </li>
                    <li role="presentation">
                        <a href="<?php echo base_url();?>guru/tambahkelas" aria-controls="tambah-kelas" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Kelas</a>
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
                                                <td class="statusdetil">Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="nama">Web Programming - Basic</td>
                                                <td>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="nama">Web Programming - Advance</td>
                                                <td>
                                                    <span class="pending icon-circle" title="Pending Unpublish"><i class="fa fa-ellipsis-h"></i></span>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                                <div id="class-notes">
                                    <p> Catatan: </p>
                                    <ol>
                                        <li>
                                            Untuk kelas yang sudah live, Anda tidak diizinkan untuk melakukan perubahan. Jika Anda ingin mengubah detilnya, kelas Anda harus menjadi draft kembali
                                        </li>
                                    </ol>
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
                                                <td class="statusdetil">Edit</td>
                                                <td class="statusdetil">Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3</td>
                                                <td class="nama">PHP Programming - Basic</td>
                                                <td>
                                                </td>
                                                <td>
                                                    <a href="#" class="manage icon-circle" title="" data-original-title="Edit"><i class="fa fa-gears"></i></a>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td class="nama">Java Programming - Basic</td>
                                                <td>
                                                    <span class="pending icon-circle" title="Pending Approve"><i class="fa fa-ellipsis-h"></i></span>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td class="nama">PHP Programming - Advance</td>
                                                <td>
                                                    <span class="approved icon-circle" title="Approved"><i class="fa fa-check"></i></span>
                                                </td>
                                                <td>
                                                    <a href="#" class="manage icon-circle" title="" data-original-title="Edit"><i class="fa fa-gears"></i></a>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td class="nama">Java Programming - Advance</td>
                                                <td>
                                                    <span class="pending icon-circle" title="Pending Publish"><i class="fa fa-upload"></i></span>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Lihat Detil Kelas"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- table-responsive -->
                                <div id="class-notes">
                                    <p> Catatan: </p>
                                    <ol>
                                        <li>
                                            Untuk kelas yang sudah live, Anda tidak diizinkan untuk melakukan perubahan. Jika Anda ingin mengubah detilnya, kelas Anda harus menjadi draft kembali
                                        </li>
                                    </ol>
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