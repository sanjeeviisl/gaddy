<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_request";
$query_run= mysqli_query($link,$query);
$rows     = mysqli_num_rows($query_run);
$arr=array();
if($query_run)
{
	if($rows>0)
	{
         
        while($result=mysqli_fetch_array($query_run, MYSQLI_ASSOC))
        {
        	$foo = new stdClass();
        	$foo->id             =$result['Req_id'];
        	$foo->cust_name      =$result['Customer_name'];
        	$foo->provider       =$result['Provider'];
        	$foo->datetime       =$result['Date/Time'];
        	$foo->req_status     =$result['Req_status'];
        	$foo->req_amount     =$result['Req_amount'];
        	$foo->payment_mode   =$result['Payment_mode'];
            $foo->payment_status =$result['Payment_status'];
        	$foo->req_action     =$result['Req_action'];
        	
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