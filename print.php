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
  header('location:onlineform.php');
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
    $(document).on("click", ".open-Delete", function() {
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
        function(isConfirm) {
          if (isConfirm) {

            $.ajax({
              type: 'POST',
              url: "process.php",
              data: {
                Deletework: myValue
              },
              success: function(result) {
                if (result == "ok") {
                  swal({
                      title: "Deleted!",
                      text: "Your saved entry has been deleted.",
                      type: "success"
                    },
                    function() {
                      var pin = '<?php echo $pin ?>';
                      var serial = '<?php echo $serial ?>';
                      var optionValue = 'xuls';
                      $.ajax({
                        type: 'POST',
                        url: "process.php",
                        data: {
                          loademployer: optionValue,
                          userpin: pin,
                          userserial: serial
                        },
                        success: function(result) {
                          if (result == 'No') {
                            $("#errors1").html("");
                            $("#errors2").html("");
                          } else {
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
    $(document).on("click", ".Employer", function() {
      var name = document.getElementById('name').value;
      var froms = document.getElementById('froms').value;
      var tos = document.getElementById('tos').value;
      var positions = document.getElementById('position').value;
      var pin = document.getElementById('pin').value;
      var serial = document.getElementById('serial').value;;

      $.ajax({
        type: 'POST',
        url: "process.php",
        data: {
          employer: name,
          fromdatess: froms,
          todatess: tos,
          position: positions,
          userpin: pin,
          userserial: serial
        },
        success: function(result) {

          $("#errors1").html(result);
          $("#errors2").html("<a  class='btn btn-default' href='summary.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Employer</a>");
          swal({
            title: "Successful!",
            text: "Employer Information Saved!!.",
            type: "success"
          });

        }
      });

    });

    $(document).ready(function() {

      var pin = '<?php echo $pin ?>';
      var serial = '<?php echo $serial ?>';
      var optionValue = 'xuls';
      $.ajax({
        type: 'POST',
        url: "process.php",
        data: {
          loademployer: optionValue,
          userpin: pin,
          userserial: serial
        },
        success: function(result) {

          if (result == 'No') {

          } else {
            $("#errors1").html(result);
            $("#errors2").html("<a  class='btn btn-default' href='summary.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Submit Employment</a>");

          }
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).on("click", ".Del", function() {

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
    <div class="container py-md-4 mt-md-3">

      <center>
        <div id="printableArea">
          <p><img src="images/unima.png" alt="" style="width:100px;height:100px" /></p>
          <p>THE PREMIER NURSING COLLEGE<br>PNTC<br>Admission form for 2024-2015 Academic session</p>

          <table class='table table-bordered table-responsive' style="width:60%;">
            <thead>

            </thead>
            <tbody>
              <tr>
                <td class="success">APLICATION NUMBER <?php if (isset($id)) {
                                                        echo $id;
                                                      } ?></td>
                <td>Please take a copy of your MSCE certificates for processing</td>
                <td></td>
                <td>
                  <?php
                  $sqln = "SELECT * FROM Profilepictures WHERE Serial='$serial' && Pin='$pin' ";
                  $rgetb = mysqli_query($db, $sqln);
                  $numb = mysqli_num_rows($rgetb);
                  if ($numb != 0) {
                    while ($foundl = mysqli_fetch_array($rgetb)) {
                      $profile = $foundl['name'];
                    }
                    echo "<center><img src='images/applicants/$profile'  width='70%' height='70%' alt=''></center>";
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td>SECTION 1 BIODATA</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td class="success">Name</td>
                <td><?php if (isset($firstname)) {
                      echo $firstname . ' ' . $sirname;
                    } ?></td>
                <td></td>
                <td></td>



              </tr>
              <?php
              $sqln2 = "SELECT * FROM Applicants2 WHERE Serial='$serial' && Pin='$pin' ";
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
              <tr>
                <td class="success">Date of Birth</td>
                <td><?php if (isset($dob)) {
                      echo $dob;
                    } ?></td>
                <td class="success">Gender</td>
                <td><?php if (isset($gender)) {
                      echo $gender;
                    } ?></td>
              </tr>
              <tr>
                <td class="success">Nationality</td>
                <td><?php if (isset($country)) {
                      echo $country;
                    } ?></td>
                <td class="success">State</td>
                <td><?php if (isset($state)) {
                      echo $state;
                    } ?></td>
              </tr>
              <tr>
                <td class="success">Local Government</td>
                <td><?php if (isset($lgvt)) {
                      echo $lgvt;
                    } ?></td>
                <td class="success">Hometown</td>
                <td><?php if (isset($hometown)) {
                      echo $hometown;
                    } ?></td>

              </tr>
              <tr>
                <td class="success">Postal Address</td>
                <td><?php if (isset($crapp)) {
                      echo $crapp;
                    } ?></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td class="success">Residential Address</td>
                <td><?php if (isset($appre)) {
                      echo $appre;
                    } ?></td>
                <td></td>
                <td></td>
              </tr>

              <tr>
                <td class="success">Name of Parent/Guardian</td>
                <td><?php if (isset($gname)) {
                      echo $gname;
                    } ?></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td class="success">Parent/Guardian Place of Birth</td>
                <td><?php if (isset($gplace)) {
                      echo $gplace;
                    } ?></td>
                <td class="success">Parent/Guardian Hometown</td>
                <td><?php if (isset($ghome)) {
                      echo $ghome;
                    } ?></td>
              </tr>
              <tr>
                <td class="success">Parent/Guardian Country</td>
                <td><?php if (isset($gcountry)) {
                      echo $gcountry;
                    } ?></td>
                <td class="success">Parent/Guardian State</td>
                <td><?php if (isset($gstate)) {
                      echo $gstate;
                    } ?></td>
              </tr>
              <tr>
                <td class="success">Parent/Guardian Local Government</td>
                <td><?php if (isset($glocal)) {
                      echo $glocal;
                    } ?></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td class="success">Parent/Guardian Correspondance Address</td>
                <td><?php if (isset($gaddress)) {
                      echo $gaddres;
                    } ?></td>
                <td class="success">Parent/Guardian Phone</td>
                <td><?php if (isset($gmobile)) {
                      echo $gmobile;
                    } ?></td>
              </tr>
              <tr>
                <td class="success">Applicant Phone</td>
                <td><?php if (isset($appphone)) {
                      echo $appphone;
                    } ?></td>
                <td class="success">Applicant Email</td>
                <td><?php if (isset($email)) {
                      echo $email;
                    } ?></td>
              </tr>
              <tr>
                <td>SECTION 2 COURSE OF CHOICE</td>
                <td></td>
                <td></td>
                <td></td>

              </tr>
              <tr>
                <td class="success">Course Applied</td>
                <?php
                $qued = "SELECT * FROM Courseapplied WHERE Serial='$serial'&& Pin='$pin' ";
                $resul = mysqli_query($db, $qued);
                $checks = mysqli_num_rows($resul);
                if ($checks != 0) {
                  while ($found = mysqli_fetch_array($resul)) {
                    $course = $found['Name'];
                  }
                }

                ?>
                <td><?php if (isset($course)) {
                      echo $course;
                    } ?></td>
                <td></td>
                <td></td>


              </tr>

            </tbody>
          </table>

        </div>
      </center>

      <div class="form-group">

        <a class='btn btn-default' onclick="printDiv('printableArea')"><span class='glyphicon glyphicon-print'></span> &nbsp;Print</a>
        <a class='btn btn-default' href='logout.php'><span class='glyphicon glyphicon-home'></span> &nbsp;Home Page</a>

        <a class='btn btn-default' href='print_n.php'><span class='glyphicon glyphicon-log-in'></span> &nbsp;Next Page</a>



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
  <!-- <script src="js/jquery-2.2.3.min.js"></script> --> <!-- //js-->
  <script src="js/smoothbox.jquery2.js"></script>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/bootstrap.js"></script>
</body>

</html>