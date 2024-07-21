<?php
 
 $db = new mysqli("localhost","root","");
   if($db->connect_errno > 0){
//  $db = new mysqli("shareddb-d.hosting.stackcp.net","premier_nursing","0IMDKKSpSCW&");
//    if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  } 
        //  mysqli_select_db($db,"premier_nursing-363510b0");
         mysqli_select_db($db,"unima");
     
// 	 $db->query("CREATE DATABASE IF NOT EXISTS `Unima`");
	 
//              mysqli_select_db($db,"Unima");
              
//                    $stableZ="CREATE TABLE IF NOT EXISTS Excelfiles (id int(11) NOT NULL auto_increment,
//                  ids varchar(30)NOT NULL,PaymentP varchar(30)NOT NULL,name varchar(1000)NOT NULL,type varchar(30)NOT NULL,
//                  Size decimal(10)NOT NULL,content longblob NOT NULL,
//                  PRIMARY KEY(id) )";
//                $db->query($stableZ);
									 
// 			 $stable56="CREATE TABLE IF NOT EXISTS Applicants (id int(11) NOT NULL auto_increment,
//                                   Serial varchar(300)NOT NULL,
//                                   Pin varchar(300)NOT NULL,                         
//                                   PRIMARY KEY(id) )";
//                          $db->query($stable56); 
						 
// 						  $stable6="CREATE TABLE IF NOT EXISTS States (id int(11) NOT NULL auto_increment,
//                                   Name varchar(300)NOT NULL,                                                         
//                                   PRIMARY KEY(id) )";
//                          $db->query($stable6); 
						 
// 						  $stable61="CREATE TABLE IF NOT EXISTS Examtype (id int(11) NOT NULL auto_increment,
//                                   Name varchar(300)NOT NULL,                                                         
//                                   PRIMARY KEY(id) )";
//                          $db->query($stable61);
						 
// 						   $stable6u="CREATE TABLE IF NOT EXISTS Schoolsubjects (id int(11) NOT NULL auto_increment,
//                                   Name varchar(300)NOT NULL,                                                         
//                                   PRIMARY KEY(id) )";
//                          $db->query($stable6u);  
						 
// 						  $stable6us="CREATE TABLE IF NOT EXISTS Schoolgrades (id int(11) NOT NULL auto_increment,
//                                   Name varchar(300)NOT NULL,                                                         
//                                   PRIMARY KEY(id) )";
//                          $db->query($stable6us); 
						 
// 						 $stables="CREATE TABLE IF NOT EXISTS Localgovernment (id int(11) NOT NULL auto_increment,
// 						          Statesid int(11)NOT NULL,  
//                                   Name varchar(300)NOT NULL,                                                         
//                                   PRIMARY KEY(id) )";
//                          $db->query($stables);         		                       
		    
// 				 $stable561="CREATE TABLE IF NOT EXISTS Applicants2 (id int(11) NOT NULL auto_increment,                                 
//                                   Othername varchar(300)NOT NULL,
//                                   Surname Varchar(300)NOT NULL,                                                                  
//                                   DOB varchar(300)NOT NULL,
//                                   Gender varchar(300)NOT NULL,
//                                   PlaceOfbirth varchar(300)NOT NULL,
//                                   Hometown varchar(300)NOT NULL,
//                                   Country varchar(300)NOT NULL,
//                                   State varchar(300)NOT NULL, 
//                                   Localgvt varchar(300)NOT NULL, 
//                                   Appresaddress varchar(300)NOT NULL,
//                                   Appcoraddress varchar(300)NOT NULL,
//                                   Gname Varchar(300)NOT NULL,
//                                   Gplace varchar(300)NOT NULL,                                 
//                                   Ghometown varchar(300)NOT NULL,
//                                   Gcountry varchar(300)NOT NULL,
//                                   Gstate varchar(300)NOT NULL,
//                                   Glocalgvt varchar(300)NOT NULL,
//                                   Gaddress varchar(300)NOT NULL,
//                                   Gmobile varchar(300)NOT NULL,
//                                   Applicantphone varchar(300)NOT NULL,
//                                   Email varchar(300)NOT NULL,  
//                                   Serial varchar(300)NOT NULL,
//                                   Pin varchar(300)NOT NULL,                                                 
//                                   PRIMARY KEY(id) )";
//                          $db->query($stable561);          		                       
		    
		    				 
// 							 $stableZ="CREATE TABLE IF NOT EXISTS Profilepictures (id int(11) NOT NULL auto_increment,
//                  Serial varchar(300)NOT NULL,Pin varchar(300)NOT NULL,name varchar(1000)NOT NULL,type varchar(30)NOT NULL,
//                  Size decimal(10)NOT NULL,content longblob NOT NULL,
//                  PRIMARY KEY(id) )";
//                $db->query($stableZ);
               
//                $stab="CREATE TABLE IF NOT EXISTS Courseapplied (id int(11) NOT NULL auto_increment,
//                  Serial varchar(300)NOT NULL,Pin varchar(300)NOT NULL,Name varchar(1000)NOT NULL,
//                  PRIMARY KEY(id) )";
//                $db->query($stab);
               
//                 $stableZ1="CREATE TABLE IF NOT EXISTS Previousxul (id int(11) NOT NULL auto_increment,
//                  Serial varchar(300)NOT NULL,Pin varchar(300)NOT NULL,Name varchar(300)NOT NULL,Froms varchar(30)NOT NULL,
//                  Tos varchar(300)NOT NULL,Qualification Varchar(300) NOT NULL,
//                  PRIMARY KEY(id) )";
//                $db->query($stableZ1);
			   
// 			    $stablec="CREATE TABLE IF NOT EXISTS Alevel (id int(11) NOT NULL auto_increment,
//                  Serial varchar(300)NOT NULL,Pin varchar(300)NOT NULL,Course varchar(300)NOT NULL,Froms varchar(30)NOT NULL,
//                  Tos varchar(300)NOT NULL,Degree Varchar(300) NOT NULL,Institution Varchar(300) NOT NULL,
//                  PRIMARY KEY(id) )";
//                $db->query($stablec);
               
//                 $stablef="CREATE TABLE IF NOT EXISTS Olevel (id int(11) NOT NULL auto_increment,
//                  Serial varchar(300)NOT NULL,Pin varchar(300)NOT NULL,Subjects varchar(300)NOT NULL,Grade varchar(300)NOT NULL,
//                  Examdate varchar(300)NOT NULL,Exam Varchar(300) NOT NULL,Sitting Varchar(300) NOT NULL,Examtype Varchar(300) NOT NULL,
//                  PRIMARY KEY(id) )";
//                $db->query($stablef);
               
//                 $stablec="CREATE TABLE IF NOT EXISTS Employment (id int(11) NOT NULL auto_increment,
//                  Serial varchar(300)NOT NULL,Pin varchar(300)NOT NULL,Employer varchar(300)NOT NULL,Froms varchar(30)NOT NULL,
//                  Tos varchar(300)NOT NULL,Position Varchar(300) NOT NULL,
//                  PRIMARY KEY(id) )";
//                $db->query($stablec);
               
//                $stabled="CREATE TABLE IF NOT EXISTS Declared (id int(11) NOT NULL auto_increment,
//                  Serial varchar(300)NOT NULL,Pin varchar(300)NOT NULL,Status varchar(300)NOT NULL,                 
//                  PRIMARY KEY(id) )";
//                $db->query($stabled);
               
//                $stable1="CREATE TABLE IF NOT EXISTS Files (id int(11) NOT NULL auto_increment,
//                                   Title varchar(300)NOT NULL,Name varchar(1000)NOT NULL,
//                                  Type varchar(30)NOT NULL,Size decimal(10) NULL,
//                                    content longblob NOT NULL,PRIMARY KEY(id) )";
//                                  $db->query( $stable1);	
                
// 			   $stable4="CREATE TABLE IF NOT EXISTS Administrator (id int(11) NOT NULL auto_increment,
//                  Firstname varchar(30)NOT NULL,Sirname varchar(30)NOT NULL,Mtitle Varchar(30)NOT NULL,
//                  Phone varchar(30)NOT NULL,Institution varchar(30)NOT NULL,
//                  Password varchar(30)NOT NULL,Email varchar(30)NOT NULL,PRIMARY KEY(id) )";
//                  $db->query($stable4);
					           	
			 
// 					$sql="SELECT * FROM Administrator ";
//                    if ($result=mysqli_query($db,$sql))
//                      {
//                        if($rowcount=mysqli_num_rows($result)>0)
//                          {
                             
//                          }
//                       else{
//                       	           $enter="INSERT INTO Administrator (Password,Email,Firstname,Sirname,Mtitle,Phone) VALUES('1234554321','namibra.io','Patrick','Mvuma','Mr','0999107724')";
//                                   $db->query($enter);
//                                            $querydy = "INSERT INTO Files (Title,Name,Size,Type) ".
//                                  "VALUES ('guides','guides.docx','88','application/vnd.ms-docx')";                                 
//                                      $db->query($querydy) or die('Errorr, query failed to upload');	
                             
                                 
//                                                     $querydy = "INSERT INTO Files (Title,Name,Size,Type) ".
//                                  "VALUES ('Serial_Pin_Bulk','Serial_Pin_Bulk.csv','76','application/vnd.ms-excel')";                                 
//                                      $db->query($querydy) or die('Errorr, query failed to upload');	
                             	
								    	
//                           }
// 					 } 		

?>