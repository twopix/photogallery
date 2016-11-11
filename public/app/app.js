(function() {

    'use strict';

    angular
        .module('authApp', ['ui.router', 'satellizer', 'ngAnimate', 'ngMessages', 'ngFileUpload'])
        .config(function($stateProvider, $urlRouterProvider, $authProvider) {

            // Satellizer configuration that specifies which API
            // route the JWT should be retrieved from
            $authProvider.loginUrl = '/api/authenticate';
            $authProvider.signupUrl = '/api/signup';

            // Redirect to the auth state if any other states
            // are requested other than users
            $urlRouterProvider.otherwise('/auth');

            $stateProvider
                .state('auth', {
                    name: 'auth',
                    url: '/auth',
                    templateUrl: 'app/views/authView.html',
                    controller: 'AuthController as auth'
                })
                .state('reg', {
                  name: 'reg',
                  url: '/registration',
                  templateUrl: 'app/views/regView.html',
                  controller: 'RegController as reg'
                })
                .state('users', {
                    name: 'users',
                    url: '/users',
                    templateUrl: 'app/views/userView.html',
                    controller: 'UserController as user'
                })
                .state('main', {
                    name: 'main',
                    url: '/main',
                    templateUrl: 'app/views/main.html',
                    controller: 'MainController as main'
                })
				.state('upload', {
					url: '/upload',
					templateUrl: 'app/views/_testUploadView.html',
					controller: 'FileUploadController as fileUpload'
				});
        });
})();