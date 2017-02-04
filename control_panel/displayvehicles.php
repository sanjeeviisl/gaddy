<!DOCTYPE html>
<html ng-app="step" ng-controller="vehicle">
<?php>
include "header.php"
?>



<?php>
include "footer.php"
?>
<!-- code for Driver -->
 <aside class="right-side">

                <section class="content-header">
                    <h1>
                        Vehciles Infomations
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
<div class="col-md-6 col-sm-12">
    <div class="box box-danger">
      
            <div class="box-header">
                <h3 class="box-title">Sort</h3>
            </div>
            <div class="box-body row">
                <div class="col-md-6 col-sm-12">
                    <select class="form-control" id="sortdrop" name="type" ng-model="sorttype">
                        <option value="id"  id="provid" selected>Vehcile ID</option>
                        <option value="name"  id="pvname">Vehcile Name</option>
                        <option value="email"  id="pvemail">Vehcile Type</option>
                        
                    </select>
                    <br>
                </div>
                 <div class="col-md-6 col-sm-12">

                       <input type="text" class="form-control" ng-model="reverse" placeholder="true for asc false for desc">

                            <br>
                        </div>
            </div>
            <div class="box-footer">    
                <button type="submit" id="btnsort" class="btn btn-flat btn-block btn-success">Sort</button>
            </div>
        
    </div>
</div>

<div class="col-md-6 col-sm-12">

    <div class="box box-danger">

        
            <div class="box-header">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body row">

                <div class="col-md-6 col-sm-12">
                    <select class="form-control" id="sortdrop" name="type">
                        <option value="provid"  id="provid"> Vehcile ID</option>
                        <option value="pvname"  id="pvname">Vehicle Name</option>
                        <option value="pvemail"  id="pvemail">Vehcile Type</option>
                    </select>
                    <br>
                </div>
                 <div class="col-md-6 col-sm-12">


                            <input class="form-control" type="text" name="valu" ng-model="searchtext.name" id="insearch" placeholder="keyword"/>
                            
                            <br>
                        </div>

            </div>

            <div class="box-footer">

                <button type="submit" id="btnsearch" class="btn btn-flat btn-block btn-success">Search</button>


            </div>
      

    </div>
</div>
<div class="col-md-12 col-sm-12">
            <div id="currently"  class="col-md-12 col-sm-12 btn btn-warning"  >Currently Providing</div><br/>
        <br><br>
</div>
    <table class="table table-bordered" >
        <tbody><tr>
                <th>ID</th>
                <th>VEHICLE-ID</th>
                <th>PROVIDER-ID</th>
                <th>VEHICLE Name</th>
                <th>VEHICLE NUMBER</th>
                <th>VIHECLE MODEL</th>
                <th>VIHECLE TYPE</th>
                <th>VIHECLE SUB TYPE</th>
                <th>REGISTRATION PROOF</th>
                <th>ID PROOF</th>
                <th>Photo</th>
                <th>LOCATION LATITUDE</th>
                <th>LOCATION LONGITUDE</th>
               
            </tr>

            <tr ng-repeat="Vehicle in Vehicles ">
                    <td>{{Vehicle.id}}</td>
                    <td>{{Vehicle.vehicle_id}}</td>
                    <th>{{Vehicle.provider_id}}</th>
                    <td>{{Vehicle.vehicle_name}}</td>
                    <td>{{Vehicle.vehicle_number}}</td>
                    <td>{{Vehicle.vehicle_model}}</td>
                    <td>{{Vehicle.vehicle_type}}</td>
                    <td>{{Vehicle.vehicle_sub_type}}</td>
                    <td>{{Vehicle.registration_proof}}</td>
                    <td>{{Vehicle.vehicle_id_proof}}</td>
                    <td ><button ng-click="openWindow(Vehicle.vehicle_photo)">{{Vehicle.vehicle_photo}}</button></td>
                    <td>{{Vehicle.location_latitude}}</td>
                    <td>{{Vehicle.location_longitude}}</td>

            </tr>
        </tbody></table>

</div>



                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script type="text/javascript">
    $("#owners").addClass("active");
    $('#option3').show();
    $('.fade').css('opacity', '1');
    $('.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus').css('color', '#ffffff');
    $('.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus').css('background-color', '#');
	
	var step=angular.module("step",[])
	.controller("vehicle",function($scope,$http){
		$http.get("http://gaddy.in/control_panel/drivers/getallvehicleinfo.php")
		.then(function(response){
			$scope.Vehicles=response.data;
		},function(response){
			$scope.error=response.status;
		});

        $scope.openWindow = function(link) {
       window.open(link, 'C-Sharpcorner', 'width=500,height=400');
    };
	});

	</script>
	