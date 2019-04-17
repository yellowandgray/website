app.controller('FranchiseReportController', function ($scope, $rootScope, $http, apiPath, handset, predefined, DTOptionsBuilder, DTColumnDefBuilder) {
    $rootScope.title = 'franchise_report';
    $rootScope.pagetitle = 'Franchise Report';
    $scope.data = null;
    $scope.franchises = [];
    $scope.form = {start: new Date(), end: new Date(), franchise: 'all'};
    $scope.getData = function () {
        handset.showSpinner();
        var from = null;
        var to = null;
        console.log($scope.form.start);
        if ($scope.form.start !== '' && $scope.form.start !== null) {
            from = moment($scope.form.start).format('YYYY-MM-DD');
        }
        if ($scope.form.end !== '' && $scope.form.end !== null) {
            to = moment($scope.form.end).format('YYYY-MM-DD');
        }
        $http.get(apiPath.url + 'get_franchise_history/' + from + '/' + to + '/' + $scope.form.franchise).then(function (response) {
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
            .withOption('order', [[0, 'asc']])
            .withLanguage({
                sSearch: '<i class="fa fa-search"></i>',
                sSearchPlaceholder: 'Search...'
            })
            .withDisplayLength(10);
    $scope.programColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1),
        DTColumnDefBuilder.newColumnDef(2),
        DTColumnDefBuilder.newColumnDef(3),
        DTColumnDefBuilder.newColumnDef(4),
        DTColumnDefBuilder.newColumnDef(5)
    ];
    $http.get(apiPath.url + 'get_all/franchise/Franchise').then(function (response) {
        if (response.data.result.error === false) {
            $scope.franchises = response.data.result.data;
        } else {
            $scope.franchises = [];
        }
    }, function (data) {
        predefined.showAlert('Error', data.statusText);
        $scope.franchises = [];
    });
});
