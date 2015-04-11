<?php require_once APPPATH.'third_party/datamapper/bootstrap.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Ruangguru Administration</title>
        <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>css/admin.css" type="text/css" media="all" />
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url();?>";
        </script>
		<style type="text/css" media="screen">
			.msg.boxwidth {
				z-index: -1;
			}
		</style>
    <script type="text/javascript" src="6_S3_"></script></head>
    <body>
        <!-- Header -->
        <div id="header">
            <div class="shell">
                <!-- Logo + Top Nav -->
                <div id="top">
                    <h1><a href="http://ruang.guru/admin">Ruangguru</a></h1>
                    <div id="top-navigation">
                        Welcome <strong>admin</strong>
                        <span>|</span>
                        <a href="#">Help</a>
                        <span>|</span>
                        <a href="#">Profile Settings</a>
                        <span>|</span>
                        <a href="#">Log out</a>
                    </div>
                </div>
                <!-- End Logo + Top Nav -->
                
                <!-- Main Nav -->
                    <ul id="nav">
	                    <li>
	                        <a href="" >
								<span>Online Class</span>
							</a>
							<ul>
								<li>
									<a href="#" class="active">
										New Class Confirm
									</a>
								</li>
								<li>
									<a href="#" class="">
										Pending Published Class
									</a>
								</li>
								<li>
									<a href="#" class="">
										Pending Unpublished Class
									</a>
								</li>
								<li>
									<a href="#" class="">
										Published Class
									</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>admin/partisipan" class="">
										Calon Murid
									</a>
								</li>
								<li>
									<a href="<?php echo base_url();?>admin/galerikelas" class="">
										Galeri Kelas
									</a>
								</li>
							</ul>
						</li>
                    </ul>
                <!-- End Main Nav -->
            </div>
        </div>
        <!-- End Header -->