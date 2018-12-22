app.controller('OnsiteEmployeeController', function ($rootScope, $scope, $mdDialog, predefined, $timeout) {
    $rootScope.title = 'onsite_employee';
    $rootScope.pagetitle = 'Onsite Employee';
    $scope.list = {};
    $scope.map = {center: [$rootScope.training_centers[0].lat, $rootScope.training_centers[0].lng]};
    $scope.form = {training_center: 1};
    $scope.addOnsiteAppointment = function () {
        var found = false;
        var appt = {};
        $scope.form.training_date = moment($scope.form.training_date).format('DD MMM YYYY');
        $scope.form.training_time = moment($scope.form.training_time).format('hh:mm A');
        angular.forEach($rootScope.companies, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt($rootScope.login.company_id)) {
                found = true;
                if (typeof val.onsite === 'undefined') {
                    val.onsite = [];
                }
                angular.forEach($scope.form, function (val, key) {
                    appt[key] = val;
                });
                appt.ID = ((val.onsite.length) + 1);
                (val.onsite).push(appt);
                predefined.showAlert('Information');
            }
        });
    };
    $scope.buildListOnsite = function() {
        
    };
    $scope.openverificationForm = function () {
        $scope.loading = true;
        $timeout(function () {
            $scope.loading = false;
            var confirm = $mdDialog.prompt()
                    .title('Please Enter the Reason')
                    //.textContent('We have sent an otp sms to your mobile number')
                    .placeholder('Enter the reason')
                    .ariaLabel('Code')
                    .initialValue('')
                    .theme('forms')
                    .ok('submit')
                    .cancel('cancel');
            $mdDialog.show(confirm).then(function (result) {
                var ID = ($rootScope.companies).length;
                var record = {ID: (ID + 1), activated: 0, blocked: 0, rejected: 0};
                angular.forEach($scope.form, function (val, key) {
                    record[key] = val;
                });
                //($rootScope.companies).push(record);
                //predefined.showAlert('Thank you', 'Our admin team will contact you in email');
            }, function () {
                //$scope.submitForm();
            });
        }, 1000);
    };
    $scope.openAddedTraingCentreOnsite = function (ev) {
        $mdDialog.show({
            controller: AddedTraingCentreOnsite,
            templateUrl: 'forms/reply_message.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true
        }).then(function (answer) {
            console.log('Hidden');
        }, function () {
            console.log('Cancel');
        });
    };
});

function AddedTraingCentreOnsite($scope, $mdDialog, $timeout, $rootScope) {
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
}