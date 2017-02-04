<!DOCTYPE html>
<html ng-app="step" ng-controller="information">
<?php>
include "header.php"
?>



<?php>
include "footer.php"
?>
 <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Information Pages
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    
<a id="addinfo" href="http://taxinew.taxinow.xyz/admin/information/edit/0"><input type="button" class="btn btn-info btn-flat btn-block" value="Add New Page"></a>

<br>


                    <div class="box box-danger">

                       <form method="get" action="http://taxinew.taxinow.xyz/admin/searchinfo?0">
                                <div class="box-header">
                                    <h3 class="box-title">Filter</h3>
                                </div>
                                <div class="box-body row">

                                <div class="col-md-6 col-sm-12">

                                <select id="searchdrop" class="form-control" name="type">
                                    <option value="infoid" id="infoid">ID</option>
                                    <option value="infotitle" id="infotitle">Title</option>
                                </select>

                                               
                                    <br>
                                </div>
                                <div class="col-md-6 col-sm-12">

                                    <input class="form-control" type="text" name="valu" id="insearch" placeholder="keyword"/>
                                    <br>
                                </div>

                                </div>

                                <div class="box-footer">

                                  
                                        <button type="submit" id="btnsearch" class="btn btn-flat btn-block btn-success">Search</button>

                                        
                                </div>
                        </form>

                    </div>



                <div class="box box-info tbl-box">
                    <div align="left" id="paglink"></div>
                <table class="table table-bordered">
                                <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="info in information">
                                    <tr>
                                    	<td>{{info.id}}</td>
                                    	<td>{{info.info_title}}</td>
                                    	<td>{{info.action}}</td>


                                    </tr>
                                                        
                </table>

                <div align="left" id="paglink"></div>

                </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
      


        
    </body>
    <!--/ END Body -->
</html>
<script>
 var step=angular.module("step",[])
	.controller('information',function($scope,$http){
		$http.get("http://gaddy.in/control_panel/information/getallinformationinfo.php")
		.then(function(response){
			$scope.information=response.data;
		},function(response){
			$scope.error=response.status;
		});
	});

</script>