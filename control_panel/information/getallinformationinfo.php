<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/list', trim($_SERVER['PATH_INFO'],'/list'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_information";
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
        	$foo->id        =$result['Info_id'];
            $foo->info_title      =$result['Info_title'];
            $foo->action     =$result['Info_action'];

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