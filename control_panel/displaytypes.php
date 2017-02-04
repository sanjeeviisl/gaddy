<!DOCTYPE html>
<html ng-app="step" ng-controller="types">
<?php>
include "header.php"
?>



<?php>
include "footer.php"
?>

            <!-- Right side column. Contains the navbar and content of the page -->
         <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Provider Types
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    
<a id="addtype" href="http://taxinew.taxinow.xyz/admin/provider-type/edit/0"><input type="button" class="btn btn-info btn-flat btn-block" value="Add New Provider Type"></a>


<br>


<div class="col-md-6 col-sm-12">

    <div class="box box-danger">

        <form method="get" action="http://taxinew.taxinow.xyz/admin/sortpvtype">
            <div class="box-header">
                <h3 class="box-title">Sort</h3>
            </div>
            <div class="box-body row">

                <div class="col-md-6 col-sm-12">
                    <select class="form-control" id="sortdrop" name="type">
                        <option value="provid"  id="provid">Provider Type ID</option>
                        <option value="pvname"  id="pvname">Provider Name</option>
                    </select>
                    <br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <select class="form-control" id="sortdroporder" name="valu">
                        <option value="asc"  id="asc">Ascending</option>
                        <option value="desc"  id="desc">Descending</option>
                    </select>
                    <br>
                </div>

            </div>

            <div class="box-footer">

                <button type="submit" id="btnsort" class="btn btn-flat btn-block btn-success">Sort</button>


            </div>
        </form>

    </div>
</div>

<div class="col-md-6 col-sm-12">

    <div class="box box-danger">

        <form method="get" action="http://taxinew.taxinow.xyz/admin/searchpvtype">
            <div class="box-header">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body row">

                <div class="col-md-6 col-sm-12">

                    <select id="searchdrop" class="form-control" name="type">
                        <option value="provid" id="provid">Provider Type ID</option>
                        <option value="provname" id="provname">Provider Name</option>
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

</div>


                <div class="box box-info tbl-box">
                     <div align="left" id="paglink"></div>
                <table class="table table-bordered">
                                <thead>
                                        <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Base-Price-distence</th>
                                                <th>Base-price</th>
                                                <th>Price-Unit-Distence</th>
                                                <th>Price-Unit-Time</th>
                                                
                                                <th>Max-Space</th>

                                                <th>Visible</th>


                                                <th>Actions</th>

                                        </tr>\
                                    </thead>
                                    <tbody ng-repeat="type in types">
                                                        <tr>

                                <td>{{type.id}}</td>
                                <td>{{type.name}}</td>
                                <td>{{type.basepricedistance}}</td>
                                <td>{{type.baseprice}}</td>
                                <td>{{type.priceunitdistance}}</td>
                                <td>{{type.priceunittime}}</td>
                                <td>{{type.maxspace}}</td>
                                <td> <span class='badge bg-red'>{{type.visible}}</span></td>

                                <td><a id="edit" href="#"><input type="button" class="btn btn-success" value="Edit"></a>
                                <a id="delete" href=""><input type="button" disabled class="btn btn-danger" value="Delete"></a></td>
                            </tr>
									
                                                </tbody>
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
	.controller('types',function($scope,$http){
		$http.get("http://gaddy.in/control_panel/types/getalltypesinfo.php")
		.then(function(response){
			$scope.types=response.data;
		},function(response){
			$scope.error=response.status;
		});
	});
       </script>