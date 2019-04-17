app.controller('GuidelineController', function ($scope, $location, $rootScope, $http, handset, apiPath, predefined, userDetail, $uibModal) {
    $rootScope.title = 'guideline';
    $rootScope.pagetitle = 'Guideline';
    $scope.data = null;
    $scope.search = '';
    $scope.selected_levelone = '';
    $scope.selected_leveltwo = '';
    $scope.selected_levelthree = '';
    $scope.selected_levelfour = '';
    $scope.selected_levelfourid = 0;
    $scope.contents = [];
    $scope.goToDashboard = function () {
        $location.path('dashboard');
    };
    $scope.getProgramMapping = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'guideline_mapped_data_for_franchise/' + userDetail.get('eshine_ID')).then(function (response) {
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
    $scope.mainCurriculam = function () {
        var data = 0;
        if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree !== '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree], function (val, key) {
                if (!found) {
                    data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree][key][0].curriculam;
                    found = true;
                }
            });
        } else if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree === '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, key) {
                if (!found) {
                    data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][key][0].curriculam;
                    found = true;
                }
            });
        } else {
            if ($scope.selected_levelone !== '') {
                var found = false;
                angular.forEach($scope.data[$scope.selected_levelone], function (val, key) {
                    if (!found) {
                        data = $scope.data[$scope.selected_levelone][key][0].curriculam;
                        found = true;
                    }
                });
            }
        }
        return data;
    };
    $scope.mainCurriculamPath = function () {
        var data = '';
        if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree !== '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree], function (val, key) {
                if (!found) {
                    data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree][key][0].curriculum_path;
                    found = true;
                }
            });
        } else if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree === '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, key) {
                if (!found) {
                    data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][key][0].curriculum_path;
                    found = true;
                }
            });
        } else {
            if ($scope.selected_levelone !== '') {
                var found = false;
                angular.forEach($scope.data[$scope.selected_levelone], function (val, key) {
                    if (!found) {
                        data = $scope.data[$scope.selected_levelone][key][0].curriculum_path;
                        found = true;
                    }
                });
            }
        }
        return data;
    };
    $scope.curriculam = function () {
        var data = {};
        if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree !== '') {
            data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree];
        } else if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree === '') {
            data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo];
        } else {
            if ($scope.selected_levelone !== '') {
                data = $scope.data[$scope.selected_levelone];
            }
        }
        return data;
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
        if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree !== '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree], function (val, key) {
                if (!found) {
                    $scope.selected_levelfour = val[0].level_four_name;
                    $scope.selected_levelfourid = val[0].ID;
                    found = true;
                }
            });
        } else if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree === '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, key) {
                if (!found) {
                    $scope.selected_levelfour = val[0].level_four_name;
                    $scope.selected_levelfourid = val[0].ID;
                    found = true;
                }
            });
        } else {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone], function (val, key) {
                if (!found) {
                    $scope.selected_levelfour = val[0].level_four_name;
                    $scope.selected_levelfourid = val[0].ID;
                    found = true;
                }
            });
        }
        $scope.getContents();
    };
    $scope.makeActive = function (key, id) {
        $scope.selected_levelfour = key;
        $scope.selected_levelfourid = id;
        $scope.getContents();
    };
    $scope.getContents = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'content_mapped_data_guideline/' + $scope.selected_levelfourid).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                $scope.contents = response.data.result.data;
            } else {
                $scope.contents = [];
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.contents = [];
        });
    };
    $scope.notArray = function (array) {
        return !Array.isArray(array);
    };
    $scope.openDocument = function (file, type, download, print, ttype, id, name) {
        switch (type) {
            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'pdf':
            case 'mp4':
            case 'mp3':
            case 'wmv':
            case 'mov':
                var size = '';
                if (type === 'pdf') {
                    size = 'lg';
                }
                var data = {type: type, file: file, download: download, print: print, template_type: ttype, id: id, name: name};
                var modalInstance = $uibModal.open({
                    animation: true,
                    ariaLabelledBy: 'modal-title',
                    ariaDescribedBy: 'modal-body',
                    templateUrl: 'play_media.html',
                    controller: 'MediaController',
                    size: size,
                    resolve: {
                        data: function () {
                            return {
                                data: data
                            };
                        }
                    }
                });
                modalInstance.result.then(function (response) {
                    console.log('Closed');
                }, function () {
                    console.log('Dismissed');
                });
                break;
            default:
                window.open('http://eshine.myarisenshine.com/v1/' + file, '_blank');
                break;
        }
    };
    $scope.getProgramMapping();
});