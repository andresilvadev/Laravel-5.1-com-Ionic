angular.module('deliveryApp.controllers', [])
    .controller('HomeCtrl', function($scope, $state, $stateParams){
        $scope.nome = $stateParams.nome;    // Recuperando parametros de rota
        $scope.state = $state.current;      // Mostranto o state atual 

    });