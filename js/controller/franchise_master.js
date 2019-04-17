app.controller('FranchiseMasterController', function ($scope, $rootScope, $http, apiPath, handset, $uibModal, predefined, $timeout, DTOptionsBuilder, DTColumnDefBuilder, $ngConfirm) {
    $rootScope.title = 'franchise_master';
    $rootScope.pagetitle = 'Franchise Master';
    $scope.data = [];
    $scope.selected_items = [];
    $scope.selected_tab = 'franchise';
    $scope.select_all = {checkbox: false};
    $scope.do_more = {selected: ''};
    $scope.getData = function (table) {
        handset.showSpinner();
        var formData = new FormData();
        $scope.select_all.checkbox = false;
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
            .withOption('order', [[1, 'asc']])
            .withLanguage({
                sSearch: '<i class="fa fa-search"></i>',
                sSearchPlaceholder: 'Search...'
            })
            .withDisplayLength(10);
    $scope.programColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0).notSortable(),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2),
        DTColumnDefBuilder.newColumnDef(3),
        DTColumnDefBuilder.newColumnDef(4),
        DTColumnDefBuilder.newColumnDef(5),
        DTColumnDefBuilder.newColumnDef(6),
        DTColumnDefBuilder.newColumnDef(7).notSortable()
    ];
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
            size: 'lg',
            controller: 'FranchiseFormController',
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
    $scope.getData('franchise');
    $scope.checkAll = function () {
        if ($scope.select_all.checkbox === true) {
            angular.forEach($scope.data, function (val, key) {
                ($scope.selected_items).push(val.ID);
            });
        } else {
            $scope.selected_items = [];
        }
    };
});

app.controller('FranchiseFormController', function ($scope, $uibModalInstance, data, handset, $http, apiPath, predefined, userDetail, $ngConfirm, $timeout, $filter) {
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    };
    $scope.search_filter = {text: ''};
    $scope.search_filter_exist = {text: ''};
    $scope.countries = [];
    $scope.states = [];
    $scope.cities = [];
    $scope.image = '';
    $scope.form = data.data;
    $scope.data = null;
    $scope.avail_selected = [];
    $scope.selected_items = [];
    $scope.select_all = {checkbox: false, checkbox_avail: false};
    $scope.selected_tab = 'franchise_programs';
    $scope.do_more = {selected: ''};
    $scope.submitForm = function () {
        var formData = new FormData();
        angular.forEach($scope.form, function (val, key) {
            formData.append(key, val);
        });
        formData.append('created_by', userDetail.get('eshine_ID'));
        formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
        handset.showSpinner();
        $http.post(apiPath.url + 'add_row/' + data.table + '/' + data.slug, formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            handset.hideSpinner();
            $uibModalInstance.close(response);
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
        });
    };
    $scope.uploadImage = function (file, field) {
        var formData = new FormData();
        formData.append('file', file[0]);
        $http.post(apiPath.url + 'upload_image', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            if (response.data.result.error === false) {
                $scope.form[field] = response.data.result.data;
            } else {
                $scope.form[field] = '';
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
        });
    };
    $scope.loadAddressData = function (table, wre) {
        var where = '';
        if (wre === 'ID') {
            where = where + 'ID > 0';
        }
        if (wre === 'country_id') {
            where = where + 'country_id=' + $scope.form.country_id;
        }
        if (wre === 'state_id') {
            where = where + 'state_id=' + $scope.form.state_id;
        }
        $http.get(apiPath.url + 'get_all_where/' + table + '/Data/' + where).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                $scope[table] = response.data.result.data;
            } else {
                $scope[table] = [];
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope[table] = [];
        });
    };
    $scope.getReportsDetail = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'get_franchise_reports/' + data.data.ID).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                $scope.data = response.data.result.data;
            } else {
                $scope.data = null;
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.data = null;
        });
    };
    $scope.getProgramsDetail = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'get_franchise_programs/' + data.data.ID).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                $scope.data = response.data.result.data;
            } else {
                $scope.data = null;
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.data = null;
        });
    };
    $scope.toggle = function (item, list) {
        var idx = list.indexOf(item);
        if (idx > -1) {
            list.splice(idx, 1);
        } else {
            list.push(item);
        }
    };
    $scope.exists = function (item, list) {
        return list.indexOf(item) > -1;
    };
    $scope.toggleProgram = function (l1, l2, l3, list) {
        var found = false;
        angular.forEach(list, function (val, key) {
            if (!found && parseInt(val.level_one_id) === parseInt(l1) && parseInt(val.level_two_id) === parseInt(l2) && parseInt(val.level_three_id) === parseInt(l3)) {
                list.splice(key, 1);
                $scope.select_all.checkbox_avail = false;
                found = true;
            }
        });
        if (!found) {
            list.push({level_one_id: l1, level_two_id: l2, level_three_id: l3});
            if (($scope.data.avail).length === ($scope.avail_selected).length) {
                $scope.select_all.checkbox_avail = true;
            }
        }
    };
    $scope.existsProgram = function (l1, l2, l3, list) {
        var found = false;
        angular.forEach(list, function (val, key) {
            if (!found && parseInt(val.level_one_id) === parseInt(l1) && parseInt(val.level_two_id) === parseInt(l2) && parseInt(val.level_three_id) === parseInt(l3)) {
                found = true;
            }
        });
        return found;
    };
    if (data.table === 'franchise') {
        $scope.loadAddressData('countries', 'ID');
        if (typeof ($scope.form.ID) !== 'undefined' && parseInt($scope.form.ID) !== 0) {
            $scope.loadAddressData('states', 'country_id');
            $scope.loadAddressData('cities', 'state_id');
        }
    }
    if (data.table === 'franchise_reports') {
        $scope.getReportsDetail();
    }
    if (data.table === 'franchise_programs') {
        $scope.getProgramsDetail();
    }
    $scope.mapReports = function () {
        handset.showSpinner();
        angular.forEach($scope.avail_selected, function (val, key) {
            var formData = new FormData();
            formData.append('franchise_id', data.data.ID);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            formData.append('report_id', val);
            $http.post(apiPath.url + 'add_row/' + data.table + '/' + data.slug, formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
                if (key === ($scope.avail_selected.length - 1)) {
                    handset.hideSpinner();
                    $scope.getReportsDetail();
                    $scope.avail_selected = [];
                }
            }, function (data) {
                handset.hideSpinner();
                predefined.showAlert('Error', data.statusText);
            });
        });
    };
    $scope.mapPrograms = function () {
        handset.showSpinner();
        angular.forEach($scope.avail_selected, function (val, key) {
            var formData = new FormData();
            formData.append('franchise_id', data.data.ID);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            formData.append('level_one_id', val.level_one_id);
            formData.append('level_two_id', val.level_two_id);
            formData.append('level_three_id', val.level_three_id);
            formData.append('start_date', moment($scope.form.start).format('YYYY-MM-DD'));
            formData.append('end_date', moment($scope.form.end).format('YYYY-MM-DD'));
            $http.post(apiPath.url + 'add_row/' + data.table + '/' + data.slug, formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
                if (key === ($scope.avail_selected.length - 1)) {
                    handset.hideSpinner();
                    $scope.getProgramsDetail();
                    $scope.avail_selected = [];
                }
            }, function (data) {
                handset.hideSpinner();
                predefined.showAlert('Error', data.statusText);
            });
        });
    };
    $scope.filter = {format: 'yyyy-MM-dd'};
    $scope.calendar = {
        start: false,
        end: false,
        open: function (type) {
            $scope.calendar[type] = true;
        },
        options: {
            formatYear: 'yy',
            startingDay: 1,
            showWeeks: false,
            minDate: new Date(),
            type: 'datetime-local'
        },
        alt_formats: ['M!/d!/yyyy']
    };
    $scope.checkRow = function (id) {
        var idx = $scope.selected_items.indexOf(id);
        if (idx > -1) {
            $scope.selected_items.splice(idx, 1);
            $scope.select_all.checkbox = false;
        } else {
            $scope.selected_items.push(id);
            if (($scope.selected_items).length === ($scope.data.exist).length) {
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
                                            $scope.getProgramsDetail();
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
                                if (data.table === 'franchise_reports') {
                                    $scope.getReportsDetail();
                                }
                                if (data.table === 'franchise_programs') {
                                    $scope.getProgramsDetail();
                                }
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
    $scope.checkAll = function () {
        if ($scope.select_all.checkbox === true) {
            angular.forEach($filter('filter')($scope.data.exist, $scope.search_filter_exist.text), function (val, key) {
                ($scope.selected_items).push(val.ID);
            });
        } else {
            $scope.selected_items = [];
        }
    };
    $scope.checkAllAvails = function () {
        if ($scope.select_all.checkbox_avail === true) {
            angular.forEach($filter('filter')($scope.data.avail, $scope.search_filter.text), function (val, key) {
                ($scope.avail_selected).push({level_one_id: val.level_one_id, level_two_id: val.level_two_id, level_three_id: val.level_three_id});
            });
        } else {
            $scope.avail_selected = [];
        }
    };
});