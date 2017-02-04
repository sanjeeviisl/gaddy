<?php
include 'connect.php';
    
$phone_id   = isset($_POST['owner_phone']) ? $_POST['owner_phone'] : "1234567890";
$owner_name   = isset($_POST['owner_name']) ? $_POST['owner_name'] : "naman";
$owner_email   = isset($_POST['owner_email']) ? $_POST['owner_email'] : "";
$owner_photo   = isset($_POST['owner_photo']) ? $_POST['owner_photo'] : "";
$owner_id   = isset($_POST['owner_id']) ? $_POST['owner_id'] : "";

//$query = " SELECT * FROM owner_details WHERE  mobile_no = '$phone_id'  AND  owner_name = '$owner_name' ";

$query = " SELECT * FROM owner_details WHERE  mobile_no = '$phone_id'  ";

$result =mysqli_query($link,$query);
if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$mobile_no = $row['mobile_no'];
 
//echo $row['mobile_no'] ;

if(strcmp($mobile_no,$phone_id)== 0)
   {
    $query = "UPDATE owner_details SET owner_email= '$owner_email',owner_name= '$owner_name',owner_photo= '$owner_photo',owner_id= '$owner_id' WHERE  mobile_no = '$mobile_no' ";
    $result =mysqli_query($link,$query);
    echo "OK";
    }
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
