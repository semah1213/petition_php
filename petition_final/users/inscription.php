<?php 
require('db.php');

?>
<?php 
if(isset($_POST['SUBMIT']))
{
	date_default_timezone_set('Africa/Tunis');
	$time = time();
	$dateTime = strftime('%Y-%m-%d %H:%M:%S', $time);
    $cin = mysqli_real_escape_string($db,$_POST['cin']);
    $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
	$phone = mysqli_real_escape_string($db,$_POST['phone']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);
    $image = $_FILES['postFile']['name'];
    $imageDirectory = "Upload/Image/" . basename($_FILES['postFile']['name']);
	if(empty($cin) || empty($password) || empty($confirmpassword) || empty($firstname) || empty($lastname) || empty($email) || empty($phone)){
		echo '<script>alert("All fields must be fill out.")</script>';
		header("Location: inscription.php");
	}
	else{
		$sql = "INSERT INTO inscription (registerdate, cin, firstname, lastname,email,phone, password,image, added_by) VALUES ('$dateTime', '$cin', '$firstname', '$lastname', '$emai', '$phone', '$password', '$image')";
		$execution = mysqli_query($db, $sql) or die(mysqli_error($db));
		if($execution){
			echo '<script>alert("registered")</script>';
			header("Location: dashboard.php");
		}
		else{
			echo '<script>alert("SOMETHING WENT WRONG PLEASE TRY AGAIN")</script>';
			header("Location: inscription.php");
		}
	}
}

?>
<!doctype html ng-app>
 <html>
 <head>
  <meta charset="utf-8"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>inscription</title>
  <!-- Bootstrap Files -->
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Stylesheet -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/ca0905f6a5.js"></script>
	<!-- TechSavvy Font -->
	<link href="https://fonts.googleapis.com/css?family=Saira+Stencil+One&display=swap" rel="stylesheet">
	<!-- Headings Blog -->
	<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
	<!-- Paragraph Blog -->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

 </head>
 <body>
        <div class="about">
				<div class="container">
					<div class="row contact-section">
						<div class="col-md-7">
							<h5 class="contactHeading">Register</h5>

							<form method="POST" action="inscription.php" name="frm">
                             <fieldset>
                                <div class="form-group">
									<input type="text" name="cin" id="cin" class="form-control" placeholder="CIN" ng-model="user.cin" required> <span style="color:red;font-size:14px;" ng-show="frm.cin.$error.required">Required</span>
								</div>
                                <div class="form-group">
									<input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" ng-model="user.firstname" required> <span style="color:red;font-size:14px;" ng-show="frm.firstname.$error.required">Required</span>
								</div>
                                <div class="form-group">
									<input type="text" name="last Name" id="lastname" class="form-control" placeholder="Last Name" ng-model="user.lastname" required> <span style="color:red;font-size:14px;" ng-show="frm.lastname.$error.required">Required</span>
								</div>
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email" ng-model="user.email" required> <span style="color:red;font-size:14px;" ng-show="frm.email.$error.required">Email Please</span> <span style="color:red;font-size:14px;" ng-show="frm.email.$error.email">Email not in a proper format</span>
								</div>
								<div class="form-group">
									<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone No." ng-model="user.phone" ng-minlength = "10" ng-maxlength = "12" required> <span style="color:red;font-size:14px;" ng-show="frm.phone.$error.minlength">Phone Number less than 10</span> <span style="color:red; font-size:14px;" ng-show="frm.phone.$error.required">Phone Number please</span> <span style="color:red;font-size:14px;" ng-show="frm.phone.$error.maxlength">Phone Number too long</span>
								</div>
                                <div class="form-group">
									<input type="password" name="password" id="password" class="form-control" placeholder="Password" ng-model="password" required> <span style="color:red;font-size:14px; " ng-show="admin.password.$error.required">Required</span>
								</div>
								<div class="form-group">
									<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" ng-model="confirmpassword" compare-to="password" required> <span style="color:red;font-size:14px;" ng-show="admin.confirmpassword.$error.required">Required</span> <span style="color:red;font-size:14px;" ng-show="admin.confirmpassword.$error.compareTo">Password do not match</span>
								</div>
                                <div>
                                    <label for="image">Insert your image</label>
                                    <input type="file" id="image" name="image" accept="image/png, image/jpeg" required >
                                </div>
								<div class="form-group">
									<input type="submit" name="submit" value="Register" id="mysubmit" class="btn btn-info submit" ng-disabled = "frm.$invalid">
								</div>
                              </fieldset>
							</form>
						</div>
                        <script type="text/javascript">

 function IsValidName(firstname,lastname){
    if((firstname == "")&&(lastname == "")){
        return false;
    }
    else{
        return true;
    }
 }
 function IsValidcin(firstname,lastname){
    if((cin.length!=8) || (is_nan(cin) == true) ){
        return false;
    }
    else{
        return true;
    }
 }

 function IsValidEmail(email){
    //Check minimum valid length of an Email.
    if (email.length <= 2) {
        return false;
    }
    //If whether email has @ character.
    if (email.indexOf("@") == -1) {
        return false;
    }

    var parts = email.split("@");
    var dot = parts[1].indexOf(".");
    var len = parts[1].length;
    var dotSplits = parts[1].split(".");
    var dotCount = dotSplits.length - 1;


    //Check whether Dot is present, and that too minimum 1 character after @.
    if (dot == -1 || dot < 2 || dotCount > 2) {
        return false;
    }

    //Check whether Dot is not the last character and dots are not repeated.
    for (var i = 0; i < dotSplits.length; i++) {
        if (dotSplits[i].length == 0) {
            return false;
        }
    }
 };

 function IsValidPhone(phone){
    if((phone.length > 11) || (phone.length < 8)){
        return true;
    }
    else{
        return false;
    }
 }
 function IsValidpassword(password){
    if(message == ""){
        return false;
    }
    else{
        return true;
    }
 }
 function IsValidFile(file){
			var validextension = new Array("jpg", "png", "jpeg", "gif");
			var fileextension = file.split('.').pop().toLowerCase();

			for (var i = 0; i <= validextension.length; i++) {
				if (validextension[i] == fileextension) {
					return true;
				}
			}
			return false;
		}
 function ValidRegister(){
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var file = document.getElementById("postfile").value;
    var password = document.getElementById("password").value;
    
    if(!IsValidName(firstname)){
        alert("First Name Required");
    }
    if(!IsValidName(lastname)){
        alert("Last Name Required");
    }
    if(!IsValidEmail(email)){
        alert("Invalid Email");
    }
    if(!IsValidPhone(phone)){
        alert("Invalid Phone Number");
    }
    if(!IsValidpassword(password)){
        alert("password required");
    }
    
    else{
        alert("registered !");
    } 
  }
 </script>
    <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
   </html>
