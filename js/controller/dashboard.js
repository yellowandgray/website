app.controller('DashboardController', function ($scope, $rootScope, $location, programs, $uibModal, userDetail) {
    $rootScope.title = 'dashboard';
    $rootScope.pagetitle = 'Dashboard';
    $scope.data = programs;
    $scope.goToDetailPage = function (id) {
        var found = false;
        angular.forEach($scope.data.mapped, function (val, key) {
            if (!found && parseInt(val.level_one_id) === parseInt(id)) {
                found = true;
            }
        });
        if (!found) {
            var modalInstance = $uibModal.open({
                animation: true,
                ariaLabelledBy: 'modal-title',
                ariaDescribedBy: 'modal-body',
                templateUrl: 'become_franchise.html',
                controller: 'BecomeFranchiseController'
            });
            modalInstance.result.then(function () {
                console.log('Closed');
            }, function () {
                console.log('Dismissed');
            });
        } else {
            userDetail.set('eshine_selected_program', id);
            $location.path('program_detail');
        }

    };
    $scope.checkAccess = function (id) {
        var access = 'disabled';
        var found = false;
        angular.forEach($scope.data.mapped, function (val, key) {
            if (!found && parseInt(val.level_one_id) === parseInt(id)) {
                found = true;
                access = '';
            }
        });
        return access;
    };
});

app.controller('BecomeFranchiseController', function ($scope, $uibModalInstance) {
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    };
});