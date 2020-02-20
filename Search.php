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
        top: 90%;
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
            <a class="active" href="Search.html">Search</a>
            <a  href="Booknow.html">Book Now</a>
            <a  href="Record.html">Record</a>
            <a href="Login.html">Logout</a>
          </div>
        </div>

<table cellpadding="10px" style="background-color:black;font-size: 30px;
	font-family: 'Open Sans', sans-serif">
 <tr>
   <th> Search Result </th>
 </tr>
</table>
 <table>
 <tr>
  <th>Name</th>
  <th>Location</th> 
  <th>Capacity</th>
  <th>Price</th>
  <th>Phone</th>
 </tr>
<?php
$Access = $_POST['Location'];
 $conn = mysqli_connect("localhost", "root", "", "OurDB");
  // Check connection


  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT Name,Location,Capacity,Price,Phone FROM venue where Location = '$Access'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Location"] . "</td><td>"
. $row["Capacity"]. "</td><td>". $row["Price"]. "</td><td>". $row["Phone"]. "</td></tr>";
}
echo "</table>";
} else { echo "<tr><td>" . 'Not Found'. "</td><td>" . '-' . "</td><td>"
.'-'. "</td><td>".'-'. "</td><td>".'-'. "</td></tr>"; }
$conn->close();

?>
</table>
</body>
<div class="form-wraps">
        <link rel="stylesheet" type="text/css" href="style.css">
        <form action= "Search.html">
        <input style="background-color: coral;" type="submit" value="Back" name="Back">
        </form>
        <form action = "show.html">
        <input style="background-color: coral;" type="submit" value="Search Images" name="Back">
    </form>
</div>
</html>