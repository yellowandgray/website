app.controller('TransferCertificatesController', function ($rootScope, $scope, $http, predefined, apiPath, $mdDialog, $mdBottomSheet, userSession) {
    $rootScope.title = 'Profile';
    $rootScope.menu = 'transfer_certificates';
    $scope.classes = [];
    $scope.students = [];
    $scope.loading = false;
    $scope.issued_tc_data = [];
    $scope.issued_tc_total = 0;
    $scope.issued_tc_page = 0;
    $rootScope.role = userSession.get('role');
    $scope.role = userSession.get('role');
    $scope.searchtext = {issued_tc: ''};
    $scope.clearSearchTerm = function (cid) {
        var found = false;
        angular.forEach($scope.classes, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(cid)) {
                val.searchTerm = '';
                found = true;
            }
        });
    };
    window.mdSelectOnKeyDownOverride = function (event) {
        event.stopPropagation();
    };
    $scope.getClasses = function () {
        var where = '';
        if ($scope.role === 'highschool') {
            where = ' AND ID > 10';
        }
        $http.get(apiPath.url + 'get_all_where/classes/Class/status=1' + where).then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.classes = response.data.result.data;
                $scope.classes = response.data.result.data;
                $scope.getSections(response.data.result.data[0].ID);
            } else {
                $rootScope.classes = [];
                $scope.classes = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.classes = [];
            $rootScope.classes = [];
        });
    };
    $scope.getGroups = function () {
        $http.get(apiPath.url + 'get_all_where/groups/Groups/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.groups = response.data.result.data;
            } else {
                $rootScope.groups = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.groups = [];
        });
    };
    $scope.getGenders = function () {
        $http.get(apiPath.url + 'get_all_where/genders/Gender/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.genders = response.data.result.data;
            } else {
                $rootScope.genders = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.genders = [];
        });
    };
    $scope.getReligions = function () {
        $http.get(apiPath.url + 'get_all_where/religions/Religion/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.religions = response.data.result.data;
            } else {
                $rootScope.religions = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.religions = [];
        });
    };
    $scope.getCasts = function () {
        $http.get(apiPath.url + 'get_all_where/casts/Casts/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.casts = response.data.result.data;
            } else {
                $rootScope.casts = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.casts = [];
        });
    };
    $scope.getBloodGroups = function () {
        $http.get(apiPath.url + 'get_all_where/blood_groups/Blood Group/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.blood_groups = response.data.result.data;
            } else {
                $rootScope.blood_groups = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.blood_groups = [];
        });
    };
    $scope.getCountries = function () {
        $http.get(apiPath.url + 'get_all_where/countries/Country/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.countries = response.data.result.data;
            } else {
                $rootScope.countries = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.countries = [];
        });
    };
    $scope.getSections = function (cid) {
        $http.get(apiPath.url + 'get_sections_by_class/' + cid).then(function (response) {
            var sections = [];
            if (response.data.result.error === false) {
                $scope.getStudents(response.data.result.data[0].class_id, response.data.result.data[0].section_id, 1);
                sections = response.data.result.data;
            } else {
                sections = [];
            }
            var found = false;
            angular.forEach($scope.classes, function (val, key) {
                if (!found && parseInt(val.ID) === parseInt(cid)) {
                    val.section = response.data.result.data[0].section_id;
                    val.total = 1;
                    val.page = 1;
                    val.sections = sections;
                    found = true;
                }
            });
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            var found = false;
            angular.forEach($scope.classes, function (val, key) {
                if (!found && parseInt(val.ID) === parseInt(cid)) {
                    val.section = [];
                    val.total = 0;
                    val.page = 0;
                    val.sections = [];
                    found = true;
                }
            });
        });
    };
    $scope.getStudentsBySection = function (cid, sid, page) {
        var found = false;
        angular.forEach($scope.classes, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(cid)) {
                val.searchtext = '';
                found = true;
            }
        });
        $scope.getStudents(cid, sid, page);
    };
    $scope.getStudents = function (cid, sid, page) {
        if (typeof cid !== 'undefined' && typeof sid !== 'undefined' && typeof page !== 'undefined') {
            var found = false;
            angular.forEach($scope.classes, function (val, key) {
                if (!found && parseInt(val.ID) === parseInt(cid)) {
                    var qry = 'null';
                    if (typeof val.searchtext !== 'undefined' && val.searchtext !== '') {
                        qry = val.searchtext;
                    }
                    $http.get(apiPath.url + 'get_students_by_class_section/' + cid + '/' + sid + '/' + page + '/' + qry).then(function (response) {
                        var pages_count = 0;
                        if (response.data.result.error === false) {
                            val.data = response.data.result.data;
                            pages_count = parseInt(parseInt(response.data.result.records) / 10);
                            if (parseInt(response.data.result.records) % 10 > 0) {
                                pages_count = pages_count + 1;
                            }
                        } else {
                            val.data = [];
                        }
                        val.total = pages_count;
                        val.page = page;
                    }, function (error) {
                        predefined.showAlert('Error', error.statusText);
                        val.data = [];
                        val.total = 0;
                        val.page = 0;
                    });
                    val.section = sid;
                    found = true;
                }
            });
        }
    };
    $scope.uploadStudents = function () {
        $scope.loading = true;
        var formData = new FormData();
        angular.forEach($scope.students, function (obj) {
            formData.append('file', obj.lfFile);
        });
        $http.post(apiPath.url + 'import_students', formData, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function (result) {
            $scope.loading = false;
            if (result.data.result.error === false) {
                $scope.studentsapi.removeAll();
                predefined.showAlert('Success', result.data.result.message);
            } else {
                predefined.showAlert('Information', result.data.result.message);
            }
        }, function (error) {
            $scope.loading = false;
            predefined.showAlert('Error', error.statusText);
        });
    };
    $scope.preview = function (src) {
        $mdDialog.show({
            templateUrl: 'forms/preview.html',
            controller: 'PreviewController',
            clickOutsideToClose: true,
            locals: {
                data: {
                    src: src
                }
            }
        }).then(function (data) {
            console.log('Closed sheet');
        }).catch(function (error) {
            console.log('Cancelled sheet');
        });
    };
    $scope.getTCDetails = function (id) {
        $http.get(apiPath.url + 'get_student_by_id_for_tc/' + id).then(function (response) {
            if (response.data.result.error === false) {
                if (parseInt(response.data.result.data.tc_issued) === 1) {
                    $mdDialog.show({
                        templateUrl: 'forms/tc_view.html',
                        controller: 'TCDetailsController',
                        locals: {
                            data: {
                                data: response.data.result.data
                            }
                        }
                    }).then(function (data) {
                        console.log('Closed sheet');
                    }).catch(function (error) {
                        console.log('Cancelled sheet');
                    });
                } else {
                    var format = 'tc_format1';
                    if (parseInt(response.data.result.data.format) === 2) {
                        format = 'tc_format2';
                    }
                    $mdDialog.show({
                        templateUrl: 'forms/' + format + '.html',
                        controller: 'TCDetailsController',
                        locals: {
                            data: {
                                data: response.data.result.data
                            }
                        }
                    }).then(function (data) {
                        console.log('Closed sheet');
                    }).catch(function (error) {
                        console.log('Cancelled sheet');
                    });
                }
            } else {
                predefined.showAlert('Error', error.statusText);
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
        });
    };
    $scope.getIssuedStudents = function (page) {
        var qry = 'null';
        if (typeof $scope.searchtext.issued_tc !== 'undefined' && $scope.searchtext.issued_tc !== '') {
            qry = $scope.searchtext.issued_tc;
        }
        $http.get(apiPath.url + 'get_tc_issued_students/' + page + '/' + qry).then(function (response) {
            var pages_count = 0;
            if (response.data.result.error === false) {
                $scope.issued_tc_data = response.data.result.data;
                pages_count = parseInt(parseInt(response.data.result.records) / 10);
                if (parseInt(response.data.result.records) % 10 > 0) {
                    pages_count = pages_count + 1;
                }
            } else {
                $scope.issued_tc_data = [];
            }
            $scope.issued_tc_total = pages_count;
            $scope.issued_tc_page = page;
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.issued_tc_data = [];
            $scope.issued_tc_total = 0;
            $scope.issued_tc_page = 0;
        });
    };
    $scope.openForm = function (id, form, cid, page) {
        var data = {ID: 0};
        var found = false;
        angular.forEach($scope.classes, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(cid)) {
                var found_student = false;
                angular.forEach(val.data, function (val, key) {
                    if (!found_student && parseInt(val.ID) === parseInt(id)) {
                        data = angular.copy(val);
                        found_student = true;
                    }
                });
                found = true;
            }
        });
        $mdBottomSheet.show({
            templateUrl: 'forms/' + form + '.html',
            controller: 'TCDetailsController',
            locals: {
                data: {
                    data: data
                }
            }
        }).then(function (res) {
            $scope.getStudents(data.class_id, data.section_id, page);
        }).catch(function (error) {
            console.log('Sheet ignored');
        });
    };
    $scope.deleteStudent = function (ev, form, id, slug, class_id, section_id, page) {
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
                url: apiPath.url + '/delete/' + form + '/' + id + '/' + slug
            }).then(function (response) {
                if (response.data.result.error === false) {
                    $scope.getStudents(class_id, section_id, page);
                }
                predefined.showToast(response.data.result.message, 'top right');
            }, function (error) {
                predefined.showToast(error.statusText, 'top right');
            });
        }, function () {
            console.log('Cancel');
        });
    };
    $scope.getGroups();
    $scope.getGenders();
    $scope.getReligions();
    $scope.getCasts();
    $scope.getBloodGroups();
    $scope.getCountries();
});

app.controller('TCDetailsController', function ($scope, data, $mdDialog, $http, apiPath, predefined, $rootScope, $element, $mdBottomSheet, $timeout) {
    $scope.formFields = data.data;
    $scope.image = null;
    $scope.imageapi = null;
    $scope.nationalities = [{ID: 'INDIAN', name: 'Indian'}, {ID: 'FOREIGNER', name: 'Foreigner'}];
    $scope.status = [{ID: 'ADMITTED', name: 'Admitted'}, {ID: 'DISCONTINUED', name: 'Discontinued'}, {ID: 'COURSE-COMPLETED', name: 'Course Completed'}];
    $element.find('input').on('keydown', function (ev) {
        ev.stopPropagation();
    });
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
    $scope.searchTerm = {};
    $scope.clearSearchTerm = function () {
        $scope.searchTerm = {};
    };
    $rootScope.hostellers = [{ID: '0', name: 'No'}, {ID: '1', name: 'Yes'}];
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.issueTC = function () {
        var formData = new FormData();
        angular.forEach($scope.formFields, function (val, key) {
            var value = val;
            if (val === '' || val === null || val === 'null') {
                value = '-';
            }
            formData.append(key, value);
        });
        $http.post(apiPath.url + 'issue_tc', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            $scope.loading = false;
            if (response.data.result.error === false) {
                $scope.hide();
                $mdDialog.show({
                    templateUrl: 'forms/tc_view.html',
                    controller: 'TCDetailsController',
                    locals: {
                        data: {
                            data: response.data.result.data
                        }
                    }
                }).then(function (data) {
                    console.log('Closed sheet');
                }).catch(function (error) {
                    console.log('Cancelled sheet');
                });
            } else {
                predefined.showToast(response.data.result.message, 'top right');
            }
        }, function (error) {
            predefined.showToast(error.statusText, 'top right');
        });
    };
    $scope.getSectionsByClass = function (cid) {
        $http.get(apiPath.url + 'get_sections_by_class/' + cid).then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.sections = response.data.result.data;
            } else {
                $rootScope.sections = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.sections = [];
        });
    };
    $scope.getStatesByCountry = function (cid) {
        $http.get(apiPath.url + 'get_all_where/states/States/status=1 AND country_id=' + cid).then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.states = response.data.result.data;
            } else {
                $rootScope.states = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.states = [];
        });
    };
    $scope.getDistrictByState = function (sid) {
        $http.get(apiPath.url + 'get_all_where/cities/Cities/status=1 AND state_id=' + sid).then(function (response) {
            if (response.data.result.error === false) {
                $rootScope.cities = response.data.result.data;
            } else {
                $rootScope.cities = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $rootScope.cities = [];
        });
    };
    $scope.submitForm = function (table, slug) {
        var formData = new FormData();
        angular.forEach($scope.formFields, function (val, key) {
            var value = val;
            if (key === 'dob' || key === 'doj') {
                value = moment(val).format('YYYY-MM-DD');
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
    if (typeof data.data.ID !== 'undefined' && parseInt(data.data.ID) > 0) {
        if (typeof data.data.class_id !== 'undefined') {
            $scope.getSectionsByClass(data.data.class_id);
        }
        if (typeof data.data.country_id !== 'undefined') {
            $scope.getStatesByCountry(data.data.country_id);
        }
        if (typeof data.data.state_id !== 'undefined') {
            $scope.getDistrictByState(data.data.state_id);
        }
    }
    $scope.changeFocus = function (par, id) {
        if (typeof $scope.formFields[par] !== 'undefined' && ($scope.formFields[par]).length >= 1) {
            $timeout(function () {
                $('#' + id).focus();
            }, 100);
        }
    };
    $scope.uploadImage = function (file, field) {
        var formData = new FormData();
        formData.append('file', file[0].lfFile);
        $http.post(apiPath.url + 'upload_image', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            if (response.data.result.error === false) {
                $scope.formFields[field] = response.data.result.data;
            } else {
                $scope.formFields[field] = '';
            }
        }, function (data) {
            //predefined.showAlert('Error', data.statusText);
        });
    };
    $scope.deleteTC = function (ev) {
        var confirm = $mdDialog.confirm()
                .title('Are you sure?')
                .textContent('Do you want to delete this record? You can\'t recover!!')
                .ariaLabel('Label')
                .targetEvent(ev)
                .ok('Yes! delete it')
                .cancel('Cancel');
        $mdDialog.show(confirm).then(function () {
            var formData = new FormData();
            formData.append('tc_path', '');
            formData.append('tc_issued', 0);
            formData.append('ID', $scope.formFields.ID);
            $http.post(apiPath.url + 'add_row/students/Status', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
                predefined.showToast(response.data.result.message, 'top right');
            }, function (error) {
                predefined.showToast(error.statusText, 'top right');
            });
        }, function () {
            console.log('Cancel');
        });
    };
});

app.controller('PreviewController', function ($scope, data, $mdBottomSheet) {
    $scope.data = data.src;
    $scope.close = function () {
        $mdBottomSheet.hide();
    };
});