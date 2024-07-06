<?php 
session_start();
include("db_connect.php");
if(isset($_COOKIE['pin'])&&$_COOKIE['serial']){
	
$pin=$_COOKIE['pin'];
$serial=$_COOKIE['serial'];
}
else{
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

<script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style>
	input{
		color: #990000;
	}
</style>


</head>

<body>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == "3") {?>
<script type="text/javascript"> 

$(document).ready(function(){ 
	sweetAlert("Oops...", "Upload all documents, they are required!", "error");
                                         
                                                    });
       
                    </script>
      <?php  session_destroy(); }?>

	<?php if(isset($_SESSION['uploaded'])) {?>
<script type="text/javascript"> 

$(document).ready(function(){ 
                           var myValue = "Load";
                                        swal({
                                         title: "Successfull",
                                         text: "Picture uploaded successfully",
                                         type: "success",
                                         showCancelButton: false,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="school.php";
                                                     } 
                                          
                                         });
                                         
                                                    });
       
                    </script>
      <?php  session_destroy(); }?>

	<?php if(isset($_SESSION['upload'])) {?>
<script type="text/javascript"> 

$(document).ready(function(){ 
                           var myValue = "Load";
                                        swal({
                                         title: "Successfull",
                                         text: "Picture Updated successfully",
                                         type: "success",
                                         showCancelButton: false,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="declaration.php";
                                                     } 
                                          
                                         });
                                         
                                                    });
       
                    </script>
      <?php  session_destroy(); }?>

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
			<h3 class="heading-agileinfo">Stage 3 (Document) <span>Click on Browse button below to select your picture and should not be more than 20MB</span></h3>
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
			<div class="container">
	<h2></h2>		
	
	<form class="form-login" method="post" action="process.php" enctype='multipart/form-data'>
		
		<div class="alert alert-warning">
          <i class="fa fa-info-circle"></i>&nbsp;This stage you upload your scanned passport and documents
             <ol>
             	<li>The Scanned document should be saved in .jpg,.jpeg,.png,.gif extension</li>
             	<li>Make sure you reduce the size of the document after scanning.That will reduce its memory capacity</li>
             	<li>The file size should not be more than 10 mb</li>
            </ol>
                  </div>
				  <input name='serial' type='hidden' value='<?php if(isset($serial)){echo$serial;} ?>' >
				  <input name='pin' type='hidden' value='<?php if(isset($pin)){echo$pin;} ?>'>
		<div class="form-group">
		<p style="margin-bottom:10px;text-align:start; color:black;">
        			Upload Passport
           </p>
           <p>
		   <input name='file2' type='file' id='file2' >
           </p> 
		</div>
		<div class="form-group">
		<p style="margin-bottom:10px;text-align:start; color:black;">
			Upload Certificate
           </p>
           <p>
		   <input name='file3' type='file' id='file3' >
           </p> 
		</div>
		<div class="form-group">
		<p style="margin-bottom:10px;text-align:start; color:black;">
        			Upload Testimonials
           </p>
           <p>
		   <input name='file4' type='file' id='file4' >
           </p> 
		</div>
		<div class="form-group">
		<p style="margin-bottom:10px;text-align:start; color:black;">
        			Upload Birth Certificate
           </p>
           <p>
		   <input name='file5' type='file' id='file5' >
           </p> 
		</div>
		
		<hr />
		<div class="form-group">
			<button type="submit" class="btn btn-default" name="Change" value="changes">
			<span class="glyphicon glyphicon-upload"></span> &nbsp; Upload Documents
			</button>			
		</div> 
		<div class="form-group">			
			<a type="button" class="Del btn btn-default" href="biodata.php">
			<i class="fa fa-arrow-left"></i> &nbsp; Previous
			</a> 
				
			<a type="button" class="Del btn btn-default" href="school.php">
			<i class="fa fa-arrow-right"></i> &nbsp; Next
			</a> 
		</div> 
	</form>	
	              				                                   				                                         				                          				        		
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
	</section>	<!-- //copyright -->
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