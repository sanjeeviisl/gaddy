<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_reviews";
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
        	$foo->id            = $result['id'];
        	$foo->cust_name      =$result['Customer_name'];
        	$foo->pro_name       =$result['Pro_name'];
        	$foo->rating         =$result['Rating'];
        	$foo->datetime       =$result['Date/Time'];
        	$foo->comment        =$result['Comment'];
        	$foo->action         =$result['Review_action'];
           
        	
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