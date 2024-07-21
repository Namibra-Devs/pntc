<?php
session_start();
include("db_connect.php");
if (isset($_COOKIE['pin']) && $_COOKIE['serial']) {

  $pin = $_COOKIE['pin'];
  $serial = $_COOKIE['serial'];

  $sqluser = "SELECT * FROM Applicants2 WHERE Serial='$serial' && Pin='$pin' ";

  $retrieved = mysqli_query($db, $sqluser);
  while ($found = mysqli_fetch_array($retrieved)) {
    $firstname = $found['Othername'];
    $sirname = $found['Surname'];
    $id = $found['id'];
  }
} else {
  header('location:index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>TSAFE</title>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <meta name="keywords" content="Attainment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script>
    addEventListener("load", function() {
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

  <style>
    @media print {
      table {
        width: 100%;
        border-collapse: collapse;
        page-break-inside: auto;
        page-break-before: always;
        /* Starts each table on a new page */
      }

      tr {
        page-break-inside: avoid;
        page-break-after: auto;
      }

      thead {
        display: table-header-group;
      }

      tfoot {
        display: table-footer-group;
      }

      .page-break {
        page-break-before: always;
      }
    }
  </style>
  <style>
    html,
    body {
      font-family: Arial, sans-serif;
      margin-top: 20px;
      background-color: #fff !important;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
    }


    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
    }

    .table-bordered {
      border: 1px solid #dee2e6;
    }

    .table-bordered td,
    .table-bordered th {
      border: 1px solid #dee2e6;
    }

    table.biodata tbody tr {
      display: flex;
    }

    table.biodata tbody td {
      flex: 1;
    }

    .table thead th {
      vertical-align: bottom;
    }

    .table td,
    .table th {
      padding: .75rem;
      vertical-align: top;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
    }

    .alert-warning {
      background-color: #fff3cd;
      border-color: #ffeeba;
      color: #856404;
      padding: 10px;
      border-radius: 5px;
      margin-top: 20px;
    }

    .form-group {
      margin-top: 20px;
    }

    .btn {
      margin-right: 10px;
      padding: 10px 20px;
      border: 1px solid transparent;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      text-decoration: none;
    }

    .btn-default {
      background-color: #f8f9fa;
      color: #212529;
    }

    .btn-default:hover {
      background-color: #e2e6ea;
    }

    @media print {
      .btn {
        display: none;
      }
    }

    .printable-area {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {

      .table thead th,
      .table td,
      .table th {
        font-size: 14px;
        padding: .5rem;
      }

      .btn {
        font-size: 14px;
        padding: 8px 16px;
      }
    }

    @media (max-width: 576px) {

      .table thead th,
      .table td,
      .table th {
        font-size: 12px;
        padding: .3rem;
      }

      .btn {
        font-size: 12px;
        padding: 6px 12px;
      }
    }
  </style>

</head>
<?php
$sqln2 = "SELECT * FROM applicants2 WHERE Serial='$serial' && Pin='$pin' ";
$rgetb2 = mysqli_query($db, $sqln2);
$numb = mysqli_num_rows($rgetb2);
if ($numb != 0) {
  while ($foundl = mysqli_fetch_array($rgetb2)) {
    $dob = $foundl['DOB'];
    $gender = $foundl['Gender'];
    $country = $foundl['Country'];
    $lgvt = $foundl['Localgvt'];
    $state = $foundl['State'];
    $crapp = $foundl['Appcoraddress'];

    $gplace = $foundl['Gplace'];
    $gname = $foundl['Gname'];
    $ghome = $foundl['Ghometown'];
    $gcountry = $foundl['Gcountry'];
    $gstate = $foundl['Gstate'];
    $appre = $foundl['Appresaddress'];

    $glocal = $foundl['Glocalgvt'];
    $gaddres = $foundl['Gaddress'];
    $gmobile = $foundl['Gmobile'];
    $appphone = $foundl['Applicantphone'];
    $email = $foundl['Email'];
    $hometown = $foundl['Hometown'];
  }
}
?>


<body>
<div class="container printable-area">
   <div id="printableArea">
      <!-- <p><img src="images/unima.png" alt="" class="img-fluid" style="width:100px;height:100px" /></p> -->
      <center>
      <p style="color: black;font-weight: 600;font-size: 2rem;">THE PREMIER NURSING COLLEGE<br>PNTC<br>Admission form for 2024-2025 Academic session</p>
      </center>
      

      <!-- Section 1: Biodata -->
      <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
         <thead>
            <tr style="background-color: #f2f2f2;">
               <th colspan="4" style="border: 1px solid #000;">SECTION 1: BIODATA</th>
            </tr>
         </thead>
         <tbody>
            <tr style="background-color: #ffffff;">
               <td style="border: 1px solid #000;">APPLICATION NUMBER</td>
               <td colspan="1" style="border: 1px solid #000;"><?php if (isset($id)) {
                  echo $id;
                  } ?></td>
               <td style="border: 1px solid #000;">PASSPORT</td>
               <td colspan="1" style="border: 1px solid #000;">
                  <?php
                     $sqln = "SELECT * FROM profilepictures WHERE serial='$serial' && pin='$pin'";
                     $rgetb = mysqli_query($db, $sqln);
                     if (mysqli_num_rows($rgetb) > 0) {
                         $foundl = mysqli_fetch_array($rgetb);
                         $profile = $foundl['name'];
                         echo "<center><img src='images/applicants/$profile' class='img-fluid' alt='error' style='width:100px;height:100px'></center/>";
                     }
                     ?>
               </td>
            </tr>
            <tr style="background-color: #f2f2f2;">
               <td colspan="1" style="border: 1px solid #000;">Name</td>
               <td colspan="1" style="border: 1px solid #000;"><?php if (isset($firstname)) {
                  echo $firstname . ' ' . $sirname;
                  } ?></td>
               <td colspan="1" style="border: 1px solid #000;">Date of Birth</td>
               <td colspan="1" style="border: 1px solid #000;"><?php if (isset($dob)) {
                  echo $dob;
                  } ?></td>
            </tr>
            <tr style="background-color: #ffffff;">
               <td style="border: 1px solid #000;">Gender</td>
               <td style="border: 1px solid #000;"><?php if (isset($gender)) {
                  echo $gender;
                  } ?></td>
               <td style="border: 1px solid #000;">Nationality</td>
               <td style="border: 1px solid #000;"><?php if (isset($country)) {
                  echo $country;
                  } ?></td>
            </tr>
            <tr style="background-color: #f2f2f2;">
               <td style="border: 1px solid #000;">State</td>
               <td style="border: 1px solid #000;"><?php if (isset($state)) {
                  echo $state;
                  } ?></td>
               <td style="border: 1px solid #000;">Local Government</td>
               <td style="border: 1px solid #000;"><?php if (isset($lgvt)) {
                  echo $lgvt;
                  } ?></td>
            </tr>
            <tr style="background-color: #ffffff;">
               <td style="border: 1px solid #000;">Hometown</td>
               <td style="border: 1px solid #000;"><?php if (isset($hometown)) {
                  echo $hometown;
                  } ?></td>
               <td style="border: 1px solid #000;">Postal Address</td>
               <td style="border: 1px solid #000;"><?php if (isset($crapp)) {
                  echo $crapp;
                  } ?></td>
            </tr>
            <tr style="background-color: #f2f2f2;">
               <td style="border: 1px solid #000;">Residential Address</td>
               <td style="border: 1px solid #000;"><?php if (isset($appre)) {
                  echo $appre;
                  } ?></td>
               <td style="border: 1px solid #000;">Name of Parent/Guardian</td>
               <td style="border: 1px solid #000;"><?php if (isset($gname)) {
                  echo $gname;
                  } ?></td>
            </tr>
            <tr style="background-color: #ffffff;">
               <td style="border: 1px solid #000;">Parent/Guardian Place of Birth</td>
               <td style="border: 1px solid #000;"><?php if (isset($gplace)) {
                  echo $gplace;
                  } ?></td>
               <td style="border: 1px solid #000;">Parent/Guardian Hometown</td>
               <td style="border: 1px solid #000;"><?php if (isset($ghome)) {
                  echo $ghome;
                  } ?></td>
            </tr>
            <tr style="background-color: #f2f2f2;">
               <td style="border: 1px solid #000;">Parent/Guardian Country</td>
               <td style="border: 1px solid #000;"><?php if (isset($gcountry)) {
                  echo $gcountry;
                  } ?></td>
               <td style="border: 1px solid #000;">Parent/Guardian State</td>
               <td style="border: 1px solid #000;"><?php if (isset($gstate)) {
                  echo $gstate;
                  } ?></td>
            </tr>
            <tr style="background-color: #ffffff;">
               <td style="border: 1px solid #000;">Parent/Guardian Local Government</td>
               <td style="border: 1px solid #000;"><?php if (isset($glocal)) {
                  echo $glocal;
                  } ?></td>
               <td style="border: 1px solid #000;">Parent/Guardian Correspondence Address</td>
               <td style="border: 1px solid #000;"><?php if (isset($gaddres)) {
                  echo $gaddres;
                  } ?></td>
            </tr>
            <tr style="background-color: #f2f2f2;">
               <td style="border: 1px solid #000;">Parent/Guardian Phone</td>
               <td style="border: 1px solid #000;"><?php if (isset($gmobile)) {
                  echo $gmobile;
                  } ?></td>
               <td style="border: 1px solid #000;">Applicant Phone</td>
               <td style="border: 1px solid #000;"><?php if (isset($appphone)) {
                  echo $appphone;
                  } ?></td>
            </tr>
         </tbody>
      </table>

      <!-- Section 2: Documents -->
      <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
         <thead>
            <tr style="background-color: #f2f2f2;">
               <th colspan="2" style="border: 1px solid #000;">SECTION 2: DOCUMENTS</th>
            </tr>
            <tr style="background-color: #ffffff;">
               <th style="border: 1px solid #000;">Name</th>
               <th style="border: 1px solid #000;">Document</th>
            </tr>
         </thead>
         <tbody>
            <?php
               function capitalizeAroundSeparator($str)
               {
                   return ucwords(str_replace('-', ' ', $str));
               }
               
               $qued = "SELECT * FROM profilepictures WHERE Serial='$serial' AND Pin='$pin'";
               $resul = mysqli_query($db, $qued);
               if (mysqli_num_rows($resul) > 0) {
                   while ($foundl = mysqli_fetch_array($resul)) {
                       $path = htmlspecialchars($foundl['name'], ENT_QUOTES, 'UTF-8');
                       $label = explode($serial . "_", $path);
                       $label = explode(".", implode($label));
                       $labelName = capitalizeAroundSeparator($label[0]);
               
                       echo '<tr style="background-color: #f2f2f2;">';
                       echo '<td style="border: 1px solid #000;">' . htmlspecialchars($labelName, ENT_QUOTES, 'UTF-8') . '</td>';
                       echo '<td style="border: 1px solid #000;"><a href="images/applicants/' . $path . '" download> Download ' . htmlspecialchars($labelName, ENT_QUOTES, 'UTF-8') . '</a></td>';
                       echo '</tr>';
                   }
               }
               ?>
         </tbody>
      </table>

      <!-- Section 3: Program Choices -->
      <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
         <thead>
            <tr style="background-color: #f2f2f2;">
               <th colspan="4" style="border: 1px solid #000;">SECTION 3: PROGRAM CHOICES</th>
            </tr>
            <tr style="background-color: #ffffff;">
               <th style="border: 1px solid #000;">First Choice</th>
               <th style="border: 1px solid #000;">Second Choice</th>
            </tr>
         </thead>
         <tbody>
            <tr style="background-color: #f2f2f2;">
               <?php
                  $qued = "SELECT * FROM courseapplied WHERE serial='$serial' AND pin='$pin'";
                  $resul = mysqli_query($db, $qued);
                  if (mysqli_num_rows($resul) > 0) {
                      while ($found = mysqli_fetch_array($resul)) {
                          $choice1 = htmlspecialchars($found['Choice1'], ENT_QUOTES, 'UTF-8');
                          $choice2 = htmlspecialchars($found['Choice2'], ENT_QUOTES, 'UTF-8');
                          echo "<td style='border: 1px solid #000;'>{$choice1}</td>";
                          echo "<td style='border: 1px solid #000;'>{$choice2}</td>";
                      }
                  }
                  ?>
            </tr>
         </tbody>
      </table>

      <!-- Section 4: O'Level Results -->
      <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
         <thead>
            <tr style="background-color: #f2f2f2;">
               <th colspan="6" style="border: 1px solid #000;">SECTION 4: O'LEVEL RESULTS</th>
            </tr>
            <tr style="background-color: #ffffff;">
               <th style="border: 1px solid #000;">Type of Exam</th>
               <th style="border: 1px solid #000;">Center & Exam No</th>
               <th style="border: 1px solid #000;">Date of Exam</th>
               <th style="border: 1px solid #000;">Subject</th>
               <th style="border: 1px solid #000;">Sitting</th>
               <th style="border: 1px solid #000;">Grade</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $sql = "SELECT * FROM olevel WHERE serial='$serial' AND pin='$pin'";
               $rget = mysqli_query($db, $sql);
               if (mysqli_num_rows($rget) > 0) {
                   while ($foundk = mysqli_fetch_array($rget)) {
                       $grade = $foundk['Grade'] != null ? htmlspecialchars($foundk['Grade'], ENT_QUOTES, 'UTF-8') : "NA";
                       $subject = $foundk['Subjects'] != null ? htmlspecialchars($foundk['Subjects'], ENT_QUOTES, 'UTF-8') : "NA";
                       echo "<tr style='background-color: #f2f2f2;'>
                               <td style='border: 1px solid #000;'>" . htmlspecialchars($foundk['Examtype'], ENT_QUOTES, 'UTF-8') . "</td>
                               <td style='border: 1px solid #000;'>" . htmlspecialchars($foundk['Exam'], ENT_QUOTES, 'UTF-8') . "</td>
                               <td style='border: 1px solid #000;'>" . htmlspecialchars($foundk['Examdate'], ENT_QUOTES, 'UTF-8') . "</td>
                               <td style='border: 1px solid #000;'>{$subject}</td>
                               <td style='border: 1px solid #000;'>" . htmlspecialchars($foundk['Sitting'], ENT_QUOTES, 'UTF-8') . "</td>
                               <td style='border: 1px solid #000;'>{$grade}</td>
                           </tr>";
                   }
               }
               ?>
         </tbody>
      </table>

      <!-- Section 5: Referee -->
      <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
         <thead>
            <tr style="background-color: #f2f2f2;">
               <th colspan="6" style="border: 1px solid #000;">SECTION 5: REFEREE</th>
            </tr>
            <tr style="background-color: #ffffff;">
               <th style="border: 1px solid #000;">Name</th>
               <th style="border: 1px solid #000;">Contact</th>
               <th style="border: 1px solid #000;">Date</th>
               <th style="border: 1px solid #000;">Address</th>
               <th style="border: 1px solid #000;">Class</th>
               <th style="border: 1px solid #000;">Signature</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $sql = "SELECT * FROM referees WHERE Serial='$serial' AND Pin='$pin'";
               $rget = mysqli_query($db, $sql);
               if (mysqli_num_rows($rget) > 0) {
                   while ($foundk = mysqli_fetch_array($rget)) {
                       $name = htmlspecialchars($foundk['name'], ENT_QUOTES, 'UTF-8');
                       $contact = htmlspecialchars($foundk['contact'], ENT_QUOTES, 'UTF-8');
                       $date = htmlspecialchars($foundk['date'], ENT_QUOTES, 'UTF-8');
                       $address = htmlspecialchars($foundk['address'], ENT_QUOTES, 'UTF-8');
                       $ref = htmlspecialchars($foundk['ref'], ENT_QUOTES, 'UTF-8');
                       $signature = 'images/applicants/' . htmlspecialchars($foundk['signature'], ENT_QUOTES, 'UTF-8');
               
                       echo "<tr style='background-color: #f2f2f2;'>
                               <td style='border: 1px solid #000;'>{$name}</td>
                               <td style='border: 1px solid #000;'>{$contact}</td>
                               <td style='border: 1px solid #000;'>{$date}</td>
                               <td style='border: 1px solid #000;'>{$address}</td>
                               <td style='border: 1px solid #000;'>{$ref}</td>
                               <td style='border: 1px solid #000;'><a href='{$signature}' download> Download Signature</a></td>
                           </tr>";
                   }
               }
               ?>
         </tbody>
      </table>
   </div>
</div>


    <!-- </center> -->
  </div>
  <div class="form-group">
    <a class='btn btn-default' onclick="generateAndDownloadPDF()"><span class='glyphicon glyphicon-download'></span> &nbsp;Download PDF</a>
    <!-- Other buttons -->
    <button id="sendPdf">Send PDF</button>
  </div>
  </div>

  <script>
    function generateAndDownloadPDF() {
      const element = document.getElementById('printableArea');
      const opt = {
        margin: 1,
        filename: 'application_form.pdf',
        image: {
          type: 'jpeg',
          quality: 0.98
        },
        html2canvas: {
          scale: 2
        },
        jsPDF: {
          unit: 'in',
          format: 'letter',
          orientation: 'portrait'
        }
      };

      html2pdf().set(opt).from(element).save();
    }
  </script>

  <script>
    $(document).ready(function() {
      $('#sendPdf').click(function() {
        var htmlContent = $('#printableArea').html();

        $.ajax({
          url: 'mailer.php',
          type: 'POST',
          data: {
            html: htmlContent
          },
          success: function(response) {
            console.log({
              response
            });
            alert(response);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus + ' - ' + errorThrown);
          }
        });
      });
    });
  </script>


</body>

</html>