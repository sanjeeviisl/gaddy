<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/list', trim($_SERVER['PATH_INFO'],'/list'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_provider";
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
        	$foo->id        =$result['Pro_id'];
        	$foo->name      =$result['Pro_name'];
        	$foo->email     =$result['Pro_email'];
        	$foo->phone     =$result['Pro_phone'];
        	$foo->photo     =$result['Pro_photo'];
        	$foo->bio       =$result['Pro_bio'];
        	$foo->tot_req   =$result['Pro_tot_req'];
        	$foo->accept_rat=$result['Pro_accept_rate'];
        	$foo->status     =$result['Pro_status'];
        	
        	$foo->action    =$result['pro_action'];

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