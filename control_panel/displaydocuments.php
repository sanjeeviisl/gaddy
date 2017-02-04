<!DOCTYPE html>
<html ng-app="step" ng-controller="documents">
<?php>
include "header.php"
?>



<?php>
include "footer.php"
?>
<aside class="right-side">

                <section class="content-header">
                    <h1>
                        Documents
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    
<a id="adddoc" href="http://taxinew.taxinow.xyz/admin/document-type/edit/0"><input type="button"  class="btn btn-info btn-flat btn-block" value="Add New Document Type"></a>


<br>


                    <div class="box box-danger">

                       <form method="get" action="http://taxinew.taxinow.xyz/admin/searchdoc">
                                <div class="box-header">
                                    <h3 class="box-title">Filter</h3>
                                </div>
                                <div class="box-body row">

                                <div class="col-md-6 col-sm-12">

                                <select id="searchdrop" class="form-control" name="type">
                                    <option value="docid" id="docid">ID</option>
                                    <option value="docname" id="docname">Name</option>
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
                                                <th>Name</th>
                                                <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="doc in documents">
									
                                                        <tr>
                                <td>{{doc.id}}</td>
                                <td>{{doc.documentsname }}                                                                   </td>
                                <td><a id="edit" href="#"><input type="button" class="btn btn-success" value="Edit"></a>
                                <a id="delete" href="#"><input type="button" disabled class="btn btn-danger" value="Delete"></a></td>
                            </tr>
									
                                                </tbody>
                </table>

                 <div align="left" id="paglink"></div>

                </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <script>
 var step=angular.module("step",[])
	.controller('documents',function($scope,$http){
		$http.get("http://gaddy.in/control_panel/documents/getalldocumentsinfo.php")
		.then(function(response){
			$scope.documents=response.data;
		},function(response){
			$scope.error=response.status;
		});
	});

</script>