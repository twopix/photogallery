@extends('layouts.main')
@section('title', 'Page Title')

@section('content')
    <div class="container" ng-app="photoApp" ng-controller="PhotoController">
        <div class="row">
            <ul>
                <li ng-repeat="photo in photos"> <% photo.title %></li>
            </ul>
            <button class="btn btn-success" ng-click="loadMore()">Load More</button>

        </div>
    </div>


    <script>
        var photoApp = angular.module('photoApp', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });

        photoApp.controller('photosController', function($scope, $http) {

            $scope.photos = [];
            $scope.lastpage=1;

            $scope.init = function() {
                $scope.lastpage=1;
                $http({
                    url: '/api/photos',
                    method: "GET",
                    params: {page:  $scope.lastpage}
                }).success(function(data, status, headers, config) {
                    $scope.photos = data.data;
                    $scope.currentpage = data.current_page;
                });
            };

            $scope.init();

        });

    </script>
@endsection