app.controller('GuidelineMasterController', function ($scope, $rootScope, $ngConfirm, $timeout, $http, apiPath, handset, $uibModal, predefined, DTOptionsBuilder, DTColumnDefBuilder, $filter) {
    $rootScope.title = 'guideline_master';
    $rootScope.pagetitle = 'Guideline Master';
    $scope.data = [];
    $scope.selected_items = [];
    $scope.selected_tab = '';
    $scope.select_all = {checkbox: false};
    $scope.do_more = {selected: ''};
    $scope.getData = function (table) {
        $scope.selected_items = [];
        $scope.selected_tab = table;
        $scope.select_all.checkbox = false;
        $scope.do_more = {selected: ''};
        handset.showSpinner();
        var formData = new FormData();
        angular.forEach($scope.formFields, function (val, key) {
            formData.append(key, val);
        });
        $http.get(apiPath.url + 'get_all_where/' + table + '/Data/ID > 0 ORDER BY ID DESC').then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                $scope.data = response.data.result.data;
            } else {
                $scope.data = [];
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.data = [];
        });
    };
    $scope.programOptions = DTOptionsBuilder.newOptions()
            .withPaginationType('full_numbers')
            //.withDOM('iftp')
            .withOption('order', [[2, 'asc']])
            .withLanguage({
                sSearch: '<i class="fa fa-search"></i>',
                sSearchPlaceholder: 'Search...'
            })
            .withDisplayLength(10);
    $scope.programColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0).notSortable(),
        DTColumnDefBuilder.newColumnDef(1).notSortable(),
        DTColumnDefBuilder.newColumnDef(2),
        DTColumnDefBuilder.newColumnDef(3),
        DTColumnDefBuilder.newColumnDef(4),
        DTColumnDefBuilder.newColumnDef(5).notSortable()
    ];
    $scope.programLevelOneColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0).notSortable(),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2),
        DTColumnDefBuilder.newColumnDef(3)
    ];
    $scope.checkRow = function (id) {
        var idx = $scope.selected_items.indexOf(id);
        if (idx > -1) {
            $scope.selected_items.splice(idx, 1);
            $scope.select_all.checkbox = false;
        } else {
            $scope.selected_items.push(id);
            if (($scope.selected_items).length === ($scope.data).length) {
                $scope.select_all.checkbox = true;
            }
        }
    };
    $scope.checkCheckedRow = function (id) {
        return $scope.selected_items.indexOf(id) > -1;
    };
    $scope.doMoreAction = function () {
        if (($scope.selected_items).length > 0) {
            switch ($scope.do_more.selected) {
                case 'delete':
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
                                        url: apiPath.url + 'delete_multi/' + $scope.selected_tab + '/' + ($scope.selected_items).join(',') + '/Records'
                                    }).then(function (response) {
                                        if (response.data.result.error === false) {
                                            $scope.getData($scope.selected_tab);
                                            $scope.selected_items = [];
                                            $scope.do_more = {selected: ''};
                                        }
                                        predefined.showAlert('Information', response.data.result.message);
                                    }, function (error) {
                                        predefined.showAlert('Error', error.statusText);
                                    });
                                }
                            },
                            no: function () {
                                $timeout(function () {
                                    $scope.do_more = {selected: ''};
                                }, 200);
                            }
                        }
                    });
                    break;
                default:
                    break;
            }
        } else {
            predefined.showAlert('Information', 'Please select atleast one record');
        }
    };
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
                        data: data
                    };
                }
            }
        });
        modalInstance.result.then(function (response) {
            $scope.getData(table);
            $timeout(function () {
                predefined.showAlert('Information', response.data.result.message);
            }, 200);
        }, function () {
            console.log('Dismissed');
        });
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
                                $scope.getData(table);
                                $scope.selected_items = [];
                                $scope.do_more = {selected: ''};
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
    $scope.checkAll = function (ind) {
        var search_qry = $('#DataTables_Table_' + ind + '_filter .dataTables_filter input').val();
        if ($scope.select_all.checkbox === true) {
            angular.forEach($filter('filter')($scope.data, search_qry), function (val, key) {
                ($scope.selected_items).push(val.ID);
            });
        } else {
            $scope.selected_items = [];
        }
    };
});