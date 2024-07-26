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

	<link href="css/style1.css?v=<?php echo filemtime('css/style1.css'); ?>" rel="stylesheet" type="text/css" media="screen" />

	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- gallery -->
	<link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" />
	<link href="css/style.css?v=<?php echo filemtime('css/style.css'); ?>" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link rel="icon" href="./images/logo.jpg" type="image/jpeg">

	<script src="js/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

	<script type="text/javascript" src="js/validation.min.js?v=<?php echo filemtime('js/validation.min.js'); ?>"></script>
	<script type="text/javascript" src="js/login.js?v=<?php echo filemtime('js/login.js'); ?>"></script>
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
														$("#errors2").html("<a  class='btn btn-default' href='referee.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");

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
				console.log({
					index,
					element
				});
				$(element).text(`Subject ${label}`);
			});
		});
	</script>

	<script type="text/javascript">
		$(document).on("click", ".olevel", function() {
			var name = document.getElementById('examtype').value;
			var examtype_2 = document.getElementById('examtype2').value;
			var froms = document.getElementById('sitting').value;
			var sitting2 = document.getElementById('sitting2').value;
			var tos = document.getElementsByClassName('grades');
			var grades_2 = document.getElementsByClassName('grades2');
			var institution = document.getElementById('examnumber').value;
			var examnumber_2 = document.getElementById('examnumber2').value;
			var pin = document.getElementById('examdate').value;
			var examdate_2 = document.getElementById('examdate2').value;
			var serial = document.getElementsByClassName('subjects');
			var subjects_2 = document.getElementsByClassName('subjects2');

			var subjects = [];
			var grades = [];

			var subjects2 = [];
			var grades2 = [];

			for (var i = 0; i < serial.length; i++) {
				subjects.push(serial[i].value);
			}

			for (var i = 0; i < tos.length; i++) {
				grades.push(tos[i].value);
			}

			for (var i = 0; i < subjects_2.length; i++) {
				subjects2.push(subjects_2[i].value);
			}

			for (var i = 0; i < grades_2.length; i++) {
				grades2.push(grades_2[i].value);
			}

			console.log({
				serial
			});
			console.log({
				tos
			});
			console.log(grades.length, subjects.length);


			$.ajax({
				type: 'POST',
				url: "process.php",
				data: {
					examtype: name,
					examtype2: examtype_2,
					sitting: froms,
					sitting2: sitting2,
					grades: grades,
					grades2: grades2,
					exam: institution,
					exam2: examnumber_2,
					examdate: pin,
					examdate2: examdate_2,
					subjects: subjects,
					subjects2: subjects2,
					result: "olevel"
				},
				success: function(result) {
					console.log({
						result
					});
					// return;
					if (result.includes("required")) {

						$("#errors1").html(result);
						$("#errors2").html("<a  class='btn btn-default' href='referee.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");
						swal({
							title: "Error!",
							text: result,
							type: "error"
						});
					} else {

						$("#errors1").html(result);
						$("#errors2").html("<a  class='btn btn-default' href='referee.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Courses</a>");
						swal({
							title: "Successful!",
							text: result,
							type: "success"
						});
					}


				}
			});

		});
	</script>

	<script type="text/javascript">
		$(document).on("click", ".Del", function() {

			$("#examdate").val("");
			$("#examnumber").val("");

		});
	</script>


	<!-- header -->
	<!-- <section class="w3layouts-header py-2">
		<div class="container">
			header
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
									<a class="dropdown-item" href="index.php">Print Form</a>
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
			//header
		</div>
	</section> -->
	<!-- //header -->
	<!-- banner -->
	<!-- <section class="banner-1">

	</section> -->
	<!-- //banner -->
	<!-- gallery -->
	<div class="agileits-services text-center py-5">
		<div class="container py-md-4 mt-md-3">
			<h3 class="heading-agileinfo">Stage 2 (Educational Background)<span>Click on Browse button below to select your picture and should not be more than 20MB</span></h3>
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
				<div class="container">
					<h2></h2>

					<div class="form-login">
						<hr />
						<div class="alert alert-warning">
							<i class="fa fa-info-circle"></i>&nbsp;This stage you Enter your O'Level results in the space provided
							<ol>
								<li>Enter your Highschool results in space provide below</li>
								<li>Add, Delete and Save Highschool result using buttons below</li>
							</ol>
						</div>
						<hr />
						<span id="errors1"></span>
						<hr />

						<?php


						//Subjects
						$sql = "SELECT * FROM schoolsubjects";
						$rget = mysqli_query($db, $sql);
						$subjects = array();
						if ($rget) {
							while ($foundk = mysqli_fetch_array($rget)) {
								$subjects[] = $foundk['Name'];
							}
						}


						// Grades
						$numSubjects = count($subjects);
						$sql = "SELECT * FROM schoolgrades";
						$rgetGrades = mysqli_query($db, $sql);
						$grades = array();
						if ($rgetGrades) {
							while ($foundk = mysqli_fetch_array($rgetGrades)) {
								$grades[] = $foundk['Name'];
							}
						}

						// Fetch existing data if available (example query)
						// <?php
						// Connect to the database
						// $db = new mysqli("hostname", "username", "password", "database");

						// if ($db->connect_error) {
						//     die("Connection failed: " . $db->connect_error);
						// }

						// Fetch data for the first sitting
						// $serial = mysqli_real_escape_string($db, $_GET['serial']);
						// $pin = mysqli_real_escape_string($db, $_GET['pin']);

						$query1 = "SELECT * FROM olevel WHERE Serial='$serial' AND Pin='$pin' AND Sitting='1st Sitting'";
						$result1 = mysqli_query($db, $query1);
						$existingData1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

						$exam1 = isset($existingData1[0]['Exam']) ? $existingData1[0]['Exam'] : '';
						$examdate1 = isset($existingData1[0]['Examdate']) ? $existingData1[0]['Examdate'] : '';
						$examtype1 = isset($existingData1[0]['Examtype']) ? $existingData1[0]['Examtype'] : '';
						$sitting1 = isset($existingData1[0]['Sitting']) ? $existingData1[0]['Sitting'] : '';
						$subjects1 = [];
						$grades1 = [];

						foreach ($existingData1 as $data) {
							$subjects1[] = $data['Subjects'];
							$grades1[] = $data['Grade'];
						}

						// Fetch data for the second sitting
						$query2 = "SELECT * FROM olevel WHERE Serial='$serial' AND Pin='$pin' AND Sitting='2nd Sitting'";
						$result2 = mysqli_query($db, $query2);
						$existingData2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

						$exam2 = isset($existingData2[0]['Exam']) ? $existingData2[0]['Exam'] : '';
						$examdate2 = isset($existingData2[0]['Examdate']) ? $existingData2[0]['Examdate'] : '';
						$examtype2 = isset($existingData2[0]['Examtype']) ? $existingData2[0]['Examtype'] : '';
						$sitting2 = isset($existingData2[0]['Sitting']) ? $existingData2[0]['Sitting'] : '';
						$subjects2 = [];
						$grades2 = [];

						foreach ($existingData2 as $data) {
							$subjects2[] = $data['Subjects'];
							$grades2[] = $data['Grade'];
						}

						// Subjects
						$sql = "SELECT * FROM schoolsubjects";
						$rget = mysqli_query($db, $sql);
						$subjects = array();
						if ($rget) {
							while ($foundk = mysqli_fetch_array($rget)) {
								$subjects[] = $foundk['Name'];
							}
						}

						// Grades
						$sql = "SELECT * FROM schoolgrades";
						$rgetGrades = mysqli_query($db, $sql);
						$grades = array();
						if ($rgetGrades) {
							while ($foundk = mysqli_fetch_array($rgetGrades)) {
								$grades[] = $foundk['Name'];
							}
						}
						$numSubjects = count($subjects);
						?>

						<?php for ($i = 0; $i < $numSubjects - 6; $i++) : ?>
							<?php if ($i == 0) : ?>
								<h3>First Sitting</h3>
								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">Exam Type</span>
									<select style='height:37px;width:100%;border:1px solid black;' name="examtype" id='examtype'>
										<?php
										$sql = "SELECT * FROM examtype";
										$rget = mysqli_query($db, $sql);
										$num = mysqli_num_rows($rget);
										if ($num != 0) {
											while ($foundk = mysqli_fetch_array($rget)) {
												$nms = $foundk['Name'];
												echo "<option value='$nms' " . ($examtype1 == $nms ? 'selected' : '') . ">$nms</option>";
											}
										}
										?>
									</select>
								</div>

								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">Exam Date</span>
									<input type="date" class="form-control" name="examdate" id="examdate" value="<?php echo $examdate1; ?>">
								</div>
								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">Exam Number</span>
									<input type="text" class="form-control" name="examnumber" id="examnumber" value="<?php echo $exam1; ?>">
								</div>

								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">Sitting</span>
									<select style='height:37px;width:100%;border:1px solid black;' name="sitting" id='sitting'>
										<option value="1st Sitting" <?php echo ($sitting1 == '1st Sitting' ? 'selected' : ''); ?>>1st Sitting</option>
									</select>
								</div>
							<?php endif; ?>
							<div class="input-group" style="margin-bottom:10px;">
								<span class="input-group-addon sitting">Subject</span>
								<select style='height:37px;width:100%;border:1px solid black;' class="subjects" name="subjects[]" id='subjects'>
									<?php foreach ($subjects as $subject) : ?>
										<option value="<?php echo $subject; ?>" <?php echo (isset($subjects1[$i]) && $subjects1[$i] == $subject ? 'selected' : ''); ?>><?php echo $subject; ?></option>
									<?php endforeach; ?>
								</select>
								<span class="input-group-addon">Grade</span>
								<select style='height:37px;width:100%;border:1px solid black;' class="grades" name="grade[]" id='grade'>
									<?php foreach ($grades as $grade) : ?>
										<option value="<?php echo $grade; ?>" <?php echo (isset($grades1[$i]) && $grades1[$i] == $grade ? 'selected' : ''); ?>><?php echo $grade; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						<?php endfor; ?>
						<hr>
						<?php for ($i = 0; $i < $numSubjects - 6; $i++) : ?>
							<?php if ($i == 0) : ?>
								<h3>Second Sitting (Please do not fill if not applicable)</h3>
								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">Exam Type</span>
									<select style='height:37px;width:100%;border:1px solid black;' name="examtype2" id='examtype2'>
										<?php
										$sql = "SELECT * FROM examtype";
										$rget = mysqli_query($db, $sql);
										$num = mysqli_num_rows($rget);
										if ($num != 0) {
											echo '<option selected value="">Select Exam Type</option>';
											while ($foundk = mysqli_fetch_array($rget)) {
												$nms = $foundk['Name'];
												echo "<option value='$nms' " . ($examtype2 == $nms ? 'selected' : '') . ">$nms</option>";
											}
										}
										?>
									</select>
								</div>

								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">Exam Date</span>
									<input type="date" class="form-control" name="examdate2" id="examdate2" value="<?php echo $examdate2; ?>">
								</div>
								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">Exam Number</span>
									<input type="text" class="form-control" name="examnumber2" id="examnumber2" value="<?php echo $exam2 == "NA" ? '' : $exam2; ?>">
								</div>
								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">Sitting</span>
									<select style='height:37px;width:100%;border:1px solid black;' name="sitting2" id='sitting2'>
										<option value="2nd Sitting" <?php echo ($sitting2 == '2nd Sitting' ? 'selected' : ''); ?>>2nd Sitting</option>
									</select>
								</div>
							<?php endif; ?>
							<div class="input-group" style="margin-bottom:10px;">
								<span class="input-group-addon sitting">Subject</span>
								<select style='height:37px;width:100%;border:1px solid black;' class="subjects2" name="subjects2[]" id='subjects2'>
									<?php foreach ($subjects as $num => $subject) : ?>
										<?php if ($num == "0") : ?>
											<option selected value="">Select Subject</option>
										<?php endif; ?>
										<option value="<?php echo $subject; ?>" <?php echo (isset($subjects2[$i]) && $subjects2[$i] == $subject ? 'selected' : ''); ?>><?php echo $subject; ?></option>
									<?php endforeach; ?>
								</select>
								<span class="input-group-addon">Grade</span>
								<select style='height:37px;width:100%;border:1px solid black;' class="grades2" name="grade2[]" id='grade2'>
									<?php foreach ($grades as $num => $grade) : ?>
										<?php if ($num == "0") : ?>
											<option selected value="">Select Grade</option>
										<?php endif; ?>
										<option value="<?php echo $grade; ?>" <?php echo (isset($grades2[$i]) && $grades2[$i] == $grade ? 'selected' : ''); ?>><?php echo $grade; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						<?php endfor; ?>
						<!-- <button type="submit">Submit</button> -->
						<!-- // </form> -->


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
							<button type="submit" class="olevel btn btn-default" name="Change" value="changes">
								<span class="glyphicon glyphicon-check"></span> &nbsp;Save School
							</button>
							<button type="submit" class="Del btn btn-default">
								<span class="glyphicon glyphicon-trash"></span> &nbsp;Clear
							</button>
						</div>
						<?php if (isset($_GET['ids'])) {

							$direction = "summary.php";
						} else {
							$direction = "program-choice.php";
						}
						?>
						<div class="form-group">
							<a type="button" class="Del btn btn-default" href="biodata.php">
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
	<!-- <footer class="footer-section py-5">
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
	</footer> -->
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
</body>

</html>