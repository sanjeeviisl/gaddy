<?php
include 'connect.php';
    
$mobile_no   = isset($_GET['mobile_no']) ? $_GET['mobile_no'] : "8800213260";
$owner_name   = isset($_GET['owner_name']) ? $_GET['owner_name'] : "Sanjay sinha";
$owner_token   = isset($_GET['owner_token']) ? $_GET['owner_token'] : "TTTTTTTTTTTT";

$query = "UPDATE owner_details SET owner_token= '$owner_token' WHERE  mobile_no = '$mobile_no'  AND  owner_name = '$owner_name' ";
$result =mysqli_query($link,$query);

$query = " SELECT * FROM owner_details WHERE  mobile_no = '$phone_id'  AND  owner_name = '$owner_name' ";
$result =mysqli_query($link,$query);

if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$token_no = $row['owner_token'];

if(strcmp($token_no,$owner_token)== 0)
    echo "OK";
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
