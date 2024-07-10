<?php
session_start();
include("db_connect.php");
if (isset($_COOKIE['pin']) && $_COOKIE['serial']) {

	$pin = $_COOKIE['pin'];
	$serial = $_COOKIE['serial'];
} else {
	header('location:onlineform.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>PNTC</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8" />
	<meta name="keywords" content="Attainment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<script src="js/jquery.js"></script>

	<link href="css/style1.css" rel="stylesheet" type="text/css" media="screen">

	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- gallery -->
	<link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

	<script src="js/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

	<script type="text/javascript" src="js/validation.min.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<style>
		select {
			height: 100% !important;
		}

		label {
			float: left !important;
		}
	</style>



</head>

<body>
	<script>
		$(document).ready(function() {
			$('#sign').on("click", function(event) {
				console.log(74646);
				$('#file3').click();
			});

			$('#file3').change(function(event) {
				const fileInput = event.target;
				const fileName = fileInput.files.length ? fileInput.files[0].name : 'Upload Signature';
				$('#signature').attr('placeholder', fileName);
				showThumbnail(fileInput);
			});



			function showThumbnail(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						var img = document.getElementById('signatureThumbnail');
						img.src = e.target.result;
						img.style.display = 'block';
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
		});
	</script>



	<script type="text/javascript">
		$(document).on("click", ".open-Delete", function() {
			var myValue = $(this).data('id');

			swal({
					title: "Are you sure?",
					text: "You will not be able to recover this entry!",
					type: "warning",
					showCancelButton: true,
					cancelButtonColor: "red",
					confirmButtonColor: "green",
					confirmButtonText: "Yes, delete it!",
					cancelButtonText: "No, cancel!",
					closeOnConfirm: false,
					closeOnCancel: false,
					buttonsStyling: false
				},
				function(isConfirm) {
					if (isConfirm) {

						$.ajax({
							type: 'POST',
							url: "process.php",
							data: {
								Deletework: myValue
							},
							success: function(result) {
								if (result == "ok") {
									swal({
											title: "Deleted!",
											text: "Your saved entry has been deleted.",
											type: "success"
										},
										function() {
											var pin = '<?php echo $pin ?>';
											var serial = '<?php echo $serial ?>';
											var optionValue = 'xuls';
											$.ajax({
												type: 'POST',
												url: "process.php",
												data: {
													loademployer: optionValue,
													userpin: pin,
													userserial: serial
												},
												success: function(result) {
													if (result == 'No') {
														$("#errors1").html("");
														$("#errors2").html("");
													} else {
														$("#errors1").html(result);
														$("#errors2").html("<a  class='btn btn-default' href='summary.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Employer</a>");

													}
												}
											});
										}
									);
								}

							}
						});
					} else {
						swal("Cancelled", "Your submission is safe :)", "error");
					}
				});

		});
	</script>

	<script type="text/javascript">
		$(document).on("click", ".Employer", function(e) {
			e.preventDefault();
			var name = document.getElementById('name').value;
			var contact = document.getElementById('contact').value;
			var date = document.getElementById('datepicker-starting-view').value;
			var address = document.getElementById('address').value;
			var ref = document.getElementById('ref').value;
			var fileInput = document.getElementById('file3');
			var pin = document.getElementById('pin').value;
			var serial = document.getElementById('serial').value;

			var formData = new FormData($('#uploadForm')[0]);

			$.ajax({
				type: 'POST',
				url: "process.php",
				data: formData,
				processData: false,
				contentType: false,
				success: function(result) {
					console.log({
						result
					});

					if (result.includes("400")) {
						sweetAlert("Oops...", "Fill all fields, they are required", "error");
						$("#errors1").html("All fields are required.");
					} else if (result.includes("201")) {
						$("#errors1").html("Reference Details Updated.");

						swal({
								title: "Confirm",
								text: "Referee Information Updated.",
								type: "success",
								showCancelButton: false,
								confirmButtonText: "OK",
								cancelButtonText: "Cancel",
								closeOnConfirm: true,
								closeOnCancel: true,
								buttonsStyling: false
							},
							function(isConfirm) {
								return;
							});
					} else {
						$("#errors1").html("Reference Details Added.");

						swal({
								title: "Confirm",
								text: "Referee Information Saved",
								type: "success",
								showCancelButton: false,
								confirmButtonText: "OK",
								cancelButtonText: "Cancel",
								closeOnConfirm: true,
								closeOnCancel: true,
								buttonsStyling: false
							},
							function(isConfirm) {
								return;
							});
					}
				}

			});

		});

		// $(document).ready(function() {

		// 	var pin = '<?php echo $pin ?>';
		// 	var serial = '<?php echo $serial ?>';
		// 	var optionValue = 'xuls';
		// 	$.ajax({
		// 		type: 'POST',
		// 		url: "process.php",
		// 		data: {
		// 			loademployer: optionValue,
		// 			userpin: pin,
		// 			userserial: serial
		// 		},
		// 		success: function(result) {

		// 			if (result == 'No') {

		// 			} else {
		// 				$("#errors1").html(result);
		// 				$("#errors2").html("<a  class='btn btn-default' href='summary.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Employment</a>");

		// 			}
		// 		}
		// 	});
		// });
	</script>

	<script type="text/javascript">
		$(document).on("click", ".Del", function() {

			$("#name").val("");
			$("#contact").val("");
			$("#datepicker-starting-view").val("");
			$("#address").val("");
			$("#ref").val("");
			$("#file3").val("");
			$('#signature').attr('placeholder', 'Upload Signature');

		});
	</script>


	<!-- header -->
	<section class="w3layouts-header py-2">
		<div class="container">
			<!-- header -->
			<header>
				<nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
					<h>
						<a class="navbar-brand" href="index.php">
							PREMIER NURSING COLLEGE,PNTC
						</a>
					</h>
					<button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-lg-auto text-center">
							<li class="nav-item active  mr-3">
								<a class="nav-link" href="index.php">Home
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item dropdown mr-3">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Admission
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="biodata.php">Online Form</a>
									<a class="dropdown-item" href="#">Admission Status</a>
									<a class="dropdown-item" href="#">Admission List</a>
									<a class="dropdown-item" href="onlineform.php">Print Form</a>
									<a class="dropdown-item" href="login.php"><i class="fa fa-lock"></i>&nbsp;Administrator</a>
								</div>
							</li>
							<li class="nav-item  mr-3">
								<a class="nav-link" href="#">Registration</a>
							</li>
							<li class="nav-item  mr-3">
								<a class="nav-link" href="#">Results</a>
							</li>

							<li class="nav-item mr-3">
								<a class="nav-link" href="#">Contact</a>
							</li>
							<li class="nav-item mr-3">
								<a class="nav-link" href="logout.php" style="font-weight: bold; font-family: 'Comic Sans MS'; color: #5261D1;">Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- //header -->
		</div>
	</section>
	<!-- //header -->
	<!-- banner -->
	<section class="banner-1">

	</section>
	<!-- //banner -->
	<!-- gallery -->
	<div class="agileits-services text-center py-5">
		<div class="container py-md-4 mt-md-3">
			<h3 class="heading-agileinfo">Stage 5 (Referee)<span>Complete form below</span></h3>
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
				<div class="container">
					<h2></h2>

					<div class="form-login" style="">
						<hr />
						<div class="alert alert-warning">
							<i class="fa fa-info-circle"></i>&nbsp;This stage you Enter your Referee Details in the spaces provided
							<ol>
								<li>Enter your Reference details in spaces provided below</li>
								<li>Add, Delete and Save Reference history using buttons below</li>
							</ol>
						</div>
						<hr />
						<span id="errors1"></span>
						<hr />
						<?php



						// Initialize variables to store fetched data
						$name = $contact = $date = $address = $ref = $signature = $signature_thumbnail = "";

						// Check if 'pin' and 'serial' are set in GET parameters
						// if (isset($_GET['ids']) && isset($_GET['ids'])) {

						// Construct SQL query
						$sql = "SELECT * FROM referees WHERE pin = '$pin' AND serial = '$serial'";

						// Execute query
						$result = $db->query($sql);

						if ($result) {
							// Check if data was found
							if ($result->num_rows > 0) {
								// Fetch data
								$row = $result->fetch_assoc();

								// Store fetched values in variables for form population
								$name = htmlspecialchars($row['name']);
								$contact = htmlspecialchars($row['contact']);
								$date = htmlspecialchars($row['date']);
								$address = htmlspecialchars($row['address']);
								$ref = htmlspecialchars($row['ref']);
								$signature = explode("_", htmlspecialchars($row['signature']))[1];
								$signature_thumbnail = 'images/applicants/' . htmlspecialchars($row['signature']);
							} else {
								// Handle case where no data was found
								echo "No records found.";
							}
						} else {
							// Handle query execution error
							echo "Query failed: " . $db->error;
						}
						// } else {
						// 	// Handle case where 'pin' or 'serial' is not set in GET parameters
						// 	echo "PIN and/or Serial not provided.";
						// }

						// Close database connection
						$db->close();
						?>

						<form id="uploadForm" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" required class="form-control" name="name" id="name" placeholder="Reference Name" value="<?php echo $name; ?>">
							</div>
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" required class="form-control" name="address" id="address" placeholder="Reference Address" value="<?php echo $address; ?>">
							</div>
							<div class="form-group">
								<label for="contact">Contact</label>
								<input type="text" required class="form-control" name="contact" id="contact" placeholder="Reference Contact" value="<?php echo $contact; ?>">
							</div>
							<div class="form-group">
								<label for="datepicker-starting-view">Date</label>
								<input id="datepicker-starting-view" type="date" name="date" class="form-control" placeholder="dd/mm/yy" value="<?php echo $date; ?>">
							</div>
							<div class="form-group" id="sign">
								<label for="signature">Signature</label>
								<input type="text" class="form-control" name="signature" id="signature" placeholder="Upload Signature" style="pointer-events: none;" value="<?php echo $signature; ?>">
								<img id="signatureThumbnail" src="<?php echo $signature_thumbnail; ?>" alt="Signature Thumbnail" style="display: <?php echo $signature ? 'block' : 'none'; ?>; width: 100px; margin-top: 10px;">
							</div>
							<div class="form-group">
								<label for="ref">Class</label>
								<input type="text" required class="form-control" name="ref" id="ref" placeholder="Referee Class" value="<?php echo $ref; ?>">
							</div>
							<input name="file3" hidden type="file" id="file3">

							<p>
								<input name="serial" id="serial" type="hidden" value="<?php if (isset($serial)) echo $serial; ?>">
								<input name="pin" id="pin" type="hidden" value="<?php if (isset($pin)) echo $pin; ?>">
							</p>

							<hr />
							<div class="form-group">
								<button type="submit" class="Employer btn btn-default" name="Change" value="changes">
									<span class="glyphicon glyphicon-check"></span> &nbsp;Save Referee
								</button>
								<button type="submit" class="Del btn btn-default">
									<span class="glyphicon glyphicon-trash"></span> &nbsp;Clear
								</button>
							</div>
							<div class="form-group">
								<a type="button" class="Del btn btn-default" href="document.php">
									<i class="fa fa-arrow-left"></i> &nbsp; Previous
								</a>

								<a type="button" class="Del btn btn-default" href="summary.php">
									<i class="fa fa-arrow-right"></i> &nbsp; Next
								</a>
							</div>
						</form>




					</div>



				</div>

			</div>


		</div>
	</div>
	</div>
	<!-- //gallery -->

	<footer class="footer-section py-5">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 footer-grids">
					<h3>Get in touch</h3>
					<p>Unima Head Office,Chilunga builing,John chilembwe Road </p>
					<p class="my-2">Zomba,Malawi</p>
					<p class="phone">phone: +265 293 4539</p>
					<p class="phone my-2">Fax: +265 818 293 4539</p>
					<p class="phone">Mail:
						<a href="mailto:mvumapatrick@gmail.coom">Namibra</a>
					</p>
				</div>
				<div class="col-lg-4 footer-grids">
					<h2>Latest News</h2>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4">
							<img src="images/s1.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/s2.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/s3.jpg" class="img-fluid" alt="Responsive image">
						</a>
					</div>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4">
							<img src="images/s4.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/hendry.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/2.jpg" class="img-fluid" alt="Responsive image">
						</a>
					</div>
				</div>
				<div class="col-lg-4 footer-grids">
					<h3>Twitter feed</h3>
					<ul class="w3agile_footer_grid_list">
						<li>Am failing t use the login system
							<a href="#">www.pntc.com</a> @James.
							<span>
								<i class="fab fa-twitter"></i> 02 days ago</span>
						</li>
						<li>This is nice and i like this portal
							<a href="#">www.pntc.com</a> @Peter.
							<span>
								<i class="fab fa-twitter"></i> 03 days ago</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- //Footer -->
	<!-- copyright -->
	<section class="copyright-w3layouts py-xl-4 py-3">
		<div class="container">
			<p>© 2024 PNTC . All Rights Reserved | Design & Developed by namibra.io
			</p>
			<ul class="social-nav footer-social social two text-center mt-2">
				<li>
					<a href="#">
						<i class="fab fa-facebook-f" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fab fa-twitter" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fab fa-instagram" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fab fa-pinterest" aria-hidden="true"></i>
					</a>
				</li>
			</ul>
		</div>
	</section><!-- Modal -->

	<!-- //Modal -->
	<!-- js -->
	<!-- <script src="js/jquery-2.2.3.min.js"></script> --> <!-- //js-->
	<script src="js/smoothbox.jquery2.js"></script>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>
</body>

</html>