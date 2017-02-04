<?php
include 'connect.php';
    
$phone_id   = isset($_POST['driver_phone']) ? $_POST['driver_phone'] : "8800213260";
$name_id   = isset($_POST['driver_name']) ? $_POST['driver_name'] : "exeutive_name";
$mail_id   = isset($_POST['driver_mail']) ? $_POST['driver_mail'] : "executive_mail";
$photo_id   = isset($_POST['driver_photo']) ? $_POST['driver_photo'] : "executive_photo";

$query = " SELECT * FROM driver_details WHERE  mobile_no = '$phone_id' ";

$result =mysqli_query($link,$query);
if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$mobile_no = $row['mobile_no'];
$new_driver_id =  $name_id.$phone_id;
 
//echo $row['mobile_no'] ;

if(strcmp($mobile_no,$phone_id)== 0)
{
	$query = "UPDATE driver_details
			SET driver_id = '$new_driver_id', driver_name = '$name_id', driver_mail = '$mail_id', driver_photo = '$photo_id'
			WHERE mobile_no = '$mobile_no'";

	$query_run = mysqli_query($link,$query);
	if( $query_run)
      echo 'OK';
    else
		echo 'NOT_UPDATED';
}
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
