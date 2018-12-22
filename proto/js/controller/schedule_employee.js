app.controller('ScheduleEmployeeController', function ($rootScope, $scope, $mdDialog, $routeParams, $timeout, predefined) {
    $rootScope.title = 'schedule_employee';
    $rootScope.pagetitle = 'Schedule Employee';
    $scope.openScheduleEmployeeDetails = function (ev) {
        $mdDialog.show({
            controller: ScheduleEmployeeDetailsController,
            templateUrl: 'forms/Schedule_employee_details.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
        }).then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        });
    };
    window.mdSelectOnKeyDownOverride = function (event) {
        event.stopPropagation();
    };
    $scope.openScheduleEmployeeCertificate = function (ev) {
        $mdDialog.show({
            controller: ScheduleEmployeeCertificateController,
            templateUrl: 'forms/Schedule_employee_certificate.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
        }).then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        });
    };
    window.mdSelectOnKeyDownOverride = function (event) {
        event.stopPropagation();
    };
    $scope.openCertificate = function () {
        $scope.loading = true;
        $timeout(function () {
            $scope.loading = false;
            var confirm = $mdDialog.prompt()
                    .title('Please verify your mobile number')
                    .textContent('We have sent an otp sms to your mobile number')
                    .placeholder('Enter verification code')
                    .ariaLabel('Code')
                    .initialValue('')
                    .theme('forms')
                    .ok('Verify')
                    .cancel('Resend');
            $mdDialog.show(confirm).then(function (result) {
                var ID = ($rootScope.companies).length;
                var record = {ID: (ID + 1), activated: 0, blocked: 0, rejected: 0};
                angular.forEach($scope.form, function (val, key) {
                    record[key] = val;
                });
                ($rootScope.companies).push(record);
                predefined.showAlert('Thank you', 'Our admin team will contact you in email');
            }, function () {
                //$scope.submitForm();
            });
        }, 3000);
    };
});
function ScheduleEmployeeDetailsController($scope, $mdDialog) {
    $scope.hide = function () {
        $mdDialog.hide();
    };

    $scope.cancel = function () {
        $mdDialog.cancel();
    };
}
function ScheduleEmployeeCertificateController($scope, $mdDialog) {
    $scope.hide = function () {
        $mdDialog.hide();
    };

    $scope.cancel = function () {
        $mdDialog.cancel();
    };
}