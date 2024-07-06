<?php
include_once("db_connect.php");
if (isset($_COOKIE['pin']) && $_COOKIE['serial']) {

	$pin = $_COOKIE['pin'];
	$serial = $_COOKIE['serial'];
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

	<!-- //for-javascript -->
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>

<body>
	<script type="text/javascript">
		$(document).on("click", ".biodata", function() {
			//var username = document.getElementById('username').value;
			// var password = document.getElementById('password').value;
			//var repassword = document.getElementById('repassword').value;
			var surname = document.getElementById('surname').value;
			var othernames = document.getElementById('othernames').value;
			var dob = document.getElementById('datepicker-starting-view').value;
			var gender = document.getElementById('gender').value;
			var religion = document.getElementById('religion').value;
			var placebirth = document.getElementById('placebirth').value;
			var hometown = document.getElementById('hometown').value;
			var country = document.getElementById('country').value;
			var state = document.getElementById('state')?.value || 'none';
			var localgvt = document.getElementById('localgvt')?.value || 'none'
			var apresaddress = document.getElementById('apresaddress').value;
			var aprecaddress = document.getElementById('aprecaddress').value;
			var guardianname = document.getElementById('guardianname').value;
			var guardianplace = document.getElementById('guardianplace').value;
			var guardianhometown = document.getElementById('guardianhometown').value;
			var gcountry = document.getElementById('gcountry').value;
			var gstate = document.getElementById('gstate')?.value || 'none';
			var glocalgovt = document.getElementById('glocalgovt')?.value || 'none';
			var gaddress = document.getElementById('gaddress').value;
			var gmobile = document.getElementById('gmobile').value;
			var applicantphone = document.getElementById('applicantphone').value;
			var email = document.getElementById('email').value;


			// $(".bookId").html(myTitle);
			//window.alert(gmobile); 
			// if(myTitle==""){									
			// $("#login_buttons").html('<img src="js/ajax-loader.gif" /> &nbsp; Loading Stage 2 ...');
			// setTimeout(' window.location.href = "biodata.php"; ',3000);
			// } 
			$.ajax({
				type: 'POST',
				url: "process.php",
				data: {
					Value4: surname,
					Value5: othernames,
					Value6: dob,
					Value7: gender,
					Value8: placebirth,
					Value9: hometown,
					Value10: country,
					Value11: state,
					Value12: localgvt,
					Value13: apresaddress,
					Value14: guardianname,
					Value15: guardianplace,
					Value16: guardianhometown,
					Value17: gcountry,
					Value18: gstate,
					Value19: glocalgovt,
					Value20: gaddress,
					Value21: gmobile,
					Value22: applicantphone,
					Value23: email,
					Value24: aprecaddress,
					Value25: religion
				},
				success: function(result) {
					console.log({result});

					if (result == 'Yes') {
						sweetAlert("Oops...", "Fill all textbox fields they are required", "error");
					} else if (result == 'Yes2') {
						sweetAlert("Oops...", "Biodata Updated Successfully", "success");
					} else {
						//                                          
						swal({
								title: "Saved",
								text: "Biodata Information Added",
								type: "success",
								showCancelButton: true,
								confirmButtonColor: "green",
								confirmButtonText: "OK",
								closeOnConfirm: true,
								closeOnCancel: true,
								buttonsStyling: false
							},
							function(isConfirm) {
								if (isConfirm) {
									window.location = "passport.php";
								}
							});
					}
				}
			});

		});
	</script>

	<script type="text/javascript">
		$(document).on("click", ".Del", function() {

			$('#surname').val("");
			$('#othernames').val("");
			$('#datepicker-starting-view').val("");
			$('#gender').val("");
			$('#religion').val("");
			$('#placebirth').val("");
			$('#hometown').val("");
			$('#country').val("");
			$('#state').val("");
			$('#localgvt').val("");
			$('#apresaddress').val("");
			$('#aprecaddress').val("");
			$('#guardianname').val("");
			$('#guardianplace').val("");
			$('#guardianhometown').val("");
			$('#gcountry').val("");
			$('#gstate').val("");
			$('#glocalgovt').val("");
			$('#gaddress').val("");
			$('#gmobile').val("");
			$('#applicantphone').val("");
			$('#email').val("");


		});
	</script>
	<script type="text/javascript">
		$(document).on("change", ".States", function() {
			//           	                       
			var Statess = document.getElementById('state').value;
			//            
			$.ajax({
				type: 'POST',
				url: "process.php",
				data: {
					statesname: Statess
				},
				success: function(result) {

					$("#localg").html(result);
				}
			});

		});


		$(document).on("change", ".State2", function() {
			//           	                       
			var Statess = document.getElementById('gstate').value;
			//            
			$.ajax({
				type: 'POST',
				url: "process.php",
				data: {
					statesname2: Statess
				},
				success: function(result) {

					$("#paregvt").html(result);
				}
			});

		});
	</script>

	<!-- header -->
	<section class="w3layouts-header py-2">
		<div class="container">
			<!-- header -->
			<header>
				<nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
					<h>
						<a class="navbar-brand" href="index.php">
							PREMIER NURSING COLLEGE
						</a>
					</h>
					<button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-lg-auto text-center">
							<li class="nav-item active  mr-3">
								<a class="nav-link" href="index.php">Home
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item dropdown mr-3">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Admission
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="biodata.php">Online Form</a>
									<a class="dropdown-item" href="#">Admission Status</a>
									<a class="dropdown-item" href="#">Admission List</a>
									<a class="dropdown-item" href="onlineform.php">Print Form</a>
									<a class="dropdown-item" href="login.php"><i class="fa fa-lock"></i>&nbsp;Administrator</a>
								</div>
							</li>
							<li class="nav-item  mr-3">
								<a class="nav-link" href="#">Registration</a>
							</li>
							<li class="nav-item  mr-3">
								<a class="nav-link" href="#">Results</a>
							</li>

							<li class="nav-item mr-3">
								<a class="nav-link" href="#">Contact</a>
							</li>
							<li class="nav-item mr-3">
								<a class="nav-link" href="logout.php" style="font-weight: bold; font-family: 'Comic Sans MS'; color: #5261D1;">Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- //header -->
		</div>
	</section>
	<!-- //header -->
	<!-- banner -->
	<section class="banner-1">

	</section>
	<!-- //banner -->
	<!-- gallery -->
	<div class="agileits-services text-center py-5">
		<div class="container py-md-4 mt-md-3">
			<h3 class="heading-agileinfo">Bio Data<span>
					Make sure you enter active phone number and email address
				</span></h3>
			<div class="w3ls_gallery_grids mt-md-5 pt-5">
				<div class="container">
					<h2></h2>

					<div class="form-login">

						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Username/Serial</span>
							<input type="text" class="form-control" name="username" value="<?php echo $serial; ?>" id='username' disabled=''>

						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Password/Pin</span>
							<input type="text" class="form-control" name="password" id="password" value="<?php echo $pin; ?>" disabled=''>
						</div>

						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Surname</span>
							<input type="text" class="form-control" name="surname" id="surname" placeholder="Surname">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Other Names</span>
							<input type="text" class="form-control" name="othernames" id="othernames" placeholder="Enter Other Names">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Date of Birth</span>
							<input id="datepicker-starting-view" type="date" class="form-control" placeholder="dd/mm/yy">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Gender</span>
							<select style='height:37px;width:100%;border:1px solid;' name="gender" id='gender'>
								<option>Select Option</option>

								<option class="open-computers">Male</option>
								<option class="open-computers2">Female</option>

							</select>
						</div>

						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Place of Birth</span>
							<input type="text" class="form-control" name="placebirth" id="placebirth" placeholder="Place of Birth">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Religion</span>
							<select style='height:37px;width:100%;border:1px solid;' name="religion" id='religion'>
								<option disabled>Select Option</option>

								<option class="open-computers">Islam</option>
								<option class="open-computers2">Christianity</option>
								<option class="open-computers2">African Tradition</option>

							</select>
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Hometown</span>
							<input type="text" class="form-control" name="hometown" id="hometown" placeholder="Enter Hometown">
						</div>


						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Nationality</span>
							<select style='height:37px;width:100%;border:1px solid black;' name="country" id='country'>
								<option disabled>Select Country</option>

								<option value="United States">United States</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antarctica">Antarctica</option>
								<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Bouvet Island">Bouvet Island</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
								<option value="Brunei Darussalam">Brunei Darussalam</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote D'ivoire">Cote D'ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Territories">French Southern Territories</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guinea-bissau">Guinea-bissau</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
								<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
								<option value="Korea, Republic of">Korea, Republic of</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macao">Macao</option>
								<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malawi">Malawi</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
								<option value="Moldova, Republic of">Moldova, Republic of</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Namibia">Namibia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="Netherlands Antilles">Netherlands Antilles</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria" selected="">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Northern Mariana Islands">Northern Mariana Islands</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau">Palau</option>
								<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Philippines">Philippines</option>
								<option value="Pitcairn">Pitcairn</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russian Federation">Russian Federation</option>
								<option value="Rwanda">Rwanda</option>
								<option value="Saint Helena">Saint Helena</option>
								<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value="Saint Lucia">Saint Lucia</option>
								<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
								<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
								<option value="Samoa">Samoa</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Serbia and Montenegro">Serbia and Montenegro</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syrian Arab Republic">Syrian Arab Republic</option>
								<option value="Taiwan, Province of China">Taiwan, Province of China</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
								<option value="Thailand">Thailand</option>
								<option value="Timor-leste">Timor-leste</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States">United States</option>
								<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Viet Nam">Viet Nam</option>
								<option value="Virgin Islands, British">Virgin Islands, British</option>
								<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
								<option value="Wallis and Futuna">Wallis and Futuna</option>
								<option value="Western Sahara">Western Sahara</option>
								<option value="Yemen">Yemen</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>


							</select>
						</div>



						<!-- <div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">State</span>
							<select style='height:37px;width:100%;border:1px solid black;' name="state" id="state" class="States">
								<option>Select Option</option>

								<?php
								// $sqlb = "SELECT * FROM States ";
								// $rgetb = mysqli_query($db, $sqlb);
								// $numb = mysqli_num_rows($rgetb);
								// if ($numb != 0) {
								// 	while ($foundk = mysqli_fetch_array($rgetb)) {
								// 		$name = $foundk['Name'];

								// 		echo "<option>$name</option>";
								// 	}
								// }
								?>


							</select>
						</div> -->

						<!-- <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Local Govt</span>
   <input type="text" class="form-control" name="localgvt" id="localgvt" placeholder="Enter Local Govt">
  </div> -->


						<span id='localg'></span>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">House Number</span>
							<textarea name="aprecaddress" rows="4" class="form-control" placeholder="Correspondence Address" id="aprecaddress"></textarea>
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Digital Address of House Number</span>
							<textarea name="apresaddress" rows="4" class="form-control" placeholder="Resdential Address" id="apresaddress"></textarea>
						</div>

						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Name of Parent/Guardian</span>
							<input type="text" class="form-control" name="guardianname" id="guardianname" placeholder="Guardian Name">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Parent/Guardian Place of Birth</span>
							<input type="text" class="form-control" name="guardianplace" id="guardianplace" placeholder="Guardian POB">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Parent/Guardian Home Town</span>
							<input type="text" class="form-control" name="guardianhometown" id="guardianhometown" placeholder="Guardian Home Town">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Parent/Guardian Country</span>
							<select style='height:37px;width:100%;border:1px solid black;' name="gcountry" id='gcountry'>


								<option value="United States">United States</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antarctica">Antarctica</option>
								<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Bouvet Island">Bouvet Island</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
								<option value="Brunei Darussalam">Brunei Darussalam</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote D'ivoire">Cote D'ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Territories">French Southern Territories</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guinea-bissau">Guinea-bissau</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
								<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
								<option value="Korea, Republic of">Korea, Republic of</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macao">Macao</option>
								<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malawi">Malawi</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
								<option value="Moldova, Republic of">Moldova, Republic of</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Namibia">Namibia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="Netherlands Antilles">Netherlands Antilles</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria" selected="">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Northern Mariana Islands">Northern Mariana Islands</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau">Palau</option>
								<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Philippines">Philippines</option>
								<option value="Pitcairn">Pitcairn</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Russian Federation">Russian Federation</option>
								<option value="Rwanda">Rwanda</option>
								<option value="Saint Helena">Saint Helena</option>
								<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value="Saint Lucia">Saint Lucia</option>
								<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
								<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
								<option value="Samoa">Samoa</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Serbia and Montenegro">Serbia and Montenegro</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syrian Arab Republic">Syrian Arab Republic</option>
								<option value="Taiwan, Province of China">Taiwan, Province of China</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
								<option value="Thailand">Thailand</option>
								<option value="Timor-leste">Timor-leste</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States">United States</option>
								<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Viet Nam">Viet Nam</option>
								<option value="Virgin Islands, British">Virgin Islands, British</option>
								<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
								<option value="Wallis and Futuna">Wallis and Futuna</option>
								<option value="Western Sahara">Western Sahara</option>
								<option value="Yemen">Yemen</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>


							</select>
						</div>


						<!-- <div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Parent/Guardian State</span>
							<select style='height:37px;width:100%;border:1px solid black;' name="gstate" id='gstate' class="State2">
								<option>Select Option</option>

								<?php
								// $sqlb = "SELECT * FROM States ";
								// $rgetb = mysqli_query($db, $sqlb);
								// $numb = mysqli_num_rows($rgetb);
								// if ($numb != 0) {
								// 	while ($foundk = mysqli_fetch_array($rgetb)) {
								// 		$name = $foundk['Name'];

								// 		echo "<option>$name</option>";
								// 	}
								// }
								?>


							</select>
						</div> -->
						<!-- <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">Parent/Guardian Local Govt</span>
   <input type="text" class="form-control" name="glocalgovt" id="glocalgovt" placeholder="Guardian Local Govt">
  </div> -->
						<span id="paregvt"></span>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Parent/Guardian Address</span>
							<textarea name="gaddress" id="gaddress" rows="4" class="form-control" placeholder="Guardian Correspondance Address"></textarea>
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Parent/Guardian Phone</span>
							<input type="text" class="form-control" name="gmobile" id="gmobile" placeholder="Guardian Phone Number">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Applicant Phone</span>
							<input type="text" class="form-control" name="applicantphone" id="applicantphone" placeholder="Applicant Phone Number">
						</div>
						<div class="input-group" style="margin-bottom:10px">
							<span class="input-group-addon">Applicant Email</span>
							<input type="email" class="form-control" name="email" id="email" placeholder="E-mail Address">
						</div>

						<div class="form-group">
							<button type="submit" class="biodata btn btn-default" name="login_buttons" id="login_buttons">
								<span class="glyphicon glyphicon-log-in"></span> &nbsp; Save
							</button>
							<button type="reset" class="Del btn btn-default" name="login_button" id="login_button">
								<span class="glyphicon glyphicon-trash"></span> &nbsp; Clear
							</button>
						</div>
						<div class="form-group">
							<a type="button" class="btn btn-default" href="onlineform.php">
								<i class="fa fa-arrow-left"></i> &nbsp; Previous
							</a>

							<a type="button" class="btn btn-default" href="passport.php">
								<i class="fa fa-arrow-right"></i> &nbsp; Next
							</a>
						</div>

					</div>



				</div>


			</div>
		</div>
	</div>
	<!-- //gallery -->

	<!-- Footer -->
	<footer class="footer-section py-5">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 footer-grids">
					<h3>Get in touch</h3>
					<p>Unima Head Office,Chilunga builing,John chilembwe Road </p>
					<p class="my-2">Zomba,Malawi</p>
					<p class="phone">phone: +265 293 4539</p>
					<p class="phone my-2">Fax: +265 818 293 4539</p>
					<p class="phone">Mail:
						<a href="mailto:mvumapatrick@gmail.coom">Namibra</a>
					</p>
				</div>
				<div class="col-lg-4 footer-grids">
					<h2>Latest News</h2>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4">
							<img src="images/s1.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/s2.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/s3.jpg" class="img-fluid" alt="Responsive image">
						</a>
					</div>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4">
							<img src="images/s4.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/hendry.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4">
							<img src="images/2.jpg" class="img-fluid" alt="Responsive image">
						</a>
					</div>
				</div>
				<div class="col-lg-4 footer-grids">
					<h3>Twitter feed</h3>
					<ul class="w3agile_footer_grid_list">
						<li>Am failing t use the login system
							<a href="#">www.pntc.com</a> @James.
							<span>
								<i class="fab fa-twitter"></i> 02 days ago</span>
						</li>
						<li>This is nice and i like this portal
							<a href="#">www.pntc.com</a> @Peter.
							<span>
								<i class="fab fa-twitter"></i> 03 days ago</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- //Footer -->
	<!-- copyright -->
	<section class="copyright-w3layouts py-xl-4 py-3">
		<div class="container">
			<p>© 2024 PNTC . All Rights Reserved | Design & Developed by mvumapatrick@gmail.com
			</p>
			<ul class="social-nav footer-social social two text-center mt-2">
				<li>
					<a href="#">
						<i class="fab fa-facebook-f" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fab fa-twitter" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fab fa-instagram" aria-hidden="true"></i>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fab fa-pinterest" aria-hidden="true"></i>
					</a>
				</li>
			</ul>
		</div>
	</section><!-- //copyright -->
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