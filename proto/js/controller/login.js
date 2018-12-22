app.controller('LoginController', function ($rootScope, $scope, $mdDialog, predefined, $timeout) {
    $rootScope.title = 'login';
    $scope.loading = false;
    $scope.form = {};
    $scope.submitForm = function () {
        $scope.loading = true;
        $timeout(function () {
            $scope.loading = false;
            if ($scope.form.username === 'superadmin' && $scope.form.password === 'superadmin') {
                $rootScope.login.role = 'superadmin';
                $rootScope.changePage('admin');
            } else {
                var found = false;
                angular.forEach($rootScope.companies, function (val, key) {
                    if (!found && val.email === $scope.form.username && val.password === $scope.form.password && parseInt(val.activated) === 1) {
                        found = true;
                        $rootScope.login.role = 'admin';
                        $rootScope.login.company_id = val.ID;
                        $rootScope.changePage('employees');
                    }
                });
                if (!found) {
                    angular.forEach($rootScope.training_centers, function (val, key) {
                        if (!found && val.user_name === $scope.form.username && val.password === $scope.form.password) {
                            found = true;
                            $rootScope.login.role = 'training_center';
                            $rootScope.login.training_center_id = val.ID;
                            $rootScope.changePage('center');
                        }
                    });
                }
                if (!found) {
                    predefined.showAlert('Information', 'Invalid login details!!');
                }
            }
        }, 3000);
    };
});