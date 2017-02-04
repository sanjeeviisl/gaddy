<!DOCTYPE html>
<html ng-app="step" ng-controller="promotions">
<?php>
include "header.php"
?>



<?php>
include "footer.php"
?>
 <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Promotions
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
    <div class="col-md-12 col-sm-12">
        <a id="addpromo" href="http://taxinew.taxinow.xyz/admin/promo_code/add"><button class="btn btn-flat btn-block btn-info" disabled  type="button">Add Promo Code</button></a>
        <br/>
    </div>
</div>

<div class="col-md-6 col-sm-12">
    <div class="box box-danger">
        <form method="get" action="http://taxinew.taxinow.xyz/admin/sortpromo">
            <div class="box-header">
                <h3 class="box-title">Sort</h3>
            </div>
            <div class="box-body row">
                <div class="col-md-6 col-sm-12">
                    <select id="sortdrop" class="form-control" name="type">
                        <option value="promoid"  id="promoid">Promo Code ID</option>
                        <option value="promo"  id="promo">Promo Code</option>
                        <option value="uses"  id="promovalue">Uses Remaining</option>
                    </select>
                    <br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <select id="sortdroporder" class="form-control" name="valu">
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
        <form method="get" action="http://taxinew.taxinow.xyz/admin/searchpromo">
            <div class="box-header">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body row">

                <div class="col-md-6 col-sm-12">

                    <select class="form-control" id="searchdrop" name="type">
                        <option value="promo_id" id="promo_id">Promo Code ID</option>
                        <option value="promo_name" id="promo_name">Promo Code Name</option>
                        <option value="promo_type" id="promo_type">Promo Code Type</option>
                        <option value="promo_state" id="promo_state">Promo Code State</option>
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
                <th>Promo Code</th>
                <th>Value</th>
                <th>Uses Remaining</th>
                <th>State</th>
                <th>Is Expired</th>
                <th>Is Event Code</th>
                <th>Start Date</th>
                <th>Expiry Date</th>
                <th style="width: 105px;">Actions</th>
            </tr>
        </thead>
        <tbody ng-repeat="promo in promotions">
                            <tr>
                    <td>{{promo.id}}</td>
                    <td>{{promo.code}}</td>
                    <td>{{promo.value}}</td>
                    <td>{{promo.user}}</td>
                    <td>{{promo.status}}</td>
                    <td>
                        <span class='badge bg-red'>{{promo.expired}}</span>                    </td>
                    <td>
                        <span class='badge bg-green'>{{promo.event}}</span>                    </td>
                    <td>{{promo.startdate}}</td>
                    <td>{{promo.enddate}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-flat btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                {{promo.action}}
                                <span class="caret"></span>
                            </button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" id="edit" href="http://taxinew.taxinow.xyz/admin/promo_code/deactivate/42">Deactivate</a></li>
                                                                <!--li role="presentation"><a role="menuitem" tabindex="-1" id="history" href="">View History</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" id="coupon" href="">Delete</a></li-->
                            </ul>
                                                    </div>
                    </td>
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
    .controller('promotions',function($scope,$http){
        $http.get("http://gaddy.in/control_panel/promotions/getallpromotionsinfo.php")
        .then(function(response){
            $scope.promotions=response.data;
        },function(response){
            $scope.error=response.status;
        });
    });

</script>