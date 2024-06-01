<?php 

session_start();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="../../assets/admin/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="../../assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="../../assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="../../assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="../../assets/admin/plugins/bs-stepper/css/bs-stepper.css" rel="stylesheet" />
    <script src="../../assets/admin/js/jquery.min.js"></script>

	<!-- loader-->
	<link href="../../assets/admin/css/pace.min.css" rel="stylesheet" />
	<script src="../../assets/admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="../../assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../assets/admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="../../assets/admin/css/app.css" rel="stylesheet">
	<link href="../../assets/admin/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="../../assets/admin/css/dark-theme.css" />
	<link rel="stylesheet" href="../../assets/admin/css/semi-dark.css" />
	<link rel="stylesheet" href="../../assets/admin/css/header-colors.css" />
	<title>STNK.id</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<?php require_once("menu.php"); ?>
		<!--start header -->
		<header>
			
		<?php require_once("header.php"); ?>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content" id='content'>
			<!-- BEGIN CONTENT -->


				

			<!-- END CONTENT -->
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<?php require_once("footer.php"); ?>
	</div>
	<!--end wrapper-->

	 



	<script src="../../route/route_super_admin.js"></script> 

	<!-- Bootstrap JS -->
	<script src="../../assets/admin/js/bootstrap.bundle.min.js"></script>
    
	<!--plugins-->
	<script src="../../assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../../assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../../assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="../../assets/admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
	<script src="../../assets/admin/plugins/bs-stepper/js/main.js"></script> 

	<script src="../../assets/admin/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="../../assets/admin/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="../../assets/admin/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="../../assets/admin/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="../../assets/admin/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>

	<script>
		$('#fancy-file-upload').FancyFileUpload({
			params: {
				action: 'fileuploader'
			},
			maxfilesize: 1000000
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script>
	
	<!--app JS-->
	<script src="../../assets/admin/js/app.js"></script>
</body>
</html>