<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Login | Admin Session</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Login page reeds" name="description" />
        <meta content="CicaManta" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/_admins/assets/images/logo-alternative.png">

        <!-- Bootstrap Css -->
        <link href="<?= base_url() ?>assets/_admins/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url() ?>assets/_admins/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url() ?>assets/_admins/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <!-- <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="javascript:;" class="auth-logo">
                                    <img src="{base_url('assets/uploads/images/logo/')}{website('logo')}" height="45" class="logo-dark mx-auto" alt="logo">
                                    <img src="{base_url('assets/uploads/images/logo/')}{website('logo')}" height="45" class="logo-light mx-auto" alt="logo">
                                </a>
                            </div>
                        </div> -->

                        <h4 class="text-muted text-center font-size-18"><b>Login</b></h4>
						
						<div id="respon"></div>
                        <div class="p-3">
                            <form id="form_login" class="form-horizontal mt-3" method="POST" action="<?= base_url($uri_root) ?>find">
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input id="username" type="username" class="form-control " name="username" value="" required autocomplete="username" autofocus>
										<span id="error_username" class="text-danger"></span>
									</div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">
										<span id="error_username" class="text-danger"></span>
									</div>
                                </div>

                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="<?= base_url() ?>assets/_admins/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url() ?>assets/_admins/assets/libs/node-waves/waves.min.js"></script>

        <script src="<?= base_url() ?>assets/_admins/assets/js/app.js"></script>
		<script>
			$('#form_login').submit(function(e){
				e.preventDefault();
				var url  = $("#form_login").attr('action');
				var data = $(this).serialize();
				let post = $.post(url, data);
				post.done(function(respon){
					if(respon.status == true){
						// toastr.success('Berhasil, Anda berhasil login.');
						$("#respon").html(`<div class="alert alert-success mb-2" role="alert">
							<strong>Berhasil!</strong> Anda berhasil login.
						</div>`)
						window.location.replace(respon.data);
						$('input[name=username]').val('');
						$('input[name=password]').val('');
					}else{
						// toastr.error('Gagal!, Terjadi kesalahan.');
						$("#respon").html(`<div class="alert alert-danger mb-2" role="alert">
							<strong>Gagal!</strong> Terjadi kesalahan.
						</div>`)
						$('#error_username').html(respon.username);
						$('#error_password').html(respon.password);
					}
				});
				post.fail(function(respon){
						// toastr.error('Gagal!, Terjadi kesalahan.');
				});
			});
		</script>
    </body>
</html>
