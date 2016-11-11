(function() {

    'use strict';

    angular
        .module('authApp')
        .controller('FileUploadController', FileUploadController);


    function FileUploadController($scope, Upload, $timeout, $log) {

		$log.log($scope);

		$scope.$log = $log;

		// upload later on form submit or something similar
		$scope.submit = function() {
			$scope.errorMsg = '';
			console.log($scope);
			if ($scope.uploadFile != null) {
				$scope.uploadFiles = [$scope.uploadFile];
			}
			//($scope.uploadForm.file.$valid || $scope.uploadMultipleForm.files.$valid) &&
			if ($scope.uploadFiles.length) {
				$scope.doUploadFiles($scope.uploadFiles);
			}
		};

		$scope.doUploadFiles = function(files) {
			$scope.files = files;
			angular.forEach(files, function(file) {
				file.upload = Upload.upload({
					url: '/api/upload',
					data: {
						token: csrfToken,
						type: $scope.type,
						obj_id: $scope.obj_id || null,
						file: file
					}
				});
				$log.log(file);

				file.upload.then(function (response) {
					$timeout(function () {
						file.result = response.data;
					});
					$log.log('Success ' + response.config.data.file.name + ' uploaded. Response: ', response.data);
				}, function (response) {
					if (response.status > 0)
						$scope.errorMsg = response.status + ': ' + response.data.error;
						angular.forEach(response.data.errors, function(error) {
							$scope.errorMsg = $scope.errorMsg + '; ' + error[0];
						});
					$log.log('Error status: ' + response.status + '. Response: ', response.data);
				}, function (evt) {
					file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
					$log.log('progress: ' + file.progress + '% ' + evt.config.data.file.name);
				});
			});
		};

    }

})();