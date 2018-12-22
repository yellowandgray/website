app.controller('AdminController', function ($rootScope, $scope, $mdDialog, predefined) {
    $rootScope.title = 'admin';
    $rootScope.pagetitle = 'Clients';
    $scope.list = {new : [], active: [], rejected: [], blocked: []};
    $scope.buildList = function () {
        $scope.list = {new : [], active: [], rejected: [], blocked: []};
        angular.forEach($rootScope.companies, function (val, key) {
            if (parseInt(val.activated) === 0 && parseInt(val.blocked) === 0 && parseInt(val.rejected) === 0) {
                ($scope.list.new).push(val);
            }
            if (parseInt(val.activated) === 1 && parseInt(val.blocked) === 0 && parseInt(val.rejected) === 0) {
                ($scope.list.active).push(val);
            }
            if (parseInt(val.activated) === 0 && parseInt(val.blocked) === 0 && parseInt(val.rejected) === 1) {
                ($scope.list.rejected).push(val);
            }
            if (parseInt(val.activated) === 0 && parseInt(val.blocked) === 1 && parseInt(val.rejected) === 0) {
                ($scope.list.blocked).push(val);
            }
        });
    };
    $scope.buildList();
    $scope.activate = function (id) {
        var confirm = $mdDialog.prompt()
                .title('Please provided the password for this company')
                .textContent('')
                .placeholder('Enter password')
                .ariaLabel('Password')
                .initialValue('')
                .theme('forms')
                .ok('Activate')
                .cancel('Cancel');
        $mdDialog.show(confirm).then(function (result) {
            predefined.showAlert('Information', 'Activation mail was sent to this employer with his password');
            var found = false;
            angular.forEach($rootScope.companies, function (val, key) {
                if (found === false && parseInt(val.ID) === parseInt(id)) {
                    found = true;
                    val.activated = 1;
                    val.blocked = 0;
                    val.rejected = 0;
                    val.password = result;
                }
            });
            $scope.buildList();
        }, function () {

        });
    };
    $scope.reject = function (id) {
        var confirm = $mdDialog.prompt()
                .title('Please provided the reason')
                .textContent('')
                .placeholder('Enter reason')
                .ariaLabel('Reason')
                .initialValue('')
                .theme('forms')
                .ok('Submit')
                .cancel('Cancel');
        $mdDialog.show(confirm).then(function (result) {
            predefined.showAlert('Information', 'Respond mail sent to the client with the reason');
            var found = false;
            angular.forEach($rootScope.companies, function (val, key) {
                if (found === false && parseInt(val.ID) === parseInt(id)) {
                    found = true
                    val.activated = 0;
                    val.blocked = 0;
                    val.rejected = 1;
                }
            });
            $scope.buildList();
        }, function () {

        });
    };
    $scope.block = function (id) {
        var confirm = $mdDialog.prompt()
                .title('Please provided the reason')
                .textContent('')
                .placeholder('Enter reason')
                .ariaLabel('Reason')
                .initialValue('')
                .theme('forms')
                .ok('Submit')
                .cancel('Cancel');
        $mdDialog.show(confirm).then(function (result) {
            predefined.showAlert('Information', 'Blocked mail sent to client with reason');
            var found = false;
            angular.forEach($rootScope.companies, function (val, key) {
                if (found === false && parseInt(val.ID) === parseInt(id)) {
                    found = true
                    val.activated = 0;
                    val.blocked = 1;
                    val.rejected = 0;
                }
            });
            $scope.buildList();
        }, function () {

        });
    };
    $scope.detailView = function (id) {
        $rootScope.changePage('detail/' + id);
    };
});
