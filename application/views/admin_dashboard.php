<div class="container content kelas vendor">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="sidebar">
                <br>
                <h4 class="text-center">Halo, [Nama Admin]</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#kelas" aria-controls="profil" role="tab" data-toggle="tab"><i class="fa fa-users"></i> Kelas</a>
                    </li>
                    <li role="presentation">
                        <a href="#partisipan" aria-controls="reponsible" role="tab" data-toggle="tab"><i class="fa fa-male"></i> Partisipan</a>
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
                                                <td>ID</td>
                                                <td>Nama Kelas</td>
                                                <td>Action</td>
                                                <td>Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Web Programming - Basic</td>
                                                <td class="status">
                                                    <a href="#" class="cancel icon-circle" title="Unpublish"><i class="fa fa-close"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Web Programming - Advance</td>
                                                <td class="status">
                                                    <a href="#" class="cancel icon-circle" title="Unpublish"><i class="fa fa-close"></i></a>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
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
                            <div role="tabpanel" class="tab-pane " id="pending-pub">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>ID</td>
                                                <td>Nama Kelas</td>
                                                <td>Action</td>
                                                <td>Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3</td>
                                                <td>Java Programming - Basic</td>
                                                <td class="status">
                                                    <a href="#" class="publish icon-circle" title="Publish"><i class="fa fa-upload"></i></a>
                                                    <a href="#" class="cancel icon-circle" title="Unpublish"><i class="fa fa-close"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Java Programming - Advance</td>
                                                <td class="status">
                                                    <a href="#" class="publish icon-circle" title="Publish"><i class="fa fa-upload"></i></a>
                                                    <a href="#" class="cancel icon-circle" title="Unpublish"><i class="fa fa-close"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
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
                            <div role="tabpanel" class="tab-pane " id="pending-unpub">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>ID</td>
                                                <td>Nama Kelas</td>
                                                <td>Action</td>
                                                <td>Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <td>4</td>
                                                <td>Tes Kelas - Advance</td>
                                                <td class="status">
                                                    <a href="#" class="approve icon-button"><i class="fa fa-check"></i>Unpublish</a>
                                                    <a href="#" class="cancel icon-button"><i class="fa fa-times"></i>Reject</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
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
                            </div><!-- pending unpublish -->
                            <div role="tabpanel" class="tab-pane " id="pending-approve">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>ID</td>
                                                <td>Nama Kelas</td>
                                                <td>Action</td>
                                                <td>Detil</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3</td>
                                                <td>Tes Kelas - Basic</td>
                                                <td class="status">
                                                    <a href="#" class="publish icon-circle" title="Approve"><i class="fa fa-check"></i></a>
                                                    <a href="#" class="cancel icon-circle" title="Unapprove"><i class="fa fa-times"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="link icon-circle" title="Link"><i class="fa fa-arrow-right"></i></a>
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