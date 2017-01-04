angular.module('deliveryApp.controllers')
    .controller('LoginCtrl',['$scope','OAuth','$cookies','$ionicPopup','$state', function ($scope,OAuth,$cookies,$ionicPopup,$state) {

        $scope.user = {     // Garantindo que os campos do formulário estejam vázios
            username: '',
            password: ''
        };

        $scope.login = function () {
            OAuth.getAccessToken($scope.user)
                .then(function (data) {     // Se houver sucesso
                $state.go('home');
                //console.log(data);
                //console.log($cookies.getObject('token'));

            }, function (responseError) {    // Se houver fracasso
                $ionicPopup.alert({
                    title: 'Warning',
                    template: 'Login ou Password invalid'
                })
            });
        }

    }]);