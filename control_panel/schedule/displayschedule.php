<!DOCTYPE html>
<html ng-app="step" ng-controller="schedule">
<?php>
include "../header.php"
?>



<?php>
include "../footer.php"
?>
<aside class="right-side">

                <section class="content-header">
                    <h1>
                        Schedule : Total = {{length}}
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    


<div class="box box-info tbl-box">
    <div align="left" id="paglink"></div>
        <table class="table table-bordered">
        <tbody>
            <tr>
                <!--<th>Request ID</th>-->
                <th>Schedule Date</th>
                <th>Schedule Time</th>
                <th>Customer Name</th>
                <th>Customer Time-Zone</th>
                <th>Source Address</th>
                <th>Destination Address</th>
                <th>Promotional Code</th>
                <th>Payment Mode</th>
                
            </tr>
            
                            <tr ng-repeat="sched in schedule">
                    <!--<td>512</td>-->
                    <td>{{sched.date}}</td>
                    <td>{{sched.time}}</td>
                    <td>{{sched.cust_name}} </td>
                    <td>{{sched.cust_zone}}</td>
                    <td>{{sched.source_add}}
,France</td>
                    <td>{{sched.dest_add}}</td>
                    <td>
                        <span class='badge bg-red'>{{sched.promocode}}</span>                    </td>
                    <td>
                        <span class='badge bg-blue'>{{sched.payment_mode}}</span>                    </td>
                </tr>
                            
                    </tbody>
    </table>
    <div align="left" id="paglink"></div>




</div>
</section>
<script>

var step=angular.module("step",[])
	.controller('schedule',function($scope,$http){
		$http.get("http://gaddy.in/control_panel/schedule/getallscheduleinfo.php/getschedule")
		.then(function(response){
			$scope.schedule=response.data;
            $scope.length=response.data.length;
		},function(response){
			$scope.error=response.status;
			console.log($scope.error);
		});
	});
</script>
