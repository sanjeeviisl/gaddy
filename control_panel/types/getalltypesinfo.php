<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
include "connect.php";

$query    = "SELECT * FROM my_taxi_types";
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
        	$foo->id             =$result['Types_id'];
        	$foo->name      =$result['Types_name'];
        $foo->basepricedistance  =$result['Base_price_distance'];
        	$foo->baseprice       =$result['Base_price'];
        	$foo->priceunitdistance     =$result['Price_Unit_distance'];
        	$foo->priceunittime     =$result['Price_Unit_time'];
        	$foo->maxspace   =$result['Max_space'];
            $foo->visible =$result['Visible'];
        	$foo->action     =$result['Type_action'];
        	
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