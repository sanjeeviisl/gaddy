<?php
include 'connect.php';
    
$phone_id   = isset($_POST['owner_phone']) ? $_POST['owner_phone'] : "1234567890";
$owner_name   = isset($_POST['owner_name']) ? $_POST['owner_name'] : "AAAAAAAAAA";

$query = " SELECT * FROM my_taxi_owner_details WHERE  mobile_no = '$phone_id'  AND  owner_name = '$owner_name' ";

$result =mysqli_query($link,$query);
if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$mobile_no = $row['mobile_no'];
 
//echo $row['mobile_no'] ;

if(strcmp($mobile_no,$phone_id)== 0)
    echo "OK";
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
