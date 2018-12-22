app.controller('EmployeesController', function ($rootScope, $scope, predefined, $timeout, $mdDialog) {
    $rootScope.title = 'employees';
    $scope.list = {employees: []};
    $scope.selecteditems = [];
    $scope.checkall = false;
    var found = false;
    angular.forEach($rootScope.companies, function (val, key) {
        if (!found && parseInt(val.ID) === parseInt($rootScope.login.company_id)) {
            found = true;
            if (typeof val.employees !== 'undefined') {
                $scope.list.employees = val.employees;
            }
        }
    });
    $scope.doMoreAction = function () {
        if (($scope.selecteditems).length > 0) {
            switch ($scope.moreoptions.selected) {
                case 'makeapayment':
                    $rootScope.paymentemployees = $scope.selecteditems;
                    $timeout(function () {
                        $rootScope.changePage('payment');
                    }, 500);
                    $scope.moreoptions.selected = null;
                    break;
                default:
                    break;
            }
        } else {
            $timeout(function () {
                $scope.moreoptions.selected = null;
            }, 500);
            predefined.showAlert('Information', 'Please select atleast one employee!!');
        }
    };
    $scope.isCheckedAll = function (array) {
        $scope.checkall = $scope.list.employees.length === array.length;
    };
    $scope.checkAll = function () {
        if ($scope.checkall === false) {
            $scope.selecteditems = [];
        } else {
            $scope.selecteditems = [];
            angular.forEach($scope.list.employees, function (val, key) {
                ($scope.selecteditems).push(val.ID);
            });
        }
    };
    $scope.toggleSelect = function (id, array) {
        var idx = array.indexOf(id);
        if (idx > -1) {
            array.splice(idx, 1);
        } else {
            array.push(id);
        }
        $scope.isCheckedAll(array);
    };
    $scope.existsItem = function (id, array) {
        return array.indexOf(id) > -1;
    };
    window.mdSelectOnKeyDownOverride = function (event) {
        event.stopPropagation();
    };
    $scope.moreoptions = {options: [
            {name: 'Make a Payment', value: 'makeapayment'}
        ], selected: null};
    $scope.openInjectionCertificate = function (ev, empid) {
        $mdDialog.show({
            controller: InjectionCertificateController,
            templateUrl: 'forms/injection_certificate.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            locals: {
                data: {
                    empid: empid
                }
            }
        }).then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        });
    };
    $scope.openTrainingCertificate = function (ev, empid) {
        $mdDialog.show({
            controller: InjectionCertificateController,
            templateUrl: 'forms/employee_training_certificate.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            locals: {
                data: {
                    empid: empid
                }
            }
        }).then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        });
    };
});

function InjectionCertificateController($scope, $mdDialog, data, $rootScope, predefined) {
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
    $scope.employee = {};
    $scope.injection = {};
    var found = false;
    angular.forEach($rootScope.companies, function (val, key) {
        if (!found && parseInt(val.ID) === parseInt($rootScope.login.company_id)) {
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
    $scope.saveInjectionCertificate = function () {
        if (typeof $scope.injection.image !== 'undefined' && typeof $scope.injection.image[0].lfDataUrl !== 'undefined') {
            var foundcomp = false;
            angular.forEach($rootScope.companies, function (val, key) {
                if (!foundcomp && parseInt(val.ID) === parseInt($rootScope.login.company_id)) {
                    foundcomp = true;
                    var foundemp = false;
                    angular.forEach(val.employees, function (emp, index) {
                        if (!foundemp && parseInt(emp.ID) === parseInt($scope.employee.ID)) {
                            foundemp = true;
                            emp.verified = 0;
                            emp.rejected = 0;
                            emp.rejected_reason = '';
                            emp.injection_certificate = $scope.injection.image[0].lfDataUrl;
                            predefined.showAlert('Information', 'Certificate updated!!');
                        }
                    });
                }
            });
        }
    };
}