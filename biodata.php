<?php
include_once("db_connect.php");
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
	<title>TSAFE</title>
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

	<!-- //for-javascript -->
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>
	<script type="text/javascript">
		$(document).on("click", ".biodata", function() {
			var surname = document.getElementById('surname').value;
			var othernames = document.getElementById('othernames').value;
			var dob = document.getElementById('datepicker-starting-view').value;
			var gender = document.getElementById('gender').value;
			var religion = document.getElementById('religion').value;
			var placebirth = document.getElementById('placebirth').value;
			var hometown = document.getElementById('hometown').value;
			var country = document.getElementById('country').value;
			var state = document.getElementById('state')?.value || 'none';
			var localgvt = document.getElementById('localgvt')?.value || 'none'
			var apresaddress = document.getElementById('apresaddress').value;
			var aprecaddress = document.getElementById('aprecaddress').value;
			var guardianname = document.getElementById('guardianname').value;
			var guardianplace = document.getElementById('guardianplace').value;
			var guardianhometown = document.getElementById('guardianhometown').value;
			var gcountry = document.getElementById('gcountry').value;
			var gstate = document.getElementById('gstate')?.value || 'none';
			var glocalgovt = document.getElementById('glocalgovt')?.value || 'none';
			var gaddress = document.getElementById('gaddress').value;
			var gmobile = document.getElementById('gmobile').value;
			var applicantphone = document.getElementById('applicantphone').value;
			var email = document.getElementById('email').value;


			// $(".bookId").html(myTitle);
			//window.alert(gmobile); 
			// if(myTitle==""){									
			// $("#login_buttons").html('<img src="js/ajax-loader.gif" /> &nbsp; Loading Stage 2 ...');
			// setTimeout(' window.location.href = "biodata.php"; ',3000);
			// } 
			$.ajax({
				type: 'POST',
				url: "process.php",
				data: {
					Value4: surname,
					Value5: othernames,
					Value6: dob,
					Value7: gender,
					Value8: placebirth,
					Value9: hometown,
					Value10: country,
					Value11: state,
					Value12: localgvt,
					Value13: apresaddress,
					Value14: guardianname,
					Value15: guardianplace,
					Value16: guardianhometown,
					Value17: gcountry,
					Value18: gstate,
					Value19: glocalgovt,
					Value20: gaddress,
					Value21: gmobile,
					Value22: applicantphone,
					Value23: email,
					Value24: aprecaddress,
					Value25: religion
				},
				success: function(result) {
					console.log({
						result
					});

					if (result == 'Yes') {
						sweetAlert("Oops...", "Fill all textbox fields they are required", "error");
					} else if (result == 'Yes2') {
						sweetAlert("Updated", "Biodata Updated Successfully", "success");
					} else {
						//                                          
						swal({
								title: "Saved",
								text: "Biodata Information Added",
								type: "success",
								showCancelButton: true,
								confirmButtonColor: "green",
								confirmButtonText: "OK",
								closeOnConfirm: true,
								closeOnCancel: true,
								buttonsStyling: false
							},
							function(isConfirm) {
								if (isConfirm) {
									window.location = "olevel.php";
								}
							});
					}
				}
			});

		});
	</script>

	<script type="text/javascript">
		$(document).on("click", ".Del", function() {

			$('#surname').val("");
			$('#othernames').val("");
			$('#datepicker-starting-view').val("");
			$('#gender').val("");
			$('#religion').val("");
			$('#placebirth').val("");
			$('#hometown').val("");
			$('#country').val("");
			$('#state').val("");
			$('#localgvt').val("");
			$('#apresaddress').val("");
			$('#aprecaddress').val("");
			$('#guardianname').val("");
			$('#guardianplace').val("");
			$('#guardianhometown').val("");
			$('#gcountry').val("");
			$('#gstate').val("");
			$('#glocalgovt').val("");
			$('#gaddress').val("");
			$('#gmobile').val("");
			$('#applicantphone').val("");
			$('#email').val("");


		});
	</script>
	<script type="text/javascript">
		$(document).on("change", ".States", function() {
			//           	                       
			var Statess = document.getElementById('state').value;
			//            
			$.ajax({
				type: 'POST',
				url: "process.php",
				data: {
					statesname: Statess
				},
				success: function(result) {

					$("#localg").html(result);
				}
			});

		});


		$(document).on("change", ".State2", function() {
			//           	                       
			var Statess = document.getElementById('gstate').value;
			//            
			$.ajax({
				type: 'POST',
				url: "process.php",
				data: {
					statesname2: Statess
				},
				success: function(result) {

					$("#paregvt").html(result);
				}
			});

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
			<h3 class="heading-agileinfo">Bio Data<span>
					Make sure you enter active phone number and email address
				</span></h3>
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
				<div class="container">
					<h2></h2>

					<?php

$othernames = $surname = $dob = $gender = $placeofbirth = $religion = $hometown = "";
$country = $appcoraddress = $appresaddress = $gname = $gplace = $ghometown = "";
$gcountry = $gaddress = $gmobile = $applicantphone = $email = "";

if (isset($_GET['ids'])) {
    $sql = "SELECT * FROM Applicants2 WHERE pin = '$pin' AND serial = '$serial'";
    
    $result = $db->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

			$surname = htmlspecialchars($row['Surname']);
            $othernames = htmlspecialchars($row['Othername']);
            $dob = htmlspecialchars($row['DOB']);
            $gender = htmlspecialchars($row['Gender']);
            $placeofbirth = htmlspecialchars($row['PlaceOfbirth']);
            $religion = htmlspecialchars($row['religion']);
            $hometown = htmlspecialchars($row['Hometown']);
            $country = htmlspecialchars($row['Country']);
            $appcoraddress = htmlspecialchars($row['Appcoraddress']);
            $appresaddress = htmlspecialchars($row['Appresaddress']);
            $gname = htmlspecialchars($row['Gname']);
            $gplace = htmlspecialchars($row['Gplace']);
            $ghometown = htmlspecialchars($row['Ghometown']);
            $gcountry = htmlspecialchars($row['Gcountry']);
            $gaddress = htmlspecialchars($row['Gaddress']);
            $gmobile = htmlspecialchars($row['Gmobile']);
            $applicantphone = htmlspecialchars($row['Applicantphone']);
            $email = htmlspecialchars($row['Email']);
        } 
    } 
}

?>

    <div class="form-login">
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Surname</span>
            <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" value="<?php echo $surname; ?>">
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Other Names</span>
            <input type="text" class="form-control" name="othernames" id="othernames" placeholder="Enter Other Names" value="<?php echo $othernames; ?>">
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Date of Birth</span>
            <input id="datepicker-starting-view" type="date" class="form-control" placeholder="dd/mm/yy" value="<?php echo $dob; ?>">
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Gender</span>
            <select style='height:37px;width:100%;border:1px solid;' name="gender" id='gender'>
                <option>Select Option</option>
                <option <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select>
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Place of Birth</span>
            <input type="text" class="form-control" name="placebirth" id="placebirth" placeholder="Place of Birth" value="<?php echo $placeofbirth; ?>">
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Religion</span>
            <select style='height:37px;width:100%;border:1px solid;' name="religion" id='religion'>
                <option disabled>Select Option</option>
                <option <?php echo ($religion == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                <option <?php echo ($religion == 'Christianity') ? 'selected' : ''; ?>>Christianity</option>
                <option <?php echo ($religion == 'African Tradition') ? 'selected' : ''; ?>>African Tradition</option>
            </select>
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Hometown</span>
            <input type="text" class="form-control" name="hometown" id="hometown" placeholder="Enter Hometown" value="<?php echo $hometown; ?>">
        </div>
        
        <?php
        $sql = "SELECT name FROM countries ORDER BY name";
        $result = $db->query($sql);

        if (!$result) {
            die("Query failed: " . $db->error);
        }
        ?>

        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Nationality</span>
            <select style='height:37px;width:100%;border:1px solid black;' name="country" id='country'>
                <option disabled selected>Select Country</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($row['name']) . '"' . (($country == htmlspecialchars($row['name'])) ? ' selected' : '') . '>' . htmlspecialchars($row['name']) . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <span id='localg'></span>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">House Number</span>
            <textarea name="aprecaddress" rows="4" class="form-control" placeholder="Correspondence Address" id="aprecaddress"><?php echo $appcoraddress; ?></textarea>
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Digital Address of House Number</span>
            <textarea name="apresaddress" rows="4" class="form-control" placeholder="Resdential Address" id="apresaddress"><?php echo $appresaddress; ?></textarea>
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Name of Parent/Guardian</span>
            <input type="text" class="form-control" name="guardianname" id="guardianname" placeholder="Guardian Name" value="<?php echo $gname; ?>">
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Parent/Guardian Place of Birth</span>
            <input type="text" class="form-control" name="guardianplace" id="guardianplace" placeholder="Guardian POB" value="<?php echo $gplace; ?>">
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Parent/Guardian Home Town</span>
            <input type="text" class="form-control" name="guardianhometown" id="guardianhometown" placeholder="Guardian Home Town" value="<?php echo $ghometown; ?>">
        </div>
        
		<?php
        $sql = "SELECT name FROM countries ORDER BY name";
        $result = $db->query($sql);

        if (!$result) {
            die("Query failed: " . $db->error);
        }
        ?>

        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Parent/Guardian Country</span>
            <select style='height:37px;width:100%;border:1px solid black;' name="gcountry" id='gcountry'>
                <option disabled selected>Select Country</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($row['name']) . '"' . (($gcountry == htmlspecialchars($row['name'])) ? ' selected' : '') . '>' . htmlspecialchars($row['name']) . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <span id="paregvt"></span>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Parent/Guardian Address</span>
            <textarea name="gaddress" id="gaddress" rows="4" class="form-control" placeholder="Guardian Correspondence Address"><?php echo $gaddress; ?></textarea>
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Parent/Guardian Phone</span>
            <input type="text" class="form-control" name="gmobile" id="gmobile" placeholder="Guardian Phone Number" value="<?php echo $gmobile; ?>">
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Applicant Phone</span>
            <input type="text" class="form-control" name="applicantphone" id="applicantphone" placeholder="Applicant Phone Number" value="<?php echo $applicantphone; ?>">
        </div>
        <div class="input-group" style="margin-bottom:10px">
            <span class="input-group-addon">Applicant Email</span>
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail Address" value="<?php echo $email; ?>">
        </div>

        <div class="form-group">
            <button type="submit" class="biodata btn btn-default" name="login_buttons" id="login_buttons">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Save
            </button>
            <button type="reset" class="Del btn btn-default" name="login_button" id="login_button">
                <span class="glyphicon glyphicon-trash"></span> &nbsp; Clear
            </button>
        </div>
		<?php if (isset($_GET['ids'])) {

$direction = "summary.php";
} else {
$direction = "olevel.php";
}
?>
        <div class="form-group">
            <a type="button" class="btn btn-default" href="<?php echo $direction; ?>">
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
	</section><!-- //copyright -->
	<!-- Modal -->


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