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

<body>
<script type="text/javascript"> 
            $(document).on("click", ".open-Delete", function () {
                                  var myValue = $(this).data('id');
                                   
                                        swal({
                                         title: "Are you sure?",
                                         text: "You want to delete this submission!",
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
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                      	
                                         
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "process.php",
                                                      data: {delsubj:myValue },
                                                      success: function(result) {
                                                      if(result=="ok"){
                                                                    swal({title: "Moved to trush!", text: "You have successfully deleted subject", type: "success"},
                                                          function(){ 
                                                                          location.reload();
                                                                          }
                                                                      );                               	                        
                                                                 }

                                                       }
                                                  });
                                           } else {
	                                            swal("Cancelled", "Your video is safe:)", "error");
                                             }
                                         });
                                       
                                       });
                </script>
       
          

                </script>          


  
          
          
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
                        <a href="admins.php" ><i class="fa fa-desktop "></i>Back To Main Dashboard</a>
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
                  <div class="row" style="width:40%;margin-left:6%">
                    <div class="col-lg-12 ">
                  <?php
                  if(isset($_SESSION['upload'])) {
                  	?>
                  	<div class="alert alert-success">                        	
                             Subject  (<?php echo$_SESSION['upload']; session_destroy(); ?> ) has been added
                        </div>
                        <?php
				  }else{?>
                
                        <div class="alert alert-info">
                        	
                             Enter Subject Name below.
                        </div>
                        <?php  }?>
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top" >
                                   
    <div style="float: left;margin-left:10%">              	
<form class="form-login" style="width: 100%" method="post" action="process.php">
	

  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Subject Name</span>
   <input type="text" class="form-control" name="subjectname" value=""  placeholder="Enter Subject Name">
  </div>

   
      	<div class="form-group">
			<button type="submit" class="btn btn-default" name="loginxz" value="ghj" >
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save
			</button> 
			<button type="reset" class="btn btn-default" name="logined" id="logined">
			<span class="glyphicon glyphicon-trash"></span> &nbsp; Clear
			</button> 
		</div> 	  
        
  
</form>
    </div>                 
                     
    <div style="float:right;margin-right:10%;margin-top:-9%"> 
    	                <div class="alert alert-info">                        	
                             List of Available subjects in the system.
                        </div>             	
<?php
             
             
	  	
		  
				  
		$sql ="SELECT * FROM Schoolsubjects ";
                                               $rget = mysqli_query($db,$sql);
										    $num=mysqli_num_rows($rget);
                                                if($num!=0){
                                                	                 echo"<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>SN</th>                                                                          
                                                                             <th>EXAM TYPE</th>                                                                           
                                                                              <th>Remove</th>
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";      
                                     
												                   while($foundk = mysqli_fetch_array($rget))
	                                                                 {
                                                                        $nms= $foundk['Name'];																	  
																	   $ids= $foundk['id'];
																   
																	    echo"<tr>
                                                                              <td>$ids</td>                                                                         
                                                                               <td>$nms</td>                                                                             
                                                                             <td><a data-id='$ids' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
		                                                             }
                                                                    echo"</tbody>
                                                                           </table>";
												              }										
						            
                    	
							 
							 							 							                    							 
             
             
             
             ?> 
    </div>      
             </div>
             
            
              </div>
                 <!-- /. ROW  --> 
                <div class="row text-center pad-top">
                 
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                         
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-gear fa-5x"></i>
                      <h4>Add Exam Type</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-envelope-o fa-5x"></i>
                      <h4>Add Subjects</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-bell-o fa-5x"></i>
                      <h4>Add Grade</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-rocket fa-5x"></i>
                      <h4>Launch</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-user fa-5x"></i>
                      <h4>Register User</h4>
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
