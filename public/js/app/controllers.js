// public/js/app/controllers.js
myApp.controller('MyController', ['$scope', '$http', function($scope, $http) {
    $scope.message = "Hello, AngularJS!";

    $http.get('/api/some-route')
        .then(function(response) {
            $scope.data = response.data;
        });
}]);
