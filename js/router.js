var app = angular.module('app', ['ngRoute', 'ngMaterial', 'ngMessages', 'angularMoment', 'multipleDatePicker', 'angAccordion', 'ngSanitize', 'mdCollectionPagination', 'lfNgMdFileInput', 'md.time.picker', 'chart.js', 'moment-picker', 'ngTableToCsv', 'cl.paging', 'ngMaterialSidemenu'])
        .config(function ($routeProvider) {
            $routeProvider.caseInsensitiveMatch = false;
            $routeProvider
                    .when('/notifications', {
                        templateUrl: 'pages/notifications.html',
                        controller: 'NotificationsController'
                    })
                    .when('/payroll', {
                        templateUrl: 'pages/payroll.html',
                        controller: 'PayrollController'
                    })
                    .when('/transfer_certificates', {
                        templateUrl: 'pages/transfer_certificates.html',
                        controller: 'TransferCertificatesController'
                    })
                    .when('/login', {
                        templateUrl: 'pages/login.html',
                        controller: 'LoginController'
                    })
                    .when('/staff_profile', {
                        templateUrl: 'pages/staff_profile.html',
                        controller: 'StaffProfileController'
                    })
                    .otherwise({
                        redirectTo: '/login'
                    });
        })
        .run(function ($rootScope, $location, userSession) {
            $rootScope.changePage = function (page) {
                $location.path(page);
            };
            var ID = userSession.get('ID');
            if (ID === null) {
                $location.path('login');
            }
            $rootScope.$on('$routeChangeSuccess', function (e, current, pre) {
                var role = userSession.get('role');
                if ((current.$$route.controller === "PayrollController" || current.$$route.controller === "StaffProfileController") && role === 'highschool') {
                    $location.path('login');
                }
            });
        });