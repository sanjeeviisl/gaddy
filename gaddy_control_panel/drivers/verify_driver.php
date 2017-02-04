<?php
include 'connect.php';
    
$mobile_no   = isset($_POST['$mobile_no']) ? $_POST['mobile_no'] : "9876543210";

$query = " SELECT * FROM driver_details WHERE  mobile_no = '$mobile_no' ";

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
