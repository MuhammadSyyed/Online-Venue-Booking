<?php
$Name = $_POST['name'];
$Username = $_POST['user'];
$Email = $_POST['email'];
$Phone = $_POST['phone'];
$Password = $_POST['pass'];
$CNIC = $_POST['cnic'];



if (isset($_POST['Submit'])) {
 	
 	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "OurDB";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

    else {
     $SELECT = "SELECT Username From user Where Username = ? Limit 1";
     $INSERT = "INSERT Into user(Name,Username,Email,Phone,Password,CNIC) values(?, ?, ? ,?, ?, ?)";
     //Prepare statement
     

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Username);
     $stmt->execute();
     $stmt->bind_result($Username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     

     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssisi", $Name,$Username,$Email, $Phone,$Password,$CNIC);
      $stmt->execute();
      header('location: Search.html');
     }
     else {
        echo "<script> alert('Someone has already registered using this username') </script>";
     }
     $stmt->close();
     $conn->close();
    }
} 

else {
 echo "All field are required";
 die();
}
?>