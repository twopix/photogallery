(function() {

  'use strict';

  angular
      .module('authApp')
      .controller('RegController', RegController);


  function RegController($auth, $state) {

    var vm = this;

    vm.signup = function() {

      var credentials = {
        name : vm.name,
        email: vm.email,
        password: vm.password
      };

      // Use Satellizer's $auth service to login
      $auth.signup(credentials).then(function(data) {
        // If login is successful, redirect to the users state
        $state.go('albums', {});
      }).catch(function (data) {
        vm.error = data.data;
      });
    }

  }

})();