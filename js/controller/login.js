app.controller('LoginController', function ($scope, $location, predefined, $http, userSession, apiPath, $rootScope) {
    $rootScope.title = 'Login';
    $rootScope.menu = 'login';
    $scope.loading = false;
    $scope.form = {username: '', password: '', submit: function () {
            $scope.loading = true;
            $http.get(apiPath.url + 'adminlogin/' + $scope.form.username + '/' + $scope.form.password).then(function (response) {
                $scope.loading = false;
                if (response.data.result.error === false) {
                    $rootScope.user = response.data.result.data;
                    angular.forEach(response.data.result.data, function (val, key) {
                        userSession.set(key, val);
                    });
                    $rootScope.role = userSession.get('role');
                    if (response.data.result.data.role === 'superadmin') {
                        $location.path('staff_profile');
                    } else {
                        $location.path('transfer_certificates');
                    }
                } else {
                    predefined.showAlert('Information', response.data.result.message);
                }
            }, function (error) {
                $scope.loading = false;
                predefined.showAlert('Error', error.statusText);
            });
        }};
});