<?php
require 'config.php';
error_reporting(0);
session_start();
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
    </head>
    <body>


    <h1 style="padding-left: 15em ; color: #073D85;">MT Transport Incident Action System</h1>
    <img src="images/bus.jpg" alt="Logo" height="350px" width="650px" style="padding-left: 27em" >

    <div style="padding-left: 29em">
        <div style = "width:600px; border: solid 1px #333; " >
            <div style = "background-color:#333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">
                <span>Enter your login credentials.NOTE that your PASSWORD is case sensitive</span><br>
                <form action = "" method = "post" style="padding-left: 5em">

                    <br><br>  <label>Username         </label>&nbsp;&nbsp;<input type = "text" name = "username" class = "box"/><br /><br />
                    <label>Password          </label>&nbsp;&nbsp;&nbsp;<input type = "password" name = "password" class = "box" /><br/><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type = "submit" value = " Submit "/><br />
                </form>



            </div>

        </div>

    </div>


    <?php

    include("../config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form

        $myusername = mysqli_real_escape_string($conn, $_POST['username']);
        $mypassword = mysqli_real_escape_string($conn, $_POST['password']);
        $active = 'Active';
        $sql = "SELECT UserID,Name,Surname,Type FROM user WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if ($count == 1) {

            $_SESSION['login_user'] = $myusername;
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['UserName'] = $row['Name'] . " " . $row['Surname'];

            switch ($row['Type'])
            {
                case "Admin" : {header("location: home.php");};
                break;
                case "Association" : {header("location: association/associationhome.php");};
                break;
                case "Owner" : {header("location: owner/ownerhome.php");};
                break;
            }


        } else {
            $error = "Your Login Name or Password is invalid";
            echo '<script language="javascript">';
            echo 'alert("Your Login Name or Password is invalid")';
            echo '</script>';


        }
    }
    ?>
</body>
</html>