step.controller("usercon", ['$scope', '$http', function ($scope, $http){

  $scope.sorttype="name";
  $scope.reverse=false;
  $scope.searchtext="";
    console.log("hyee how are you");
   var data= $scope.data={

   }

    $scope.customer = {};
    $scope.onload = function () {
        $http.get("http://gaddy.in/gaddy/views/server-pages/customer.php/add")
            .then(function (response) {
                $scope.customer = response.data;
                console.log('data is arrived'+$scope.customer);
            },
            function (response) {
                $scope.error = "error" + response.status + response.statusText;
                console.log($scope.error);
            });
    }
    $scope.onload();
    


}]);
