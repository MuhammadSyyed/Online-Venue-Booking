<?php
$Name = $_POST['name'];
$Location = $_POST['loc'];
$Phone = $_POST['phone'];
$Capacity = $_POST['cap'];
$CNIC = $_POST['cnic'];
$Price = $_POST['price'];


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
     $SELECT = "SELECT Name From venue Where Name = ? Limit 1";
     $INSERT = "INSERT Into venue(Name,Location,Phone,Capacity,CNIC,Price) values(?, ?, ? ,? ,?, ? )";
     //Prepare statement
    

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Name);
     $stmt->execute();
     $stmt->bind_result($Name);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     

     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssiiii", $Name,$Location,$Phone, $Capacity,$CNIC,$Price);
      $stmt->execute();
      header('location: pictures.php');
     }
     else {
      echo "***********************Someone already register using this Username**********************";
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