<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Oturum Aç | Kontrol Panel</title>
        <meta charset="UTF-8" />
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/'); ?>css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/'); ?>css/matrix-login.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/'); ?>font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800">
        <link rel="shortcut icon" href="<?php echo base_url('public/back_end/img/favicon.png'); ?>">
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginforma" class="form-vertical" method="post">
				<div class="control-group normal_text">
                    <a href="https://mutfakyapim.com">
                        <img src="<?php echo base_url('public/back_end/img/mutfak-yapim-logo.png'); ?>" alt="Logo" />
                    </a>
                    <h4 style="font-weight: 100;">Kontrol Paneli</h4>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" required="" autocomplete="off" name="sign_in_e_mail" placeholder="E-Posta Adresi" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" required="" autocomplete="off" name="sign_in_password" placeholder="Şifre" />
                        </div>
                    </div>
                </div>
                <div class="form-actions" style="text-align: center;">
                   <input type="submit" class="btn btn-success" value="Oturum Aç">
                   <br><br>
                   <span>Content Management System by Mutfak Yapım</span><br>
                   <span>All Right Reserved Copyright <?php echo date('Y'); ?></span><br>
                   <span>version 1.1.13</span><br>
                   <span><a href="https://mutfakyapim.com"><b>www.mutfakyapim.com</b></a></span>
                </div>
            </form>
        </div>
    </body>
</html>
