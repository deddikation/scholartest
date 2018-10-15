<?php

//require 'config.php';

//$json=$_GET ['json'];
$json = file_get_contents('php://input');
$obj = json_decode($json);
//echo $json;

//Save
$con = mysqli_connect("localhost","kzdunudd_root","root1234@","kzdunudd_dbScholar") or die("Error connecting");

 $q=" INSERT INTO `Incident`( `names`, `cellNo`, `date`, `desc`, `key`, `regNo`, `time`, `imgLoc`, `uid`, `location`, `status`, `feedback`, `escalate`, `type_id`) VALUES ('".$obj->{'names'}."', '".$obj->{'cellNo'}."', '".$obj->{'date'}."', '".$obj->{'desc'}."', '".$obj->{'key'}."', '". $obj->{'regNo'}."', '".$obj->{'time'}."', '".$obj->{'imgLoc'}."', '".$obj->{'uid'}."', '".$obj->{'location'}."', '".$obj->{'status'}."', '".$obj->{'feedback'}."', '".$obj->{'escalate'}."', '".$obj->{'type'}."')";




 mysqli_query($con,$q) or die(mysqli_error($con));
$id = mysqli_insert_id($con); 
mysqli_close($con);
//
  //$posts = array($json);
  $posts = array(1);
    header('Content-type: application/json');
    echo json_encode($id); 


?>