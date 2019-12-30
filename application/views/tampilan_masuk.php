<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Sistem Inventori Obat Apotek Dedi Nur</title>
<!-- <link href="<?=base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
<link href="<?=base_url();?>assets/css/login/login.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url();?>assets/css/login/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url();?>assets/css/login/login-util.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url();?>assets/plugin/iconic/css/material-design-iconic-font.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url();?>assets/plugin/animate/animate.css" rel="stylesheet" type="text/css" media="all" />

<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//fonts-->
<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

<script src="<?=base_url();?>assets/plugin/bootbox/bootbox.js"></script>

<!--script-->
</head>
<body> 
    <!--header-->
    <div class="limiter">
            <div class="container-login100" style="background-image: url('<?=base_url();?>assets/images/back2.jpg');">
                <img style="width: 316px; position: absolute; top : 130px;" src="<?=base_url();?>assets/images/logotext.png">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <form role="form" method="POST" action="<?=base_url();?>masuk/check">
					<span class="login100-form-title p-b-49">
						Masuk
					</span>
                    <?php echo $this->session->flashdata('info'); ?>
                        <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                            <span class="label-input100">Nama Pengguna</span>
                            <input class="input100" type="text" name="username" placeholder="Ketik nama pengguna anda">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">Kata Sandi</span>
                            <input id="txtpass" class="input100" type="password" name="password"
                                   placeholder="Ketik kata sandi anda">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>

                        <div class="text-left p-t-8 p-b-31">
                            <input type="checkbox" onclick="nampakpass()"><small style="color:#ffffff">&nbsp; Tampilkan
                                kata sandi</small>
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button type="submit" class="login100-form-btn" value="login">
                                    <b>Masuk</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
<script>
            function nampakpass() {
                var x = document.getElementById("txtpass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>


        <div id="dropDownSelect1"></div>
</html>