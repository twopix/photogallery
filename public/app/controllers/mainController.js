(function() {

  'use strict';

  angular
    .module('authApp')
    .controller('MainController', MainController);

  function MainController($scope, $http) {
    $scope.items = [];
    $scope.lastpage=1;

    $scope.init = function() {
      $scope.lastpage=1;
      $http({
        url: '/api/photo/paginationPhotos',
        method: "GET",
        params: {page:  $scope.lastpage}
      }).success(function(data, status, headers, config) {
        $scope.items = data.data;
        $scope.currentpage = data.current_page;
      });
    };

    $scope.init();
  }

})();