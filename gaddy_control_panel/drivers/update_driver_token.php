<?php
include 'connect.php';
    
$mobile_no   = isset($_GET['mobile_no']) ? $_GET['mobile_no'] : "8800213260";
$driver_name   = isset($_GET['driver_name']) ? $_GET['driver_name'] : "Sanjay sinha";
$driver_token   = isset($_GET['driver_token']) ? $_GET['driver_token'] : "TTTTTTTTTTTT";

$query = "UPDATE my_taxi_driver_details SET driver_token= '$driver_token' WHERE  mobile_no = '$mobile_no'  AND  driver_name = '$driver_name' ";
$result =mysqli_query($link,$query);

$query = " SELECT * FROM driver_details WHERE  mobile_no = '$mobile_no'  AND  driver_name = '$driver_name' ";
$result =mysqli_query($link,$query);

if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$token_no = $row['driver_token'];

if(strcmp($token_no,$driver_token)== 0)
    echo "OK";
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
