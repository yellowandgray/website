app.controller('ToolbarController', function ($scope, $mdSidenav) {
    $scope.toggleLeft = buildDelayedToggler();
    function buildDelayedToggler() {
        return function () {
            $mdSidenav('left').toggle();
        };
    }
});