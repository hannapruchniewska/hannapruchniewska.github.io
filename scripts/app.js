'use strict';

angular
  .module('abat', [
    'ngCookies',
    'ngResource',
    'ngSanitize',
    'ngRoute',
    'ngAnimate'
  ])
  .config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider){
    $routeProvider
      .when('/a', {
        controller: 'offersCtrl',
        templateUrl: ''
      })
      .when('/offer/:offerId', {
        controller: 'offersCtrl',
        templateUrl: 'scripts/views/offer.html'
      })
      .otherwise({
        redirectTo: '/'
      });
      // $locationProvider.html5Mode(true);
  }]);