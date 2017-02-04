<!DOCTYPE html>
<html ng-app="step" ng-controller="weekly">
<?php>
include "../header.php"
?>



<?php>
include "../footer.php"
?>
       <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Payment Statement
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    
<div class="page-content">

    <div class="box box-info tbl-box">
        <div class="portlet-body flip-scroll">


            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                    <tr>
                        <th>Id</th>
                        <th>Trips</th>
                        <th>Total</th>
                        <th>Week Ending On</th>
                        <th>Download</th>

                    </tr>
                </thead>
                <tbody>
                          <tr ng-repeat="week in weekly_statement">
                            <td>{{week.id}}</td>
                            <td>{{week.total_trips}}</td>
                            <td>{{week.net_amount}}</td>
                            <td>{{week.week_end_date}}</td>
                            <td>{{week.download}}</td>
                                        </tbody>s
            </table>

            <div align="right" id="paglink"><ul class="pagination">
			<li class="disabled"><span>&laquo;</span></li><li class="active"><span>1</span></li><li><a href="">2</a></li><li><a href="">3</a></li><li><a href="" rel="next">&raquo;</a></li>	</ul>
</div>



        </div>
    </div>
</div>



                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<script>

var step=angular.module("step",[])
	.controller('weekly',function($scope,$http){
		$http.get("http://gaddy.in/control_panel/weekly_statement/getallweeklystatementinfo.php/getweekly")
		.then(function(response){
			$scope.weekly_statement=response.data;
            $scope.length=response.data.length;
		},function(response){
			$scope.error=response.status;
			console.log($scope.error);
		});
	});
</script>
