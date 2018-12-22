app.controller('ConfigsController', function ($rootScope, $scope, $mdDialog, $routeParams) {
    $rootScope.title = 'configs';
    $rootScope.pagetitle = 'Configs';
    $scope.openConfigs = function (ev) {
        $mdDialog.show({
            controller: ConfigsController,
            templateUrl: 'forms/configs.html',
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
function ConfigsController($scope, $mdDialog, $timeout, $rootScope) {
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
}