<?php
$conn = mysqli_connect("localhost", "root", "", "OurDB");
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);
    echo'Error';}

if(isset($_POST['submit'])){

    $count = count($_FILES['image']['name']);

    for($i = 0; $i < $count ; $i++){
        $name = $_POST['name'];
        $img = $_FILES['image']['name'][$i];  
        $insert = "INSERT into pic(Name,Imgdir) values('$name','$img')";
        
        if($conn->query($insert) === TRUE){

        move_uploaded_file($_FILES['image']['tmp_name'][$i],"pictures/$img");
        }
        else{
        echo "<script> alert('Something Went Wrong')</script>";
        break;

     }

    }
    echo "<script> alert('Images Has Been Uploaded Successfully') </script>";

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Now</title>
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

    h1 {
        text-align: center;
        color: #fff;
        font-weight: normal;
        margin-bottom: 20px;
    }

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
            <a href="index.html">Home</a>
            <a href="Login.html">Login</a>
            <a  href="Signup.html">Signup</a>
            <a class="active" href="Addnow.html">Add Venue</a>
            <a href="option.html">About Us</a>
          </div>
        </div>
    <div class="form-wrap">

            <h1>Add Images</h1>
            <form action='#' enctype="multipart/form-data" method="post">
                <input name="name" type="text" placeholder="                      Enter Venue Name"  required="name"/>
                <input name='image[]' type='file' required="image[]" multiple="multiple"/>
                <input name="submit" type="submit" value="Upload" />
                </form>

    </div>



</body>



</html>