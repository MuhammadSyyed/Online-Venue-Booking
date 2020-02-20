<?php
$Username = $_POST['user'];
$CNIC = $_POST['cnic'];
$Phone = $_POST['phone'];
$Venue = $_POST['venue'];
$Strength = $_POST['pop'];
$Payment = $_POST['pay'];
$Date = $_POST['date'];
$Method = "Rand";



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
     $check = "SELECT Name from venue Where Name = '$Venue'"; 
     $SELECT = "SELECT Venue From bookings Where Venue = ? Limit 1";
     $SELEC = "SELECT Date From bookings Where Date = ? Limit 1";
     $INSERT = "INSERT Into bookings (Username,CNIC,Phone,Venue,Strength,Payment,Date,Method) values(?, ?, ? ,?, ? , ?, ?,?)";
     //Prepare statement
     




     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Venue);
     $stmt->execute();
     $stmt->bind_result($Venue);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     $stm = $conn->prepare($SELEC);
     $stm->bind_param("s", $Date);
     $stm->execute();
     $stm->bind_result($Date);
     $stm->store_result();
     $rnm = $stm->num_rows;
     

     if ($rnum==0||$rnm==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("siisiiss",$Username,$CNIC,$Phone,$Venue,$Strength,$Payment,$Date,$Method);
      $stmt->execute();
      header('location: Payment.html');
     }
     else {
      echo "<script> alert('Venue has already been book for this date.Please Choose another date') </script>";
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