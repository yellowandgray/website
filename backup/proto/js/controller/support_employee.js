app.controller('SupportEmployeeController', function ($rootScope, $scope, $mdDialog, $routeParams) {
    $rootScope.title = 'support_employee';
    $rootScope.pagetitle = 'Support Employee';
    $scope.openReplyMessage = function (ev) {
        $mdDialog.show({
            controller: ReplyMessageController,
            templateUrl: 'forms/reply_message.html',
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
    $scope.openSupportEmployeeEdit = function (ev) {
        $mdDialog.show({
            controller: SupportEmployeeEditController,
            templateUrl: 'forms/support_employee_edit.html',
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
});
function ReplyMessageController($scope, $mdDialog) {
    $scope.hide = function () {
        $mdDialog.hide();
    };

    $scope.cancel = function () {
        $mdDialog.cancel();
    };
}
function SupportEmployeeEditController($scope, $mdDialog) {
    $scope.hide = function () {
        $mdDialog.hide();
    };

    $scope.cancel = function () {
        $mdDialog.cancel();
    };
}