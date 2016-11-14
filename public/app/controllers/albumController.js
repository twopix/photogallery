(function() {

  'use strict';

  angular
    .module('authApp')
    .controller('AlbumController', AlbumController);

  function AlbumController($http) {

    var vm = this;

    vm.albums;
    vm.error;

    vm.getAlbums = function() {

      $http.get('api/album').then(function(response) {
        vm.albums= response.data;
      });
    }
  }

})();