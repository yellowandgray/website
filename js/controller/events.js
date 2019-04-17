app.controller('EventsController', function ($scope, $rootScope, $http, apiPath, predefined, handset, userDetail) {
    $rootScope.title = 'events';
    $rootScope.pagetitle = 'Event';
    $scope.selectedEvents = null;
    $scope.data = [];
    $scope.calendarView = 'month';
    $scope.calendarTitle = '';
    $scope.viewDate = new Date();
    $scope.cellIsOpen = false;
    $scope.getData = function () {
        $scope.selectedEvents = [];
        handset.showSpinner();
        $http.get(apiPath.url + 'get_franchise_events/' + userDetail.get('eshine_ID')).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                angular.forEach(response.data.result.data, function (val, key) {
                    val.color = {
                        primary: '#18a1d7',
                        secondary: '#18a1d7'
                    };
                });
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
    $scope.getData();
    $scope.timespanClicked = function (date, time) {
        $scope.selectedEvents = null;
        angular.forEach($scope.data, function (val, key) {
            if (moment(moment(date).format('YYYY-MM-DD 00:00:00')).isBetween(moment(val.startsAt), moment(val.endsAt)) || moment(moment(date).format('YYYY-MM-DD')).isSame(moment(moment(val.startsAt).format('YYYY-MM-DD'))) || moment(moment(date).format('YYYY-MM-DD')).isSame(moment(moment(val.endsAt).format('YYYY-MM-DD')))) {
                if ($scope.selectedEvents === null) {
                    $scope.selectedEvents = {};
                }
                if (typeof ($scope.selectedEvents)[val.level_one_name] === 'undefined') {
                    ($scope.selectedEvents)[val.level_one_name] = [];
                }
                ($scope.selectedEvents)[val.level_one_name].push(val);
            }
        });
    };
});