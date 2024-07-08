<?php 
session_start();
include("db_connect.php");
if(isset($_COOKIE['pin'])&&$_COOKIE['serial']){
	
$pin=$_COOKIE['pin'];
$serial=$_COOKIE['serial'];

 $sqluser ="SELECT * FROM Applicants2 WHERE Serial='$serial' && Pin='$pin' ";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	      {
              $firstname = $found['Othername'];
		      $sirname= $found['Surname'];			 
			  	  $id= $found['id'];  
  	     }
}else{
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

<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
         }
     </script>


</head>

<body>
	
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
                                                      data: { Deletework:myValue },
                                                      success: function( result ) {
                                                      if(result=="ok"){
                                                                    swal({title: "Deleted!", text: "Your saved entry has been deleted.", type: "success"},
                                                          function(){
                                                                          var pin='<?php echo$pin ?>';
 		                                                                  var serial='<?php echo$serial ?>';
 		                                                                 var optionValue='xuls';
 		                                                                 $.ajax({
 		 	                                                                      type :'POST',
                                                                                    url: "process.php",
                                                                                   data: {loademployer:optionValue,userpin:pin,userserial:serial},
                                                                                success: function(result) { 
                                                                                	                        if (result=='No') {
                                                                                	                        	                $("#errors1").html(""); 
                                                                                	                        	                $("#errors2").html(""); 
                                                                                	                        	           } 
                                                                                                             else {
                                                                                                                      $("#errors1").html(result);
                                                                                                                       $("#errors2").html("<a  class='btn btn-default' href='summary.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Employer</a>");

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
                </script>          

	<script type="text/javascript">
 $(document).on("click", ".Employer", function () {
      var name = document.getElementById('name').value;
       var froms = document.getElementById('froms').value;
      var tos = document.getElementById('tos').value;
      var positions = document.getElementById('position').value;
      var pin = document.getElementById('pin').value;
     var serial = document.getElementById('serial').value;
   ;

			$.ajax ({
            type : 'POST',
               url: "process.php",
             data: {employer:name,fromdatess:froms,todatess:tos,position:positions,userpin:pin,userserial:serial},              
          success: function(result) {
                         
          	                         $("#errors1").html(result);
          	                         $("#errors2").html("<a  class='btn btn-default' href='summary.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Employer</a>");
                                     swal({title: "Successful!", text: "Employer Information Saved!!.", type: "success"});
  
                                        }
                });
				
	}); 
	
	$(document).ready(function(){
 		
 		var pin='<?php echo$pin ?>';
 		var serial='<?php echo$serial ?>';
 		var optionValue='xuls';
 		 $.ajax({
 		 	    type :'POST',
                  url: "process.php",
                 data: {loademployer:optionValue,userpin:pin,userserial:serial},
               success: function(result) {               
                                           
                                             if (result=='No') {                                      	
                                                         
                                                     } 
                                           else {
                                                       $("#errors1").html(result);
                                                       $("#errors2").html("<a  class='btn btn-default' href='summary.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Employment</a>");

                                                 }
                                          }
                });  
         });

 </script>
 
 <script type="text/javascript">
 $(document).on("click", ".Del", function () {
             	                        
          	                         $("#name").val("");
          	                         $("#froms").val("");
          	                         $("#tos").val("");
          	                         $("#position").val("");            
				
	}); 
	
	

 </script>

 
		<!-- header -->
	
	<!-- //header -->
	<!-- banner -->
	
		<!-- //banner -->
<!-- gallery -->
	<div class="agileits-services text-center py-5" style="background-color:white ">
		<div class="container py-md-4 mt-md-3" >
			
            <center>   
 <div id="printableArea">
      		
			                                                 
		
	                                  <table  class='table table-bordered' style="width:60%;">
                                                                      <thead>
                                                                         
                                                                            </thead>
                                                                        <tbody>
                                                                        	 
                                                                           <tr>
                                                                              <td>SCHOOL ATTENDED WITH DATES</td>                                                                             
                                                                              </tr>
                                                                              <tr class='success'>                                                                              
                                                                               <td>School</td>
                                                                              <td>From</td> 
                                                                              <td>To</td>  
                                                                               <td >Qualification</td>
                                                                               <td></td> 
                                                                               <td></td> 
                                                                               </tr>
                                                                               <?php 
                                                                                $sql ="SELECT * FROM Previousxul  WHERE Serial='$serial'&& Pin='$pin' ";
                                                                              $rget = mysqli_query($db,$sql);
										                                              $num=mysqli_num_rows($rget);
                                                                                    if($num!=0){
                                                                                    	           while($foundk = mysqli_fetch_array($rget))
	                                                                                              {
                                                                                                     $school= $foundk['Name'];
																	                                  $froms= $foundk['Froms'];
																	                                 $tos= $foundk['Tos'];
																	                                 $quaification= $foundk['Qualification'];
																	                                     $id= $foundk['id'];
																										 
																										 echo" <tr><td>$school</td>
                                                                                                              <td>$froms</td>
                                                                                                           <td>$tos</td>
                                                                                                             <td>$quaification</td>
                                                                                                              <td></td> 
                                                                                                              <td></td></tr> ";
																								    }
																					           }
                                                                               
                                                                               
                                                                               ?>
                                                                               
                                                                              
                                                                              <tr>
                                                                              <td>SECTION 4 O'LEVEL RESULTS</td>                                                                             
                                                                              </tr>
                                                                              <tr class="success">                                                                              
                                                                               <td>Type of Exam</td>
                                                                               <td>Center & Exam No</td>
                                                                                <td>Date of Exam</td>
                                                                                <td >Subject</td>
                                                                              <td>Sitting</td>                                                                               
                                                                               <td >Grade</td>
                                                                               </tr>
                                                                          <?php
                                                                               $sql ="SELECT * FROM Olevel  WHERE Serial='$serial'&& Pin='$pin' ";
                                                                                      $rget = mysqli_query($db,$sql);
										                                                $num=mysqli_num_rows($rget);
                                                                                 if($num!=0){                                                	                      
                                     
												                                             while($foundk = mysqli_fetch_array($rget))
	                                                                                        {
                                                                                               $type= $foundk['Examtype'];
																	                            $exam= $foundk['Exam'];
																	                             $date= $foundk['Examdate'];
																	                            $subjects= $foundk['Subjects'];
																	                           $sitting= $foundk['Sitting'];
																	                            $grade= $foundk['Grade'];																   
																	    echo"<tr>
                                                                              <td>$type</td>
                                                                              <td>$exam</td>
                                                                               <td>$date</td>
                                                                              <td>$subjects</td>
                                                                               <td>$sitting</td>
                                                                               <td>$grade</td>
                                                                             
                                                                              </tr>";
		                                                                              }
}
                                                                             ?>
                            
                                                                             <tr>
                                                                              <td>SECTION 5 A'LEVEL RESULTS</td>                                                                             
                                                                              </tr>
                                                                              <tr class="success">                                                                              
                                                                               <td>Course Studied</td>
                                                                                <td>Institution</td>
                                                                              <td>From</td> 
                                                                              <td>To</td>  
                                                                               <td >Result</td>
                                                                               <td >GPA</td>
                                                                               </tr>
                                                                         <?php
                                                                               $sql ="SELECT * FROM Alevel  WHERE Serial='$serial'&& Pin='$pin' ";
                                                                                      $rget = mysqli_query($db,$sql);
										                                                $num=mysqli_num_rows($rget);
                                                                                 if($num!=0){                                                	                      
                                     
												                                             while($foundk = mysqli_fetch_array($rget))
	                                                                                        {
                                                                                               $course= $foundk['Course'];
																	                            $froms= $foundk['Froms'];
																	                             $tos= $foundk['Tos'];
																	                            $inst= $foundk['Institution'];
																	                           $Degree= $foundk['Degree'];
																	                            $id= $foundk['id'];
																   
																	    echo"<tr>
                                                                              <td>$course</td>
                                                                              <td>$inst</td>
                                                                               <td>$froms</td>
                                                                              <td>$tos</td>
                                                                                 <td>$Degree</td>
                                                                             <td></td>
                                                                              </tr>";
		                                                                              }
}
                                                                             ?>
                                
                                                                              <tr>
                                                                              <td>SECTION 6 Employment History</td>                                                                             
                                                                              </tr>
                                                                              <tr class="success">                                                                              
                                                                               <td>Employer Name</td>
                                                                                <td>Position</td>
                                                                              <td>From</td> 
                                                                              <td>To</td>  
                                                                               <td ></td>
                                                                               <td ></td>
                                                                               </tr>
                                                                               <?php
                                                                               $sql ="SELECT * FROM Employment  WHERE Serial='$serial'&& Pin='$pin' ";
                                                                                  $rget = mysqli_query($db,$sql);
										                                        $num=mysqli_num_rows($rget);
                                                                                      if($num!=0){
                                                	                       
                                     
												                        while($foundk = mysqli_fetch_array($rget))
	                                                                 {
                                                                        $employer= $foundk['Employer'];
																	    $froms= $foundk['Froms'];
																	   $tos= $foundk['Tos'];
																	   $pos= $foundk['Position'];																	   
																	   $id= $foundk['id'];
																   
																	    echo"<tr>
                                                                              <td>$employer</td> 
                                                                              <td>$pos</td>                                                                             
                                                                               <td>$froms</td>
                                                                              <td>$tos</td>                                                                                 
                                                                             <td></td>
                                                                             <td></td>
                                                                              </tr>";
		                                                             }
                                                                     }
                                                                               
                                                                               ?>
                                                                          </tbody>
                                                                           </table>
											
		                                                 
		                                                 
		
		<div class="alert alert-warning" style="width:60%;">
          I&nbsp;<?php if(isset($firstname)){echo$firstname.' '.$sirname;} ?>&nbsp; declare that the particulars submited on this form are to the best of my knowledge and correct and if admited i shall regard myself bound to the rules and regulations of PNTC and at any time the school is reasonably conviced that the information given is false or incorrect i will be required to withdrawal from the course or be liable to or both             
         
       </div></div>
		                                                 
		                                                 </center>
		
		<div class="form-group">
			
					<a class='btn btn-default' onclick="printDiv('printableArea')"><span class='glyphicon glyphicon-print'></span> &nbsp;Print</a>

		<a class='btn btn-default' href='print.php'><span class='glyphicon glyphicon-log-out'></span> &nbsp;Previous Page</a>

                                                                               
			
		</div> 
		
	              				                                   				                                         				                          				        		
</div>	
				
					
			</div>
		</div>
	</div>
	<!-- //gallery -->

<!-- Footer -->
	
	<!-- //Footer -->
<!-- copyright -->
	
	<!-- //copyright -->
	<!-- Modal -->
	
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