<script src="<?php echo base_url(); ?>js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
$(document).ready(function(){
    $("#login-guru-form").validationEngine('attach');
}); 
</script>
<div class="container content">
    <div class="row">
        <div class="col-sm-6 log-reg">
            <div class="panel panel-default panel-big">
                <div class="panel-heading heading-label">Login Sebagai Murid</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="<?php echo base_url();?>user/login_submit/murid" method="post">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="emailanda@email.com" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default main-button register">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- panel -->
        </div><!-- col-sm-6 -->
        <div class="col-sm-6 log-reg">
            <div class="panel panel-default panel-big">
                <div class="panel-heading heading-label">Login Sebagai Guru</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="<?php echo base_url();?>user/login_submit/guru" method="post">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="emailanda@email.com" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default main-button register">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- panel -->
        </div><!-- col-sm-6 -->
        <div class="col-sm-6 log-reg">
            <div class="panel panel-default panel-big">
                <div class="panel-heading heading-label">Login Sebagai Admin</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="<?php echo base_url();?>user/login_submit/admin" method="post">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="emailanda@email.com" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default main-button register">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- panel -->
        </div><!-- col-sm-6 -->
    </div>
</div>