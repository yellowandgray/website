app.controller('MappingsController', function ($scope, $rootScope, $http, apiPath, handset, $uibModal, predefined, $timeout, $ngConfirm) {
    $rootScope.title = 'mappings';
    $rootScope.pagetitle = 'Mappings';
    $scope.data = null;
    $scope.data_guideline = null;
    $scope.contents = [];
    $scope.contents_guideline = [];
    $scope.search = '';
    $scope.selected_levelone = '';
    $scope.selected_leveltwo = '';
    $scope.selected_levelthree = '';
    $scope.selected_levelfour = '';
    $scope.selected_levelfourid = 0;
    $scope.selected_levelone_guideline = '';
    $scope.selected_leveltwo_guideline = '';
    $scope.selected_levelthree_guideline = '';
    $scope.selected_levelfour_guideline = '';
    $scope.selected_levelfourid_guideline = '';
    $scope.getProgramMapping = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'program_mapped_data').then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                var mapfirst = false;
                if ($scope.data === null) {
                    mapfirst = true;
                }
                $scope.data = response.data.result.data;
                if (mapfirst) {
                    var found = false;
                    angular.forEach($scope.data, function (val, key) {
                        if (!found) {
                            $scope.mappingActive(key, '', '');
                            found = true;
                        }
                    });
                }
            } else {
                $scope.data = null;
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.data = null;
        });
    };
    $scope.getGuidelineMapping = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'guideline_mapped_data').then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                var mapfirst = false;
                if ($scope.data_guideline === null) {
                    mapfirst = true;
                }
                $scope.data_guideline = response.data.result.data;
                if (mapfirst) {
                    var found = false;
                    angular.forEach($scope.data_guideline, function (val, key) {
                        if (!found) {
                            $scope.mappingActiveGuideline(key, '', '');
                            found = true;
                        }
                    });
                }
            } else {
                $scope.data = null;
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.data = null;
        });
    };
    $scope.openForm = function (form, table, slug) {
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: form + '.html',
            controller: 'FormProgramMappingController',
            resolve: {
                data: function () {
                    return {
                        table: table,
                        slug: slug,
                        level_four_id: $scope.selected_levelfourid
                    };
                }
            }
        });
        modalInstance.result.then(function (response) {
            if (table === 'level_four_mapping' || table === 'level_four_mapping_additional' || table === 'main_curriculam_mapping') {
                $scope.getProgramMapping();
            }
            if (table === 'program_content_mapping') {
                $scope.getContents();
            }
            $timeout(function () {
                predefined.showAlert('Information', response.data.result.message);
            }, 200);
        }, function () {
            console.log('Dismissed');
        });
    };
    $scope.openGuidelineForm = function (form, table, slug) {
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: form + '.html',
            controller: 'FormGuidelineMappingController',
            resolve: {
                data: function () {
                    return {
                        table: table,
                        slug: slug,
                        level_four_id: $scope.selected_levelfourid_guideline
                    };
                }
            }
        });
        modalInstance.result.then(function (response) {
            if (table === 'level_four_mapping_guideline' || table === 'level_four_mapping_additional' || table === 'main_curriculam_mapping') {
                $scope.getGuidelineMapping();
            }
            if (table === 'program_content_mapping') {
                $scope.getContentsGuideline();
            }
            $timeout(function () {
                predefined.showAlert('Information', response.data.result.message);
            }, 200);
        }, function () {
            console.log('Dismissed');
        });
    };
    $scope.mappingActive = function (l1, l2, l3) {
        $scope.selected_levelone = l1;
        $scope.selected_leveltwo = '';
        $scope.selected_levelthree = '';
        if (l2 !== '' && l3 !== '') {
            $scope.selected_leveltwo = l2;
            $scope.selected_levelthree = l3;
        } else if (l2 !== '' && l3 === '') {
            $scope.selected_leveltwo = l2;
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, key) {
                if (!found) {
                    if (!Array.isArray($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][key])) {
                        $scope.selected_levelthree = key;
                    }
                    found = true;
                }
            });
        } else {
            var found_l1 = false;
            var found_l2 = false;
            angular.forEach($scope.data[$scope.selected_levelone], function (val, key) {
                if (!found_l1) {
                    if (!Array.isArray($scope.data[$scope.selected_levelone][key])) {
                        $scope.selected_leveltwo = key;
                        angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, k) {
                            if (!found_l2) {
                                if (!Array.isArray($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][k])) {
                                    $scope.selected_levelthree = k;
                                }
                                found_l2 = true;
                            }
                        });
                    }
                    found_l1 = true;
                }
            });
        }
        if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree !== '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree], function (val, key) {
                if (!found) {
                    $scope.selected_levelfour = val[0].level_four_name;
                    $scope.selected_levelfourid = val[0].ID;
                    found = true;
                }
            });
        } else if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree === '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, key) {
                if (!found) {
                    $scope.selected_levelfour = val[0].level_four_name;
                    $scope.selected_levelfourid = val[0].ID;
                    found = true;
                }
            });
        } else {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone], function (val, key) {
                if (!found) {
                    $scope.selected_levelfour = val[0].level_four_name;
                    $scope.selected_levelfourid = val[0].ID;
                    found = true;
                }
            });
        }
        $scope.getContents();
    };
    $scope.openDocument = function (file, type, download, print, ttype, id, name) {
        switch (type) {
            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'pdf':
            case 'mp4':
            case 'mp3':
            case 'mov':
            case 'wmv':
            case 'mov':
                var data = {type: type, file: file, download: download, print: print, template_type: ttype, id: id, name: name};
                var modalInstance = $uibModal.open({
                    animation: true,
                    ariaLabelledBy: 'modal-title',
                    ariaDescribedBy: 'modal-body',
                    templateUrl: 'play_media.html',
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
                    if (typeof response !== 'undefined' && response === true) {
                        $scope.getContents();
                    }
                }, function () {
                    console.log('Dismissed');
                });
                break;
            default:
                window.open('http://eshine.myarisenshine.com/v1/' + file, '_blank');
                break;
        }
    };
    $scope.openDocumentGuideline = function (file, type, download, print, ttype, id, name) {
        switch (type) {
            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'pdf':
            case 'mp4':
            case 'mp3':
            case 'wmv':
            case 'mov':
                var data = {type: type, file: file, download: download, print: print, template_type: ttype, id: id, name: name};
                var modalInstance = $uibModal.open({
                    animation: true,
                    ariaLabelledBy: 'modal-title',
                    ariaDescribedBy: 'modal-body',
                    templateUrl: 'play_media_guideline.html',
                    controller: 'MediaController',
                    size: 'lg',
                    resolve: {
                        data: function () {
                            return {
                                data: data
                            };
                        }
                    }
                });
                modalInstance.result.then(function (response) {
                    if (typeof response !== 'undefined' && response === true) {
                        $scope.getContentsGuideline();
                    }
                }, function () {
                    console.log('Dismissed');
                });
                break;
            default:
                window.open('http://eshine.myarisenshine.com/v1/' + file, '_blank');
                break;
        }
    };
    $scope.notArray = function (array) {
        return !Array.isArray(array);
    };
    $scope.curriculam = function () {
        var data = {};
        if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree !== '') {
            data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree];
        } else if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree === '') {
            data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo];
        } else {
            if ($scope.selected_levelone !== '') {
                data = $scope.data[$scope.selected_levelone];
            }
        }
        return data;
    };
    $scope.curriculamGuideline = function () {
        var data = {};
        if ($scope.selected_leveltwo_guideline !== '' && $scope.selected_levelthree_guideline !== '') {
            data = $scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][$scope.selected_levelthree_guideline];
        } else if ($scope.selected_leveltwo_guideline !== '' && $scope.selected_levelthree_guideline === '') {
            data = $scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline];
        } else {
            if ($scope.selected_levelone_guideline !== '') {
                data = $scope.data_guideline[$scope.selected_levelone_guideline];
            }
        }
        return data;
    };
    $scope.makeActive = function (key, id) {
        $scope.selected_levelfour = key;
        $scope.selected_levelfourid = id;
        $scope.getContents();
    };
    $scope.makeActiveGuideline = function (key, id) {
        $scope.selected_levelfour_guideline = key;
        $scope.selected_levelfourid_guideline = id;
        $scope.getContentsGuideline();
    };
    $scope.getContents = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'content_mapped_data/' + $scope.selected_levelfourid).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                $scope.contents = response.data.result.data;
            } else {
                $scope.contents = [];
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.contents = [];
        });
    };
    $scope.getContentsGuideline = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'content_mapped_data_guideline/' + $scope.selected_levelfourid_guideline).then(function (response) {
            handset.hideSpinner();
            if (response.data.result.error === false) {
                $scope.contents_guideline = response.data.result.data;
            } else {
                $scope.contents_guideline = [];
            }
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
            $scope.contents_guideline = [];
        });
    };
    $scope.mainCurriculam = function () {
        var data = '';
        if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree !== '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree], function (val, key) {
                if (!found) {
                    data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree][key][0].curriculam;
                    found = true;
                }
            });
        } else if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree === '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, key) {
                if (!found) {
                    data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][key][0].curriculam;
                    found = true;
                }
            });
        } else {
            if ($scope.selected_levelone !== '') {
                var found = false;
                angular.forEach($scope.data[$scope.selected_levelone], function (val, key) {
                    if (!found) {
                        data = $scope.data[$scope.selected_levelone][key][0].curriculam;
                        found = true;
                    }
                });
            }
        }
        return data;
    };
    $scope.mainCurriculamPath = function () {
        var data = '';
        if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree !== '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree], function (val, key) {
                if (!found) {
                    data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][$scope.selected_levelthree][key][0].curriculum_path;
                    found = true;
                }
            });
        } else if ($scope.selected_leveltwo !== '' && $scope.selected_levelthree === '') {
            var found = false;
            angular.forEach($scope.data[$scope.selected_levelone][$scope.selected_leveltwo], function (val, key) {
                if (!found) {
                    data = $scope.data[$scope.selected_levelone][$scope.selected_leveltwo][key][0].curriculum_path;
                    found = true;
                }
            });
        } else {
            if ($scope.selected_levelone !== '') {
                var found = false;
                angular.forEach($scope.data[$scope.selected_levelone], function (val, key) {
                    if (!found) {
                        data = $scope.data[$scope.selected_levelone][key][0].curriculum_path;
                        found = true;
                    }
                });
            }
        }
        return data;
    };
    $scope.mainCurriculamGuideline = function () {
        var data = '';
        if ($scope.selected_leveltwo_guideline !== '' && $scope.selected_levelthree_guideline !== '') {
            var found = false;
            angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][$scope.selected_levelthree_guideline], function (val, key) {
                if (!found) {
                    data = $scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][$scope.selected_levelthree_guideline][key][0].curriculam;
                    found = true;
                }
            });
        } else if ($scope.selected_leveltwo_guideline !== '' && $scope.selected_levelthree_guideline === '') {
            var found = false;
            angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline], function (val, key) {
                if (!found) {
                    data = $scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][key][0].curriculam;
                    found = true;
                }
            });
        } else {
            if ($scope.selected_levelone_guideline !== '') {
                var found = false;
                angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline], function (val, key) {
                    if (!found) {
                        data = $scope.data_guideline[$scope.selected_levelone_guideline][key][0].curriculam;
                        found = true;
                    }
                });
            }
        }
        return data;
    };
    $scope.mainCurriculamGuidelinePath = function () {
        var data = '';
        if ($scope.selected_leveltwo_guideline !== '' && $scope.selected_levelthree_guideline !== '') {
            var found = false;
            angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][$scope.selected_levelthree_guideline], function (val, key) {
                if (!found) {
                    data = $scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][$scope.selected_levelthree_guideline][key][0].curriculum_path;
                    found = true;
                }
            });
        } else if ($scope.selected_leveltwo_guideline !== '' && $scope.selected_levelthree_guideline === '') {
            var found = false;
            angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline], function (val, key) {
                if (!found) {
                    data = $scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][key][0].curriculum_path;
                    found = true;
                }
            });
        } else {
            if ($scope.selected_levelone_guideline !== '') {
                var found = false;
                angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline], function (val, key) {
                    if (!found) {
                        data = $scope.data_guideline[$scope.selected_levelone_guideline][key][0].curriculum_path;
                        found = true;
                    }
                });
            }
        }
        return data;
    };
    $scope.hasLevelThree = function (l2, l3) {
        var level_two = parseInt(l2);
        var level_three = parseInt(l3);
        if (level_two !== 0 && level_three !== 0) {
            return true;
        }
        return false;
    };
    $scope.hasOnlyLevelThree = function (l2, l3) {
        var level_two = parseInt(l2);
        var level_three = parseInt(l3);
        if (level_two === 0 && level_three !== 0) {
            return true;
        }
        return false;
    };
    $scope.mappingActiveGuideline = function (l1, l2, l3) {
        $scope.selected_levelone_guideline = l1;
        $scope.selected_leveltwo_guideline = '';
        $scope.selected_levelthree_guideline = '';
        if (l2 !== '' && l3 !== '') {
            $scope.selected_leveltwo_guideline = l2;
            $scope.selected_levelthree_guideline = l3;
        } else if (l2 !== '' && l3 === '') {
            $scope.selected_leveltwo_guideline = l2;
            var found = false;
            angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline], function (val, key) {
                if (!found) {
                    if (!Array.isArray($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][key])) {
                        $scope.selected_levelthree_guideline = key;
                    }
                    found = true;
                }
            });
        } else {
            var found_l1 = false;
            var found_l2 = false;
            angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline], function (val, key) {
                if (!found_l1) {
                    if (!Array.isArray($scope.data_guideline[$scope.selected_levelone_guideline][key])) {
                        $scope.selected_leveltwo_guideline = key;
                        angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline], function (val, k) {
                            if (!found_l2) {
                                if (!Array.isArray($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][k])) {
                                    $scope.selected_levelthree_guideline = k;
                                }
                                found_l2 = true;
                            }
                        });
                    }
                    found_l1 = true;
                }
            });
        }
        if ($scope.selected_leveltwo_guideline !== '' && $scope.selected_levelthree_guideline !== '') {
            var found = false;
            angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline][$scope.selected_levelthree_guideline], function (val, key) {
                if (!found) {
                    $scope.selected_levelfour_guideline = val[0].level_four_name;
                    $scope.selected_levelfourid_guideline = val[0].ID;
                    found = true;
                }
            });
        } else if ($scope.selected_leveltwo_guideline !== '' && $scope.selected_levelthree_guideline === '') {
            var found = false;
            angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline][$scope.selected_leveltwo_guideline], function (val, key) {
                if (!found) {
                    $scope.selected_levelfour_guideline = val[0].level_four_name;
                    $scope.selected_levelfourid_guideline = val[0].ID;
                    found = true;
                }
            });
        } else {
            var found = false;
            angular.forEach($scope.data_guideline[$scope.selected_levelone_guideline], function (val, key) {
                if (!found) {
                    $scope.selected_levelfour_guideline = val[0].level_four_name;
                    $scope.selected_levelfourid_guideline = val[0].ID;
                    found = true;
                }
            });
        }
        $scope.getContentsGuideline();
    };
    $scope.mainGuidelineContent = function () {
        var found = false;
        var res = 0;
        angular.forEach($scope.data_guideline, function (val, key) {
            if (!found && val.ID == $scope.selected_guideline_mapped_id) {
                found = true;
                res = val.content_id;
            }
        });
        return res;
    };
    $scope.mainGuidelinePrint = function () {
        var found = false;
        var res = 0;
        angular.forEach($scope.data_guideline, function (val, key) {
            if (!found && val.ID == $scope.selected_guideline_mapped_id) {
                found = true;
                res = val.is_printable;
            }
        });
        return res;
    };
    $scope.mainGuidelineDownload = function () {
        var found = false;
        var res = 0;
        angular.forEach($scope.data_guideline, function (val, key) {
            if (!found && val.ID == $scope.selected_guideline_mapped_id) {
                found = true;
                res = val.is_downloadable;
            }
        });
        return res;
    };
    $scope.mainGuidelineContentPath = function () {
        var found = false;
        var res = '';
        angular.forEach($scope.data_guideline, function (val, key) {
            if (!found && val.ID == $scope.selected_guideline_mapped_id) {
                found = true;
                res = val.content_path;
            }
        });
        return res;
    };
    $scope.printDocument = function () {
        var doc = document.getElementById('document_window');
        if ((doc.tagName).toLowerCase() === 'img') {
            $scope.printImage(doc.getAttribute("ng-src"));
        } else {
            doc.focus();
            doc.contentWindow.print();
        }
    };
    $scope.printImage = function (img) {
        var Pagelink = "about:blank";
        var pwa = window.open(Pagelink);
        pwa.document.open();
        pwa.document.write($scope.ImagetoPrint(img));
        pwa.document.close();
    };
    $scope.ImagetoPrint = function (source) {
        return "<html><head><script>function step1(){\n" +
                "setTimeout('step2()', 10);}\n" +
                "function step2(){window.print();window.close()}\n" +
                "</scri" + "pt></head><body onload='step1()'>\n" +
                "<img src='" + source + "' /></body></html>";
    };
    $scope.deleteProgramLevel = function (level) {
        $timeout(function () {
            $ngConfirm({
                title: 'Confirmation',
                content: 'OOPS! You can\'t recover, are you sure you want to delete?',
                buttons: {
                    yes: {
                        text: 'Yes',
                        btnClass: 'btn-blue',
                        action: function () {
                            handset.showSpinner();
                            var lone = $.trim(($scope.selected_levelone).split(',')[0]);
                            var ltwo = null;
                            var lthree = null;
                            if ($scope.selected_leveltwo !== '') {
                                ltwo = $.trim(($scope.selected_leveltwo).split(',')[0]);
                            }
                            if ($scope.selected_levelthree !== '') {
                                lthree = $.trim(($scope.selected_levelthree).split(',')[0]);
                            }
                            var lfour = $scope.selected_levelfour;
                            $http({
                                method: 'DELETE',
                                url: apiPath.url + 'delete_program_mapping/' + level + '/' + lone + '/' + ltwo + '/' + lthree + '/' + lfour + '/Mapping'
                            }).then(function (response) {
                                handset.hideSpinner();
                                if (response.data.result.error === false) {
                                    $scope.data = null;
                                    $scope.getProgramMapping();
                                }
                                predefined.showAlert('Information', response.data.result.message);
                            }, function (error) {
                                handset.hideSpinner();
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
        }, 200);
    };
    $scope.removeProgramCurriculam = function () {
        $timeout(function () {
            $ngConfirm({
                title: 'Confirmation',
                content: 'OOPS! You can\'t recover, are you sure you want to delete?',
                buttons: {
                    yes: {
                        text: 'Yes',
                        btnClass: 'btn-blue',
                        action: function () {
                            var lfourid = $scope.selected_levelfourid;
                            handset.showSpinner();
                            $http({
                                method: 'DELETE',
                                url: apiPath.url + 'delete_program_curriculam/' + lfourid + '/Curriculum'
                            }).then(function (response) {
                                handset.hideSpinner();
                                if (response.data.result.error === false) {
                                    $scope.getProgramMapping();
                                }
                                predefined.showAlert('Information', response.data.result.message);
                            }, function (error) {
                                handset.hideSpinner();
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
        }, 200);
    };
    $scope.deleteGuidelineLevel = function (level) {
        $timeout(function () {
            $ngConfirm({
                title: 'Confirmation',
                content: 'OOPS! You can\'t recover, are you sure you want to delete?',
                buttons: {
                    yes: {
                        text: 'Yes',
                        btnClass: 'btn-blue',
                        action: function () {
                            handset.showSpinner();
                            var lone = $.trim(($scope.selected_levelone).split(',')[0]);
                            var ltwo = null;
                            var lthree = null;
                            if ($scope.selected_leveltwo_guideline !== '') {
                                ltwo = $.trim(($scope.selected_leveltwo_guideline).split(',')[0]);
                            }
                            if ($scope.selected_levelthree_guideline !== '') {
                                lthree = $.trim(($scope.selected_levelthree_guideline).split(',')[0]);
                            }
                            var lfour = $scope.selected_levelfour_guideline;
                            $http({
                                method: 'DELETE',
                                url: apiPath.url + 'delete_guideline_mapping/' + level + '/' + lone + '/' + ltwo + '/' + lthree + '/' + lfour + '/Mapping'
                            }).then(function (response) {
                                handset.hideSpinner();
                                if (response.data.result.error === false) {
                                    $scope.data_guideline = null;
                                    $scope.getGuidelineMapping();
                                }
                                predefined.showAlert('Information', response.data.result.message);
                            }, function (error) {
                                handset.hideSpinner();
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
        }, 200);
    };
    $scope.removeGuidelineCurriculam = function () {
        $timeout(function () {
            $ngConfirm({
                title: 'Confirmation',
                content: 'OOPS! You can\'t recover, are you sure you want to delete?',
                buttons: {
                    yes: {
                        text: 'Yes',
                        btnClass: 'btn-blue',
                        action: function () {
                            var lfourid = $scope.selected_levelfourid_guideline;
                            handset.showSpinner();
                            $http({
                                method: 'DELETE',
                                url: apiPath.url + 'delete_guideline_curriculam/' + lfourid + '/Curriculum'
                            }).then(function (response) {
                                handset.hideSpinner();
                                if (response.data.result.error === false) {
                                    $scope.getGuidelineMapping();
                                }
                                predefined.showAlert('Information', response.data.result.message);
                            }, function (error) {
                                handset.hideSpinner();
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
        }, 200);
    };
});

app.controller('FormProgramMappingController', function ($scope, $uibModalInstance, data, handset, $http, apiPath, predefined, userDetail, DTOptionsBuilder, DTColumnDefBuilder, $ngConfirm, $timeout, $filter) {
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    };
    $scope.errMsg = '';
    $scope.search_filter = {text: ''};
    $scope.search_filter_occupied = {text: ''};
    $scope.data = {first_section: [], second_section: [], first_selections: [], second_selections: [], level_one_id: '0', level_two_mapping_id: '0', table: data.table};
    $scope.occupied = [];
    $scope.select_all = {checkbox: false};
    $scope.selected_items = [];
    $scope.do_more = {selected: ''};
    $scope.selected_tab = '';
    $scope.toggle = function (item, list) {
        var idx = list.indexOf(item);
        if (idx > -1) {
            list.splice(idx, 1);
            $scope.select_all.checkbox = false;
        } else {
            list.push(item);
            if ((list).length === ($scope.data.second_section).length) {
                $scope.select_all.checkbox = true;
            }
        }
    };
    $scope.exists = function (item, list) {
        return list.indexOf(item) > -1;
    };
    $scope.toggleFourMapping = function (twmap, onmap, lon, ltw, lth) {
        var list = $scope.data.first_selections;
        var found = false;
        angular.forEach(list, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(twmap) && parseInt(val.level_two_mapping_id) === parseInt(onmap) && parseInt(val.level_one_id) === parseInt(lon) && parseInt(val.level_two_id) === parseInt(ltw) && parseInt(val.level_three_id) === parseInt(lth)) {
                found = true;
                ($scope.data.first_selections).splice(key, 1);
            }
        });
        if (!found) {
            ($scope.data.first_selections).push({ID: twmap, level_two_mapping_id: onmap, level_one_id: lon, level_two_id: ltw, level_three_id: lth});
        }
    };
    $scope.existsFourMapping = function (twmap, onmap, lon, ltw, lth) {
        var result = false;
        var found = false;
        var list = $scope.data.first_selections;
        angular.forEach(list, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(twmap) && parseInt(val.level_two_mapping_id) === parseInt(onmap) && parseInt(val.level_one_id) === parseInt(lon) && parseInt(val.level_two_id) === parseInt(ltw) && parseInt(val.level_three_id) === parseInt(lth)) {
                found = true;
                result = true;
            }
        });
        return result;
    };
    $scope.getLevelTwoAvails = function () {
        $scope.data = {first_section: [], second_section: [], first_selections: [], second_selections: [], level_one_id: '0', level_two_mapping_id: '0', table: data.table};
        $scope.select_all.checkbox = false;
        $http.get(apiPath.url + 'get_level_one_for_level_two_mapping').then(function (response) {
            if (response.data.result.error === false) {
                $scope.data.first_section = response.data.result.data;
            } else {
                $scope.data.first_section = [];
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.data.first_section = [];
        });
    };
    $scope.getLevelTwoOccupied = function (type) {
        $scope.select_all.checkbox = false;
        $scope.selected_tab = type + '_mapping';
        $scope.selected_items = [];
        $http.get(apiPath.url + 'get_level_mapped_records_program/' + type).then(function (response) {
            if (response.data.result.error === false) {
                $scope.occupied = response.data.result.data;
            } else {
                $scope.occupied = [];
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.occupied = [];
        });
    };
    $scope.getLevelThreeAvails = function () {
        $scope.select_all.checkbox = false;
        $scope.data = {first_section: [], second_section: [], first_selections: [], second_selections: [], level_one_id: '0', level_two_mapping_id: '0', table: data.table};
        $http.get(apiPath.url + 'get_level_two_mapping_for_level_three_mapping').then(function (response) {
            if (response.data.result.error === false) {
                $scope.data.first_section = response.data.result.data;
            } else {
                $scope.data.first_section = [];
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.data.first_section = [];
        });
    };
    if (data.table === 'level_four_mapping') {
        $http.get(apiPath.url + 'get_level_three_mapping_for_level_four_mapping').then(function (response) {
            if (response.data.result.error === false) {
                $scope.data.first_section = response.data.result.data;
                $http.get(apiPath.url + 'get_all/level_four/Level Four').then(function (res) {
                    if (res.data.result.error === false) {
                        $scope.data.second_section = res.data.result.data;
                    }
                }, function (data) {
                    predefined.showAlert('Error', data.statusText);
                    $scope.data.second_section = [];
                });
            } else {
                $scope.data.first_section = [];
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.data.first_section = [];
        });
    }
    if (data.table === 'level_four_mapping_additional') {
        $http.get(apiPath.url + 'vaccant_level_four_for_mapped_level_four/' + data.level_four_id).then(function (res) {
            if (res.data.result.error === false) {
                $scope.data.second_section = res.data.result.data;
            } else {
                predefined.showAlert('Error', res.data.result.message);
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.data.second_section = [];
        });
    }
    $scope.programContentMapping = function (cid) {
        if (data.table === 'program_content_mapping') {
            $scope.data.first_selections = [];
            $http.get(apiPath.url + 'get_content_for_program_mapping/' + data.level_four_id + '/' + cid).then(function (response) {
                if (response.data.result.error === false) {
                    $scope.data.first_section = response.data.result.data;
                } else {
                    $scope.data.first_section = [];
                }
            }, function (data) {
                predefined.showAlert('Error', data.statusText);
                $scope.data.first_section = [];
            });
        } else {
            $http.get(apiPath.url + 'get_all_where/contents/Content/template_type != 2 AND category = ' + cid + ' AND mapping_type = \'program\' AND extension = \'pdf\'').then(function (response) {
                if (response.data.result.error === false) {
                    $scope.data.first_section = response.data.result.data;
                } else {
                    $scope.data.first_section = [];
                }
            }, function (data) {
                predefined.showAlert('Error', data.statusText);
                $scope.data.first_section = [];
            });
        }
    };
    $scope.mapLevelTwo = function () {
        var total_requests = ($scope.data.second_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.second_selections, function (v, k) {
            var formData = new FormData();
            formData.append('level_one_id', $scope.data.level_one_id);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            formData.append('level_two_id', v);
            $http.post(apiPath.url + 'add_row/level_two_mapping/Level Two Mapping', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
    $scope.mapLevelThree = function () {
        var total_requests = ($scope.data.second_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.second_selections, function (v, k) {
            var formData = new FormData();
            var first_selection_details = $scope.selectionDetail('first_section', $scope.data.level_two_mapping_id);
            var second_selection_details = $scope.selectionDetail('second_section', v);
            formData.append('level_two_mapping_id', $scope.data.level_two_mapping_id);
            formData.append('level_one_id', first_selection_details.level_one_id);
            formData.append('level_two_id', first_selection_details.level_two_id);
            formData.append('level_three_id', second_selection_details.ID);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            $http.post(apiPath.url + 'add_row/level_three_mapping/Level Three Mapping', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
    $scope.mapLevelFour = function () {
        var total_requests = ($scope.data.first_selections).length * ($scope.data.second_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.first_selections, function (val, key) {
            angular.forEach($scope.data.second_selections, function (v, k) {
                var formData = new FormData();
                var first_selection_details = val;
                var second_selection_details = $scope.selectionDetail('second_section', v);
                formData.append('level_two_mapping_id', first_selection_details.level_two_mapping_id);
                formData.append('level_three_mapping_id', first_selection_details.ID);
                formData.append('level_one_id', first_selection_details.level_one_id);
                formData.append('level_two_id', first_selection_details.level_two_id);
                formData.append('level_three_id', first_selection_details.level_three_id);
                formData.append('level_four_id', second_selection_details.ID);
                formData.append('created_by', userDetail.get('eshine_ID'));
                formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
                $http.post(apiPath.url + 'add_row/level_four_mapping/Level Four Mapping', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
        });
    };
    $scope.mapLevelFourAdditional = function () {
        var total_requests = ($scope.data.second_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.second_selections, function (v, k) {
            var formData = new FormData();
            var second_selection_details = $scope.selectionDetail('second_section', v);
            formData.append('level_four_mapping_id', data.level_four_id);
            formData.append('level_four_id', second_selection_details.ID);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            $http.post(apiPath.url + 'add_row/level_four_mapping_additional/Level Four Mapping', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
    $scope.selectionDetail = function (sec, id) {
        var found = false;
        var data = {};
        angular.forEach($scope.data[sec], function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(id)) {
                data = val;
                found = true;
            }
        });
        return data;
    };
    $scope.getLevelTwoItems = function () {
        $scope.data.second_section = [];
        if (parseInt($scope.data.level_one_id) !== 0) {
            handset.showSpinner();
            $http.get(apiPath.url + 'get_all_where/level_two/Level Two/ID NOT IN (SELECT level_two_id FROM level_two_mapping WHERE level_one_id = ' + $scope.data.level_one_id + ')').then(function (res) {
                handset.hideSpinner();
                if (res.data.result.error === false) {
                    $scope.data.second_section = res.data.result.data;
                } else {
                    $scope.errMsg = 'No mapping data found';
                }
            }, function (data) {
                handset.hideSpinner();
                predefined.showAlert('Error', data.statusText);
                $scope.data.second_section = [];
                $scope.errMsg = 'No mapping data found';
            });
        } else {
            $scope.errMsg = '';
        }
    };
    $scope.getLevelThreeItems = function () {
        $scope.data.second_section = [];
        if (parseInt($scope.data.level_two_mapping_id) !== 0) {
            handset.showSpinner();
            $http.get(apiPath.url + 'get_all_where/level_three/Level Three/ID NOT IN (SELECT level_three_id FROM level_three_mapping WHERE level_two_mapping_id = ' + $scope.data.level_two_mapping_id + ')').then(function (res) {
                handset.hideSpinner();
                if (res.data.result.error === false) {
                    $scope.data.second_section = res.data.result.data;
                } else {
                    $scope.errMsg = 'No mapping data found';
                }
            }, function (data) {
                handset.hideSpinner();
                predefined.showAlert('Error', data.statusText);
                $scope.data.second_section = [];
            });
        } else {
            $scope.errMsg = '';
        }
    };
    $scope.contentOptions = DTOptionsBuilder.newOptions()
            .withPaginationType('full_numbers')
            //.withDOM('iftp')
            //.withOption('order', [[0, 'asc']])
            .withLanguage({
                sSearch: '<i class="fa fa-search"></i>',
                sSearchPlaceholder: 'Search...'
            })
            .withDisplayLength(10);
    $scope.contentColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1).withOption('type', 'image'),
        DTColumnDefBuilder.newColumnDef(2)
    ];
    $scope.submitProgramContent = function () {
        var total_requests = ($scope.data.first_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.first_selections, function (v, k) {
            var formData = new FormData();
            formData.append('level_four_mapping_id', data.level_four_id);
            formData.append('content_id', v);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            $http.post(apiPath.url + 'add_row/program_content_mapping/Program Content', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
    $scope.mapMainCurriculam = function (id) {
        handset.showSpinner();
        var formData = new FormData();
        formData.append('level_four_mapping_id', data.level_four_id);
        formData.append('curriculam', id);
        $http.post(apiPath.url + 'map_program_main_curriculam', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            handset.hideSpinner();
            $uibModalInstance.close(response);
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
        });
    };
    $scope.checkRow = function (id) {
        var idx = $scope.selected_items.indexOf(id);
        if (idx > -1) {
            $scope.selected_items.splice(idx, 1);
            $scope.select_all.checkbox = false;
        } else {
            $scope.selected_items.push(id);
            if (($scope.selected_items).length === ($scope.occupied).length) {
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
                                            if ($scope.selected_tab === 'level_two_mapping') {
                                                $scope.getLevelTwoOccupied('level_two');
                                            }
                                            if ($scope.selected_tab === 'level_three_mapping') {
                                                $scope.getLevelTwoOccupied('level_three');
                                            }
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
    $scope.checkAll = function (param, array, filter) {
        var split = param.split('.');
        var stored = array.split('.');
        var data_array = [];
        var stored_array = [];
        if (typeof split[1] !== 'undefined') {
            data_array = $scope[split[0]][split[1]];
        } else {
            data_array = $scope[split[0]];
        }
        if (typeof stored[1] !== 'undefined') {
            stored_array = $scope[stored[0]][stored[1]];
        } else {
            stored_array = $scope[stored[0]];
        }
        if ($scope.select_all.checkbox === true) {
            angular.forEach($filter('filter')(data_array, $scope[filter].text), function (val, key) {
                (stored_array).push(val.ID);
            });
        } else {
            stored_array = [];
        }
        if (typeof stored[1] !== 'undefined') {
            $scope[stored[0]][stored[1]] = stored_array;
        } else {
            $scope[stored[0]] = stored_array;
        }
    };
});
app.controller('FormGuidelineMappingController', function ($scope, $uibModalInstance, data, handset, $http, apiPath, predefined, userDetail, DTOptionsBuilder, DTColumnDefBuilder, $ngConfirm, $timeout, $filter) {
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    };
    $scope.errMsg = '';
    $scope.search_filter = {text: ''};
    $scope.search_filter_occupied = {text: ''};
    $scope.data = {first_section: [], second_section: [], first_selections: [], second_selections: [], level_one_id: '0', level_two_mapping_id: '0', table: data.table};
    $scope.occupied = [];
    $scope.select_all = {checkbox: false};
    $scope.selected_items = [];
    $scope.do_more = {selected: ''};
    $scope.selected_tab = '';
    $scope.toggle = function (item, list) {
        var idx = list.indexOf(item);
        if (idx > -1) {
            list.splice(idx, 1);
            $scope.select_all.checkbox = false;
        } else {
            list.push(item);
            if ((list).length === ($scope.data.second_section).length) {
                $scope.select_all.checkbox = true;
            }
        }
    };
    $scope.exists = function (item, list) {
        return list.indexOf(item) > -1;
    };
    $scope.toggleFourMapping = function (twmap, onmap, lon, ltw, lth) {
        var list = $scope.data.first_selections;
        var found = false;
        angular.forEach(list, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(twmap) && parseInt(val.level_two_mapping_id) === parseInt(onmap) && parseInt(val.level_one_id) === parseInt(lon) && parseInt(val.level_two_id) === parseInt(ltw) && parseInt(val.level_three_id) === parseInt(lth)) {
                found = true;
                ($scope.data.first_selections).splice(key, 1);
            }
        });
        if (!found) {
            ($scope.data.first_selections).push({ID: twmap, level_two_mapping_id: onmap, level_one_id: lon, level_two_id: ltw, level_three_id: lth});
        }
    };
    $scope.existsFourMapping = function (twmap, onmap, lon, ltw, lth) {
        var result = false;
        var found = false;
        var list = $scope.data.first_selections;
        angular.forEach(list, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(twmap) && parseInt(val.level_two_mapping_id) === parseInt(onmap) && parseInt(val.level_one_id) === parseInt(lon) && parseInt(val.level_two_id) === parseInt(ltw) && parseInt(val.level_three_id) === parseInt(lth)) {
                found = true;
                result = true;
            }
        });
        return result;
    };
    $scope.getLevelTwoAvails = function () {
        $scope.select_all.checkbox = false;
        $scope.data = {first_section: [], second_section: [], first_selections: [], second_selections: [], level_one_id: '0', level_two_mapping_id: '0', table: data.table};
        $scope.select_all.checkbox = false;
        $http.get(apiPath.url + 'get_level_one_for_level_two_mapping').then(function (response) {
            if (response.data.result.error === false) {
                $scope.data.first_section = response.data.result.data;
            } else {
                $scope.data.first_section = [];
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.data.first_section = [];
        });
    };
    $scope.getLevelTwoOccupied = function (type) {
        $scope.select_all.checkbox = false;
        $scope.selected_tab = type + '_mapping_guideline';
        $scope.selected_items = [];
        $scope.select_all.checkbox = false;
        $http.get(apiPath.url + 'get_level_mapped_records_guideline/' + type).then(function (response) {
            if (response.data.result.error === false) {
                $scope.occupied = response.data.result.data;
            } else {
                $scope.occupied = [];
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.occupied = [];
        });
    };
    $scope.getLevelThreeAvails = function () {
        $scope.select_all.checkbox = false;
        $scope.data = {first_section: [], second_section: [], first_selections: [], second_selections: [], level_one_id: '0', level_two_mapping_id: '0', table: data.table};
        $http.get(apiPath.url + 'get_level_two_mapping_for_level_three_mapping_guideline').then(function (response) {
            if (response.data.result.error === false) {
                $scope.data.first_section = response.data.result.data;
            } else {
                $scope.data.first_section = [];
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.data.first_section = [];
        });
    };
    if (data.table === 'level_four_mapping_guideline') {
        $http.get(apiPath.url + 'get_level_three_mapping_for_level_four_mapping_guideline').then(function (response) {
            if (response.data.result.error === false) {
                $scope.data.first_section = response.data.result.data;
                $http.get(apiPath.url + 'get_all/guideline_level_four/Level Four').then(function (res) {
                    if (res.data.result.error === false) {
                        $scope.data.second_section = res.data.result.data;
                    }
                }, function (data) {
                    predefined.showAlert('Error', data.statusText);
                    $scope.data.second_section = [];
                });
            } else {
                $scope.data.first_section = [];
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.data.first_section = [];
        });
    }
    if (data.table === 'level_four_mapping_additional') {
        $http.get(apiPath.url + 'vaccant_level_four_for_mapped_level_four_guideline/' + data.level_four_id).then(function (res) {
            if (res.data.result.error === false) {
                $scope.data.second_section = res.data.result.data;
            } else {
                predefined.showAlert('Error', res.data.result.message);
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
            $scope.data.second_section = [];
        });
    }
    $scope.programContentMapping = function (cid) {
        if (data.table === 'program_content_mapping') {
            $scope.data.first_selections = [];
            $http.get(apiPath.url + 'get_content_for_guideline_mapping/' + data.level_four_id + '/' + cid).then(function (response) {
                if (response.data.result.error === false) {
                    $scope.data.first_section = response.data.result.data;
                } else {
                    $scope.data.first_section = [];
                }
            }, function (data) {
                predefined.showAlert('Error', data.statusText);
                $scope.data.first_section = [];
            });
        } else {
            $http.get(apiPath.url + 'get_all_where/contents/Content/template_type != 2 AND category = ' + cid + ' AND mapping_type = \'guideline\' AND extension = \'pdf\'').then(function (response) {
                if (response.data.result.error === false) {
                    $scope.data.first_section = response.data.result.data;
                } else {
                    $scope.data.first_section = [];
                }
            }, function (data) {
                predefined.showAlert('Error', data.statusText);
                $scope.data.first_section = [];
            });
        }
    };
    $scope.mapLevelTwo = function () {
        var total_requests = ($scope.data.second_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.second_selections, function (v, k) {
            var formData = new FormData();
            formData.append('level_one_guideline_id', $scope.data.level_one_id);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            formData.append('level_two_guideline_id', v);
            $http.post(apiPath.url + 'add_row/level_two_mapping_guideline/Level Two Mapping', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
    $scope.mapLevelThree = function () {
        var total_requests = ($scope.data.second_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.second_selections, function (v, k) {
            var formData = new FormData();
            var first_selection_details = $scope.selectionDetail('first_section', $scope.data.level_two_mapping_id);
            var second_selection_details = $scope.selectionDetail('second_section', v);
            formData.append('level_two_mapping_guideline_id', $scope.data.level_two_mapping_id);
            formData.append('level_one_guideline_id', first_selection_details.level_one_id);
            formData.append('level_two_guideline_id', first_selection_details.level_two_id);
            formData.append('level_three_guideline_id', second_selection_details.ID);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            $http.post(apiPath.url + 'add_row/level_three_mapping_guideline/Level Three Mapping', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
    $scope.mapLevelFour = function () {
        var total_requests = ($scope.data.first_selections).length * ($scope.data.second_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.first_selections, function (val, key) {
            angular.forEach($scope.data.second_selections, function (v, k) {
                var formData = new FormData();
                var first_selection_details = val;
                var second_selection_details = $scope.selectionDetail('second_section', v);
                formData.append('level_two_mapping_guideline_id', first_selection_details.level_two_mapping_id);
                formData.append('level_three_mapping_guideline_id', first_selection_details.ID);
                formData.append('level_one_guideline_id', first_selection_details.level_one_id);
                formData.append('level_two_guideline_id', first_selection_details.level_two_id);
                formData.append('level_three_guideline_id', first_selection_details.level_three_id);
                formData.append('level_four_guideline_id', second_selection_details.ID);
                formData.append('created_by', userDetail.get('eshine_ID'));
                formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
                $http.post(apiPath.url + 'add_row/level_four_mapping_guideline/Level Four Mapping', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
        });
    };
    $scope.mapLevelFourAdditional = function () {
        var total_requests = ($scope.data.second_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.second_selections, function (v, k) {
            var formData = new FormData();
            var second_selection_details = $scope.selectionDetail('second_section', v);
            formData.append('level_four_mapping_guideline_id', data.level_four_id);
            formData.append('level_four_guideline_id', second_selection_details.ID);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            $http.post(apiPath.url + 'add_row/level_four_mapping_additional_guideline/Level Four Mapping', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
    $scope.selectionDetail = function (sec, id) {
        var found = false;
        var data = {};
        angular.forEach($scope.data[sec], function (val, key) {
            if (!found && parseInt(val.ID) === parseInt(id)) {
                data = val;
                found = true;
            }
        });
        return data;
    };
    $scope.getLevelTwoItems = function () {
        $scope.data.second_section = [];
        if (parseInt($scope.data.level_one_id) !== 0) {
            handset.showSpinner();
            $http.get(apiPath.url + 'get_all_where/guideline_level_two/Level Two/ID NOT IN (SELECT level_two_guideline_id FROM level_two_mapping_guideline WHERE level_one_guideline_id = ' + $scope.data.level_one_id + ')').then(function (res) {
                handset.hideSpinner();
                if (res.data.result.error === false) {
                    $scope.data.second_section = res.data.result.data;
                } else {
                    $scope.errMsg = 'No mapping data found';
                }
            }, function (data) {
                handset.hideSpinner();
                predefined.showAlert('Error', data.statusText);
                $scope.data.second_section = [];
                $scope.errMsg = 'No mapping data found';
            });
        } else {
            $scope.errMsg = '';
        }
    };
    $scope.getLevelThreeItems = function () {
        $scope.data.second_section = [];
        if (parseInt($scope.data.level_two_mapping_id) !== 0) {
            handset.showSpinner();
            $http.get(apiPath.url + 'get_all_where/guideline_level_three/Level Three/ID NOT IN (SELECT level_three_guideline_id FROM level_three_mapping_guideline WHERE level_two_mapping_guideline_id = ' + $scope.data.level_two_mapping_id + ')').then(function (res) {
                handset.hideSpinner();
                if (res.data.result.error === false) {
                    $scope.data.second_section = res.data.result.data;
                } else {
                    $scope.errMsg = 'No mapping data found';
                }
            }, function (data) {
                handset.hideSpinner();
                predefined.showAlert('Error', data.statusText);
                $scope.data.second_section = [];
            });
        } else {
            $scope.errMsg = '';
        }
    };
    $scope.contentOptions = DTOptionsBuilder.newOptions()
            .withPaginationType('full_numbers')
            //.withDOM('iftp')
            //.withOption('order', [[0, 'asc']])
            .withLanguage({
                sSearch: '<i class="fa fa-search"></i>',
                sSearchPlaceholder: 'Search...'
            })
            .withDisplayLength(10);
    $scope.contentColumnDefs = [
        DTColumnDefBuilder.newColumnDef(0),
        DTColumnDefBuilder.newColumnDef(1).withOption('type', 'image'),
        DTColumnDefBuilder.newColumnDef(2)
    ];
    $scope.submitProgramContent = function () {
        var total_requests = ($scope.data.first_selections).length;
        var process_requests = 0;
        handset.showSpinner();
        angular.forEach($scope.data.first_selections, function (v, k) {
            var formData = new FormData();
            formData.append('level_four_mapping_guideline_id', data.level_four_id);
            formData.append('content_id', v);
            formData.append('created_by', userDetail.get('eshine_ID'));
            formData.append('created_at', moment().format('YYYY-MM-DD HH:mm:ss'));
            $http.post(apiPath.url + 'add_row/program_content_mapping_guideline/Program Content', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
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
    $scope.mapMainCurriculam = function (id) {
        handset.showSpinner();
        var formData = new FormData();
        formData.append('level_four_mapping_guideline_id', data.level_four_id);
        formData.append('curriculam', id);
        $http.post(apiPath.url + 'map_program_main_curriculam_guideline', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            handset.hideSpinner();
            $uibModalInstance.close(response);
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
        });
    };
    $scope.checkRow = function (id) {
        var idx = $scope.selected_items.indexOf(id);
        if (idx > -1) {
            $scope.selected_items.splice(idx, 1);
            $scope.select_all.checkbox = false;
        } else {
            $scope.selected_items.push(id);
            if (($scope.selected_items).length === ($scope.occupied).length) {
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
                                            if ($scope.selected_tab === 'level_two_mapping_guideline') {
                                                $scope.getLevelTwoOccupied('level_two');
                                            }
                                            if ($scope.selected_tab === 'level_three_mapping_guideline') {
                                                $scope.getLevelTwoOccupied('level_three');
                                            }
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
    $scope.checkAll = function (param, array, filter) {
        var split = param.split('.');
        var stored = array.split('.');
        var data_array = [];
        var stored_array = [];
        if (typeof split[1] !== 'undefined') {
            data_array = $scope[split[0]][split[1]];
        } else {
            data_array = $scope[split[0]];
        }
        if (typeof stored[1] !== 'undefined') {
            stored_array = $scope[stored[0]][stored[1]];
        } else {
            stored_array = $scope[stored[0]];
        }
        if ($scope.select_all.checkbox === true) {
            angular.forEach($filter('filter')(data_array, $scope[filter].text), function (val, key) {
                (stored_array).push(val.ID);
            });
        } else {
            stored_array = [];
        }
        if (typeof stored[1] !== 'undefined') {
            $scope[stored[0]][stored[1]] = stored_array;
        } else {
            $scope[stored[0]] = stored_array;
        }
    };
});