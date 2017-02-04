<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/list', trim($_SERVER['PATH_Documents'],'/list'));
include "connect.php";

$query    = "SELECT * FROM driver_details";
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
            $foo->owner_id   =     $result['owner_id'];
            $foo->driver_name          =     $result['driver_name'];
            $foo->mobile_no     =     $result['mobile_no'];
            $foo->vehicle_no    =     $result['vehicle_no'];
            $foo->driving_licence_no   =     $result['driving_licence_no'];
            $foo->address_proof_no =     $result['address_proof_no'];
            $foo->id_proof_no      =     $result['id_proof_no'];
            $foo->driver_photo       =     $result['driver_photo'];
	    $foo->driver_token       =     $result['driver_token'];
	     $foo->extra_info       =     $result['extra_info'];

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