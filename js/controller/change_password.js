app.controller('ChangePasswordController', function ($scope, $rootScope, userDetail, predefined, handset, $http, apiPath, $location, $timeout) {
    $rootScope.title = 'change_password';
    $rootScope.pagetitle = 'Change password';
    $scope.type = userDetail.get('eshine_type');
    $scope.form = {};
    $scope.changePassword = function () {
        var formData = new FormData();
        formData.append('old_password', $scope.form.current_password);
        formData.append('new_password', $scope.form.new_password);
        formData.append('type', $scope.type);
        formData.append('ID', userDetail.get('eshine_ID'));
        if ($scope.form.new_password === $scope.form.re_new_password) {
            $http.post(apiPath.url + 'change_password', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
                handset.hideSpinner();
                if (response.data.result.error === false) {
                    $timeout(function () {
                        userDetail.remove('eshine_ID');
                        $location.path('login');
                        predefined.showAlert('Success', response.data.result.message);
                    }, 200);
                } else {
                    $timeout(function () {
                        predefined.showAlert('Information', response.data.result.message);
                    }, 200);
                }
            }, function (data) {
                handset.hideSpinner();
                predefined.showAlert('Error', data.statusText);
            });
        } else {
            predefined.showAlert('Information', 'New password mismatch');
        }
    };
});