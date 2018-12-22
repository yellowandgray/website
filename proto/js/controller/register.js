app.controller('RegisterController', function ($rootScope, $scope, $mdDialog, predefined, $timeout) {
    $rootScope.title = 'register';
    $scope.searchTerm = '';
    $scope.loading = false;
    $scope.form = {};
    $scope.sectors = [
        {name: 'Manufacture', value: 'manufacture'},
        {name: 'Educational', value: 'educational'},
        {name: 'Restaurant', value: 'restaurant'},
        {name: 'Hotel', value: 'hotel'},
        {name: 'Stall', value: 'stall'},
        {name: 'Canteen', value: 'canteen'}
    ];
    window.mdSelectOnKeyDownOverride = function (event) {
        event.stopPropagation();
    };
    $scope.submitForm = function () {
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
                $scope.submitForm();
            });
        }, 3000);
    };
    $scope.clearSearchTerm = function () {
        $scope.searchTerm = '';
    };
});