angular.module('deliveryApp.controllers',[])
    .controller('LoginCtrl',['$scope', function ($scope) {
        $scope.login = function () {
            alert('Login rodando');
        }

        console.log('Testando controller login');
    }]);