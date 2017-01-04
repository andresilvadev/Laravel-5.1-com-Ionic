// Ionic Starter App


// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'

angular.module('deliveryApp.controllers',[]); // Criando módulo de controllers

angular.module('deliveryApp', ['ionic', 'deliveryApp.controllers','angular-oauth2','ngResource'])

.constant('appConfig',{
    baseUrl: 'http://localhost:8000'
})

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appConfig){

    OAuthProvider.configure({   // Provider de configuração url base, para o oAuth2
        baseUrl: appConfig.baseUrl,
        clientId: 'appid1',
        clientSecret: 'secret', // optional
        grantPath: '/oauth/access_token' // rota na api para recuperar o token
    });

    OAuthTokenProvider.configure({  // Provider que vai gerar o serviço do token da  aplicação
        name: 'token',
        options: {
            secure: true   // Secure -> true, incriptação para https somente para produção,
                           // Secure -> false, para permitir authenticação em desenvolvimento
        }
    });

    $urlRouterProvider.otherwise('/');// Se digitar uma rota inexistente, forca a cair numa rota default

    $stateProvider
        .state('login',{
            url: '/login',
            templateUrl: 'templates/login.html',
            controller: 'LoginCtrl'
       })
        .state('home',{
            url: '/home',
            templateUrl: 'templates/home.html',
            controller: function ($scope) {

            }
        })
        .state('client',{   // Criando uma rota abstrata, serve para intermediar o fluxo, e portanto não pode ser acessada
            abstract: true,
            url: '/client',
            template: '<ui-view/>'
        })
        .state('client.checkout',{
            url: '/checkout',
            templateUrl: 'templates/client/checkout.html',
            controller: 'ClientCheckoutCtrl'
        })
        .state('client.checkout-item-detail',{
            url: '/checkout/detail/:index',
            templateUrl: 'templates/client/checkout-detail.html',
            controller: 'ClientCheckoutDetailCtrl'
        })
        .state('client.view-products',{
            url: '/view-products',
            templateUrl: 'templates/client/view-products.html',
            controller: 'ClientViewProductsCtrl'
        })
    ;

});
