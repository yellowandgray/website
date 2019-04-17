app.controller('HeaderController', function ($scope, $location, userDetail, $uibModal, $http, apiPath, $ngConfirm, $timeout, userDetail) {
    $scope.user = {type: userDetail.get('eshine_type')};
    $scope.limit = 3;
    $scope.expand = false;
    $scope.logout = function () {
        $ngConfirm({
            title: 'Confirmation',
            content: 'Are you sure? Do you want to logout?',
            buttons: {
                yes: {
                    text: 'Yes',
                    btnClass: 'btn-blue',
                    action: function () {
                        $timeout(function () {
                            userDetail.remove('eshine_ID');
                            $location.path('login');
                        }, 200);
                    }
                },
                no: function () {
                    // closes the modal
                }
            }
        });
    };
    $scope.data = [];
    $scope.expand = 0;
    $scope.toggleExpand = function (type) {
        if (parseInt(type) === 1) {
            $scope.limit = ($scope.data).length;
        } else {
            $scope.limit = 3;
        }
        $scope.expand = type;
    };
    $http.get(apiPath.url + 'franchise_dashboard/' + userDetail.get('eshine_ID')).then(function (response) {
        if (response.data.result.error === false) {
            $scope.data = response.data.result.data;
        } else {
            $scope.data = [];
        }
    }, function (error) {
        $scope.data = [];
    });
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