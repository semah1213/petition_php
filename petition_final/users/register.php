+<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petitionisg";
date_default_timezone_set('Africa/Tunis');
$time = time();
$dateTime = strftime('%Y-%m-%d %H:%M:%S', $time);
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$name = $_POST["name"];
$famname = $_POST["famname"];
$role = $_POST["role"];
$image = "/";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//check if already used
$sql = "SELECT email FROM inscription where email='".$email."';";
$result = $conn->query($sql);
if($result->num_rows>0){
$_SESSION["errors"] = "there is a user with this email";
header('Location: http://localhost/petitionisg/inscription1.php');
}



    $image = $_FILES["image"]["name"];

    $tempname = $_FILES["image"]["tmp_name"];

        $folder = "../uploads/".$image;



        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

            $msg = "Failed to upload image";

    }



$sql = "INSERT INTO user (email, pwd)
VALUES ('".$email."', '".$pwd."');";

if ($conn->query($sql) === TRUE) {
  $sql = "SELECT email FROM inscription where email='".$email."';";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  $_SESSION["email"] = $row["email"];
  $sql = "INSERT INTO inscription (registerdate, firstname, lastname,email,phone, password,image, added_by) VALUES ('$dateTime', '$cin', '$firstname', '$lastname', '$emai', '$phone', '$password', '$image')";

  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("registered")</script>';
    header("Location: dashboard.php");
  }
  else {
    echo '<script>alert("SOMETHING WENT WRONG PLEASE TRY AGAIN")</script>';
    header("Location: inscription1.php");
  }

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>