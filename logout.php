<?php
	session_start();
include("db_connect.php"); 

	
	   	            $passwords=$_COOKIE['pin'];
					$user_email=$_COOKIE['serial'];
				
	   	    
	   	    setcookie("pin",$passwords,time()-(60*60*24*7));
			setcookie("serial",$user_email,time()-(60*60*24*7));
									
		    header("Location: index.php");
	  ?>