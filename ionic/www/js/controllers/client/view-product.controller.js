angular.module('deliveryApp.controllers')
    .controller('ClientViewProductsCtrl',['$scope','$state','Product','$ionicLoading', function ($scope,$state,Product,$ionicLoading) {

        $scope.products =  [];
        $ionicLoading.show({
           template:'Carregando...'
        });

        Product.query({},function(data){// Envia um get para api, e espera que a resposta seja um array e não um objeto
            $scope.products = data.data;
            $ionicLoading.hide();
        }, function (dataError) {
            $ionicLoading.hide();
        });

    }]);