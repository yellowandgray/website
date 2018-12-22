app.controller('CenterController', function ($rootScope, $scope, $mdDialog, $routeParams) {
    $rootScope.title = 'center';
    $scope.data = {};
    $rootScope.datas = {};
    $scope.individual = {};
    $scope.form = {};
    var found = false;
    angular.forEach($rootScope.companies, function (val, key) {
        if (found === false && parseInt(val.ID) === parseInt($routeParams.id)) {
            found = true;
            $scope.data = val;
            $rootScope.datas = val;
             console.log(val.employees);
        }
    });
    angular.forEach($rootScope.datas.employees, function (r, i) {
        $scope.individual = r;
       
        console.log($rootScope.datas.employees);
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
            $scope.form = v;

        });
    }
    ;

});