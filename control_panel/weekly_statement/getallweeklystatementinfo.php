<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
include "connect.php";

$query     = "SELECT * FROM my_taxi_weekly_statment";
$query_run = mysqli_query($link,$query);
$rows      = mysqli_num_rows($query_run);
$arr=array();
if($query_run)
{
    if($rows>0)
    {
         
        while($result=mysqli_fetch_array($query_run, MYSQLI_ASSOC))
        {
            $foo = new stdClass();
            $foo->id              =$result['week_id'];
            $foo->total_trips     =$result['total_trips'];
            $foo->net_amount      =$result['Net_amount'];
            $foo->week_end_date     =$result['Week_end_date'];
            $foo->download   =$result['download'];
            
           array_push($arr, $foo);

        } 

        $data=json_encode($arr);
        echo $data;

    }
}
else
{
    $a=new stdClass();
    $a->status=0;
    $a->err_msg="error_happend";

echo json_encode($a);
}

?>