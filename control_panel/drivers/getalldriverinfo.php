<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/list', trim($_SERVER['PATH_Documents'],'/list'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_driver_details";
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
            $foo->driver_id     =     $result['driver_id'];
            $foo->provider_id   =     $result['provider_id'];
            $foo->name          =     $result['driver_name'];
            $foo->mobile_no     =     $result['mobile_no'];
            $foo->vehicle_no    =     $result['vehicle_no'];
            $foo->father_name   =     $result['father_name'];
            $foo->address       =     $result['address'];
        $foo->driving_licence   =     $result['driving_licence'];
            $foo->address_proof =     $result['address_proof'];
            $foo->id_proof      =     $result['id_proof'];
            $foo->photo         =     $result['photo'];
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