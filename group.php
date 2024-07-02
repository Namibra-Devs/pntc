<?php
include ("db_connect.php");
			// ob_start();

			if (isset($_GET['ids'])) {
				$id = $_GET['ids'];
				$query = "SELECT Name,Type,Size,content FROM Files WHERE id='$id' ";
				

				$result = mysqli_query($db, $query) or die('Error, query failed');
				

				list($name, $type, $content) = mysqli_fetch_array($result);
				$path = 'guide/' . $name;
				$size = filesize($path);
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header("Content-length:" . $size);
				header("Content-type:" . $type);
				header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				// ob_clean();
				// flush();
				readfile('guide/' . $name);
				mysqli_close($db);
				exit ;
			}
			// ob_end_flush();

			
			?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include ("db_connect.php");
if (isset($_COOKIE['pin']) && $_COOKIE['serial']) {

	$pin = $_COOKIE['pin'];
	$serial = $_COOKIE['serial'];

	$sqluser = "SELECT * FROM Administrator WHERE Email='$serial' && Password='$pin' ";

	$retrieved = mysqli_query($db, $sqluser);
	while ($found = mysqli_fetch_array($retrieved)) {
		$firstname = $found['Firstname'];
		$sirname = $found['Sirname'];

	}
} else {
	header('location:login.php');
	exit ;
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
			$(document).on("click", ".Del", function() {

				$("#date").val("");
				$("#file").val("");

			});
		</script>

		<script type="text/javascript">
			$(document).on("click", ".open-Delete", function() {
				var myValue = $(this).data('id');

				swal({
					title : "Are you sure?",
					text : "You will not be able to recover this entry!",
					type : "warning",
					showCancelButton : true,
					cancelButtonColor : "red",
					confirmButtonColor : "green",
					confirmButtonText : "Yes, delete it!",
					cancelButtonText : "No, cancel!",
					closeOnConfirm : false,
					closeOnCancel : false,
					buttonsStyling : false
				}, function(isConfirm) {
					if (isConfirm) {

						$.ajax({
							type : 'POST',
							url : "process.php",
							data : {
								Deletepin : myValue
							},
							success : function(result) {
								if (result == "ok") {
									swal({
										title : "Deleted!",
										text : "Your saved entry has been deleted.",
										type : "success"
									}, function() {
										var optionValue = 'xuls';
										$.ajax({
											type : 'POST',
											url : "process.php",
											data : {
												loadapps : optionValue
											},
											success : function(result) {
												location.reload();
											}
										});
									});
								}

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
						<a class="navbar-brand" href="#"> <img src="images/unima.png" style="width:70px;height: 70px;margin-top:-7px" /> </a>

					</div>

					<span class="logout-spn" > <a href="logout.php" style="color:#fff;">Logout</a> </span>
				</div>
			</div>
			<!-- /. NAV TOP  -->
			<nav class="navbar-default navbar-side" role="navigation" >
				<div class="sidebar-collapse" >
					<ul class="nav" id="main-menu" >

						<li class="active-link">
							<a href="admins.php" ><i class="fa fa-desktop "></i>Back To Main Dashboard</a>
						</li>

						<li>
							<a href="blank.html"><i class="fa fa-warning"></i>INSTRUCTIONS</a>
						</li>

						<div class="alert alert-warning">
							<h4 class="title"> Steps to upload Serial numbers and Pins in bulk! </h4>

							<ol>
								<li>
									Download the csv file from this application below
								</li>
								<li>
									Fill the colums with the serials and pin
								</li>
								<li>
									Save the file as CSV not as xls & Upload
								</li>

							</ol>

							<i class="fa fa-info-circle"></i>&nbsp;Ensure that the file upload is in CSV Format Otherwise it will not save
						</div>

						<a href='group.php?ids=2' class='btn  btn-primary' style='color: #FFFFFF;font-family:Times New Roman;' title='click here to download'><span class='glyphicon glyphicon-download-alt' style='color: #FFFFFF;'>&nbsp;Download format file</span></a>

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
					<div class="row" style="width:40%;margin-left:0%">
						<div class="col-lg-12 ">
							<?php
							if(isset($_SESSION['Import'])) {
							?>
							<div class="alert alert-success">
								(<?php echo $_SESSION['Import'];
								session_destroy();
 ?> )Serials and Pins have been uploaded
							</div>
							<?php }else{ ?>

							<div class="alert alert-info">

								Upload the csv file below which you have entered serials and pins .
							</div>
							<?php } ?>
						</div>
					</div>
					<!-- /. ROW  -->
					<div class="row text-center pad-top" >

						<div style="float: left;margin-left:5%">

							<form class="form-login" style="width: 100%" method="post" action="process.php"  enctype='multipart/form-data'>
								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">Date</span>
									<input type="date" class="form-control" name="" value=""  id="date">
								</div>

								<div class="input-group" style="margin-bottom:10px">
									<span class="input-group-addon">File</span>
									<input name='file' type='file' id='file' >
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-default" name="bulk" value="ghj" >
										<span class="glyphicon glyphicon-upload"></span> &nbsp; Upload
									</button>
									<button type="reset" class="btn btn-default" name="logined" id="logined">
										<span class="glyphicon glyphicon-trash"></span> &nbsp; Clear
									</button>
								</div>

							</form>
						</div>

					</div>
					<?php
					if (isset($_SESSION['Import'])) {
						echo "<div style='float:right;margin-right:5%;margin-top:-23%'>
<div class='alert alert-info'>
Below is the List of Serial Numbers and Pin You have Uploaded.
</div> ";
						$number = $_SESSION['Import'];

						$sql = "SELECT * FROM Applicants ORDER BY id DESC LIMIT $number ";
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

						$sql = "SELECT * FROM Applicants";
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

					}
					?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<br/>
						<div class="alert alert-danger"></div>

					</div>
				</div>
				<!-- /. ROW  -->
			</div>
			<?php
			// ob_start();

			// if (isset($_GET['ids'])) {
			// 	$id = $_GET['ids'];
			// 	$query = "SELECT Name,Type,Size,content FROM Files WHERE id='$id' ";
				

			// 	$result = mysqli_query($db, $query) or die('Error, query failed');
				

			// 	list($name, $type, $content) = mysqli_fetch_array($result);
			// 	$path = 'guide/' . $name;
			// 	$size = filesize($path);
			// 	header('Content-Description: File Transfer');
			// 	header('Content-Type: application/octet-stream');
			// 	header("Content-length:" . $size);
			// 	header("Content-type:" . $type);
			// 	header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
			// 	header('Content-Transfer-Encoding: binary');
			// 	header('Expires: 0');
			// 	header('Cache-Control: must-revalidate');
			// 	ob_clean();
			// 	flush();
			// 	readfile('guide/' . $name);
			// 	mysqli_close($db);
			// 	exit ;
			// }
			// ob_end_flush();

			
			?>

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
