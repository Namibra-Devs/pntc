<?php
try {
    session_start();
    include('db_connect.php');
    $pin = $_COOKIE['pin'];
    $serial = $_COOKIE['serial'];

    if (isset($_POST['Value4'])) {

        // $username = mysql_real_escape_string( $_POST[ 'Value1' ] );
        //Email variable
        // $password = mysql_real_escape_string( $_POST[ 'Value2' ] );
        //password variable
        //$repassword = mysql_real_escape_string( $_POST[ 'Value3' ] );
        //institution variable
        $surname = $_POST['Value4'];
        //phone variable
        $othernames = $_POST['Value5'];
        //Firstname variable
        $dob = $_POST['Value6'];
        //Email variable
        $gender = $_POST['Value7'];
        //Email variable
        $placebirth = $_POST['Value8'];
        //Email variable
        $hometown = $_POST['Value9'];
        //password variable
        $country = $_POST['Value10'];
        //institution variable
        $state = $_POST['Value11'];
        //phone variable
        $localgvt = $_POST['Value12'];
        //Firstname variable
        $apresaddress = $_POST['Value13'];
        //Email variable
        $guardianname = $_POST['Value14'];
        //Email variable
        $guardianplace = $_POST['Value15'];
        //Email variable
        $guardianhometown = $_POST['Value16'];
        //password variable
        $gcountry = $_POST['Value17'];
        //institution variable
        $gstate = $_POST['Value18'];
        //phone variable
        $glocalgovt = $_POST['Value19'];
        //Firstname variable
        $gaddress = $_POST['Value20'];
        //Email variable
        $gmobile = $_POST['Value21'];
        //Email variable
        $applicantphone = $_POST['Value22'];
        //Email variable
        $email = $_POST['Value23'];
        //Email variable
        $apcaddress = $_POST['Value24'];
        //Email variable
        $religion = $_POST['Value25'];
        //Religion variable

        if (
            $surname != '' && $othernames != '' && $dob != '' &&  $gender != '' && $placebirth != '' && $hometown != '' && $country != '' && $state != ''
            && $localgvt != '' && $apresaddress != '' && $guardianname != '' &&  $guardianplace != '' && $guardianhometown != '' && $gcountry != ''
            && $gstate != '' &&  $glocalgovt != '' && $gaddress != '' && $gmobile != '' &&  $applicantphone != '' && $email != '' && $apcaddress != '' && $religion != ''
        ) {
            $sql = "SELECT * FROM Applicants2  WHERE Serial='$serial' && Pin='$pin'";
            $resultn = mysqli_query($db, $sql);
            $rowcount = mysqli_num_rows($resultn);

            if ($rowcount == 0) {
                // Insert new record if no record exists
                $enter = "INSERT INTO Applicants2 (Othername, Surname, DOB, Gender, PlaceOfbirth, Hometown, Country, State, Localgvt, Appresaddress, Appcoraddress,
                            Gname, Gplace, Ghometown, Gcountry, Gstate, Glocalgvt, Gaddress, Applicantphone, Email, Gmobile, religion, Serial, Pin)
                            VALUES ('$othernames', '$surname', '$dob', '$gender', '$placebirth', '$hometown', '$country', '$state', '$localgvt', '$apresaddress', '$apcaddress',
                            '$guardianname', '$guardianplace', '$guardianhometown', '$gcountry', '$gstate', '$glocalgovt', '$gaddress', '$applicantphone', '$email',
                            '$gmobile', '$religion', '$serial', '$pin')";
                if ($db->query($enter) === TRUE) {
                    echo 'Yesss'; // Echoed initially when record was successfully inserted
                } else {
                    echo 'Error inserting record: ' . $db->error;
                }
            } else {
                // Update the existing record if it already exists
                $update = "UPDATE Applicants2 SET Othername='$othernames', Surname='$surname', DOB='$dob', Gender='$gender', PlaceOfbirth='$placebirth',
                            Hometown='$hometown', Country='$country', State='$state', Localgvt='$localgvt', Appresaddress='$apresaddress', Appcoraddress='$apcaddress',
                            Gname='$guardianname', Gplace='$guardianplace', Ghometown='$guardianhometown', Gcountry='$gcountry', Gstate='$gstate', Glocalgvt='$glocalgovt',
                            Gaddress='$gaddress', Applicantphone='$applicantphone', Email='$email', Gmobile='$gmobile', religion='$religion'
                            WHERE Serial='$serial' AND Pin='$pin'";
                if ($db->query($update) === TRUE) {
                    echo 'Yes2'; // Echoed initially when a record was updated
                } else {
                    echo 'Error updating record: ' . $db->error;
                }
            }
        } else {
            echo 'Yes';
        }
    } 
    if (isset($_FILES['file2']['name']) && $_POST['Change']) {
        $serial = $_POST['serial'];
        $pin = $_POST['pin'];
        $pages = $_POST['page'];

        // Define the target directory
        $targetDirectory = 'images/applicants/';

        // Associative array of file input names and their corresponding new names
        $fileInputs = [
            'file2' => 'passport',
            'file3' => 'certificate',
            'file4' => 'testimonial',
            'file5' => 'birth-certificate'
        ];

        // Check if any files are empty or have errors
        foreach ($fileInputs as $fileInput => $newName) {
            if (!isset($_FILES[$fileInput])) {
                $_SESSION['error'] = '1';
            }
            if ($_FILES[$fileInput]['error'] != UPLOAD_ERR_OK) {
                $_SESSION['error'] = '2';
            }
            if ($_FILES[$fileInput]['size'] == 0) {
                $_SESSION['error'] = '3';
            }
        }
        if ($_SESSION['error']) {
            header('Location: passport.php');
            exit;
        }

        // Check for existing records
        $qued = "SELECT * FROM Profilepictures WHERE Serial='$serial' AND Pin='$pin'";
        $resul = mysqli_query($db, $qued);
        $checks = mysqli_num_rows($resul);

        if ($checks == 0) {
            // Insert new records for each file
            foreach ($fileInputs as $fileInput => $newName) {
                if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] == UPLOAD_ERR_OK) {
                    $fileName = $_FILES[$fileInput]['name'];
                    $fileTmpName = $_FILES[$fileInput]['tmp_name'];
                    $fileSize = $_FILES[$fileInput]['size'];
                    $fileType = $_FILES[$fileInput]['type'];
                    $newFileName = $serial . '_' . $newName . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                    $targetFilePath = $targetDirectory . $newFileName;

                    if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                        $queryz = "INSERT INTO Profilepictures (name, size, type, content, Serial, Pin) " .
                            "VALUES ('$newFileName', '$fileSize', '$fileType', '$newFileName', '$serial', '$pin')";
                        $db->query($queryz) or die('Error, query failed to upload');
                    } else {
                        echo ('Error, failed to move the uploaded file: ' . $fileName);
                    }
                }
            }
            $_SESSION['uploaded'] = 'yes';
            header('Location: passport.php');
        } else {
            // Delete existing records
            $deleteQuery = "DELETE FROM Profilepictures WHERE Serial='$serial' AND Pin='$pin'";
            $db->query($deleteQuery) or die('Error, query failed to delete old records');

            // Insert new records for each file
            foreach ($fileInputs as $fileInput => $newName) {
                if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] == UPLOAD_ERR_OK) {
                    $fileName = $_FILES[$fileInput]['name'];
                    $fileTmpName = $_FILES[$fileInput]['tmp_name'];
                    $fileSize = $_FILES[$fileInput]['size'];
                    $fileType = $_FILES[$fileInput]['type'];
                    $newFileName = $serial . '_' . $newName . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                    $targetFilePath = $targetDirectory . $newFileName;

                    if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                        $queryz = "INSERT INTO Profilepictures (name, size, type, content, Serial, Pin) " .
                            "VALUES ('$newFileName', '$fileSize', '$fileType', '$newFileName', '$serial', '$pin')";
                        $db->query($queryz) or die('Error, query failed to upload');
                    } else {
                        die('Error, failed to move the uploaded file: ' . $fileName);
                    }
                }
            }
            $_SESSION['upload'] = 'yes';
            header('Location: passport.php');
        }
    }





    if (isset($_POST['courseapplied1']) && $_POST['course']) {

        $serial = $_POST['serial'];
        $pin = $_POST['pin'];
        $courseapplied1 = $_POST['courseapplied1'];
        $courseapplied2 = $_POST['courseapplied2'];

        // die($courseapplied1 == "Select Choice" || $courseapplied2 == "Select Choice" );

        if($courseapplied1 == "Select Choice" || $courseapplied2 == "Select Choice" ){
            $_SESSION['uploaded'] = 'no';
            header('Location:school.php');
            exit;
        }

        $qued = "SELECT * FROM Courseapplied WHERE Serial='$serial'&& Pin='$pin' ";
        $resul = mysqli_query($db, $qued);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            $queryz = 'INSERT INTO Courseapplied (Choice1,Choice2,Serial,Pin) ' .
                "VALUES ('$courseapplied1','$courseapplied2','$serial','$pin')";

            $db->query($queryz) or die('Errorr, query failed to upload');

            $_SESSION['uploaded'] = 'yes';
            header('Location:school.php');
        } else {
            $queryz = "UPDATE Courseapplied SET Choice1='$courseapplied1',Choice2='$courseapplied2' WHERE Pin='$pin' ";

            $db->query($queryz) or die('Error, query failed to upload');

            $_SESSION['upload'] = 'yes';
            header('Location:school.php');
        }
    }

    if (isset($_POST['fromdate']) && $_POST['todate']) {

        $serial = $_POST['userserial'];
        $pin = $_POST['userpin'];
        $froms = $_POST['fromdate'];
        $tos = $_POST['todate'];
        $certificate = $_POST['certificate'];
        $schoolname = $_POST['schoolname'];

        $qued = "SELECT * FROM Previousxul WHERE Serial='$serial'&& Pin='$pin' && Name='$schoolname' ";
        $resul = mysqli_query($db, $qued);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            $queryz = 'INSERT INTO Previousxul (Name,Froms,Tos,Qualification,Serial,Pin) ' .
                "VALUES ('$schoolname','$froms','$tos','$certificate','$serial','$pin')";

            $db->query($queryz) or die('Errorr, query failed to upload');

            $sql = "SELECT * FROM Previousxul  WHERE Serial='$serial'&& Pin='$pin' ";
            $rget = mysqli_query($db, $sql);
            $num = mysqli_num_rows($rget);
            if ($num != 0) {
                echo "<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>School Name</th>
                                                                             <th>From</th>
                                                                             <th>To</th>
                                                                            <th>Qualification</th>
                                                                              <th>Remove</th>
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

                while ($foundk = mysqli_fetch_array($rget)) {
                    $school = $foundk['Name'];
                    $froms = $foundk['Froms'];
                    $tos = $foundk['Tos'];
                    $quaification = $foundk['Qualification'];
                    $id = $foundk['id'];

                    echo "<tr>
                                                                              <td>$school</td>
                                                                               <td>$froms</td>
                                                                              <td>$tos</td>
                                                                                 <td>$quaification</td>
                                                                             <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
                }
                echo "</tbody>
                                                                           </table>";
            }
        }
    }
    if (isset($_POST['Deleteschool'])) {

        $id = $_POST['Deleteschool'];

        $enter = "DELETE FROM Previousxul WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }

    if (isset($_POST['loadidxul'])) {

        $serial = $_POST['userserial'];
        $pin = $_POST['userpin'];

        $sql = "SELECT * FROM Previousxul  WHERE Serial='$serial'&& Pin='$pin' ";
        $rget = mysqli_query($db, $sql);
        $num = mysqli_num_rows($rget);
        if ($num != 0) {
            echo "<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>School Name</th>
                                                                             <th>From</th>
                                                                             <th>To</th>
                                                                            <th>Qualification</th>
                                                                              <th>Remove</th>
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

            while ($foundk = mysqli_fetch_array($rget)) {
                $school = $foundk['Name'];
                $froms = $foundk['Froms'];
                $tos = $foundk['Tos'];
                $quaification = $foundk['Qualification'];
                $id = $foundk['id'];
                //
                echo "<tr>
                                                                              <td>$school</td>
                                                                               <td>$froms</td>
                                                                              <td>$tos</td>
                                                                                 <td>$quaification</td>
                                                                             <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
            }
            echo "</tbody>
                                                                           </table>";
        } else {
            echo 'No';
        }
    }

    if (isset($_POST['fromdates']) && $_POST['todates']) {

        $serial = $_POST['userserial'];
        $pin = $_POST['userpin'];
        $froms = $_POST['fromdates'];
        $tos = $_POST['todates'];
        $myinstitution = $_POST['myinstitution'];
        $course = $_POST['course'];
        $education = $_POST['myeducation'];

        $qued = "SELECT * FROM Alevel WHERE Serial='$serial'&& Pin='$pin' && Course='$course' ";
        $resul = mysqli_query($db, $qued);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            $queryz = 'INSERT INTO Alevel (Course,Institution,Froms,Tos,Degree,Serial,Pin) ' .
                "VALUES ('$course','$myinstitution','$froms','$tos','$education','$serial','$pin')";

            $db->query($queryz) or die('Errorr, query failed to upload');

            $sql = "SELECT * FROM Alevel  WHERE Serial='$serial'&& Pin='$pin' ";
            $rget = mysqli_query($db, $sql);
            $num = mysqli_num_rows($rget);
            if ($num != 0) {
                echo "<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>Course</th>
                                                                           <th>Institution</th>
                                                                             <th>From</th>
                                                                             <th>To</th>
                                                                            <th>Result</th>
                                                                              <th>Remove</th>
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

                while ($foundk = mysqli_fetch_array($rget)) {
                    $course = $foundk['Course'];
                    $froms = $foundk['Froms'];
                    $tos = $foundk['Tos'];
                    $inst = $foundk['Institution'];
                    $Degree = $foundk['Degree'];
                    $id = $foundk['id'];

                    echo "<tr>
                                                                              <td>$course</td>
                                                                              <td>$inst</td>
                                                                               <td>$froms</td>
                                                                              <td>$tos</td>
                                                                                 <td>$Degree</td>
                                                                             <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
                }
                echo "</tbody>
                                                                           </table>";
            }
        } else {
            // if ( move_uploaded_file ( $receipttmpName, 'images/applicants/'.$receiptName ) ) {
            //image is a folder in which you will save documents
            // $queryz = "UPDATE Profilepictures SET name='$receiptName',size='$receiptSize',type='$receiptType',content='$receiptName' WHERE Pin='$pin' ";
            // $db->query( $queryz ) or die( 'Errorr, query failed to upload' );

            // }
            // }
        }
    }

    if (isset($_POST['Deletecourse'])) {

        $id = $_POST['Deletecourse'];

        $enter = "DELETE FROM Alevel WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }
    if (isset($_POST['loadcourse'])) {

        $serial = $_POST['userserial'];
        $pin = $_POST['userpin'];

        $sql = "SELECT * FROM Alevel  WHERE Serial='$serial'&& Pin='$pin' ";
        $rget = mysqli_query($db, $sql);
        $num = mysqli_num_rows($rget);
        if ($num != 0) {
            echo "<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>Course</th>
                                                                           <th>Institution</th>
                                                                             <th>From</th>
                                                                             <th>To</th>
                                                                            <th>Result</th>
                                                                              <th>Remove</th>
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

            while ($foundk = mysqli_fetch_array($rget)) {
                $course = $foundk['Course'];
                $froms = $foundk['Froms'];
                $tos = $foundk['Tos'];
                $inst = $foundk['Institution'];
                $Degree = $foundk['Degree'];
                $id = $foundk['id'];

                echo "<tr>
                                                                              <td>$course</td>
                                                                              <td>$inst</td>
                                                                               <td>$froms</td>
                                                                              <td>$tos</td>
                                                                                 <td>$Degree</td>
                                                                             <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
            }
            echo "</tbody>
                                                                           </table>";
        } else {
            echo 'No';
        }
    }

    if (isset($_POST['signature'])) {
        // Sanitize and escape inputs
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $contact = mysqli_real_escape_string($db, $_POST['contact']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $address = mysqli_real_escape_string($db, $_POST['address']);
        $ref = mysqli_real_escape_string($db, $_POST['ref']);
        $pin = mysqli_real_escape_string($db, $_POST['pin']);
        $serial = mysqli_real_escape_string($db, $_POST['serial']);
        $fileInput = "file3";

        // Validate all fields
        if (empty($name) || empty($contact) || empty($date) || empty($address) || empty($ref) || empty($pin) || empty($serial)) {
            die("400");
        }

        if (!isset($_FILES[$fileInput])) {
            $_SESSION['error'] = '1';
        }
        if ($_FILES[$fileInput]['error'] != UPLOAD_ERR_OK) {
            $_SESSION['error'] = '2';
        }
        if ($_FILES[$fileInput]['size'] == 0) {
            $_SESSION['error'] = '3';
            die("500");
        }

        // File upload handling
        if ($_FILES[$fileInput]['error'] == UPLOAD_ERR_OK) {
            $targetDirectory = 'images/applicants/';
            $newName = "signature";
            $fileName = $_FILES[$fileInput]['name'];
            $fileTmpName = $_FILES[$fileInput]['tmp_name'];
            $newFileName = $serial . '_' . $newName . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            $targetFilePath = $targetDirectory . $newFileName;

            // if (move_uploaded_file($fileTmpName, $targetFilePath)) {
            // Check if record exists
            $sql_check = "SELECT * FROM referees WHERE pin = '$pin' AND serial = '$serial'";
            $result_check = $db->query($sql_check);

            if ($result_check->num_rows > 0) {
                // Update existing record
                $row = $result_check->fetch_assoc();
                $oldFileName = $row['signature'];

                // Delete old file if it exists
                if (!empty($oldFileName) && file_exists($targetDirectory . $oldFileName)) {
                    unlink($targetDirectory . $oldFileName);
                }
                if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                    $sql_update = "UPDATE referees SET 
                    name = '$name', 
                    contact = '$contact', 
                    date = '$date', 
                    address = '$address', 
                    ref = '$ref', 
                    signature = '$newFileName' 
                    WHERE pin = '$pin' AND serial = '$serial'";

                    if ($db->query($sql_update) === TRUE) {
                        echo "201";
                    } else {
                        echo "500";
                    }
                } else {
                    echo ('Error, failed to move the uploaded file: ' . $fileName);
                }
            } else {
                // Insert new record
                $sql_insert = "INSERT INTO referees (name, contact, date, address, ref, signature, pin, serial) 
                        VALUES ('$name', '$contact', '$date', '$address', '$ref', '$newFileName', '$pin', '$serial')";

                if ($db->query($sql_insert) === TRUE) {
                    echo "200";
                } else {
                    echo "500";
                }
            }
        }
        $db->close();
    }


    if (isset($_POST['fromdatess']) && $_POST['todatess']) {

        $serial = $_POST['userserial'];
        $pin = $_POST['userpin'];
        $froms = $_POST['fromdatess'];
        $tos = $_POST['todatess'];
        $employer = $_POST['employer'];
        $position = $_POST['position'];

        $qued = "SELECT * FROM Employment WHERE Serial='$serial'&& Pin='$pin' && Employer='$employer' ";
        $resul = mysqli_query($db, $qued);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            $queryz = 'INSERT INTO Employment (Employer,Position,Froms,Tos,Serial,Pin) ' .
                "VALUES ('$employer','$position','$froms','$tos','$serial','$pin')";

            $db->query($queryz) or die('Errorr, query failed to upload');

            $sql = "SELECT * FROM Employment  WHERE Serial='$serial'&& Pin='$pin' ";
            $rget = mysqli_query($db, $sql);
            $num = mysqli_num_rows($rget);
            if ($num != 0) {
                echo "<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>Employer</th>
                                                                           <th>Position</th>
                                                                             <th>From</th>
                                                                             <th>To</th>                                                                            
                                                                              <th>Remove</th>
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

                while ($foundk = mysqli_fetch_array($rget)) {
                    $employer = $foundk['Employer'];
                    $froms = $foundk['Froms'];
                    $tos = $foundk['Tos'];
                    $pos = $foundk['Position'];

                    $id = $foundk['id'];

                    echo "<tr>
                                                                              <td>$employer</td> 
                                                                              <td>$pos</td>                                                                             
                                                                               <td>$froms</td>
                                                                              <td>$tos</td>                                                                                 
                                                                             <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
                }
                echo "</tbody>
                                                                           </table>";
            }
        } else {
            // if ( move_uploaded_file ( $receipttmpName, 'images/applicants/'.$receiptName ) ) {
            //image is a folder in which you will save documents
            // $queryz = "UPDATE Profilepictures SET name='$receiptName',size='$receiptSize',type='$receiptType',content='$receiptName' WHERE Pin='$pin' ";
            // $db->query( $queryz ) or die( 'Errorr, query failed to upload' );

            // }
            // }
        }
    }
    if (isset($_POST['loademployer'])) {

        $serial = $_POST['userserial'];
        $pin = $_POST['userpin'];

        $sql = "SELECT * FROM Employment  WHERE Serial='$serial'&& Pin='$pin' ";
        $rget = mysqli_query($db, $sql);
        $num = mysqli_num_rows($rget);
        if ($num != 0) {
            echo "<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>Employer</th>
                                                                           <th>Position </th>
                                                                             <th>From</th>
                                                                             <th>To</th>                                                                            
                                                                              <th>Remove</th>
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

            while ($foundk = mysqli_fetch_array($rget)) {
                $employer = $foundk['Employer'];
                $froms = $foundk['Froms'];
                $tos = $foundk['Tos'];
                $pos = $foundk['Position'];

                $id = $foundk['id'];

                echo "<tr>
                                                                              <td>$employer</td> 
                                                                              <td>$pos</td>                                                                             
                                                                               <td>$froms</td>
                                                                              <td>$tos</td>                                                                                 
                                                                             <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
            }
            echo "</tbody>
                                                                           </table>";
        } else {
            echo 'No';
        }
    }

    if (isset($_POST['Deletework'])) {

        $id = $_POST['Deletework'];

        $enter = "DELETE FROM Employment WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }

    if (isset($_POST['dstatus'])) {

        $serial = $_POST['userserial'];
        $pin = $_POST['userpin'];

        $qued = "SELECT * FROM Declared WHERE Serial='$serial' && Pin='$pin'  ";
        $resul = mysqli_query($db, $qued);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            $queryz = 'INSERT INTO Declared (Serial,Pin,Status) ' .
                "VALUES ('$serial','$pin','Yes')";

            $db->query($queryz) or die('Errorr, query failed to upload');
        }
    }

    if (isset($_POST['usernames']) && $_POST['password']) {

        $usernames = $_POST['usernames'];
        $password = $_POST['password'];

        $qued = "SELECT * FROM Administrator WHERE Email='$usernames' && Password='$password'  ";
        $resul = mysqli_query($db, $qued);
        $checks = mysqli_num_rows($resul);
        if ($checks != 0) {
            setcookie('pin', $password, time() + (60 * 60 * 24 * 7));
            setcookie('serial', $usernames, time() + (60 * 60 * 24 * 7));

            echo 'Ok';
        }
    }

    if (isset($_POST['emailz'])) {

        $serial = $_POST['emailz'];
        $pin = $_POST['pin'];

        $quedl = 'SELECT * FROM Applicants ';
        $resulc = mysqli_query($db, $quedl);
        $checked = mysqli_num_rows($resulc);
        if ($checked == 0) {

            $enter = "INSERT INTO Applicants (Serial,Pin) 
                               	 VALUES('$serial','$pin')";
            $db->query($enter);

            $sql = 'SELECT * FROM Applicants  ';
            $rget = mysqli_query($db, $sql);
            $num = mysqli_num_rows($rget);
            if ($num != 0) {
                echo "<table class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>Applicant#</th>
                                                                           <th>Serial </th>
                                                                             <th>Pin</th>
                                                                             <th>Reset</th>                                                                    
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

                while ($foundk = mysqli_fetch_array($rget)) {
                    $serial = $foundk['Serial'];
                    $pin = $foundk['Pin'];

                    $id = $foundk['id'];

                    echo "<tr class='success'>
                                                                              <td>$id</td>
                                                                              <td>$serial</td>                                                                                                                                                                                                                              
                                                                              <td>$pin</td> 
                                                                             <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>                                                                                                                                                            
                                                                              </tr>";
                }
                echo "</tbody>
                                                                           </table>";
            }
        } else {
            $qued = "SELECT * FROM Applicants WHERE Pin='$pin'  ";
            $resul = mysqli_query($db, $qued);
            $checks = mysqli_num_rows($resul);
            if ($checks == 0) {
                if ($serial != '' || $pin != '') {
                    $enter = "INSERT INTO Applicants (Serial,Pin) 
                               	 VALUES('$serial','$pin')";
                    $db->query($enter);

                    $sql = 'SELECT * FROM Applicants  ';
                    $rget = mysqli_query($db, $sql);
                    $num = mysqli_num_rows($rget);
                    if ($num != 0) {
                        echo "<table class='table table-striped' >
                                                                      <thead>
                                                                         <tr>
                                                                           <th>Applicant#</th>
                                                                           <th>Serial </th>
                                                                             <th>Pin</th> 
                                                                             <th>Reset</th>                                                                           
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

                        while ($foundk = mysqli_fetch_array($rget)) {

                            $serial = $foundk['Serial'];
                            $pin = $foundk['Pin'];

                            $id = $foundk['id'];

                            echo "<tr class='success'>
                                                                              <td>$id</td>
                                                                              <td>$serial</td>                                                                                                                                             
                                                                              <td>$pin</td> 
                                                                              <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
			                                                                                                                                                                                              
                                                                              </tr>";
                        }
                        echo "</tbody>
                                                                           </table>";
                    }
                } else {
                    echo 'error';
                }
            } else {
                echo 'errors';
            }
        }
    }

    if (isset($_POST['loadapps'])) {

        $sql = 'SELECT * FROM Applicants  ';
        $rget = mysqli_query($db, $sql);
        $num = mysqli_num_rows($rget);
        if ($num != 0) {
            echo "<table class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>Applicant</th>
                                                                           <th>Serial </th>
                                                                             <th>Pin</th> 
                                                                             <th>Reset</th>                                                                          
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

            while ($foundk = mysqli_fetch_array($rget)) {
                $serial = $foundk['Serial'];
                $pin = $foundk['Pin'];

                $id = $foundk['id'];

                echo "<tr class='success'>
                                                                              <td>$id</td>
                                                                              <td>$serial</td>                                                                                                                                             
                                                                              <td>$pin</td> 
                                                                             <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>                                                                            
                                                                                                                                                             
                                                                              </tr>";
            }
            echo "</tbody>
                                                                           </table>";
        };
    }
    if (isset($_POST['Deletepin'])) {

        $id = $_POST['Deletepin'];

        $enter = "DELETE FROM Applicants  WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }

    if (isset($_POST['result'])) {
        // die(500);
        // // echo "Keeeeeabiru";
        // // exit;
        // $exam = $_POST['exam'];
        // $examdate = $_POST['examdate'];
        // $examtype = $_POST['examtype'];
        // // $grade = $_POST['grade'];
        // $sitting = $_POST['sitting'];
        // $subjects = $_POST['subjects'];
        // $grades = $_POST['grades'];

        // var_dump($_POST);
        // // echo($grades);
        // exit;

        // Assuming these variables are already populated from your form or previous processing
        $exam = isset($_POST['exam']) ? mysqli_real_escape_string($db, $_POST['exam']) : '';
        $examdate = isset($_POST['examdate']) ? mysqli_real_escape_string($db, $_POST['examdate']) : '';
        $examtype = isset($_POST['examtype']) ? mysqli_real_escape_string($db, $_POST['examtype']) : '';
        $sitting = isset($_POST['sitting']) ? mysqli_real_escape_string($db, $_POST['sitting']) : '';
        // $serial = isset($_POST['serial']) ? mysqli_real_escape_string($db, $_POST['serial']) : '';
        // $pin = isset($_POST['pin']) ? mysqli_real_escape_string($db, $_POST['pin']) : '';
        $subjects = isset($_POST['subjects']) ? $_POST['subjects'] : [];
        $grades = isset($_POST['grades']) ? $_POST['grades'] : [];
        
        // Check if any of the required items are empty
        $required_fields = [];
        if (empty($exam)) {
            $required_fields[] = 'Exam Number';
        }
        if (empty($examdate)) {
            $required_fields[] = 'Exam Date';
        }
        if (empty($examtype)) {
            $required_fields[] = 'Exam Type';
        }
        if (empty($sitting)) {
            $required_fields[] = 'Sitting';
        }
        if (empty($subjects)) {
            $required_fields[] = 'Subjects';
        }
        if (empty($grades)) {
            $required_fields[] = 'Grades';
        }
        
        // If any required field is empty, terminate with an error message
        if (!empty($required_fields)) {
            // Append "and" if more than one field is required
            if (count($required_fields) > 1) {
                $last_field = array_pop($required_fields); // Remove the last element
                $required_fields[] = "and $last_field"; // Append with "and"
            }
            
            $fields_message = implode(', ', $required_fields);
            // $_SESSION["error"] = True;
            die("The following field(s) are required - $fields_message.");
        }
        
        
        // Check if the combination of Serial and Pin already exists
        $check_query = "SELECT * FROM Olevel WHERE Serial='$serial' AND Pin='$pin'";
        $check_result = mysqli_query($db, $check_query);
        
        if (mysqli_num_rows($check_result) > 0) {
            // Delete existing records for the given Serial and Pin
            $delete_query = "DELETE FROM Olevel WHERE Serial='$serial' AND Pin='$pin'";
            $delete_result = mysqli_query($db, $delete_query);
        
            if (!$delete_result) {
                die('Error deleting existing records: ' . mysqli_error($db));
            }
        
            // Insert new records
            for ($i = 0; $i < count($subjects); $i++) {
                $subject = mysqli_real_escape_string($db, $subjects[$i]);
                $grade = mysqli_real_escape_string($db, $grades[$i]);
        
                $insert_query = "INSERT INTO Olevel (Exam, Examdate, Examtype, Grade, Sitting, Subjects, Serial, Pin) " .
                                "VALUES ('$exam', '$examdate', '$examtype', '$grade', '$sitting', '$subject', '$serial', '$pin')";
                $insert_result = mysqli_query($db, $insert_query);
        
                if (!$insert_result) {
                    die('Error inserting new records: ' . mysqli_error($db));
                }
            }
        
            echo 'Existing records updated successfully.';
        } else {
            // Insert new records
            for ($i = 0; $i < count($subjects); $i++) {
                $subject = mysqli_real_escape_string($db, $subjects[$i]);
                $grade = mysqli_real_escape_string($db, $grades[$i]);
        
                $insert_query = "INSERT INTO Olevel (Exam, Examdate, Examtype, Grade, Sitting, Subjects, Serial, Pin) " .
                                "VALUES ('$exam', '$examdate', '$examtype', '$grade', '$sitting', '$subject', '$serial', '$pin')";
                $insert_result = mysqli_query($db, $insert_query);
        
                if (!$insert_result) {
                    die('Error inserting new records: ' . mysqli_error($db));
                }
            }
        
            echo 'New records inserted successfully.';
        }
        
        

}

    if (isset($_POST['Deleteolevel'])) {

        $id = $_POST['Deleteolevel'];

        $enter = "DELETE FROM Olevel WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }

    if (isset($_POST['loadlevel'])) {

        $serial = $_POST['userserial'];
        $pin = $_POST['userpin'];

        $sql = "SELECT * FROM Olevel WHERE Serial='$serial'&& Pin='$pin' ";
        $rget = mysqli_query($db, $sql);
        $num = mysqli_num_rows($rget);
        if ($num != 0) {
            echo "<table  class='table table-striped'>
                                                                      <thead>
                                                                         <tr>
                                                                           <th>Exam Type</th>
                                                                           <th>Exam Date</th>
                                                                             <th>Center & Exam No</th>
                                                                             <th>Subject</th>
                                                                            <th>Grade</th>
                                                                              <th>Remove</th>
                                                                          </tr>
                                                                            </thead>
                                                                        <tbody>";

            while ($foundk = mysqli_fetch_array($rget)) {
                $type = $foundk['Examtype'];
                $date = $foundk['Examdate'];
                $examno = $foundk['Exam'];
                $subj = $foundk['Subjects'];
                $grade = $foundk['Grade'];
                $id = $foundk['id'];

                echo "<tr>
                                                                              <td>$type</td>
                                                                              <td>$date</td>
                                                                               <td>$examno</td>
                                                                              <td>$subj</td>
                                                                                 <td>$grade</td>
                                                                             <td><a data-id='$id' class='open-Delete btn  btn-danger' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to remove'><span class='glyphicon glyphicon-trash' style='color: #FFFFFF;'></span></a></td>
                                                                              </tr>";
            }
            echo "</tbody>
                                                                           </table>";
        }
    }

    if (isset($_POST['statesname'])) {

        $name = $_POST['statesname'];

        $sql = "SELECT * FROM States WHERE Name='$name' ";
        $rget = mysqli_query($db, $sql);
        $num = mysqli_num_rows($rget);
        if ($num != 0) {
            while ($foundk = mysqli_fetch_array($rget)) {
                $id = $foundk['id'];
            }

            $sqlb = "SELECT * FROM Localgovernment WHERE Statesid='$id' ";
            $rgetb = mysqli_query($db, $sqlb);
            $numb = mysqli_num_rows($rgetb);
            if ($numb != 0) {
                echo "<div class='input-group' style='margin-bottom:10px'>
                                                  <span class='input-group-addon'>Local Government</span>
                                                   <select style='height:37px;width:100%;border:1px solid black;' name='localgvt'  id='localgvt'>";
                while ($foundk = mysqli_fetch_array($rgetb)) {
                    $name = $foundk['Name'];

                    echo "<option>$name</option>";
                }
                echo '</select></div>';
            }
        }
    }

    if (isset($_POST['statesname2'])) {

        $name = $_POST['statesname2'];

        $sql = "SELECT * FROM States WHERE Name='$name' ";
        $rget = mysqli_query($db, $sql);
        $num = mysqli_num_rows($rget);
        if ($num != 0) {
            while ($foundk = mysqli_fetch_array($rget)) {
                $id = $foundk['id'];
            }

            $sqlb = "SELECT * FROM Localgovernment WHERE Statesid='$id' ";
            $rgetb = mysqli_query($db, $sqlb);
            $numb = mysqli_num_rows($rgetb);
            if ($numb != 0) {
                echo "<div class='input-group' style='margin-bottom:10px'>
                                                  <span class='input-group-addon'>Parent/Guardian Local Govt</span>
                                                   <select style='height:37px;width:100%;border:1px solid black;' name='glocalgovt'  id='glocalgovt'>";
                while ($foundk = mysqli_fetch_array($rgetb)) {
                    $name = $foundk['Name'];

                    echo "<option>$name</option>";
                }
                echo '</select></div>';
            }
        }
    }
    if (isset($_POST['loginsd'])) {

        $adstate = $_POST['adstate'];

        $local = $_POST['government'];

        $sql = "SELECT * FROM States WHERE Name='$adstate' ";
        $re = mysqli_query($db, $sql);
        $ch = mysqli_num_rows($re);
        if ($ch != 0) {

            while ($found = mysqli_fetch_array($re)) {
                $id = $found['id'];
            }
        } else {
            echo 'No';
        }

        $qued = "SELECT * FROM Localgovernment WHERE Name='$local'  ";
        $resul = mysqli_query($db, $qued);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            //echo'Yes';
            $queryd = 'INSERT INTO Localgovernment (Statesid,Name) ' .
                "VALUES ('$id','$local')";

            $db->query($queryd) or die('Errorr, query failed to upload');
            $_SESSION['upload'] = $local;
            header('Location:localgvt.php');
        }
    }

    if (isset($_POST['dellocal'])) {

        $id = $_POST['dellocal'];

        $enter = "DELETE FROM Localgovernment  WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }


    if (isset($_POST['examtype'])) {

        //$adname = $_POST[ '' ];

        $adname = $_POST['examtype'];

        $sqlused = "SELECT * FROM Examtype WHERE Name='$adname' ";
        $resul = mysqli_query($db, $sqlused);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            $queryd = 'INSERT INTO Examtype (Name) ' .
                "VALUES ('$adname')";

            $db->query($queryd) or die('Errorr, query failed to upload');
            $_SESSION['upload'] = $adname;
            header('Location:exam.php');
        }
    }

    if (isset($_POST['delexam'])) {

        $id = $_POST['delexam'];

        $enter = "DELETE FROM Examtype  WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }
    if (isset($_POST['subjectname'])) {

        //$adname = $_POST[ '' ];

        $adname = $_POST['subjectname'];

        $sqlused = "SELECT * FROM Schoolsubjects WHERE Name='$adname' ";
        $resul = mysqli_query($db, $sqlused);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            $queryd = 'INSERT INTO Schoolsubjects (Name) ' .
                "VALUES ('$adname')";

            $db->query($queryd) or die('Errorr, query failed to upload');
            $_SESSION['upload'] = $adname;
            header('Location:subjects.php');
        }
    }
    if (isset($_POST['delsubj'])) {

        $id = $_POST['delsubj'];

        $enter = "DELETE FROM Schoolsubjects  WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }

    if (isset($_POST['schoolgrade'])) {

        //$adname = $_POST[ '' ];

        $adname = $_POST['schoolgrade'];

        $sqlused = "SELECT * FROM Schoolgrades WHERE Name='$adname' ";
        $resul = mysqli_query($db, $sqlused);
        $checks = mysqli_num_rows($resul);
        if ($checks == 0) {
            $queryd = 'INSERT INTO Schoolgrades (Name) ' .
                "VALUES ('$adname')";

            $db->query($queryd) or die('Errorr, query failed to upload');
            $_SESSION['upload'] = $adname;
            header('Location:grade.php');
        }
    }
    if (isset($_POST['delgrade'])) {

        $id = $_POST['delgrade'];

        $enter = "DELETE FROM Schoolgrades WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }

    if (isset($_POST['addmember'])) {
        if ($_POST['memail'] != '' && $_POST['mfname'] != '' && $_POST['msname'] != '' && $_POST['mpassword'] != '' && $_POST['mpasswords'] != '') {

            $mfname = mysqli_real_escape_string($db, $_POST['mfname']);
            $msname = mysqli_real_escape_string($db, $_POST['msname']);

            $memail = mysqli_real_escape_string($db, $_POST['memail']);
            $mphone = mysqli_real_escape_string($db, $_POST['mphone']);
            $rpassword = mysqli_real_escape_string($db, $_POST['mpasswords']);
            $mpassword = mysqli_real_escape_string($db, $_POST['mpassword']);

            if ($rpassword == $mpassword) {

                $check = "SELECT * FROM Administrator WHERE Firstname='$mfname' && Sirname='$msname'";
                $checks = mysqli_query($db, $check);
                $found = mysqli_num_rows($checks);
                if ($found == 0) {
                    $query = 'INSERT INTO Administrator (Firstname,Sirname,Email,Password) ' .
                        "VALUES ('$mfname','$msname','$memail','$mpassword')";
                    $db->query($query) or die('Error1, query failed');

                    $_SESSION['upload'] = $mfname;
                    header('Location:addadmin.php');
                    //member added successfully

                } else {
                    $_SESSION['error'] = 'member already exist';
                    header('Location:addadmin.php');
                }
            } else {
                $_SESSION['error'] = 'Passwords dont Match try again';
                header('Location:addadmin.php');
            }
        } else {
            $_SESSION['error'] = 'Not all text boxes were completed';
            header('Location:addadmin.php');
        }
    }
    if (isset($_POST['deluser'])) {

        $id = $_POST['deluser'];

        $enter = "DELETE FROM Administrator WHERE id='$id' ";
        $db->query($enter);
        echo 'ok';
    }

    if (isset($_POST['bulk'])) {
        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, 'r');
        $c = 0;
        $count = 0;

        while (($filesop = fgetcsv($handle, 1000, ',')) !== false) {
            $serial = $filesop[0];
            $pin = $filesop[1];
            $count++;
            if ($count > 1) {

                $sql = "INSERT INTO Applicants (Serial,Pin)
			VALUES ('$serial','$pin')";
                $db->query($sql);
                $c = $c + 1;
            }
        }

        if ($sql) {
            $_SESSION['Import'] = $c;

            header('Location:group.php');
        } else {
            echo 'Sorry! There is some problem.';
        }
    }
} catch (Exception $e) {
    echo $e;
}
