<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$password = $_POST['password'];

$sql = "select * from login where email like '$name' and password like '$password'";

$result = $conn->query($sql);

$count =mysqli_num_rows($result);

if($count > 0) {
  
    $row=mysqli_fetch_assoc($result);

   
    $row['message'] = 'Succeess!!';
    echo $row['message'];

    
}else {
    $row['message'] = 'Name or password is incorrect';
    echo $row['message'];

    
    
}

?>
