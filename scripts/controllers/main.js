'use strict';

angular.module('abat')
  .controller('offersCtrl', ['$scope', '$route', '$location', '$routeParams', '$http', '$anchorScroll', function($scope, $route, $location, $routeParams, $http, $anchorScroll){

    $scope.pageData = [];
    $scope.pageData[1] = false;
    
    
    $scope.switchPage = function(status, id){
      console.log(status, id);
      if (status)
        $scope.pageData[id] = status;
      else
        $scope.pageData[id] = false;
    }

    

    $scope.slider = function(){
      $('#slider').owlCarousel();
    }

  }]);
