app.controller('CalendarAdminController', function ($scope, $rootScope, $http, apiPath, handset, $uibModal, $timeout, $ngConfirm, predefined, calendarConfig) {
    $rootScope.title = 'calendar_admin';
    $rootScope.pagetitle = 'calendar Admin';
    $scope.selectedEvents = null;
    $scope.data = [];
    $scope.calendarView = 'month';
    $scope.calendarTitle = '';
    $scope.viewDate = new Date();
    $scope.cellIsOpen = false;
    $scope.getData = function (type) {
        $scope.selectedEvents = null;
        handset.showSpinner();
        $http.get(apiPath.url + 'get_calendar/type = \'' + type + '\' ORDER BY ID DESC').then(function (response) {
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
    $scope.openForm = function (form, table, slug) {
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: form + '.html',
            controller: 'FormCalendarController',
            resolve: {
                data: function () {
                    return {
                        table: table,
                        slug: slug,
                        data: {type: form, level_one_id: ''}
                    };
                }
            }
        });
        modalInstance.result.then(function (response) {
            $scope.getData(form);
            $timeout(function () {
                predefined.showAlert('Information', response.data.result.message);
            }, 200);
        }, function () {
            console.log('Dismissed');
        });
    };
    $scope.deleteRecord = function (table, id, slug, type) {
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
                                $scope.getData(type);
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
});

app.controller('FormCalendarController', function ($scope, $uibModalInstance, data, handset, $http, apiPath, predefined, userDetail) {
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    };
    $scope.data = [];
    $scope.image = '';
    $scope.form = data.data;
    $scope.submitForm = function () {
        var total_requests = ($scope.form.level_one_id).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.form.level_one_id, function (v, k) {
            var formData = new FormData();
            angular.forEach($scope.form, function (val, key) {
                if (key !== 'level_one_id') {
                    if (key === 'start' || key === 'end') {
                        formData.append(key, moment(val).format('YYYY-MM-DD HH:mm:ss'));
                    } else {
                        formData.append(key, val);
                    }
                }
            });
            formData.append('level_one_id', v);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            $http.post(apiPath.url + 'add_row/' + data.table + '/' + data.slug, formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
                process_requests = process_requests + 1;
                if (process_requests === total_requests) {
                    handset.hideSpinner();
                    $uibModalInstance.close(response);
                }
            }, function (data) {
                handset.hideSpinner();
                predefined.showAlert('Error', data.statusText);
            });
        });
    };
    $http.get(apiPath.url + 'get_all/level_one/Program').then(function (response) {
        if (response.data.result.error === false) {
            $scope.data = response.data.result.data;
        }
    }, function (data) {
        predefined.showAlert('Error', data.statusText);
        $scope.data = [];
    });
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
});