<?php 
session_start();
include("db_connect.php");
if(isset($_COOKIE['pin'])&&$_COOKIE['serial']){
	
$pin=$_COOKIE['pin'];
$serial=$_COOKIE['serial'];

 $sqluser ="SELECT * FROM Administrator WHERE Email='$serial' && Password='$pin' ";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	      {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
			  
  
  	     }
}else{
	 header('location:login.php');
      exit;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- BOOTSTRAP STYLES-->
    <link href="assets1/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets1/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets1/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
   <script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

</head>
<?php if(isset($_SESSION['sweetalertOK'])) {?>
<script type="text/javascript"> 

$(document).ready(function(){ 
                           var myValue = "Load";
                                        swal({
                                         title: "Video uploaded successfully",
                                         text: "Do you want to upload another one?",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="admin.php";
                                                     } 
                                           else {
                                                        window.location ="adminvideos.php";
                                                 }
                                         });
                                         
                                                    });
       
                    </script>
   <?php  session_destroy(); }?>        

<body style="height: 30%">
     
 
		
          
          
    <div id="wrapper" >
         <div class="navbar navbar-inverse navbar-fixed-top" style="background-color:green;">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="images/unima.png" style="width:70px;height: 70px;margin-top:-7px" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">Logout</a> 
                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation" >
            <div class="sidebar-collapse" >
                <ul class="nav" id="main-menu" >
                 


                    <li class="active-link">
                        <a href="#" ><i class="fa fa-desktop "></i>Main Dashboard</a>
                    </li>                 
                    
                    
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMINISTRATOR DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                        	<?php if(isset($sirname)){echo"<strong>Welcome :".$firstname." ".$sirname."! </strong>";} ?>				
                           
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top" >
                                   
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           	<a href='localgvt.php'>

                        <i class="fa fa-bank fa-5x"></i>
                      <h4>Add Local Government</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="serials.php" >
                     <i class="fa fa-lock fa-5x"></i>
                      <h4>Give Serial & Pin</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="group.php" >
  <i class="fa fa-lock fa-5x"></i>
                      <h4>Upload Serial & Pin in Bulk</h4>
                      </a>
                      </div>                
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="addadmin.php" >
 <i class="fa fa-users fa-5x"></i>
                      <h4>Add Administrator </h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="addadmin.php" >
 <i class="fa fa-trash-o fa-5x"></i>
                      <h4>Delete Administrator</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="#" >
 <i class="fa fa-wrench fa-5x"></i>
                      <h4>Under Development</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
              </div>
                 <!-- /. ROW  --> 
                <div class="row text-center pad-top">
                 
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="localgvt.php" >
 <i class="fa fa-trash-o fa-5x"></i>
                      <h4>Delete Local Government</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="exam.php" >
 <i class="fa fa-plus-square fa-5x"></i>
                      <h4>Add Exam Type</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="subjects.php" >
 <i class="fa fa-plus-square fa-5x"></i>
                      <h4>Add Subjects</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="grade.php" >
 <i class="fa fa-plus-square fa-5x"></i>
                      <h4>Add Grade</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="#" >
 <i class="fa fa-wrench fa-5x"></i>
                      <h4>Under Development</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="#" >
 <i class="fa fa-wrench fa-5x"></i>
                      <h4>Under Development</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                  
              </div>   
                  <!-- /. ROW  -->    
                        <!-- /. ROW  -->   
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                        <div class="alert alert-danger">
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer" style="background-color:white">
      
    
            <div class="row">
                <div class="col-lg-12" style="color:black ">
                    © 2024 TSAFE . All Rights Reserved | Design by: <a href="" style="color:black;" target="_blank">mvumapatrick@gmail.com</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets1/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets1/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets1/js/custom.js"></script>
    
   
</body>
</html>
