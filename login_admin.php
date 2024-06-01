<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/syndron/demo/vertical/auth-basic-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Mar 2024 07:16:31 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="staff/assets/admin/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="staff/assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="staff/assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="staff/assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="staff/assets/admin/css/pace.min.css" rel="stylesheet" />
	<script src="staff/assets/admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="staff/assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="staff/assets/admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="staff/assets/admin/css/app.css" rel="stylesheet">
	<link href="staff/assets/admin/css/icons.css" rel="stylesheet">
	<script src="staff/assets/admin/js/jquery.min.js"></script>
	<title>STNK.id</title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-2 text-center">
										<img src="staff/assets/admin/images/logo.png" width="150" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">Login Admin</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
										<form class="row g-3" method="post" action="staff/middleware/login_admin_process.php">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Username</label>
												<input type="text" name="admin_username" class="form-control" id="inputEmailAddress" placeholder="Masukkan Username Anda">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="admin_password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Masukkan Password Anda"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary" name="submit">Sign in</button>
												</div>
											</div>
										</form>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="staff/assets/admin/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="staff/assets/admin/js/jquery.min.js"></script>
	<script src="staff/assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="staff/assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="staff/assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="staff/assets/admin/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/syndron/demo/vertical/auth-basic-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Mar 2024 07:16:31 GMT -->
</html>