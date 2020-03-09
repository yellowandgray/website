app.controller('StaffProfileController', function ($rootScope, $scope, $http, predefined, apiPath, $mdDialog, $mdBottomSheet) {
    $rootScope.title = 'Staff Profile';
    $rootScope.menu = 'staff_profile';
    $scope.data = [];
    $scope.loading = false;
    $scope.total = 0;
    $scope.page = 0;
    $scope.getDesignations = function () {
        $http.get(apiPath.url + 'get_all_where/designitions/Designition/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.designations = response.data.result.data;
                $scope.designations = response.data.result.data;
                $scope.getStaffs(response.data.result.data[0].ID, 1);
            } else {
                $rootScope.designations = [];
                $scope.designations = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.designations = [];
            $rootScope.designations = [];
        });
    };
    $scope.getGenders = function () {
        $http.get(apiPath.url + 'get_all_where/genders/Gender/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.genders = response.data.result.data;
            } else {
                $rootScope.genders = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.genders = [];
        });
    };
    $scope.getReligions = function () {
        $http.get(apiPath.url + 'get_all_where/religions/Religion/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.religions = response.data.result.data;
            } else {
                $rootScope.religions = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.religions = [];
        });
    };
    $scope.getCasts = function () {
        $http.get(apiPath.url + 'get_all_where/casts/Casts/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.casts = response.data.result.data;
            } else {
                $rootScope.casts = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.casts = [];
        });
    };
    $scope.getBloodGroups = function () {
        $http.get(apiPath.url + 'get_all_where/blood_groups/Blood Group/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.blood_groups = response.data.result.data;
            } else {
                $rootScope.blood_groups = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.blood_groups = [];
        });
    };
    $scope.getCountries = function () {
        $http.get(apiPath.url + 'get_all_where/countries/Country/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.countries = response.data.result.data;
            } else {
                $rootScope.countries = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.countries = [];
        });
    };
    $scope.getMaritalStatuses = function () {
        $http.get(apiPath.url + 'get_all_where/maritial_status/Marital Status/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.marital_statuses = response.data.result.data;
            } else {
                $rootScope.marital_statuses = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.marital_statuses = [];
        });
    };
    $scope.getStaffs = function (did, page) {
        if (typeof page !== 'undefined') {
            var found = false;
            angular.forEach($scope.designations, function (val, key) {
                if (!found && parseInt(val.ID) === parseInt(did)) {
                    var qry = 'null';
                    if (typeof val.searchtext !== 'undefined' && val.searchtext !== '') {
                        qry = val.searchtext;
                    }
                    $http.get(apiPath.url + 'get_staffs/' + did + '/' + page + '/' + qry).then(function (response) {
                        var pages_count = 0;
                        if (response.data.result.error === false) {
                            val.data = response.data.result.data;
                            pages_count = parseInt(parseInt(response.data.result.records) / 10);
                            if (parseInt(response.data.result.records) % 10 > 0) {
                                pages_count = pages_count + 1;
                            }
                        } else {
                            val.data = [];
                        }
                        val.total = pages_count;
                        val.page = page;
                    }, function (error) {
                        predefined.showAlert('Error', error.statusText);
                        val.data = [];
                        val.total = 0;
                        val.page = 0;
                    });
                    found = true;
                }
            });
        }
    };
    $scope.preview = function (src) {
        $mdDialog.show({
            templateUrl: 'forms/preview.html',
            controller: 'PreviewController',
            clickOutsideToClose: true,
            locals: {
                data: {
                    src: src
                }
            }
        }).then(function (data) {
            console.log('Closed sheet');
        }).catch(function (error) {
            console.log('Cancelled sheet');
        });
    };
    $scope.openForm = function (id, form, did, page) {
        var data = {ID: 0};
        var found = false;
        angular.forEach($scope.designations, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(did)) {
                var found_staff = false;
                angular.forEach(val.data, function (val, key) {
                    if (!found_staff && parseInt(val.ID) === parseInt(id)) {
                        data = angular.copy(val);
                        found_student = true;
                    }
                });
                found = true;
            }
        });
        $mdBottomSheet.show({
            templateUrl: 'forms/' + form + '.html',
            controller: 'TCDetailsController',
            locals: {
                data: {
                    data: data
                }
            }
        }).then(function (res) {
            $scope.getStaffs(did, page);
        }).catch(function (error) {
            console.log('Sheet ignored');
        });
    };
    $scope.deleteStaff = function (ev, form, id, slug, did, page) {
        var confirm = $mdDialog.confirm()
                .title('Are you sure?')
                .textContent('Do you want to delete this record? You can\'t recover!!')
                .ariaLabel('Label')
                .targetEvent(ev)
                .ok('Yes! delete it')
                .cancel('Cancel');
        $mdDialog.show(confirm).then(function () {
            $http({
                method: 'DELETE',
                url: apiPath.url + '/delete/' + form + '/' + id + '/' + slug
            }).then(function (response) {
                if (response.data.result.error === false) {
                    $scope.getStaffs(did, page);
                }
                predefined.showToast(response.data.result.message, 'top right');
            }, function (error) {
                predefined.showToast(error.statusText, 'top right');
            });
        }, function () {
            console.log('Cancel');
        });
    };
    $scope.getGenders();
    $scope.getDesignations();
    $scope.getCountries();
    $scope.getMaritalStatuses();
    $scope.getBloodGroups();
    $scope.getCasts();
    $scope.getReligions();
    $scope.getStaffs(1);
});