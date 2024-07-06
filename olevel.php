<?php
session_start();
include("db_connect.php");
if (isset($_COOKIE['pin']) && $_COOKIE['serial']) {

	$pin = $_COOKIE['pin'];
	$serial = $_COOKIE['serial'];
} else {
	header('location:index.php');
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



</head>

<body>

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
								Deleteolevel: myValue
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
													loadlevel: optionValue,
													userpin: pin,
													userserial: serial
												},
												success: function(result) {
													if (result == 'No') {
														$("#errors1").html("");
														$("#errors2").html("");
													} else {
														$("#errors1").html(result);
														$("#errors2").html("<a  class='btn btn-default' href='employment.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");

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

		$(document).on("change", "#sitting", function() {
    let label = $(this).val();
    $(".sitting").each(function(index, element) {
        console.log({index, element});
        $(element).text(`Subject ${label}`);
    });
});
	</script>

	<script type="text/javascript">
		$(document).on("click", ".Olevel", function() {
			var name = document.getElementById('examtype').value;
			var froms = document.getElementById('sitting').value;
			var tos = document.getElementsByClassName('grades');
			var institution = document.getElementById('examnumber').value;
			var pin = document.getElementById('examdate').value;
			var serial = document.getElementsByClassName('subjects');

			var subjects = [];
			var grades = [];

            for (var i = 0; i < serial.length; i++) {
                subjects.push(serial[i].value);
            }

            for (var i = 0; i < tos.length; i++) {
                grades.push(tos[i].value);
            }

			 console.log({serial});
			 console.log({tos});
			 console.log(grades.length, subjects.length);


			$.ajax({
				type: 'POST',
				url: "process.php",
				data: {
					examtype: name,
					sitting: froms,
					grades: grades,
					exam: institution,
					examdate: pin,
					subjects: subjects,
					result: "olevel" 
				},
				success: function(result) {
				console.log({result});
				// return;
				if(result.includes("required")){

					$("#errors1").html(result);
					$("#errors2").html("<a  class='btn btn-default' href='employment.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");
					swal({
						title: "Error!",
						text: result,
						type: "error"
					});
				}else{
					
					$("#errors1").html(result);
					$("#errors2").html("<a  class='btn btn-default' href='employment.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");
					swal({
						title: "Successful!",
						text: result,
						type: "success"
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
		// 			loadlevel: optionValue,
		// 			userpin: pin,
		// 			userserial: serial
		// 		},
		// 		success: function(result) {

		// 			if (result == 'No') {

		// 			} else {
		// 				$("#errors1").html(result);
		// 				$("#errors2").html("<a  class='btn btn-default' href='employment.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");

		// 			}
		// 		}
		// 	});
		// });
	</script>

	<script type="text/javascript">
		$(document).on("click", ".Del", function() {

			$("#examdate").val("");
			$("#examnumber").val("");

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
			<h3 class="heading-agileinfo">Stage 6 (Educational Background)<span>Click on Browse button below to select your picture and should not be more than 20MB</span></h3>
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
				<div class="container">
					<h2></h2>

					<div class="form-login" style="width:1000px">
						<hr />
						<div class="alert alert-warning">
							<i class="fa fa-info-circle"></i>&nbsp;This stage you Enter your O'Level results in the space provided
							<ol>
								<li>Enter your O'Level results in space provide below</li>
								<li>Add ,Delete and Save O'Level results using buttons below</li>
								<li>Your adviced not to submit more than 5 O'Level results</li>
							</ol>
						</div>
						<hr />
						<span id="errors1"></span>
						<hr />
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Exam Type</span>
							<select style='height:37px;width:100%;border:1px solid black;' name="examtype" id='examtype'>
								<?php
								$sql = "SELECT * FROM Examtype ";
								$rget = mysqli_query($db, $sql);
								$num = mysqli_num_rows($rget);
								if ($num != 0) {
									while ($foundk = mysqli_fetch_array($rget)) {
										$nms = $foundk['Name'];
										echo "<option>$nms</option>";
									}
								}
								?>
							</select>
						</div>

						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Exam Date</span>
							<input type="date" class="form-control" name="examdate" id="examdate" placeholder="">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Exam Number</span>
							<input type="text" class="form-control" name="examnumber" id="examnumber" placeholder="">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Sitting</span>
							<select style='height:37px;width:100%;border:1px solid black;' name="sitting" id='sitting'>


								<option>1st Sitting</option>
								<option>2nd Sitting</option>

							</select>
						</div>
        <?php

		// Fetch subjects
$sql = "SELECT * FROM Schoolsubjects";
$rget = mysqli_query($db, $sql);
$subjects = array();
if ($rget) {
    while ($foundk = mysqli_fetch_array($rget)) {
        $subjects[] = $foundk['Name'];
    }
}

// Count the number of subjects
$numSubjects = count($subjects);
        // Fetch grades once to use in each input group
        $sql = "SELECT * FROM Schoolgrades";
        $rgetGrades = mysqli_query($db, $sql);
        $grades = array();
        if ($rgetGrades) {
            while ($foundk = mysqli_fetch_array($rgetGrades)) {
                $grades[] = $foundk['Name'];
            }
        }

        for ($i = 0; $i < $numSubjects; $i++): ?>
            <div class="input-group" style="margin-bottom:10px;">
                <span class="input-group-addon sitting"> Subject First Sitting</span>
                <select style='height:37px;width:100%;border:1px solid black;' class="subjects" name="subjects[]" id='subjects'>
                    <?php foreach ($subjects as $subject): ?>
                        <option><?php echo $subject; ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="input-group-addon">Grade</span>
                <select style='height:37px;width:100%;border:1px solid black;' class="grades" name="grade[]" id='grade'>
                    <?php foreach ($grades as $grade): ?>
                        <option><?php echo $grade; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endfor; ?>


						<p>
							<input name='serial' id='serial' type='hidden' value='<?php if (isset($serial)) {
																						echo $serial;
																					} ?>'>
							<input name='pin' id='pin' type='hidden' value='<?php if (isset($pin)) {
																				echo $pin;
																			} ?>'>
						</p>


						<hr />
						<div class="form-group">
							<button type="submit" class="Olevel btn btn-default" name="Change" value="changes">
								<span class="glyphicon glyphicon-check"></span> &nbsp;Save School
							</button>
							<button type="submit" class="Del btn btn-default">
								<span class="glyphicon glyphicon-trash"></span> &nbsp;Clear
							</button>
						</div>
						<?php if (isset($_GET['ids'])) {

							$direction = "declaration.php";
						} else {
							$direction = "alevel.php";
						}
						?>
						<div class="form-group">
							<a type="button" class="Del btn btn-default" href="previousschool.php">
								<i class="fa fa-arrow-left"></i> &nbsp; Previous
							</a>

							<a type="button" class="Del btn btn-default" href="<?php echo $direction  ?>">
								<i class="fa fa-arrow-right"></i> &nbsp; Next
							</a>
						</div>
					</div>

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
	</footer> <!-- //Footer -->
	<!-- copyright -->
	<section class="copyright-w3layouts py-xl-4 py-3">
		<div class="container">
			<p>© 2024 PNTC . All Rights Reserved | Design & Developed by mvumapatrick@gmail.com
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
</body>

</html>