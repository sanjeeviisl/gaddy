step.controller("provider",['$scope','$http',function($scope,$http){
   console.log("provider me hun ");

   $scope.sorttype="name";
   $scope.reverse=false;
   $scope.searchtext="";
	$scope.providers={};
	$scope.onload=function(){
		$http.get('http://gaddy.in/gaddy/views/server-pages/provider.php/list')
		.then(function(respond){
			$scope.providers=respond.data;
			console.log($scope.providers);
		},
		function(respond){
			$scope.error="error"+" "+respond.status+respond.statusText;
			console.log($sccope.error);
		})
	}

	$scope.onload();

}])