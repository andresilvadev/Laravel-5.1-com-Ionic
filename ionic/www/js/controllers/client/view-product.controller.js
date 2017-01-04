angular.module('deliveryApp.controllers')
    .controller('ClientViewProductsCtrl',['$scope','$state', function ($scope,$state, appConfig) {

        $http.get(appConfig.baseUrl + '/api/client/products');

    }]);