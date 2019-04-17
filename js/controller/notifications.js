app.controller('NotificationsController', function ($scope, $rootScope, $uibModal, predefined, handset, $http, apiPath, $ngConfirm) {
    $rootScope.title = 'notifications';
    $rootScope.pagetitle = 'Notifications';
    $scope.selected_levelone = '';
    $scope.selected_leveltwo = '';
    $scope.selected_levelthree = '';
    $scope.data = null;
    $scope.notifications = [];
    $scope.openForm = function (form, table, slug, id) {
        var data = {};
        if (parseInt(id) !== 0) {
            var found = false;
            angular.forEach($scope.data, function (val, key) {
                if (!found && parseInt(val.ID) === parseInt(id)) {
                    data = val;
                    found = true;
                }
            });
        }
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: form + '.html',
            controller: 'FormController',
            resolve: {
                data: function () {
                    return {
                        table: table,
                        slug: slug,
                        data: data,
                        level_one: $scope.selected_levelone.split(',')[0],
                        level_two: $scope.selected_leveltwo == '' ? '' : ($scope.selected_leveltwo).split(',')[0],
                        level_three: $scope.selected_levelthree == '' ? '' : ($scope.selected_levelthree).split(',')[0]
                    };
                }
            }
        });
        modalInstance.result.then(function (response) {
            if (response.data.result.error === false) {
                $scope.getNotifications();
            }
            $timeout(function () {
                predefined.showAlert('Information', response.data.result.message);
            }, 200);
        }, function () {
            console.log('Dismissed');
        });
    };
    $scope.getLevels = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'program_mapped_data').then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                var mapfirst = false;
                if ($scope.data === null) {
                    mapfirst = true;
                }
                $scope.data = response.data.result.data;
                if (mapfirst) {
                    var found = false;
                    angular.forEach($scope.data, function (val, key) {
                        if (!found) {
                            $scope.mappingActive(key, '', '');
                            found = true;
                        }
                    });
                }
            } else {
                $scope.data = null;
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.data = null;
        });
    };
    $scope.mappingActive = function (l1, l2, l3) {
        $scope.selected_levelone = l1;
        $scope.selected_leveltwo = '';
        $scope.selected_levelthree = '';
        if (l2 !== '' && l3 !== '') {
            $scope.selected_leveltwo = l2;
            $scope.selected_levelthree = l3;
        } else if (l2 !== '' && l3 === '') {
            $scope.selected_leveltwo = l2;
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, key) {
                if (!found) {
                    if (!Array.isArray($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][key])) {
                        $scope.selected_levelthree = key;
                    }
                    found = true;
                }
            });
        } else {
            var found_l1 = false;
            var found_l2 = false;
            angular.forEach($scope.data[$scope.selected_levelone], function (val, key) {
                if (!found_l1) {
                    if (!Array.isArray($scope.data[$scope.selected_levelone][key])) {
                        $scope.selected_leveltwo = key;
                        angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, k) {
                            if (!found_l2) {
                                if (!Array.isArray($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][k])) {
                                    $scope.selected_levelthree = k;
                                }
                                found_l2 = true;
                            }
                        });
                    }
                    found_l1 = true;
                }
            });
        }
        $scope.getNotifications();
    };
    $scope.getNotifications = function () {
        handset.showSpinner();
        var leval_two = $scope.selected_leveltwo == '' ? 'empty' : ($scope.selected_leveltwo).split(',')[0];
        var leval_three = $scope.selected_levelthree == '' ? 'empty' : ($scope.selected_levelthree).split(',')[0];
        $http.get(apiPath.url + 'get_notifications/' + ($scope.selected_levelone).split(',')[0] + '/' + leval_two + '/' + leval_three).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                $scope.notifications = response.data.result.data;
            } else {
                $scope.notifications = [];
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.notifications = [];
        });
    };
    $scope.notArray = function (array) {
        return !Array.isArray(array);
    };
    $scope.deleteRecord = function (table, id, slug) {
        $ngConfirm({
            title: 'Confirmation',
            content: 'OOPS! You can\'t recover, are you sure you want to delete?',
            buttons: {
                yes: {
                    text: 'Yes',
                    btnClass: 'btn-blue',
                    action: function () {
                        $http({
                            method: 'DELETE',
                            url: apiPath.url + 'delete/' + table + '/' + id + '/' + slug
                        }).then(function (response) {
                            if (response.data.result.error === false) {
                                $scope.getNotifications();
                            }
                            predefined.showAlert('Information', response.data.result.message);
                        }, function (error) {
                            predefined.showAlert('Error', error.statusText);
                        });
                    }
                },
                no: function () {
                    // closes the modal
                }
            }
        });
    };
    $scope.getLevels();
});