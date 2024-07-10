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
 $(document).on("click", ".Generate", function () {
      var name = document.getElementById('email').value;
      var pins = document.getElementById('pin').value;
      

			$.ajax ({
            type : 'POST',
               url: "process.php",
             data: {emailz:name,pin:pins},              
          success: function(result) {
                         
                                      
                                      if(result=='errors'){$('#errors2').html(" <div class='alert alert-danger'><i class='fa fa-info-circle'></i>&nbsp;The serial number and Pin arleady given to an applicant</div>")}
                                       else if(result=='error'){$('#errors2').html(" <div class='alert alert-danger'><i class='fa fa-info-circle'></i>&nbsp;Fill both textboxes below they are required</div>")}

                                      else{$("#errors1").html(result);}
                                     }
                });
				
	}); 
	
	$(document).ready(function(){
 		
 			var optionValue='xuls';
 		 $.ajax({
 		 	    type :'POST',
                  url: "process.php",
                 data: {loadapps:optionValue},
               success: function(result) {               
                                           
                                   if (result=='No') {                                      	
                                                         
                                                     } 
                                           else {
                                                       $("#errors1").html(result);
                                                 }
                                          }
                });  
         });
 </script>
 
 <script type="text/javascript">
 $(document).on("click", ".Del", function () {
             	                        
          	                         $("#email").val("");
          	                          $("#pin").val("");
          	                       				
	}); 
</script>

<script type="text/javascript"> 
            $(document).on("click", ".open-Delete", function () {
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
                     function(isConfirm){
                                      if (isConfirm) {
                                      	
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "process.php",
                                                      data: { Deletepin:myValue },
                                                      success: function( result ) {
                                                      if(result=="ok"){
                                                                     swal({title: "Deleted!", text: "Your saved entry has been deleted.", type: "success"},
                                                          function(){
                                                                               var optionValue='xuls';
 		                                                                 $.ajax({
 		 	                                                                      type :'POST',
                                                                                    url: "process.php",
                                                                                   data: {loadapps:optionValue},
                                                                                success: function(result) { 
                                                                                	                        $("#errors1").html(result);                                    
                                                                                                           }
                                                                                  }); 
                                                                     }
                                                                      );}

                                                       }
                                                  });
                                           } else {
	                                            swal("Cancelled", "This submissin is safe :)", "error");
                                             }
                                         });
                                       
                                       });
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
                  
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top" >
                                   
                   
                     
    <div class="card-deck mt-md-5 pt-5">
				  <div class="card">
				  	<h2>List Of Applicant</h2>
					<table  class='table table-bordered'>
                                                                        
                                                            <thead>
                                                                  <tr>
                                                                  	 <th>Applicant #</th>
                                                                    <th>Name</th>
                                                                    <th>Course Applied</th>
                                                                    
                                                                       </tr>
                                                                    </thead>
                                                                        <tbody>                                                                       	
                                                                              <?php   
				                                                                                          
																										
																										
																										 $qued="SELECT * FROM courseapplied  ";
                                                                                                               $resul=mysqli_query($db,$qued);
                                                                                                                      $checks=mysqli_num_rows($resul);
                                                                                                                      if($checks!=0)
                                                                                                                {
                                                                                        	                           while($found = mysqli_fetch_array($resul))
	                                                                                                                  {
                                                                                                                           $course= $found['Name'];
                                                                                                                           $serial= $found['Serial'];$pin= $found['Pin'];
                                                                                                                           
																														    $sqln2 ="SELECT * FROM applicants2 WHERE Serial='$serial'&& Pin='$pin' ";
                                                                                                                            $rgetb2 = mysqli_query($db,$sqln2);
	                                                                                                                         $numb=mysqli_num_rows($rgetb2);
                                                                                                                    if($numb!=0){
                                                                                                                                  while($foundl = mysqli_fetch_array($rgetb2))
	                                                                                                                                {
                                                                              															$sname= $foundl['Surname'];$fname= $foundl['Othername'];
																																			$id= $foundl['id'];										
																						                                            }
																																}
																													      echo"
																													      <tr>
                                                                               <tr class='success'>
                                                                               <td>$id</td>
                                                                                <td>$fname $sname</td> 
                                                                                <td>$course</td> 
                                                                                                                                                                                                                                              
                                                                              </tr>";
                                                                                                                    }
                                                                                                                 }
																												
												                             ?>
                                                                             
                                                                                                                                                                                                                                            
                                                                           
                                                                              
                                                                          </tbody>
                                                                           </table>
											
		                                 
				  </div>
				  <div class="card">
				  	<h2>Generated Serials & Pin</h2>
					<span id="errors1"></span>						
		                                 
				  </div>
				  
				  <div class="card">
					<div class="form-login" >
		<hr />
		<h2>Submit Serial & Pin</h2>
		<span id="errors2"></span>		
                  
		
		<div class="form-group" style="width:30%;margin-left:35%">
			<input type="text" class="form-control" placeholder="Serial Number" name="email" id="email" />
			
		</div>
		<div class="form-group" style="width:30%;margin-left:35%">
			<input type="text" class="form-control" placeholder="Pin" name="pin" id="pin" />			
		</div>
		
		
		
		<hr />
		<div class="form-group">
			<button type="submit" class="Generate btn btn-default" id="login_button">
			<span class="glyphicon glyphicon-componet"></span> &nbsp; Submit
			</button> 
			<button type="reset" class="Del btn btn-default">
			<span class="glyphicon glyphicon-trash"></span> &nbsp; Clear
			</button> 
		</div> 
	</div>
				  </div>
				</div>      
             </div>
             <?php
             
             if(isset($_POST['searching'])){
	  	
		  $name=$_POST['searching'];
		          //$pin=$_POST['userpin'];
		          $sqlused ="SELECT * FROM States WHERE Name='$name' ";

     $re = mysqli_query($db,$sqlused);
    while($found = mysqli_fetch_array($re))
	     {
              $id = $found['id'];
		 }
		   
				  
		$sql ="SELECT * FROM Localgovernment WHERE Statesid='$id'  ";
                                               $rget = mysqli_query($db,$sql);
										    $num=mysqli_num_rows($rget);
                                                if($num!=0){
                                                	                 echo"<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>SN</th>
                                                                           <th>STATE</th>
                                                                             <th>LOCAL GOVERNMENT</th>                                                                           
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
                                                                              <td>$name</td>
                                                                               <td>$nms</td>                                                                             
                                                                             <td><a data-id='$ids' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
		                                                             }
                                                                    echo"</tbody>
                                                                           </table>";
												              }										
						            
                    	
							 }
							 							 							                    							 
             
             
             
             ?> 
            
              </div>
                 <!-- /. ROW  --> 
                <div class="row text-center pad-top">
                 
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                         
                     
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
                    © 2024 TSAFE . All Rights Reserved | Design by: <a href="" style="color:black;" target="_blank">namibra.io</a>
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
