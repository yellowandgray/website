var app = angular
        .module('app', ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'ngRoute', 'mwl.calendar', 'angularSpinner', 'datatables', 'ngResource', 'treeControl', 'cp.ngConfirm'])
        .config(function ($routeProvider) {
            new WOW().init();
            $routeProvider.caseInsensitiveMatch = false;
            $routeProvider
                    .when('/dashboard', {
                        templateUrl: 'pages/dashboard.html',
                        controller: 'DashboardController',
                        resolve: {
                            programs: function (apiPath, $http, userDetail) {
                                return $http.get(apiPath.url + 'franchise_dashboard/' + userDetail.get('eshine_ID')).then(function (response) {
                                    if (response.data.result.error === false) {
                                        return response.data.result.data;
                                    } else {
                                        return [];
                                    }
                                }, function (error) {
                                    return [];
                                });
                            }
                        }
                    })
                    .when('/login', {
                        templateUrl: 'pages/login.html',
                        controller: 'LoginController'
                    })
                    .when('/program_master', {
                        templateUrl: 'pages/program_master.html',
                        controller: 'ProgramMasterController'
                    })
                    .when('/content_master', {
                        templateUrl: 'pages/content_master.html',
                        controller: 'ContentMasterController'
                    })
                    .when('/guideline', {
                        templateUrl: 'pages/guideline.html',
                        controller: 'GuidelineController'
                    })
                    .when('/change_password', {
                        templateUrl: 'pages/change_password.html',
                        controller: 'ChangePasswordController'
                    })
                    .when('/guideline_master', {
                        templateUrl: 'pages/guideline_master.html',
                        controller: 'GuidelineMasterController'
                    })
                    .when('/franchise_master', {
                        templateUrl: 'pages/franchise_master.html',
                        controller: 'FranchiseMasterController'
                    })
                    .when('/franchise_report', {
                        templateUrl: 'pages/franchise_report.html',
                        controller: 'FranchiseReportController'
                    })
                    .when('/calendar_admin', {
                        templateUrl: 'pages/calendar_admin.html',
                        controller: 'CalendarAdminController'
                    })
                    .when('/events_admin', {
                        templateUrl: 'pages/events_admin.html',
                        controller: 'EventsAdminController'
                    })
                    .when('/mappings', {
                        templateUrl: 'pages/mappings.html',
                        controller: 'MappingsController'
                    })
                    .when('/program_detail', {
                        templateUrl: 'pages/program_detail.html',
                        controller: 'ProgramDetailController'
                    })
                    .when('/calendar', {
                        templateUrl: 'pages/calendar.html',
                        controller: 'CalendarController'
                    })
                    .when('/events', {
                        templateUrl: 'pages/events.html',
                        controller: 'EventsController'
                    })
                    .when('/reports', {
                        templateUrl: 'pages/reports.html',
                        controller: 'ReportsController',
                        resolve: {
                            reports: function (apiPath, $http, userDetail) {
                                return $http.get(apiPath.url + 'franchise_mapped_reports/' + userDetail.get('eshine_ID')).then(function (response) {
                                    if (response.data.result.error === false) {
                                        return response.data.result.data;
                                    } else {
                                        return [];
                                    }
                                }, function (error) {
                                    return [];
                                });
                            }
                        }
                    })
                    .when('/program_detail', {
                        templateUrl: 'pages/program_detail.html',
                        controller: 'ProgramDetailController'
                    })
                    .when('/notifications', {
                        templateUrl: 'pages/notifications.html',
                        controller: 'NotificationsController'
                    })
                    .when('/terms', {
                        templateUrl: 'pages/terms.html',
                        controller: 'TermsController'
                    })
                    .when('/sitemap_admin', {
                        templateUrl: 'pages/sitemap_admin.html',
                        controller: 'SitemapAdminController'
                    })
                    .when('/sitemap', {
                        templateUrl: 'pages/sitemap.html',
                        controller: 'SitemapController'
                    })
                    .otherwise({
                        redirectTo: '/login'
                    });
        })
        .run(function ($location, userDetail, $http, apiPath, $rootScope, predefined, $uibModal) {
            var ID = userDetail.get('eshine_ID');
            if (ID === null) {
                $location.path('login');
            } else {
                var accepted = userDetail.get('eshine_terms_accepted');
                var type = userDetail.get('eshine_terms_type');
                if ((accepted === null || parseInt(accepted) === 0) && type === 'franchise') {
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'popup/terms.html',
                        controller: 'TermsPopupController',
                        backdrop: 'static',
                        keyboard: false
                    });
                    modalInstance.result.then(function (response) {
                        console.log('Closed');
                    }, function () {
                        console.log('Dismissed');
                    });
                }
            }
            $http.get(apiPath.url + 'get_all/admins/Admin').then(function (response) {
                if (response.data.result.error === false) {
                    $rootScope.admins = response.data.result.data;
                } else {
                    $rootScope.admins = [];
                }
            }, function (data) {
                $rootScope.admins = [];
                predefined.showAlert('Error', data.statusText);
            });
            $http.get(apiPath.url + 'get_all_where/contents/Data/template_type = 1 ORDER BY ID DESC').then(function (response) {
                if (response.data.result.error === false) {
                    $rootScope.contents = response.data.result.data;
                } else {
                    $rootScope.contents = [];
                }
            }, function (data) {
                $rootScope.contents = [];
                predefined.showAlert('Error', data.statusText);
            });
            $http.get(apiPath.url + 'get_all/level_one/Program').then(function (response) {
                if (response.data.result.error === false) {
                    $rootScope.programs = response.data.result.data;
                } else {
                    $rootScope.programs = [];
                }
            }, function (data) {
                $rootScope.programs = [];
                predefined.showAlert('Error', data.statusText);
            });
        });