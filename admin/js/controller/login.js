app.controller('LoginController', function ($scope, $rootScope, userDetail, $http, apiPath, $location, handset, $uibModal, predefined, $timeout) {
    $rootScope.title = 'login';
    $rootScope.pagetitle = 'Login';
    $scope.formFields = {};
    $scope.loginForm = function () {
        handset.showSpinner();
        var formData = new FormData();
        angular.forEach($scope.formFields, function (val, key) {
            formData.append(key, val);
        });
        $http.post(apiPath.url + 'login', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                angular.forEach(response.data.result.data, function (val, key) {
                    userDetail.set('mac_world_' + key, val);
                });
                $location.path('categories').replace();
            } else {
                $timeout(function () {
                    predefined.showAlert('Error', response.data.result.message);
                }, 200);
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
        });
    };
    $scope.forgotPassword = function () {
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'forgot_password.html',
            controller: 'ForgotPasswordController'
        });
        modalInstance.result.then(function (response) {
            $timeout(function () {
                predefined.showAlert('Error', response.data.result.message);
            }, 200);
        }, function () {
            console.log('Dismissed');
        });
    };
});

app.controller('ForgotPasswordController', function ($scope, $uibModalInstance, handset, $http, apiPath, predefined) {
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    };
    $scope.email = '';
    $scope.forgotPassword = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'forgotpassword/' + $scope.email).then(function (response) {
            handset.hideSpinner();
            $uibModalInstance.close(response);
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
        });
    };
});