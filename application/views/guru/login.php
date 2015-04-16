<html>
<head>
<script src="<?php echo base_url(); ?>js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
$(document).ready(function(){
    $("#login-guru-form").validationEngine('attach');
}); 
</script>
</head>
<body>
<div id="content">
    <div id="content-wrap">
        <div class="blank" style="height: 30px;"></div>
        <div id="login-guru">
            <div id="login-guru-header">
                <div id="login-guru-header-wrap">
                    LOGIN GURU
                </div>
            </div>
            <div id="login-guru-content" class="guru-content">
                <form id="login-guru-form" class="guru-form" method="post" action="<?php echo base_url();?>user/login_submit/guru">
                    <table>
                        <tr height="50px">
                            <td style="width: 250px;">Email</td>
                            <td>
                                <input for="login_name" type="text" class="validate[required,custom[email]] text" />
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input for"login_pass" type="password" class="validate[required,minSize[6]] text" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="blank" style="height:5px;"></div>
                                <div>
                                    <a class="normal-link" href="http://rangguru.com/guru/reset_password">Lupa Password?</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="blank" style="height:20px;"></div>
                                <div>
                                    <input type="image" src="<?php echo base_url();?>images/masuk-button.png"/>&nbsp;<a href="<?php echo base_url().'guru/reg_guru'?>"><img src="<?php echo base_url().'images/daftar-button.png';?>"/></a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
                <div class="blank" style="height: 20px;"></div>
            </div>
        </div>
        <div class="blank" style="height: 30px;"></div>
        <div class="blank" style="height: 30px;"></div>
        <div id="login-guru">
            <div id="login-guru-header">
                <div id="login-guru-header-wrap">
                    LOGIN Murid
                </div>
            </div>
            <div id="login-guru-content" class="guru-content">
                <form id="login-guru-form" class="guru-form" method="post" action="<?php echo base_url();?>user/login_submit/murid">
                    <table>
                        <tr height="50px">
                            <td style="width: 250px;">Email</td>
                            <td>
                                <input for="login_name" type="text" class="validate[required,custom[email]] text" />
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input for="login_pass" type="password" class="validate[required,minSize[6]] text" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="blank" style="height:5px;"></div>
                                <div>
                                    <a class="normal-link" href="http://rangguru.com/guru/reset_password">Lupa Password?</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="blank" style="height:20px;"></div>
                                <div>
                                    <input type="image" src="<?php echo base_url();?>images/masuk-button.png"/>&nbsp;<a href="<?php echo base_url().'guru/reg_guru'?>"><img src="<?php echo base_url().'images/daftar-button.png';?>"/></a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
                <div class="blank" style="height: 20px;"></div>
            </div>
        </div>
        <div class="blank" style="height: 30px;"></div>
    </div>
</div>
</body>
</html>