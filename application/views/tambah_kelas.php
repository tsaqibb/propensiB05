<div class="container content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="text-center">Halo, [Nama Guru]</h4>
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
                <h2 class="block-title text-uppercase">Kelas</h2>
                <div class="panel-body">
                    <div role="tabpanel" class="sub-vendor">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#detil-kelas" aria-controls="detil-kelas" role="tab" data-toggle="tab" aria-expanded="true" >Detil Kelas</a>
                            </li>
                            <li role="presentation">
                                <a href="#materi" aria-controls="materi" role="tab" data-toggle="tab">Materi</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="detil-kelas">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="Namakelas" class="col-sm-3 control-label">Nama Kelas</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="Namakelas" placeholder="Nama dari kelas yang akan diselenggarakan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Seo" class="col-sm-3 control-label">Deskripsi Kelas</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" placeholder="Jelaskan secara singkat materi apa saja yang akan dijelaskan" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Seo" class="col-sm-3 control-label">Harga</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="Seo" placeholder="Masukkan angka saja, mis: 50000. 0 jika kelas gratis">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="attachment" class="col-sm-3 control-label">Tags</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="tag" placeholder="">
                                        </div>
                                    </div>
                                </form>
                                <div id="class-notes">
                                    <div class="btn btn-default main-button register">
                                        Lanjut >>
                                    </div>
                                </div>
                            </div><!-- published -->
                            <div role="tabpanel" class="tab-pane " id="materi">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>ID</td>
                                                <td>Nama Kelas</td>
                                                <td>Status</td>
                                                <td>Edit</td>
                                                <td>Preview</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3</td>
                                                <td>PHP Programming - Basic</td>
                                                <td class="status">
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="manage icon-circle" title="" data-original-title="Edit"><i class="fa fa-gears"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Preview"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Java Programming - Basic</td>
                                                <td class="status">
                                                    <span class="pending icon-circle" title="Pending Approve"><i class="fa fa-ellipsis-h"></i></span>
                                                </td>
                                                <td class="text-center">
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Preview"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>PHP Programming - Advance</td>
                                                <td class="status">
                                                    <span class="approved icon-circle" title="Approved"><i class="fa fa-check"></i></span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="manage icon-circle" title="" data-original-title="Edit"><i class="fa fa-gears"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Preview"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Java Programming - Advance</td>
                                                <td class="status">
                                                    <span class="pending icon-circle" title="Pending Publish"><i class="fa fa-upload"></i></span>
                                                </td>
                                                <td class="text-center">
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="" data-original-title="Preview"><i class="fa fa-arrow-right"></i></a>
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