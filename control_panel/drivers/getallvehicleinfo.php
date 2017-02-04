<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/list', trim($_SERVER['PATH_Documents'],'/list'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_vehicle_details";
$query_run= mysqli_query($link,$query);
$rows     = mysqli_num_rows($query_run);
$arr      =array();
if($query_run)
{
	if($rows>0)
	{
         
        while($result=mysqli_fetch_array($query_run, MYSQLI_ASSOC))
        {
        	$foo = new stdClass();
        	$foo->id            =     $result['id'];
            $foo->vehicle_id    =     $result['vehicle_id'];
            $foo->provider_id   =     $result['provider_id'];
            $foo->vehicle_name  =     $result['vehicle_name'];
            $foo->vehicle_number     =     $result['vehicle_number'];
            $foo->vehicle_model    =     $result['vehicle_model'];
            $foo->vehicle_type   =     $result['vehicle_type'];
            $foo->vehicle_sub_type       =     $result['vehicle_sub_type'];
        $foo->registration_proof   =     $result['registration_proof'];
            $foo->vehicle_id_proof      =     $result['vehicle_id_proof'];
            $foo->vehicle_photo         =     $result['vehicle_photo'];
     $foo->location_latitude    =     $result['location_latitude'];
     $foo->location_longitude   =     $result['location_longitude'];

           array_push($arr, $foo);

        } 

        $data=json_encode($arr);
        echo $data;

    }
}
else
{
echo mysqli_connect_error;
}

?>