app.controller('ContentMasterController', function ($scope, $rootScope, $http, apiPath, handset, $uibModal, predefined, $timeout, DTOptionsBuilder, DTColumnDefBuilder, $ngConfirm, $filter) {
    $rootScope.title = 'content_master';
    $rootScope.pagetitle = 'Content Master';
    $scope.data = [];
    $scope.selected_items = [];
    $scope.selected_tab = 1;
    $scope.select_all = {checkbox: false};
    $scope.do_more = {selected: ''};
    $scope.getData = function (cat) {
        handset.showSpinner();
        $scope.selected_items = [];
        $scope.selected_tab = cat;
        $scope.select_all.checkbox = false;
        $scope.do_more = {selected: ''};
        var formData = new FormData();
        angular.forEach($scope.formFields, function (val, key) {
            formData.append(key, val);
        });
        $http.get(apiPath.url + 'get_all_where/contents/Data/ID > 0 AND category = ' + cat + ' ORDER BY ID DESC').then(function (response) {
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
    $scope.contentOptions = DTOptionsBuilder.newOptions()
            .withPaginationType('full_numbers')
            //.withDOM('iftp')
            .withOption('order', [[1, 'asc']])
            .withLanguage({
                sSearch: '<i class="fa fa-search"></i>',
                sSearchPlaceholder: 'Search...'
            })
            .withDisplayLength(10);
    $scope.contentColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0).notSortable(),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2).withOption('type', 'image'),
        DTColumnDefBuilder.newColumnDef(3),
        DTColumnDefBuilder.newColumnDef(4),
        DTColumnDefBuilder.newColumnDef(5),
        DTColumnDefBuilder.newColumnDef(6),
        DTColumnDefBuilder.newColumnDef(7),
        DTColumnDefBuilder.newColumnDef(8),
        DTColumnDefBuilder.newColumnDef(9),
        DTColumnDefBuilder.newColumnDef(10),
        DTColumnDefBuilder.newColumnDef(11),
        DTColumnDefBuilder.newColumnDef(12).notSortable()
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
                                        url: apiPath.url + 'delete_multi/contents/' + ($scope.selected_items).join(',') + '/Records'
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
        var data = {is_downloadable: '0', is_printable: '0', template_type: '0', mapping_type: 'program', category: '1'};
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
            controller: 'FormContentController',
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
            $scope.getData($scope.selected_tab);
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
                                $scope.getData($scope.selected_tab);
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
    $scope.openDocument = function (file, type, download, print, ttype, id, name) {
        switch (type) {
            case 'png':
            case 'jpg':
            case 'gif':
            case 'jpeg':
            case 'pdf':
            case 'mp4':
            case 'wmv':
            case 'mp3':
            case 'mov':
                var data = {type: type, file: file, download: download, print: print, template_type: ttype, id: id, name: name};
                var modalInstance = $uibModal.open({
                    animation: true,
                    ariaLabelledBy: 'modal-title',
                    ariaDescribedBy: 'modal-body',
                    templateUrl: 'file.html',
                    controller: 'MediaController',
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

app.controller('FormContentController', function ($scope, $uibModalInstance, data, handset, $http, apiPath, predefined, userDetail, $rootScope) {
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    };
    $scope.image = '';
    $scope.form = data.data;
    $scope.parents = [];
    $scope.attach_file = 'Attach File';
    $scope.submitForm = function () {
        var formData = new FormData();
        angular.forEach($scope.form, function (val, key) {
            formData.append(key, val);
        });
        if (typeof $scope.form.ID === 'undefined' || parseInt($scope.form.ID) === 0) {
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
        }
        formData.append('updated_by', userDetail.get('eshine_ID'));
        formData.append('updated_at', moment().format('YYYY-MM-DD HH:mm:ss'));
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
        $scope.attach_file = file[0].name;
        handset.showSpinner();
        var formData = new FormData();
        formData.append('file', file[0]);
        $http.post(apiPath.url + 'upload_image', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                $scope.form[field] = response.data.result.data;
                $scope.form.extension = response.data.result.extension;
            } else {
                $scope.form[field] = '';
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
        });
    };
    $http.get(apiPath.url + 'get_all_where/contents/Data/template_type = 1 ORDER BY ID DESC').then(function (response) {
        if (response.data.result.error === false) {
            $scope.parents = response.data.result.data;
            $rootScope.contents = response.data.result.data;
        } else {
            $rootScope.contents = [];
        }
    }, function (data) {
        $rootScope.contents = [];
        predefined.showAlert('Error', data.statusText);
    });
});