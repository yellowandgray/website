app.controller('ReportsController', function ($scope, $rootScope, reports, userDetail, $http, apiPath, DTColumnDefBuilder, DTOptionsBuilder, $uibModal) {
    $rootScope.title = 'reports';
    $rootScope.pagetitle = 'Reports';
    $scope.data = [];
    $scope.reports = reports;
    $scope.getData = function (rid) {
        $http.get(apiPath.url + 'get_all_where/report_submits/Reports/report_id=' + rid + ' AND franchise_id=' + userDetail.get('eshine_ID')).then(function (response) {
            if (response.data.result.error === false) {
                $scope.data = response.data.result.data;
            } else {
                $scope.data = [];
            }
        }, function (error) {
            $scope.data = [];
        });
    };
    $scope.programOptions = DTOptionsBuilder.newOptions()
            .withPaginationType('full_numbers')
            //.withDOM('iftp')
            //.withOption('order', [[0, 'asc']])
            .withLanguage({
                sSearch: '',
                sSearchPlaceholder: 'Search...'
            })
            .withDisplayLength(10);
    $scope.programColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2).notSortable()
    ];
    $scope.openForm = function (form, table, slug, rid) {
        var data = {ID: 0, report_id: rid, franchise_id: userDetail.get('eshine_ID')};
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
            $scope.getData(rid);
        }, function () {
            console.log('Dismissed');
        });
    };
});