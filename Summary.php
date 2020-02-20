<!DOCTYPE html>
<html>
<head>
    <title>Booking</title>
    <link rel="stylesheet" type="text/css" href="style.css">
		 <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
		  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
</head>

<style>

    * {
        margin: 0;
        padding-top: 0;
    }

    body {
        background-image: url('Signup.jpg');
        background-size: 100% 110%;
        width: 100%;
        height: 100vh;
    }
    .form-wrap {
        width: 390px;
        background: rgb(0, 0, 0,.6);
        padding: 40px 20px;
        box-sizing: border-box;
        border-radius: 25px;

        position: fixed;
        left: 50%;
        top: 55%;
        transform: translate(-50%, -50%);
    }
    
    
    .form-wraps {
        width: 390px;
        background: rgb(0, 0, 0,0);
        padding: 20px 20px;

        position: fixed;
        left: 50%;
        top: 65%;
        transform: translate(-50%, -50%);
    }
    h1 {
        text-align: center;
        color: #fff;
        font-weight: normal;
        margin-bottom: 20px;
    }
    table{
   border-collapse: none;

   width: 80%;
   color: white;
   background-color: rgba(0,0,0,0.5);margin: 30px 150px;
   font-family: monospace;
   font-size: 20px;
   text-align: center;
     } 
  th {
   background-color: rgba(0,0,0,0.5);
   color: white;    }
  tr:{background-color: rgba(0,0,0,0.5);}

    input {
        width: 100%;
        background: none;
        border: 1px solid #fff;
        padding: 6px 15px;
        box-sizing: border-box;
        border-radius: 25px;
        margin-bottom: 20px;
        font-size: 16px;
        color: #fff;
    }

        input[type="button"] {
            background: #bac675;
            border: 0;
            cursor: pointer;
            color: #3e3d3d;
        }

            input[type="button"]:hover {
                background: #a4b15c;
                transition: .6s;
            }
            ::placeholder {
        color: #fff;
    }
</style>

<body>

    <div class="menu">
        <div class="leftmenu">
            <h4> SELECT-ONE </h4>
        </div>
        <div class="topnav">
            <a href="Search.html">Search</a>
            <a  href="Booknow.html">Book Now</a>
            <a  class="active" href="Reccord.html">Record</a>
            <a href="Login.html">Logout</a>
          </div>
        </div>

<table cellpadding="10px" style="background-color:black;font-size: 40px;
	font-family: 'Open Sans', sans-serif">
 <tr>
   <th> Booking Summary </th>
 </tr>
</table>
<?php

$Access = $_POST['user'];
$Choice = $_POST['choose'];
 $conn = mysqli_connect("localhost", "root", "", "OurDB");
  // Check connection


  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);
  } 

  $que = "UPDATE bookings SET Method = '$Choice' order by B_ID DESC";
  $conn->query($que);

  $sql = "SELECT B_ID,Username,Venue,Strength,Payment,Method,Date FROM bookings where Username = '$Access' order by B_ID DESC LIMIT 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<table><tr><td>Booking ID</td><td>" . $row["B_ID"]. "</td></tr><tr><td>Username</td><td>" . $row["Username"]. "</td></tr><tr><td>Venue</td><td>" . $row["Venue"] . "</td></tr><tr><td>Capacity</td><td>"
. $row["Strength"]. "</td></tr><tr><td>Payment(PKR)</td><td>". $row["Payment"]. "</td></tr><tr><td>Method</td><td>". $row["Method"]."</td></tr><tr><td>Date</td><td>". $row["Date"]."</td></tr>";
}
echo "</table>";
} else { echo "<table>
 <tr>
   <th> **Your username is incorrect** </th>
 </tr>
</table>"; }
$conn->close();

?>
</table>
</body>
<div class="form-wraps">
        <link rel="stylesheet" type="text/css" href="style.css">
        <form action="Search.html" >
        <input style="background-color: coral;" type="submit" value="Confirm" name="Submit">
        </form>

</div>
</html>