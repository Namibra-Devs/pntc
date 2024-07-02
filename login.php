<?php
include_once "db_connect.php";
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
		addEventListener("load", function () {
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

<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">



</head>

<body>
	<script type="text/javascript">
 $(document).on("click", ".Login", function () {
      var name = document.getElementById('username').value;
       var pass = document.getElementById('password').value;


			$.ajax ({
            type : 'POST',
               url: "process.php",
             data: {usernames:name,password:pass},
          success: function(result) {

                                        $("#login_button").html('<img src="js/ajax-loader.gif" /> &nbsp; Loggin ...');
					                     setTimeout(' window.location.href = "admins.php"; ',3000);

                                     }
                });

	});


 </script>

 <script type="text/javascript">
 $(document).on("click", ".Del", function () {

          	                         $("#username").val("");
          	                         $("#password").val("");


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
                    <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
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
                        </ul>
                    </div>
                </nav>
        </header>
        <!-- //header -->
		</div>
	</section>
	<!-- //header -->

		<!-- //banner -->
<!-- gallery -->
	<div class="agileits-services text-center py-5">
		<div class="container py-md-4 mt-md-3">
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
			<div class="container">


	<div class="form-login" >
		<h2 class="form-login-heading" style="color: #eb1d50;">Administrator Login</h2><hr />
		 <div class="alert alert-info">
          <i class="fa fa-info-circle"></i>&nbsp;Login using your administrator password to create pin,serial number for the applicant and view number applicants

                  </div>
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Email" name="username" id="username" />
			<span id="check-e"></span>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" id="password" />

		</div>

		<hr />
		<div class="form-group">
			<button type="submit" class="Login btn btn-default" id="login_button">
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Login
			</button>
			<button type="reset" class="Del btn btn-default">
			<span class="glyphicon glyphicon-trash"></span> &nbsp; Clear
			</button>
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
					<p class="phone">phone: +265  293 4539</p>
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
						<li>Am failing to use the login system
							<a href="#">example.com</a> @James.
							<span>
								<i class="fab fa-twitter"></i> 02 days ago</span>
						</li>
						<li>This is nice and i like this portal
							<a href="#">example.com</a> @Peter.
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
	</section>
	<!-- //copyright -->
	<!-- Modal -->
		<!-- js -->
	<!-- <script src="js/jquery-2.2.3.min.js"></script> -->	<!-- //js-->
		<script src="js/smoothbox.jquery2.js"></script>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	 <script src="js/bootstrap.js"></script>
</body>

</html>
