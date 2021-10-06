<?php
header('Content-Type: application/json');
$array =  array();

if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["licenseNo"]) && isset($_POST["categoryId"]))
{
require"connection.php";
require("validate.data.php");

$categoryId = validate($_POST["categoryId"]);
$fname      = validate($_POST["fname"]);
$lname      = validate($_POST["lname"]);
$phone      = validate($_POST["phone"]);
$licenseNo  = validate($_POST["licenseNo"]);
$date       = date("Y-m-d");

mysqli_query($connection,"INSERT INTO `drivers` (`driverId`, `driverFname`, `driverLname`, `driverPhone`, `driverDlincense`, `driverRegDate`, `driverStatus`) 
VALUES (NULL, '$fname', '$lname', '$phone', '$licenseNo', '$date', 'active')")or die(mysqli_error($connection));

$array = array(
        "status"=>"success",
        "message"=>"Successfully registered!",);
        
        print(json_encode($array,TRUE));
        
}else{
     $array = array(
        "status"=>"error",
        "message"=>"incomplete information",);
        
        print(json_encode($array,TRUE));
}