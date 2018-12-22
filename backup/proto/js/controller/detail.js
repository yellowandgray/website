app.controller('DetailController', function ($rootScope, $scope, $mdDialog, $routeParams) {
    $rootScope.title = 'detail';
    $scope.data = {};
    $rootScope.datas = {};
    $scope.form = {};
    var found = false;
    angular.forEach($rootScope.companies, function (val, key) {
        if (found === false && parseInt(val.ID) === parseInt($routeParams.id)) {
            found = true;
            $scope.data = val;
            $rootScope.datas = val;
        }
    });
    $scope.openDetails = function (ev) {
        $mdDialog.show({
            controller: CertificateViewSuperAdminController,
            templateUrl: 'forms/employee.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true
        }).then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        });
    };
    $scope.openInjectionCertificate = function (ev, center_id, empid) {
        $mdDialog.show({
            controller: CertificateViewSuperAdminController,
            templateUrl: 'forms/injection_certificate.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            locals: {
                data: {
                    center_id: center_id,
                    empid: empid
                }
            }
        }).then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        });
    };
    $scope.openTrainingCertificate = function (ev) {
        $mdDialog.show({
            controller: CertificateViewSuperAdminController,
            templateUrl: 'forms/training_certificate.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true
        }).then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        });
    };
    $scope.openEmployeeDetails = function (ev) {
        $mdDialog.show({
            controller: EmployeeDetailsController,
            templateUrl: 'forms/employee_details.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true
        }).then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        });
    };
    function EmployeeDetailsController($scope, $mdDialog, $timeout, $rootScope) {
        $scope.hide = function () {
            $mdDialog.hide();
        };
        $scope.cancel = function () {
            $mdDialog.cancel();
        }
        angular.forEach($rootScope.datas.employees, function (v, k) {
            console.log(v);
            $scope.form = v;

        });
    };

});

function CertificateViewSuperAdminController($scope, $mdDialog, data, $rootScope, predefined) {
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
    $scope.reject_certificate = 0;
    $scope.employee = {};
    var found = false;
    angular.forEach($rootScope.companies, function (val, key) {
        if (!found && parseInt(val.ID) === parseInt(data.center_id)) {
            found = true;
            var foundemp = false;
            angular.forEach(val.employees, function (emp, index) {
                if (!foundemp && parseInt(emp.ID) === parseInt(data.empid)) {
                    foundemp = true;
                    $scope.employee = emp;
                }
            });
        }
    });
    $scope.verifyInjectionCertificate = function () {
        var foundcomp = false;
        angular.forEach($rootScope.companies, function (val, key) {
            if (!foundcomp && parseInt(val.ID) === parseInt(data.center_id)) {
                foundcomp = true;
                var foundemp = false;
                angular.forEach(val.employees, function (emp, index) {
                    if (!foundemp && parseInt(emp.ID) === parseInt($scope.employee.ID)) {
                        foundemp = true;
                        emp.verified = 1;
                        emp.rejected = 0;
                        predefined.showAlert('Information', 'Certificate verified');
                    }
                });
            }
        });
    };
    $scope.rejectInjectionCertificate = function () {
        $scope.reject_certificate = 1;
    };
    $scope.confirmReject = function () {
        var foundcomp = false;
        angular.forEach($rootScope.companies, function (val, key) {
            if (!foundcomp && parseInt(val.ID) === parseInt(data.center_id)) {
                foundcomp = true;
                var foundemp = false;
                angular.forEach(val.employees, function (emp, index) {
                    if (!foundemp && parseInt(emp.ID) === parseInt($scope.employee.ID)) {
                        foundemp = true;
                        emp.rejected_reason = $scope.reject_reason;
                        emp.rejected = 1;
                        emp.verified = 0;
                        predefined.showAlert('Information', 'Certificate rejected!!');
                    }
                });
            }
        });
    };
}