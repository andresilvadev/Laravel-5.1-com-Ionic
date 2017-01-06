angular.module('deliveryApp.controllers')
    .controller('ClientViewProductsCtrl',['$scope','$state','appConfig','$resource', function ($scope,$state, appConfig, $resource) {

        var product = $resource(appConfig.baseUrl + '/api/client/products',{}, {
            query:{
                isArray: false
            }
        });

        product.query({},function(data){// Envia um get para api, e espera que a resposta seja um array e não um objeto
            console.log(data)
        });

    }]);