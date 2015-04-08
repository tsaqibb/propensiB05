<div id="container">
    <div class="shell">
        <!-- Small Nav -->
        <div class="small-nav">
            <a href="http://ruang.guru/admin/teacher_driven">Teacher Driven</a>
                <span class="breadcumb_separator">&gt;</span>
            <a href="http://ruang.guru/admin/teacher_driven/class_list">
                Class
            </a>
            <span class="breadcumb_separator">&gt;</span>Attendance
        </div>
        <!-- End Small Nav -->
        <!-- Main -->
        <div id="main">
            <div class="cl">&nbsp;</div>
            <!-- Content -->
            <div id="content">
                <!-- Box -->
                <div class="box">
                    <!-- Box Head -->
                    <div class="box-head">
                        <h2 class="left">Class Management</h2>
                    </div>
                    <!-- End Box Head -->
                    <div class="table">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Class ID</th>
                                    <th>Status</th>
                                    <th class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a class="fancybox class" data-attd_type="class" data-class_id="2" href="#class_detail">2</a>
                                        (Nama Kelas 2)
                                    </td>
                                    <td>Pending Approve</td>
                                    <td class="center">
                                        <a class="ico fancybox" href="#detail_vendor" data-id="6">Detail</a><br>
                                        <span class="ok">
                                            <a class="ico edit" href="#deactivate">deactivate</a>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a class="fancybox class" data-attd_type="class" data-class_id="1" href="#class_detail">1</a>
                                        (Nama Kelas 1)
                                    </td>
                                    <td>Pending Approve</td>
                                    <td class="center">
                                        <a class="ico fancybox" href="#detail_vendor" data-id="6">Detail</a><br>
                                        <span class="ok">
                                            <a class="ico edit" href="#deactivate">deactivate</a>
                                        </span>
                                    </td>
                                </tr>
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