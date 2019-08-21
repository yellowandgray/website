app.controller('SubCategoriesController', function ($scope, $rootScope, $http, apiPath, handset, $uibModal, predefined, $timeout, DTOptionsBuilder, DTColumnDefBuilder, categories) {
    $rootScope.title = 'sub_categories';
    $rootScope.pagetitle = 'Sub Categories';
    $rootScope.dropdown_categories = categories;
    $scope.data = [];
    $scope.getData = function () {
        handset.showSpinner();
        var formData = new FormData();
        angular.forEach($scope.formFields, function (val, key) {
            formData.append(key, val);
        });
        $http.get(apiPath.url + 'get_all_where/sub_categories/Data/ID > 0 ORDER BY ID DESC').then(function (response) {
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
            .withOption('order', [[0, 'asc']])
            .withLanguage({
                sSearch: '',
                sSearchPlaceholder: 'Search...'
            })
            .withDisplayLength(10);
    $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2).notSortable(),
        DTColumnDefBuilder.newColumnDef(3).notSortable(),
        DTColumnDefBuilder.newColumnDef(4).notSortable(),
        DTColumnDefBuilder.newColumnDef(5),
        DTColumnDefBuilder.newColumnDef(6).notSortable()
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