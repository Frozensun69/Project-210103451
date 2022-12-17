<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);}


$name = $_POST['nname'];
$password = $_POST['npassword'];


$user_check_query = "SELECT * FROM login WHERE email='$name' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$count = mysqli_fetch_assoc($result);

$errors=array();
if (empty($name)) { array_push($errors, "Email is required"); }
if (empty($password)) { array_push($errors, "Password is required"); }
 
if($count){
if ($count['email']=== $name) {
   array_push($errors, "email already exists");}}
if(count($errors)==0) {
  $sql = "INSERT INTO login (email,password) VALUES ('$name','$password')";
  $result = $conn->query($sql);
    $row['message'] = 'Succeess!!';
    echo $row['message'];   
}
else {
    $row['message'] = 'already exists';
    echo $row['message'];   
}

?>