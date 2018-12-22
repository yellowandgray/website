app.controller('PaymentController', function ($rootScope, $scope) {
    $rootScope.title = 'payment';
    $rootScope.pagetitle = 'Payment';
    $scope.amt = 0;
    var foundamt = false;
    angular.forEach($rootScope.configs, function (val, key) {
        if (!foundamt && parseInt(val.ID) === 1) {
            $scope.amt = val.value;
            foundamt = true;
        }
    });
    $scope.makePayment = function () {
        angular.forEach($rootScope.paymentemployees, function (val, key) {
            var found = false;
            angular.forEach($rootScope.companies, function (comp, key) {
                if (parseInt(comp.ID) === parseInt($rootScope.login.company_id)) {
                    angular.forEach(comp.employees, function (emp, key) {
                        if (!found && parseInt(emp.ID) === parseInt(val)) {
                            found = true;
                            emp.paid = 'paid';
                        }
                    });
                }
            });
        });
        $rootScope.changePage('employees');
    };
});