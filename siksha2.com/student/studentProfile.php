<!-- //student na folder ma file create krvi (this) -->
<?php 
 if(!isset($_SESSION)){
	 session_start();
}
 
include('./stuInclude/stu_header.php');
//  include('./stuInclude/header.php');

include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
	$stuEmail = $_SESSION['stuLogEmail'];
}else{
	echo "<script> location.href='../index.php'; </script>";
}





if(isset($_REQUEST['updateStuNameBtn'])){
	if(($_REQUEST['stuName'] == "")){
		$passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
	}else{
		 $stuName = trim($_REQUEST["stuName"]);
		 $stuOcc = trim($_REQUEST["stuOcc"]);
		 $phone = trim($_REQUEST["phone"]);
		 $add1 =trim($_REQUEST["add1"]);
		 $add2 = trim($_REQUEST["add2"]);
 		 $city = trim($_REQUEST["city"]);
		 $zip = trim($_REQUEST["zip"]);
		 $country = trim($_REQUEST["country"]);
		 $aboutme = trim($_REQUEST["aboutme"]);
		 $website = trim($_REQUEST["website"]);
		 $twitter = trim($_REQUEST["twitter"]);
		 $facebook = trim($_REQUEST["facebook"]);
		 $linkedin = trim($_REQUEST["linkedin"]);
		 $youtube = trim($_REQUEST["youtube"]);
		 $instagram = trim($_REQUEST["instagram"]);
		 $stu_image = $_FILES['stuImg']['name'];
		 $stu_image_temp = $_FILES['stuImg']['tmp_name'];
		 $img_folder = '../image/stu'.$stu_image;
		
		
// 		 print_r($stu_image);
// print_r($stu_image_temp);
// print_r($img_folder);
		 move_uploaded_file($stu_image_temp, $img_folder);
		//  $sql = "UPDATE student SET stu_name = '$stuName', stu_occ = '$stuOcc', stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";
		$sql = "UPDATE student SET stu_name = '$stuName', stu_occ = '$stuOcc',phone = '$phone', add1='$add1', 
		add2='$add2',city='$city',zip='$zip',country='$country',aboutme='$aboutme',website='$website',twitter='$twitter',
		facebook='$facebook',linkedin='$linkedin',youtube='$youtube',instagram='$instagram',stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";
		 if($conn->query($sql) == TRUE){
			// $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
			 echo" <script>
                        

                    </script>";
		 }else{
			// $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
			 echo" <script>
                        alert(' Your profile Not updated successfully');
                        window.location.replace('studentProfile.php?profilesettings');

                    </script>";
		 }
	  }
  }
?>

<?php

?>


<?php if(isset($_REQUEST['updatepass'])){
            $oldpass = trim($_REQUEST['oldpass']);
			// $passwordold_hash = password_hash($oldpass, PASSWORD_BCRYPT);
            $sql = "SELECT * FROM student WHERE  stu_email = '$stuEmail' AND password='$oldpass'";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
				$fetch = mysqli_fetch_assoc($result);
                // $hashpassword = $fetch["password"];
                // $sid = $fetch["stu_id"];
                // $stu_name=$fetch["stu_name"];
				
				$newpass = $_REQUEST['newpass'];
				$confpass = $_REQUEST['confpass'];
				if($newpass != $confpass){
					 $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Both Password must be same</div>';
				}else{
				// $password_hash = password_hash($newpass, PASSWORD_BCRYPT);
                $sql = "UPDATE student SET password = '$newpass' WHERE stu_email = '$stuEmail' ";
                 if($conn->query($sql) == TRUE){
                    $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
                 }else{
                    $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
                 }
				}
            }
			else{
				 $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">check Password</div>';
			}
} ?>




<div class="topnav rounded mt-3  border border-secondary" style="ml-5 background:#fff; margin-left:10%; margin-right:8%;">
<?php if(isset($_GET['profilesettings'])){?>
<a  href="studentProfile.php?profilesettings" class="active">Profile settings</a>
  
  <a style="" href="studentProfile.php?resetPassword">Reset Password</a>
<?php } ?>
<?php if(isset($_GET['resetPassword'])){?>
<a  href="studentProfile.php?profilesettings" >Profile settings</a>
  
  <a style="" href="studentProfile.php?resetPassword" class="active">Reset Password</a>
<?php } ?>
   <!-- <a style="" href="ins_withdraw.php">My Quiz Attempts</a> -->
   
</div>
<?php
if(isset($passmsg)){
echo $passmsg;
}
?>

<?php
$sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
	$row = $result->fetch_assoc();
	$stuId = $row["stu_id"];
	$stu_Name = $row["stu_name"];
	$stuOcc = $row["stu_occ"];
	$stuImgg = $row["stu_img"];
	$phone = $row['phone'];
	$add1 = $row['add1'];
	$add2 = $row['add2'];
	$city = $row['city'];
	$zip = $row['zip'];
	$country = $row['country'];
	$aboutme = $row['aboutme'];
	$website = $row['website'];
	$twitter = $row['twitter'];
	$facebook = $row['facebook'];
	$linkedin = $row['linkedin'];
	$youtube = $row['youtube'];
	$instagram = $row['instagram'];
	
}
?>

<?php
if(isset($_GET['resetPassword'])){?>
<div class="mt-5" style="width:80%;margin-left:10%;">
<form  method="POST" action="studentProfile.php">

	<div class="form-group input-group-lg">
    	<label for="oldpass" style="color:#000;font-size:17px;">Old password</label>
    	<input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="oldpas" name="oldpass" placeholder="Old Password" required>
  	</div>
	  <div class="form-row">
    <div class="form-group col-md-6 input-group-lg" >
      <label for="newpass" style="color:#000;font-size:17px;">New Password</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="newpass" name="newpass" placeholder="New Password" required>
    </div>
    <div class="form-group col-md-6 input-group-lg">
      <label for="confpass" style="color:#000;font-size:17px;">Confirm New Password</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="confpass" name="confpass" placeholder="Confirm Password" required>
    </div>
  </div>
  <button type="submit" name="updatepass" class="btn" style="border-radius:10px;">update Password</button>
</form>
</div>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<?php
}
?>






















<!-- <div class="col-sm-6 mt-5" style="margin-left:30%;">
 <form class="mx-5" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="stuId">Student ID</label>
	<input type="text" class="form-control" id="stuId" name="stuId" value=" <?php if(isset($stuId)) {echo $stuId;} ?>" readonly>
   </div>
   <div class="form-group">
     <label for="stuEmail">Email</label>
	 <input type="email" class="form-control" id="stuEmail" value=" <?php echo $stuEmail ?>" readonly>
   </div>
    <div class="form-group">
     <label for="stuName">Name</label>
	 <input type="text" class="form-control" id="stuName" name="stuName" value=" <?php if(isset($stu_Name)) {echo $stu_Name;} ?>">
   </div>
    <div class="form-group">
	  <label for="stuOcc">Occupation</label>
	   <input type="text" class="form-control" id="stuOcc" name="stuOcc" value=" <?php if(isset($stuOcc)) {echo $stuOcc;} ?>">
	</div>
	<div class="form-group">
      <label for="phone" style="color:#000;font-size:17px;">Phone</label>
      <input style="border:1px solid #000;background:#f5f7fd;"  class="form-control" id="phone" name="phone" placeholder="Phone" value=" <?php if(isset($phone)) {echo $phone;}else{echo'no value';} ?>">
    </div>
	<div class="form-group">
	  <label for="stuImg">Upload Image</label>
	   <input type="file" class="form-control-file" id="stuImg" name="stuImg">
	</div>
	<button type="submit" class="btn btn-primary" name="updateStuNameBtn" style="background-color:#181717;">Update</button>
	<?php if(isset($passmsg)) {echo $passmsg; } ?>
   </form>
   </div>
   
   </div> -->

   <!--  -->


   <div class="mt-5" style="width:80%;margin-left:10%;">
<form   method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6 input-group-lg" >
      <label for="stuname" style="color:#000;font-size:17px;">Name</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="stuName" name="stuName" placeholder="Name"  value=" <?php if(isset($stuName)) {echo $stuName;} ?>" required>
    </div>
    <div class="form-group col-md-6 input-group-lg">
      <label for="occ" style="color:#000;font-size:17px;">Job Title</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="stuOcc" name="stuOcc" placeholder="Job Title" value=" <?php if(isset($stuOcc)) {echo $stuOcc;} ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 input-group-lg">
      <label for="stuEmail" style="color:#000;font-size:17px;">Email</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="email" class="form-control" id="stuEmail" name="stuEmail" placeholder="Email" value=" <?php echo $stuEmail ?>" readonly>
    </div>
    <div class="form-group col-md-6 input-group-lg">
      <label for="phone" style="color:#000;font-size:17px;">Phone</label>
      <input style="border:1px solid #000;background:#f5f7fd;"  class="form-control" id="phone" name="phone" placeholder="Phone" value=" <?php if(isset($phone)) {echo $phone;}else{echo'no value';} ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 input-group-lg">
      <label for="add1" style="color:#000;font-size:17px;">Address</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="add1" name="add1" placeholder="Address" value=" <?php if(isset($add1)) {echo $add1;} ?>" >
    </div>
    <div class="form-group col-md-6 input-group-lg">
      <label for="add2" style="color:#000;font-size:17px;">Address Line 2</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="add2" name="add2" placeholder="Address Line 2" value=" <?php if(isset($add2)) {echo $add2;} ?>">
    </div>
  </div>
  <div class="form-group input-group-lg">
	  <label for="stuImg" style="color:#000;font-size:17px;">Upload Image</label>
	   <input style="border:1px solid #000;background:#f5f7fd;" type="file" class="form-control-file" id="stuImg" name="stuImg">
	<!-- </div> -->
   <div class="form-row">
    <div class="form-group col-md-6 input-group-lg">
      <label for="city" style="color:#000;font-size:17px;">City</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="city" name="city" placeholder="City" value=" <?php if(isset($city)) {echo $city;} ?>" >
    </div>
    <div class="form-group col-md-3 input-group-lg">
      <label for="zip" style="color:#000;font-size:17px;">Zip</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="zip" name="zip" placeholder="Zip" value=" <?php if(isset($zip)) {echo $zip;} ?>" >
 <!-- pattern="[0-9]{6}" -->
    </div>
	 <div class="form-group col-md-3 input-group-lg">
      <label for="inputState" style="color:#000;font-size:17px;">Country</label>
      <select style="border:1px solid #000;background:#f5f7fd;" id="country" name="country" class="form-control" value=" <?php if(isset($country)) {echo $country;} ?>">
        <option selected>Choose...</option>
		
        <option value="">Choose...</option>
<option value="1">Afghanistan</option>
<option value="74">Åland Islands</option>
<option value="2">Albania</option>
<option value="4">Algeria</option>
<option value="5">American Samoa</option>
<option value="6">Andorra</option>
<option value="7">Angola</option>
<option value="190">Anguilla</option>
<option value="3">Antarctica</option>
<option value="8">Antigua and Barbuda</option>
<option value="10">Argentina</option>
<option value="16">Armenia</option>
<option value="153">Aruba</option>
<option value="11">Australia</option>
<option value="12">Austria</option>
<option value="9">Azerbaijan</option>
<option value="13">Bahamas</option>
<option value="14">Bahrain</option>
<option value="15">Bangladesh</option>
<option value="17">Barbados</option>
<option value="34">Belarus</option>
<option value="18">Belgium</option>
<option value="26">Belize</option>
<option value="59">Benin</option>
<option value="19">Bermuda</option>
<option value="20">Bhutan</option>
<option value="21">Bolivia, Plurinational State of</option>
<option value="155">Bonaire, Sint Eustatius and Saba</option>
<option value="22">Bosnia and Herzegovina</option>
<option value="23">Botswana</option>
 <option value="24">Bouvet Island</option>
<option value="25">Brazil</option>
<option value="27">British Indian Ocean Territory</option>
<option value="30">Brunei Darussalam</option>
<option value="31">Bulgaria</option>
<option value="242">Burkina Faso</option>
<option value="33">Burundi</option>
<option value="35">Cambodia</option>
<option value="36">Cameroon</option>
<option value="37">Canada</option>
<option value="38">Cape Verde</option>
<option value="39">Cayman Islands</option>
<option value="40">Central African Republic</option>
<option value="42">Chad</option>
<option value="43">Chile</option>
<option value="44">China</option>
<option value="46">Christmas Island</option>
<option value="47">Cocos (Keeling) Islands</option>
<option value="48">Colombia</option>
<option value="49">Comoros</option>
<option value="51">Congo</option>
<option value="52">Congo, the Democratic Republic of the</option>
<option value="53">Cook Islands</option>
<option value="54">Costa Rica</option>
<option value="110">Côte d'Ivoire</option>
<option value="55">Croatia</option>
<option value="56">Cuba</option>
<option value="152">Curaçao</option>
<option value="57">Cyprus</option>
<option value="58">Czech Republic</option>
<option value="60">Denmark</option>
<option value="79">Djibouti</option>
<option value="61">Dominica</option>
<option value="62">Dominican Republic</option>
<option value="63">Ecuador</option>
<option value="234">Egypt</option>
<option value="64">El Salvador</option>
<option value="65">Equatorial Guinea</option>
<option value="67">Eritrea</option>
<option value="68">Estonia</option>
<option value="66">Ethiopia</option>
<option value="70">Falkland Islands (Malvinas)</option>
<option value="69">Faroe Islands</option>
<option value="72">Fiji</option>
<option value="73">Finland</option>
<option value="75">France</option>
<option value="76">French Guiana</option>
<option value="77">French Polynesia</option>
<option value="78">French Southern Territories</option>
<option value="80">Gabon</option>
<option value="82">Gambia</option>
<option value="81">Georgia</option>
<option value="84">Germany</option>
<option value="85">Ghana</option>
<option value="86">Gibraltar</option>
<option value="88">Greece</option>
<option value="89">Greenland</option>
<option value="90">Grenada</option>
<option value="91">Guadeloupe</option>
<option value="92">Guam</option>
<option value="93">Guatemala</option>
<option value="236">Guernsey</option>
<option value="94">Guinea</option>
<option value="179">Guinea-Bissau</option>
<option value="95">Guyana</option>
<option value="96">Haiti</option>
<option value="97">Heard Island and McDonald Islands</option>
<option value="98">Holy See (Vatican City State)</option>
<option value="99">Honduras</option>
<option value="100">Hong Kong</option>
<option value="101">Hungary</option>
<option value="102">Iceland</option>
<option value="103">India</option>
<option value="104">Indonesia</option>
<option value="105">Iran, Islamic Republic of</option>
<option value="106">Iraq</option>
<option value="107">Ireland</option>
<option value="238">Isle of Man</option>
<option value="108">Israel</option>
<option value="109">Italy</option>
<option value="111">Jamaica</option>
<option value="112">Japan</option>
<option value="237">Jersey</option>
<option value="114">Jordan</option>
<option value="113">Kazakhstan</option>
<option value="115">Kenya</option>
 <option value="87">Kiribati</option>
<option value="116">Korea, Democratic People's Republic of</option>
<option value="117">Korea, Republic of</option>
<option value="118">Kuwait</option>
<option value="119">Kyrgyzstan</option>
<option value="120">Lao People's Democratic Republic</option>
<option value="123">Latvia</option>
<option value="121">Lebanon</option>
<option value="122">Lesotho</option>
<option value="124">Liberia</option>
<option value="125">Libya</option>
<option value="126">Liechtenstein</option>
<option value="127">Lithuania</option>
<option value="128">Luxembourg</option>
<option value="129">Macao</option>
<option value="233">Macedonia, the former Yugoslav Republic of</option>
<option value="130">Madagascar</option>
<option value="131">Malawi</option>
<option value="132">Malaysia</option>
<option value="133">Maldives</option>
<option value="134">Mali</option>
<option value="135">Malta</option>
<option value="168">Marshall Islands</option>
<option value="136">Martinique</option>
<option value="137">Mauritania</option>
<option value="138">Mauritius</option>
<option value="50">Mayotte</option>
<option value="139">Mexico</option>
<option value="167">Micronesia, Federated States of</option>
<option value="142">Moldova, Republic of</option>
<option value="140">Monaco</option>
<option value="141">Mongolia</option>
<option value="143">Montenegro</option>
<option value="144">Montserrat</option>
<option value="145">Morocco</option>
<option value="146">Mozambique</option>
<option value="32">Myanmar</option>
<option value="148">Namibia</option>
<option value="149">Nauru</option>
<option value="150">Nepal</option>
 <option value="151">Netherlands</option>
<option value="156">New Caledonia</option>
<option value="158">New Zealand</option>
<option value="159">Nicaragua</option>
<option value="160">Niger</option>
<option value="161">Nigeria</option>
<option value="162">Niue</option>
<option value="163">Norfolk Island</option>
<option value="165">Northern Mariana Islands</option>
<option value="164">Norway</option>
<option value="147">Oman</option>
<option value="170">Pakistan</option>
<option value="169">Palau</option>
<option value="83">Palestinian Territory, Occupied</option>
<option value="171">Panama</option>
<option value="172">Papua New Guinea</option>
<option value="173">Paraguay</option>
<option value="174">Peru</option>
<option value="175">Philippines</option>
<option value="176">Pitcairn</option>
<option value="177">Poland</option>
<option value="178">Portugal</option>
<option value="181">Puerto Rico</option>
<option value="182">Qatar</option>
<option value="183">Réunion</option>
<option value="184">Romania</option>
<option value="185">Russian Federation</option>
<option value="186">Rwanda</option>
<option value="187">Saint Barthélemy</option>
<option value="188">Saint Helena, Ascension and Tristan da Cunha</option>
<option value="189">Saint Kitts and Nevis</option>
<option value="191">Saint Lucia</option>
<option value="192">Saint Martin (French part)</option>
<option value="193">Saint Pierre and Miquelon</option>
<option value="194">Saint Vincent and the Grenadines</option>
<option value="247">Samoa</option>
<option value="195">San Marino</option>
<option value="196">Sao Tome and Principe</option>
<option value="197">Saudi Arabia</option>
<option value="198">Senegal</option>
<option value="199">Serbia</option>
<option value="200">Seychelles</option>
<option value="201">Sierra Leone</option>
<option value="202">Singapore</option>
<option value="154">Sint Maarten (Dutch part)</option>
<option value="203">Slovakia</option>
<option value="205">Slovenia</option>
<option value="28">Solomon Islands</option>
<option value="206">Somalia</option>
<option value="207">South Africa</option>
<option value="71">South Georgia and the South Sandwich Islands</option>
<option value="210">South Sudan</option>
<option value="209">Spain</option>
<option value="41">Sri Lanka</option>
<option value="211">Sudan</option>
<option value="213">Suriname</option>
<option value="214">Svalbard and Jan Mayen</option>
<option value="215">Swaziland</option>
<option value="216">Sweden</option>
<option value="217">Switzerland</option>
<option value="218">Syrian Arab Republic</option>
<option value="45">Taiwan, Province of China</option>
<option value="219">Tajikistan</option>
<option value="239">Tanzania, United Republic of</option>
<option value="220">Thailand</option>
<option value="180">Timor-Leste</option>
<option value="221">Togo</option>
<option value="222">Tokelau</option>
<option value="223">Tonga</option>
<option value="224">Trinidad and Tobago</option>
<option value="226">Tunisia</option>
<option value="227">Turkey</option>
<option value="228">Turkmenistan</option>
<option value="229">Turks and Caicos Islands</option>
<option value="230">Tuvalu</option>
<option value="231">Uganda</option>
<option value="232">Ukraine</option>
<option value="225">United Arab Emirates</option>
<option value="235">United Kingdom</option>
<option value="240">United States</option>
<option value="166">United States Minor Outlying Islands</option>
<option value="243">Uruguay</option>
<option value="244">Uzbekistan</option>
<option value="157">Vanuatu</option>
<option value="245">Venezuela, Bolivarian Republic of</option>
<option value="204">Viet Nam</option>
<option value="29">Virgin Islands, British</option>
<option value="241">Virgin Islands, U.S.</option>
<option value="246">Wallis and Futuna</option>
<option value="212">Western Sahara</option>
<option value="248">Yemen</option>
<option value="249">Zambia</option>
<option value="208">Zimbabwe</option>
      </select>
    </div>
  </div>
  
  
	<div class="form-group input-group-lg">
    <label for="aboutme" style="color:#000;font-size:17px;">About Me</label>
    <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="aboutme" name="aboutme" placeholder="About Me" value=" <?php if(isset($aboutme)) {echo $aboutme;} ?>">
  </div>
  <h4>Social Link</h4>
  <div class="form-row">
    <div class="form-group col-md-4 input-group-lg">
      <label for="Website" style="color:#000;font-size:17px;">Website</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="url" class="form-control" id="website" name="website" placeholder="Website" value=" <?php if(isset($website)) {echo $website;} ?>">
    </div>
    <div class="form-group col-md-4 input-group-lg">
      <label for="twitter" style="color:#000;font-size:17px;">Twitter</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text"  class="form-control" id="twitter" name="twitter" placeholder="Twitter" value=" <?php if(isset($twitter)) {echo $twitter;} ?>">
	  
    </div>
	 <div class="form-group col-md-4 input-group-lg">
      <label for="facebook" style="color:#000;font-size:17px;">Facebook</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text"  class="form-control" id="facebook" name="facebook" placeholder="Facebook" value=" <?php if(isset($facebook)) {echo $facebook;} ?>">
	 
    </div>
  </div>
  <div class="form-row">
     <div class="form-group col-md-4 input-group-lg">
      <label for="linkedin" style="color:#000;font-size:17px;">Linkedin</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text"  class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin" value=" <?php if(isset($linkedin)) {echo $linkedin;} ?>">
	  
    </div>
    <div class="form-group col-md-4 input-group-lg">
      <label for="youtube" style="color:#000;font-size:17px;">Youtube</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube" value=" <?php if(isset($youtube)) {echo $youtube;} ?>">
    </div>
	 <div class="form-group col-md-4 input-group-lg">
      <label for="instagram" style="color:#000;font-size:17px;">Instagram</label>
      <input style="border:1px solid #000;background:#f5f7fd;" type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" value=" <?php if(isset($instagram)) {echo $instagram;} ?>">
    </div>
  </div>
  
  <center>
  <button type="submit" name="updateStuNameBtn" class="btn" style="border-radius:10px;">update</button>
</center>
</form>
</div>
</div>

   <br><br>
   <br><br>
   
   
   <?php
     include('./stuInclude/footer.php');
     include('../maininclude/footer.php');

   ?>
   
   <!-- // maininclude na folder ma header.php file ma aa file add krvi ,9:42/10:53(add krvu)  and index.php ma pn add krvu 10:10and 10:40
   // feedback nu table banavvu, 13:36 -->
   
   
   
   
	
	
	


