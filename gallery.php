<?php 
include_once("db_connect.php");
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

	<link href="css/style1.css?v=<?php echo filemtime('css/style1.css'); ?>" rel="stylesheet" type="text/css" media="screen" />

	 <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
		<!-- gallery -->
	<link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" />
	<link href="css/style.css?v=<?php echo filemtime('css/style.css'); ?>" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<script type="text/javascript" src="js/validation.min.js?v=<?php echo filemtime('js/validation.min.js'); ?>"></script>
<script type="text/javascript" src="js/login.js?v=<?php echo filemtime('js/login.js'); ?>"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="css/progressbar.css">
</head>

<body>
<script type="text/javascript">
 $(document).on("click", ".biodata", function () {
     var myTitle = document.getElementById('password').value;
    // $(".bookId").html(myTitle);
     // window.alert(myTitle); 
     if(myTitle==""){									
					$("#login_buttons").html('<img src="js/ajax-loader.gif" /> &nbsp; Loading Stage 2 ...');
					setTimeout(' window.location.href = "index.php"; ',3000);
				} 
}); 
 </script>
	<!-- header -->
	<section class="w3layouts-header py-2">
		<div class="container">
			  <!-- header -->
        <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
                    <h>
                        <a class="navbar-brand" href="index.html">
               COLLEGE OF HEALTH SCIENCES & TECHNOLOGY, PNTC    
                        </a>
                    </h>
                    <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto text-center">
                            <li class="nav-item active  mr-3">
                                <a class="nav-link" href="index.html">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown mr-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Admission
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index.php">Online Form</a>
									 <a class="dropdown-item" href="typo.html">Admission Status</a>
									 <a class="dropdown-item" href="gallery.html">Admission List</a>
									 <a class="dropdown-item" href="typo.html">Print Form</a>
                             
                                </div>
                            </li>
                            <li class="nav-item  mr-3">
                                <a class="nav-link" href="about.html">Registration</a>
                            </li>
							 <li class="nav-item  mr-3">
                                <a class="nav-link" href="services.html">Results</a>
                            </li>
                            
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="contact.html">Contact</a>
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
			<h3 class="heading-agileinfo">Stage 2 (Bio Data) <span>
	helo
				</span></h3>
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
				
			<div class="container">
				
	<h2></h2>		
	
	<div class="form-login" >
		

 <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Username</span>
   <input type="text" class="form-control" name="username" Plceholdr="Username to be used during login" id='username'>
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Password</span>
   <input type="text" class="form-control"  name="password" id="password" placeholder="Atleast seven characters" >
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Re-type password</span>
   <input class="form-control" type="password" name="repassword" id="repassword" placeholder="Retype password" >
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Surname</span>
   <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Other Names</span>
   <input type="text" class="form-control" name="othernames" id="othernames" placeholder="Enter Other Names">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Date of Birth</span>
      <input id="datepicker-starting-view" type="text" class="form-control" data-zdp_readonly_element="false" placeholder="dd/mm/yy" id="dob" >  
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Gender</span>
<select style='height:37px;width:100%;border:1px solid;' name="gender"  id='gender' > 
            				        <option >Select Option</option>
            				                          
            				                    <option class="open-computers">Male</option>
            				                    <option class="open-computers2">Female</option>									             			 	
				                                  
            				                           </select>  </div>
 
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Place of Birth</span>
   <input type="text" class="form-control" name="placebirth" id="placebirth" placeholder="Place of Birth" >
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Hometown</span>
   <input type="text" class="form-control" name="hometown" id="hometown" placeholder="Enter Hometown" >
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Country</span>
   <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" >
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">State</span>
<select style='height:37px;width:100%;border:1px solid black;' name="state"  id='state' > 
            				        <option >Select Option</option>
            				                          
            	      <option>Abia</option>
                      <option>Adamawa</option>
                       <option>Akwa Ibom</option>
                      <option>Anambra</option>
                     <option>Bauchi</option>
                      <option>Bayelsa</option>
                     <option>Bunue</option>
                      <option>Borno</option>
                     <option>Cross River</option>
                      <option>Delta</option>
                     <option>Ebonyi</option>
                      <option>Enugu</option>
                     <option>Edo</option>
                      <option>Ikiti</option>
                    <option>Gombe</option>
                      <option>Imo</option>
                    <option>Jigawa</option>
                      <option>Kaduna</option>
                   <option>Kano</option>
                      <option>Katsina</option>
                   <option>Kebbi</option>
                      <option>Kogi</option>
                   <option>Kwara</option>
                      <option>Lagos</option>
                   <option>Nasarawa</option>
                      <option>Niger</option>
                   <option>Ogun</option>
                      <option>Ondo</option>
                   <option>Usun</option>
                      <option>Oyo</option>
                   <option>Plateau</option>
                      <option>Rivers</option>
                   <option>Sokoto</option>
                      <option>Taraba</option>
                   <option>Yobe</option>
                   <option>Zamfara</option>                  
        
            				                           </select>  </div>

  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Local Govt</span>
   <input type="text" class="form-control" name="localgvt" id="localgvt" placeholder="Enter Local Govt">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Address</span>
     <textarea name="apresaddress" rows="4" class="form-control" placeholder="Correspondence Address" id="apresaddress"></textarea>
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Address</span>
     <textarea name="aprecaddress" rows="4" class="form-control" placeholder="Resdential Address" id="aprecaddress"></textarea>
  </div>
  
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Name of Parent/Guardian</span>
   <input type="text" class="form-control" name="guardianname" id="guardianname" placeholder="Guardian Name">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Parent/Guardian Place of Birth</span>
   <input type="text" class="form-control" name="guardianplace" id="guardianplace" placeholder="Guardian POB">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Parent/Guardian Home Town</span>
   <input type="text" class="form-control" name="guardianhometown" id="guardianhometown" placeholder="Guardian Home Town">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Parent/Guardian Country</span>
   <input type="text" class="form-control" name="gcountry" id="gcuntry" placeholder="Guardian Country">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Parent/Guardian State</span>
<select style='height:37px;width:100%;border:1px solid black;' name="gstate"  id='gstate' > 
            				        <option >Select Option</option>
            				                          
            	      <option>Abia</option>
                      <option>Adamawa</option>
                       <option>Akwa Ibom</option>
                      <option>Anambra</option>
                     <option>Bauchi</option>
                      <option>Bayelsa</option>
                     <option>Bunue</option>
                      <option>Borno</option>
                     <option>Cross River</option>
                      <option>Delta</option>
                     <option>Ebonyi</option>
                      <option>Enugu</option>
                     <option>Edo</option>
                      <option>Ikiti</option>
                    <option>Gombe</option>
                      <option>Imo</option>
                    <option>Jigawa</option>
                      <option>Kaduna</option>
                   <option>Kano</option>
                      <option>Katsina</option>
                   <option>Kebbi</option>
                      <option>Kogi</option>
                   <option>Kwara</option>
                      <option>Lagos</option>
                   <option>Nasarawa</option>
                      <option>Niger</option>
                   <option>Ogun</option>
                      <option>Ondo</option>
                   <option>Usun</option>
                      <option>Oyo</option>
                   <option>Plateau</option>
                      <option>Rivers</option>
                   <option>Sokoto</option>
                      <option>Taraba</option>
                   <option>Yobe</option>
                   <option>Zamfara</option>                  
        
      </select>  </div>
<div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Parent/Guardian Local Govt</span>
   <input type="text" class="form-control" name="glocalgovt" id="glocalgovt" placeholder="Guardian Local Govt">
  </div>
<div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Parent/Guardian Address</span>
     <textarea name="gaddress" id="gaddress" rows="4" class="form-control" placeholder="Guardian Correspondance Address"></textarea>
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Parent/Guardian Phone</span>
   <input type="text" class="form-control" name="gmobile" id="gmobile" placeholder="Guardian Phone Number">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Applicant Phone</span>
   <input type="text" class="form-control" name="applicantphone" id="applicantphone" placeholder="Applicant Phone Number">
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Applicant Email</span>
   <input type="email" class="form-control" name="email" id="email" placeholder="E-mail Address">
  </div>
     <input type="hidden" name="ttin" value=""  />

      	<div class="form-group">
			<button type="submit" class="biodata btn btn-default" name="login_buttons" id="login_buttons">
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Submit
			</button> 
			<button type="reset" class="btn btn-default" name="login_button" id="login_button">
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
					<p>0926k 4th block building,king Avenue, </p>
					<p class="my-2"> New York City,USA</p>
					<p class="phone">phone: +0444 555 6789</p>
					<p class="phone my-2">Fax: +0444 555 6789</p>
					<p class="phone">Mail:
						<a href="mailto:info@example.com">info@example.com</a>
					</p>
				</div>
				<div class="col-lg-4 footer-grids">
					<h2>Latest News</h2>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4">
							<img src="images/g1.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/g2.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/g3.jpg" class="img-fluid" alt="Responsive image">
						</a>
					</div>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4">
							<img src="images/g4.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/g5.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/g6.jpg" class="img-fluid" alt="Responsive image">
						</a>
					</div>
				</div>
				<div class="col-lg-4 footer-grids">
					<h3>Twitter feed</h3>
					<ul class="w3agile_footer_grid_list">
						<li>Ut aut reiciendis voluptatibus adipiscing
							<a href="#">example.com</a> alias, ut aut.
							<span>
								<i class="fab fa-twitter"></i> 02 days ago</span>
						</li>
						<li>Itaque earum rerum hic tenetur a sapiente
							<a href="#">example.com</a> ut aut.
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
			<p>© 2024 Attainment . All Rights Reserved | Design by
				<a href="http://w3layouts.com/"> W3layouts </a>
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
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Attainment</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="agileits-w3layouts-info">
						<img src="images/bg1.jpg" class="img-fluid" alt="" />
						<p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. </p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal -->
	<!-- js -->
	<!-- <script src="js/jquery-2.2.3.min.js"></script> -->	<!-- //js-->
		<script src="js/smoothbox.jquery2.js"></script>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	 <script src="js/bootstrap.js"></script>
</body>

</html>