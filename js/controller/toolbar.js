app.controller('ToolbarController', function ($scope, $mdSidenav, $rootScope, userSession, $mdDialog, predefined, $location, $http, apiPath) {
    $rootScope.user = {name: userSession.get('name')};
    $scope.loading = false;
    $scope.toggleLeft = buildDelayedToggler();
    $rootScope.menus = [];
    function buildDelayedToggler() {
        return function () {
            $mdSidenav('left').toggle();
        };
    }
    $scope.changePassword = function (ev) {
        $mdDialog.show({
            controller: ChangePassword,
            templateUrl: 'forms/changepass.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            fullscreen: true
        }).then(function (data) {
            predefined.showToast(data.data.result.message, 'top right');
        }, function () {
            console.log('You cancelled the dialog.');
        });
    };
    $scope.signout = function (ev) {
        var confirm = $mdDialog.confirm()
                .title('Are you sure?')
                .textContent('Do you want to logout?')
                .ariaLabel('Label')
                .targetEvent(ev)
                .ok('Yes')
                .cancel('Cancel');
        $mdDialog.show(confirm).then(function () {
            /*$scope.loading = true;
             $http.get(apiPath.url + 'adminlogout/' + userSession.get('session_id') + '/' + userSession.get('ID')).then(
             function (response) {
             $scope.loading = false;
             if (response.data.result.error === false) {
             userSession.remove('ID');
             $location.path('login');
             } else {
             predefined.showAlert('Error', response.data.result.message);
             }
             },
             function (error) {
             $scope.loading = false;
             predefined.showAlert('Error', error.statusText);
             });*/
            userSession.remove('ID');
            $location.path('login');
        }, function () {
            console.log('Cancel');
        });
    };
});
function ChangePassword($scope, $mdDialog, $http, apiPath, predefined, userSession) {
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
    $scope.loading = false;
    $scope.password = {pass: '', retype: ''};
    $scope.updatePassword = function () {
        if ($.trim($scope.password.pass) !== '' && $.trim($scope.password.retype) !== '' && $.trim($scope.password.pass) === $.trim($scope.password.retype)) {
            var formdata = new FormData();
            console.log(userSession.get('ID'));
            formdata.append('ID', userSession.get('ID'));
            formdata.append('password', $scope.password.pass);
            formdata.append('table', 'teachers');
            formdata.append('checkexist', false);
            formdata.append('checkfield', '');
            formdata.append('slug', 'Password');
            $scope.loading = true;
            $http.post(apiPath.url + 'add', formdata, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
                $scope.loading = false;
                if (response.data.result.error === false) {
                    predefined.showAlert('Success', 'Password updated successfully');
                    //$mdDialog.hide(response);
                } else {
                    predefined.showToast('Unable to update yours password', 'top right');
                }
            }, function (error) {
                $scope.loading = false;
                predefined.showToast(error.statusText, 'top right');
            });
        } else {
            predefined.showToast('Password mismatch', 'top right');
        }
    };
}