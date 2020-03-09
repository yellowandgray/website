app.controller('PayrollController', function ($rootScope, $scope, $mdBottomSheet, $http, apiPath, predefined, $filter) {
    $rootScope.title = 'Payroll';
    $rootScope.menu = 'payroll';
    $scope.data = [];
    $scope.designations = [];
    $scope.history_data = [];
    $scope.year_id = '';
    $scope.month_id = '';
    $scope.searchtext = {text: '', order: 'name'};
    $scope.searchhistorytext = {text: '', order: 'name'};
    $scope.max_intime = '';
    $scope.allowable_leave = '';
    $scope.working_days = [];
    $scope.history_year_id = 0;
    $scope.history_month_id = 0;
    $scope.history_year_name = '';
    $scope.history_month_name = '';
    $scope.history_err_msg = '';
    $scope.loading = false;
    window.mdSelectOnKeyDownOverride = function (event) {
        event.stopPropagation();
    };
    $scope.years = [];
    $scope.months = [];
    $http.get(apiPath.url + 'get_all_where/designitions/Designation/ID > 0').then(function (response) {
        if (response.data.result.error === false) {
            $scope.designations = response.data.result.data;
        } else {
            $scope.designations = [];
        }
    }, function (error) {
        predefined.showAlert('Error', error.statusText);
        $scope.designations = [];
    });
    $scope.getDesignationConfigs = function (id) {
        $http.get(apiPath.url + 'get_designation_configs/' + id).then(function (response) {
            if (response.data.result.error === false) {
                $scope.max_intime = response.data.result.data.max_intime;
                $scope.working_days = response.data.result.data.working_days;
                $scope.allowable_leave = response.data.result.data.allowable_leave;
            } else {
                $scope.max_intime = '';
                $scope.working_days = [];
                $scope.allowable_leave = '';
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.max_intime = '';
            $scope.working_days = [];
            $scope.allowable_leave = '';
        });
    };
    $scope.addWorkingDays = function (did) {
        $mdBottomSheet.show({
            templateUrl: 'forms/working_days.html',
            controller: 'PayrollConfigs',
            locals: {
                data: {
                    type: 'holiday',
                    data: {designition_id: did}
                }
            }
        }).then(function (data) {
            $scope.getDesignationConfigs(did);
        }).catch(function (error) {
        });
    };
    $scope.addOtherConfigs = function (did) {
        $http.get(apiPath.url + 'get_row/payroll_configs/Config/designition_id = ' + did).then(function (response) {
            var intime = '';
            var leave_allowable = '';
            var id = 0;
            if (response.data.result.error === false) {
                intime = new Date('1970-01-20 ' + response.data.result.data.in_time);
                leave_allowable = parseInt(response.data.result.data.leave_allowable);
                id = response.data.result.data.ID;
            }
            $mdBottomSheet.show({
                templateUrl: 'forms/payroll_configs.html',
                controller: 'PayrollConfigs',
                locals: {
                    data: {
                        type: 'others',
                        data: {designition_id: did, leave_allowable: leave_allowable, in_time: intime, ID: id}
                    }
                }
            }).then(function (data) {
                $scope.getDesignationConfigs(did);
            }).catch(function (error) {
            });
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.years = [];
        });
    };
    $scope.generatePayroll = function () {
        var formData = new FormData();
        formData.append('year_id', $scope.year_id);
        formData.append('month_id', $scope.month_id);
        angular.forEach($scope.timesheet, function (obj) {
            formData.append('file', obj.lfFile);
        });
        $http.post(apiPath.url + 'generate_payroll', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function (result) {
            if (result.data.result.error === false) {
                $scope.timesheetapi.removeAll();
                $scope.data = result.data.result.data;
            } else {
                $scope.data = null;
                predefined.showAlert('Information', result.data.result.message);
            }
        }, function (error) {
            $scope.data = null;
            predefined.showAlert('Error', error.statusText);
        });
    };
    $scope.searchTerm = {};
    $scope.clearSearchTerm = function () {
        $scope.searchTerm = {};
    };
    $http.get(apiPath.url + 'get_all_where/years/Year/ID > 0').then(function (response) {
        if (response.data.result.error === false) {
            $scope.years = response.data.result.data;
            $scope.year_id = response.data.result.data[(response.data.result.data).length - 1].ID;
            $scope.history_year_id = response.data.result.data[(response.data.result.data).length - 1].ID;
        } else {
            $scope.years = [];
        }
    }, function (error) {
        predefined.showAlert('Error', error.statusText);
        $scope.years = [];
    });
    $http.get(apiPath.url + 'get_all_where/months/Months/ID > 0').then(function (response) {
        if (response.data.result.error === false) {
            $scope.months = response.data.result.data;
            $scope.month_id = response.data.result.data[(response.data.result.data).length - 1].ID;
            $scope.history_month_id = response.data.result.data[(response.data.result.data).length - 1].ID;
        } else {
            $scope.months = [];
        }
    }, function (error) {
        predefined.showAlert('Error', error.statusText);
        $scope.months = [];
    });
    $scope.getLOP = function (row) {
        var res = 0;
        if ((parseInt(row.present) + parseInt(row.leave_allowable) - parseInt(row.absent)) < parseInt(row.working_days)) {
            res = parseInt(row.working_days) - parseInt(row.present) - parseInt(row.leave_allowable);
        }
        row.lop = res;
        return res;
    };
    $scope.getGrandTotal = function (row) {
        var lop = $scope.getLOP(row);
        var g_total = parseFloat(row.monthly_salary);
        var loss = 0;
        if (parseInt(lop) > 0) {
            loss = parseFloat(row.per_day_salary) * lop;
        }
        if ((row.addons).length > 0) {
            angular.forEach(row.addons, function (val, key) {
                if (val.type === 'credit') {
                    g_total = g_total + parseFloat(val.amt);
                }
                if (val.type === 'debit') {
                    loss = loss + parseFloat(val.amt);
                }
            });
        }
        row.grand_total = parseFloat(g_total - loss);
        return parseFloat(g_total - loss).toFixed(0);
    };
    $scope.addAddons = function (row) {
        $mdBottomSheet.show({
            templateUrl: 'forms/payroll_addons.html',
            controller: 'PayrollAddons',
            locals: {
                data: {
                    data: row
                }
            }
        }).then(function (data) {
            var found = false;
            angular.forEach($scope.data, function (val, key) {
                if (!found && val.emp_code === row.emp_code) {
                    val.addons = data;
                    found = true;
                }
            });
        }).catch(function (error) {
            console.log('Cancelled sheet');
        });
    };
    $scope.updateAddons = function (row) {
        $mdBottomSheet.show({
            templateUrl: 'forms/payroll_history_addons.html',
            controller: 'PayrollAddons',
            locals: {
                data: {
                    data: row
                }
            }
        }).then(function (data) {
            $scope.getPayrollHistory();
        }).catch(function (error) {
            console.log('Cancelled sheet');
        });
    };
    $scope.removeWorkingDays = function (id, did) {
        $http({
            method: 'DELETE',
            url: apiPath.url + '/delete/working_days/' + id + '/Working day'
        }).then(function (response) {
            if (response.data.result.error === false) {
                $scope.getDesignationConfigs(did);
                predefined.showToast(response.data.result.message, 'top right');
            } else {
                predefined.showToast(response.data.result.message, 'top right');
            }
        }, function (error) {
            predefined.showToast(error.statusText, 'top right');
        });
    };
    $scope.getPayrollHistory = function () {
        var found_year = false;
        var found_month = false;
        angular.forEach($scope.years, function (val, key) {
            if (!found_year && parseInt(val.ID) === parseInt($scope.history_year_id)) {
                $scope.history_year_name = val.name;
                found_year = true;
            }
        });
        angular.forEach($scope.months, function (val, key) {
            if (!found_month && parseInt(val.ID) === parseInt($scope.history_month_id)) {
                $scope.history_month_name = val.name;
                found_month = true;
            }
        });
        $http.get(apiPath.url + 'get_payroll_history/' + $scope.history_year_id + '/' + $scope.history_month_id).then(function (response) {
            if (response.data.result.error === false) {
                $scope.history_data = response.data.result.data;
            } else {
                $scope.history_data = [];
                $scope.history_err_msg = 'No history found';
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.history_data = [];
            $scope.history_err_msg = error.statusText;
        });
    };
    $scope.savePayroll = function () {
        $scope.loading = true;
        var formData = new FormData();
        formData.append('data', JSON.stringify($scope.data));
        $http.post(apiPath.url + 'save_payroll', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            $scope.loading = false;
            if (response.data.result.error === false) {
                predefined.showToast(response.data.result.message, 'top right');
                $scope.data = null;
            } else {
                predefined.showToast(response.data.result.message, 'top right');
            }
        }, function (error) {
            $scope.loading = false;
            predefined.showToast(error.statusText, 'top right');
        });
    };
    $scope.printArea = function () {
        var popupWin = window.open();
        var table_body = '';
        angular.forEach($scope.history_data, function (val, key) {
            var addons = ' - ';
            angular.forEach(val.addons, function (v, k) {
                addons = addons + $filter('type')(v.type) + v.amt + ' for ' + v.reason;
            });
            table_body = table_body + '<tr><td>' + val.name + '</td><td>' + val.emp_code + '</td><td>' + val.designition + '</td><td>' + val.total + '</td><td>' + val.total_working_days + '</td><td>' + val.presents + '</td><td>' + val.absents + '</td><td>' + val.lop + '</td><td>' + val.leave_allowable + '</td><td>' + val.late + '</td><td>' + addons + '</td><td>' + val.payable + '</td></tr>';
        });
        var table = '<html><head><title></title><link rel="stylesheet" href="css/common.css" type="text/css" /></head><body><div class="genrate-table"><table><thead><tr><th>Name</th><th>Code</th><th>Designation</th><th>Salary</th><th>Working Days</th><th>Presents</th><th>Absents</th><th>LOP</th><th>Allowable Leave</th><th>Late</th><th>Adjustments</th><th>Payable</th></tr></thead><tbody>' + table_body + '</tbody></table></div></body></html>';
        popupWin.document.write(table);
        popupWin.print();
        popupWin.close();
    };
});

app.controller('PayrollConfigs', function ($scope, data, $mdBottomSheet, $http, apiPath, predefined, $element) {
    $scope.searchTerm = {};
    $scope.clearSearchTerm = function () {
        $scope.searchTerm = {};
    };
    $element.find('input').on('keydown', function (ev) {
        ev.stopPropagation();
    });
    $scope.years = [];
    $scope.months = [];
    $scope.formFields = data.data;
    $scope.getYears = function () {
        $http.get(apiPath.url + 'get_all_where/years/Year/ID > 0').then(function (response) {
            if (response.data.result.error === false) {
                $scope.years = response.data.result.data;
            } else {
                $scope.years = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.years = [];
        });
    };
    $scope.getMonths = function (yid) {
        $http.get(apiPath.url + 'get_all_where/months/Months/ID NOT IN (SELECT month_id FROM working_days WHERE year_id = ' + yid + ' AND designition_id = ' + $scope.formFields.designition_id + ')').then(function (response) {
            if (response.data.result.error === false) {
                $scope.months = response.data.result.data;
            } else {
                $scope.months = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.months = [];
        });
    };
    if (data.type === 'holiday') {
        $scope.getYears();
    }
    $scope.submitForm = function (table, slug) {
        var formData = new FormData();
        angular.forEach($scope.formFields, function (val, key) {
            var value = val;
            if (key === 'in_time') {
                value = moment(val).format('HH:mm:ss');
            }
            formData.append(key, value);
        });
        $http.post(apiPath.url + 'add_row/' + table + '/' + slug, formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            $scope.loading = false;
            if (response.data.result.error === false) {
                $mdBottomSheet.hide(response);
            } else {
                predefined.showToast(response.data.result.message, 'top right');
            }
        }, function (error) {
            $scope.loading = false;
            predefined.showToast(error.statusText, 'top right');
        });
    };
});

app.controller('PayrollAddons', function ($scope, data, $mdBottomSheet, $element, $mdDialog, $http, predefined, apiPath) {
    $scope.searchTerm = {type: ''};
    $scope.clearSearchTerm = function () {
        $scope.searchTerm = {type: ''};
    };
    $element.find('input').on('keydown', function (ev) {
        ev.stopPropagation();
    });
    $scope.data = data.data.addons;
    $scope.types = [{name: 'Debit', value: 'debit'}, {name: 'Credit', value: 'credit'}];
    $scope.newaddon = {};
    $scope.addAddon = function () {
        ($scope.data).push({type: $scope.newaddon.type, reason: $scope.newaddon.reason, amt: $scope.newaddon.amt});
        $scope.newaddon = {};
    };
    $scope.removeAddon = function (index) {
        ($scope.data).splice(index, 1);
    };
    $scope.addHistoryAddon = function () {
        var formData = new FormData();
        angular.forEach($scope.newaddon, function (val, key) {
            formData.append(key, val);
        });
        formData.append('payroll_history_id', data.data.ID);
        $http.post(apiPath.url + 'add_history_addon', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            $scope.loading = false;
            if (response.data.result.error === false) {
                ($scope.data).push(response.data.result.data);
            } else {
                predefined.showToast(response.data.result.message, 'top right');
            }
        }, function (error) {
            $scope.loading = false;
            predefined.showToast(error.statusText, 'top right');
        });

    };
    $scope.removeHistoryAddon = function (ev, id, index) {
        var confirm = $mdDialog.confirm()
                .title('Are you sure?')
                .textContent('Do you want to delete this record? You can\'t recover!!')
                .ariaLabel('Label')
                .targetEvent(ev)
                .ok('Yes! delete it')
                .cancel('Cancel');
        $mdDialog.show(confirm).then(function () {
            $http({
                method: 'DELETE',
                url: apiPath.url + 'add_history_addon' + '/' + id
            }).then(function (response) {
                if (response.data.result.error === false) {
                    ($scope.data).splice(index, 1);
                    $mdBottomSheet.hide($scope.data);
                }
                predefined.showToast(response.data.result.message, 'top right');
            }, function (error) {
                predefined.showToast(error.statusText, 'top right');
            });
        }, function () {
            console.log('Cancel');
        });
    };
    $scope.done = function () {
        $mdBottomSheet.hide($scope.data);
    };
});
