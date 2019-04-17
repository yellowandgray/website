app.controller('SitemapController', function ($scope, $rootScope, $http, apiPath, handset, predefined, $filter, userDetail, $location) {
    $rootScope.title = 'sitemap';
    $rootScope.pagetitle = 'Sitemap';
    $scope.data = {};
    $scope.value = [];
    $scope.treeOptions = {
        nodeChildren: "children",
        dirSelectable: true,
        injectClasses: {
            ul: "a1",
            li: "a2",
            liSelected: "a7",
            iExpanded: "a3",
            iCollapsed: "a4",
            iLeaf: "a5",
            label: "a6",
            labelSelected: "a8"
        }
    };
    $scope.getProgramMapping = function () {
        handset.showSpinner();
        $scope.data = {};
        $scope.value = [];
        $http.get(apiPath.url + 'program_mapped_data_franchise_sitemap/' + userDetail.get('eshine_ID')).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                angular.forEach(response.data.result.data, function (val, key) {
                    var childrens = [];
                    if (!Array.isArray(val)) {
                        angular.forEach(val, function (va, ke) {
                            if (!Array.isArray(va)) {
                                var second_child = [];
                                angular.forEach(va, function (v, k) {
                                    if (!Array.isArray(v)) {
                                        var third_child = [];
                                        angular.forEach(v, function (r, i) {
                                            third_child.push({name: i, children: []});
                                        });
                                        second_child.push({name: $filter('name')(k), children: third_child});
                                    } else {
                                        second_child.push({name: $filter('name')(k), children: []});
                                    }
                                });
                                childrens.push({name: $filter('name')(ke), children: second_child});
                            } else {
                                childrens.push({name: $filter('name')(ke), children: []});
                            }
                        });
                    }
                    ($scope.value).push($filter('name')(key));
                    $scope.data[$filter('name')(key)] = [{name: $filter('name')(key), children: childrens}];
                    //($scope.data).push({name: $filter('name')(key), children: childrens});
                });
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.data = {};
            $scope.value = [];
        });
    };
    $scope.getGuidelineMapping = function () {
        handset.showSpinner();
        $scope.data = {};
        $scope.value = [];
        $http.get(apiPath.url + 'guideline_mapped_data_for_franchise/' + userDetail.get('eshine_ID')).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                angular.forEach(response.data.result.data, function (val, key) {
                    var childrens = [];
                    if (!Array.isArray(val)) {
                        angular.forEach(val, function (va, ke) {
                            if (!Array.isArray(va)) {
                                var second_child = [];
                                angular.forEach(va, function (v, k) {
                                    if (!Array.isArray(v)) {
                                        var third_child = [];
                                        angular.forEach(v, function (r, i) {
                                            third_child.push({name: i, children: []});
                                        });
                                        second_child.push({name: $filter('name')(k), children: third_child});
                                    } else {
                                        second_child.push({name: $filter('name')(k), children: []});
                                    }
                                });
                                childrens.push({name: $filter('name')(ke), children: second_child});
                            } else {
                                childrens.push({name: $filter('name')(ke), children: []});
                            }
                        });
                    }
                    ($scope.value).push($filter('name')(key));
                    $scope.data[$filter('name')(key)] = [{name: $filter('name')(key), children: childrens}];
                    //($scope.data).push({name: $filter('name')(key), children: childrens});
                });
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.data = {};
            $scope.value = [];
        });
    };
    $scope.redirectToGuideline = function () {
        $location.path('guideline');
    };
    $scope.redirectToProgram = function (node, name) {
        $http.get(apiPath.url + 'get_row_where/level_one/Program/name=\'' + $.trim(name) + '\'').then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                userDetail.set('eshine_selected_program', response.data.result.data.ID);
                $location.path('program_detail');
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
        });
    };
});