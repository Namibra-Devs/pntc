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
		input {
			color: #990000;
		}
	</style>


</head>

<body>
	<!-- header -->
	<section class="w3layouts-header py-2">
		<div class="container">
			<!-- header -->
			<header>
				<nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
					<h>
						<a class="navbar-brand" href="index.php">
							PREMIER NURSING COLLEGE
						</a>
					</h>
					<button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-lg-auto text-center">
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
			<h3 class="heading-agileinfo">Stage 4 (Document) <span>Click on Browse button below to select your picture and should not be more than 20MB</span></h3>
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
				<div class="container">
					<h2></h2>
					<?php
					$passport = '';
					$certificate = '';
					$testimonial = '';
					$birth_certificate = '';
					$passport_name = '';
					$certificate_name = '';
					$testimonial_name = '';
					$birth_certificate_name = '';

					$hideSpanLabel = true;
					// if (isset($_GET['ids'])) {
					// 	$hideSpanLabel = true;
					// }
						// $serial = $_POST['serial'];
						// $pin = $_POST['pin'];

						// // Database connection
						// $db = new mysqli('localhost', 'username', 'password', 'database');

						// // Check connection
						// if ($db->connect_error) {
						//     die("Connection failed: " . $db->connect_error);
						// }

						// Fetch images from profilepictures table
						$sql = "SELECT name FROM profilepictures WHERE serial='$serial' AND pin='$pin'";
						$result = $db->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								// Extract the name and remove the .png extension and 12345_ prefix
								$name = $row['name'];
								$cleanName = preg_replace('/^\d+_|\.\w+$/', '', $name);
								$file_name = pathinfo($name, PATHINFO_FILENAME);

								switch ($cleanName) {
									case 'passport':
										$passport = 'images/applicants/' . $row['name'];
										$passport_name = $file_name;
										break;
									case 'certificate':
										$certificate = 'images/applicants/' . $row['name'];
										$certificate_name = $file_name;
										break;
									case 'testimonial':
										$testimonial = 'images/applicants/' . $row['name'];
										$testimonial_name = $file_name;
										break;
									case 'birth-certificate':
										$birth_certificate = 'images/applicants/' . $row['name'];
										$birth_certificate_name = $file_name;
										break;
								}
							}
						}

						$db->close();
					// }
					?>

					<form class="form-login" id="documents" enctype='multipart/form-data'>
						<div class="alert alert-warning">
							<i class="fa fa-info-circle"></i>&nbsp;This stage you upload your scanned passport and documents
							<ol>
								<li>The Scanned document should be saved in .jpg,.jpeg,.png,.gif extension</li>
								<li>Make sure you reduce the size of the document after scanning. That will reduce its memory capacity</li>
								<li>The file size should not be more than 10 mb</li>
							</ol>
						</div>
						<?php
						if (isset($_GET['ids'])) {
							echo "<input name='ids' type='hidden' value='{$_GET['ids']}'>";
						}
						?>


						<div class="form-group">
							<label for="file2" class="file-label">Upload Passport</label>
							<div class="flex-row">
								<input name='file2' type='file' id='file2' onchange="displayFileName('file2')" style="display: none;">
								<label for="file2" class="custom-file-upload">Select File</label>
								<span id="file2-name" <?php if ($hideSpanLabel) echo 'style="display:none;"'; ?>><?php echo $passport_name; ?></span>
								<img id="file2-preview" src="<?php echo $passport; ?>" alt="Preview" style="max-width: 100px; max-height: 100px; margin-left: 10px; <?php echo $passport ? 'display: inline-block;' : 'display: none;'; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="file3" class="file-label">Upload Certificate</label>
							<div class="flex-row">
								<input name='file3' type='file' id='file3' onchange="displayFileName('file3')" style="display: none;">
								<label for="file3" class="custom-file-upload">Select File</label>
								<span id="file3-name" <?php if ($hideSpanLabel) echo 'style="display:none;"'; ?>><?php echo $certificate_name; ?></span>
								<img id="file3-preview" src="<?php echo $certificate; ?>" alt="Preview" style="max-width: 100px; max-height: 100px; margin-left: 10px; <?php echo $certificate ? 'display: inline-block;' : 'display: none;'; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="file4" class="file-label">Upload Testimonials</label>
							<div class="flex-row">
								<input name='file4' type='file' id='file4' onchange="displayFileName('file4')" style="display: none;">
								<label for="file4" class="custom-file-upload">Select File</label>
								<span id="file4-name" <?php if ($hideSpanLabel) echo 'style="display:none;"'; ?>><?php echo $testimonial_name; ?></span>
								<img id="file4-preview" src="<?php echo $testimonial; ?>" alt="Preview" style="max-width: 100px; max-height: 100px; margin-left: 10px; <?php echo $testimonial ? 'display: inline-block;' : 'display: none;'; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="file5" class="file-label">Upload Birth Certificate</label>
							<div class="flex-row">
								<input name='file5' type='file' id='file5' onchange="displayFileName('file5')" style="display: none;">
								<label for="file5" class="custom-file-upload">Select File</label>
								<span id="file5-name" <?php if ($hideSpanLabel) echo 'style="display:none;"'; ?>><?php echo $birth_certificate_name; ?></span>
								<img id="file5-preview" src="<?php echo $birth_certificate; ?>" alt="Preview" style="max-width: 100px; max-height: 100px; margin-left: 10px; <?php echo $birth_certificate ? 'display: inline-block;' : 'display: none;'; ?>">
							</div>
						</div>

						<hr />

						<div class="form-group">
							<button type="submit" class="btn btn-default" name="Change" value="changes">
								<span class="glyphicon glyphicon-upload"></span> &nbsp; Upload Documents
							</button>
						</div>

						<?php
						if (isset($_GET['ids'])) {
							$direction = "summary.php";
						} else {
							$direction = "referee.php";
						}
						?>

						<div class="form-group">
							<a type="button" class="Del btn btn-default" href="program-choice.php">
								<i class="fa fa-arrow-left"></i> &nbsp; Previous
							</a>

							<a type="button" class="Del btn btn-default" href="<?php echo $direction; ?>">
								<i class="fa fa-arrow-right"></i> &nbsp; Next
							</a>
						</div>
					</form>

					<script>
						// Function to display selected file name and preview image
						function displayFileName(inputId) {
							var input = document.getElementById(inputId);
							var fileNameSpan = document.getElementById(inputId + "-name");
							var previewImg = document.getElementById(inputId + "-preview");

							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function(e) {
									previewImg.src = e.target.result;
									previewImg.style.display = 'inline-block';
								};

								reader.readAsDataURL(input.files[0]);
								fileNameSpan.textContent = input.files[0].name;
								fileNameSpan.style.display = 'inline'; // Ensure span is displayed
							} else {
								previewImg.src = '#';
								previewImg.style.display = 'none';
								fileNameSpan.textContent = '';
								fileNameSpan.style.display = '<?php echo $hideSpanLabel ? 'none' : 'inline'; ?>'; // Hide span based on PHP variable
							}
						}
					</script>


					<style>
						/* Hide the "No file chosen" label */
						input[type="file"] {
							display: none;
						}

						/* Style the custom file upload label */
						.custom-file-upload {
							background-color: #f0f0f0;
							padding: 10px 15px;
							cursor: pointer;
							border: 1px solid #ccc;
							display: inline-block;
							margin-right: 10px;
							/* Add spacing between label and file name */
						}

						/* Style the file upload labels */
						.file-label {
							display: block;
							text-align: left;
							color: black;
							font-weight: bold;
							margin-bottom: 5px;
						}

						/* Flexbox styles */
						.form-group {
							margin-bottom: 15px;
						}

						.flex-row {
							display: flex;
							align-items: center;
							justify-content: space-between;
							align-items: center;
						}
					</style>



				</div>


			</div>
		</div>
	</div>
	<!-- //gallery -->

	<!-- Footer -->
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
	</section> <!-- //copyright -->
	<!-- Modal -->

	<!-- js -->
	<!-- <script src="js/jquery-2.2.3.min.js"></script> --> <!-- //js-->
	<script src="js/smoothbox.jquery2.js"></script>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>
	<script>
		$(document).ready(function() {
			$('#documents').submit(function(event) {
				// Prevent default form submission
				event.preventDefault();

				// Serialize form data
				var formData = new FormData($(this)[0]);
				formData.append('document', '1');

				// Submit form via AJAX
				$.ajax({
					url: 'process.php', // Replace with your server-side script URL
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					success: function(response) {
						console.log(response); // Log the response for debugging purposes

						if (response.includes('upload')) {
							swal({
								title: "Success",
								text: "Documents updated successfully!",
								icon: "success",
								showCancelButton: false,
								confirmButtonColor: "green",
								confirmButtonText: "OK",
								closeOnConfirm: true,
								closeOnCancel: true,
								buttonsStyling: false
							});
						} else if (response.includes('uploaded')) {
							swal({
								title: "Success",
								text: "Documents uploaded successfully!",
								icon: "success",
								showCancelButton: false,
								confirmButtonColor: "green",
								confirmButtonText: "OK",
								closeOnConfirm: true,
								closeOnCancel: true,
								buttonsStyling: false
							});
						} else if (response.includes('error')) {
							sweetAlert("Oops...", "Upload all documents, they are required!", "error");
						} else {
							sweetAlert("Oops...", "Error occurred while uploading documents!", "error");
						}
					},
					error: function(xhr, status, error) {
						sweetAlert("Oops...", "Error occurred while uploading documents!", "error");
					}
				});
			});
		});
	</script>

</body>

</html>