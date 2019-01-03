app.controller('CategoriesController', function ($scope, $rootScope, userDetail, $http, apiPath, $location, handset, $uibModal, predefined, $timeout, DTOptionsBuilder, DTColumnDefBuilder) {
    $rootScope.title = 'categories';
    $rootScope.pagetitle = 'Categories';
    $scope.data = [];
    $scope.getData = function () {
        handset.showSpinner();
        var formData = new FormData();
        angular.forEach($scope.formFields, function (val, key) {
            formData.append(key, val);
        });
        $http.get(apiPath.url + 'get_all_where/categories/Data/ID > 0 ORDER BY ID DESC').then(function (response) {
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
    $scope.dtOptions = DTOptionsBuilder.newOptions()
            .withPaginationType('full_numbers')
            //.withDOM('iftp')
            .withOption('order', [[1, 'asc']])
            .withLanguage({
                sSearch: '',
                sSearchPlaceholder: 'Search...'
            })
            .withDisplayLength(10);
    $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0).notSortable(),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2),
        DTColumnDefBuilder.newColumnDef(3).notSortable()
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
            $scope.getData();
            $timeout(function () {
                predefined.showAlert('Error', response.data.result.message);
            }, 200);
        }, function () {
            console.log('Dismissed');
        });
    };
    $scope.deleteRecord = function (table, id, slug) {
        if (confirm('Do you want to remove this ' + slug + '? You can\'t recover!!')) {
            $http({
                method: 'DELETE',
                url: apiPath.url + '/delete/' + table + '/' + id + '/' + slug
            }).then(function (response) {
                if (response.data.result.error === false) {
                    $scope.getData();
                }
                predefined.showAlert('Information', response.data.result.message);
            }, function (error) {
                predefined.showAlert('Error', error.statusText);
            });
        }
    };
    $scope.getData();
});

app.controller('FormController', function ($scope, $uibModalInstance, data, handset, $http, apiPath, predefined, userDetail) {
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    };
    $scope.image = '';
    $scope.form = data.data;
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
});