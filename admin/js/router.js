var app = angular.module('app', ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'ngRoute', 'ui.calendar', 'angularSpinner', 'datatables', 'ngResource']).config(function ($routeProvider) {
    $routeProvider.caseInsensitiveMatch = false;
    $routeProvider
            .when('/login', {
                templateUrl: 'pages/login.html',
                controller: 'LoginController'
            })
            .when('/categories', {
                templateUrl: 'pages/categories.html',
                controller: 'CategoriesController'
            })
            .when('/sub_categories', {
                templateUrl: 'pages/sub_categories.html',
                controller: 'SubCategoriesController',
                resolve: {
                    categories: function ($http, apiPath, predefined) {
                        return $http.get(apiPath.url + 'get_all_where/categories/Data/ID > 0 ORDER BY ID DESC').then(function (response) {
                            if (response.data.result.error === false) {
                                return response.data.result.data;
                            } else {
                                return [];
                            }
                        }, function (error) {
                            predefined.showAlter('Categories!!', error.statusText);
                            return [];
                        });
                    }
                }
            })
            .otherwise({
                redirectTo: '/login'
            });
}).run(function ($location, userDetail, $http, apiPath, $rootScope, predefined) {
    var ID = userDetail.get('mac_world_ID');
    if (ID !== null) {
        $location.path('categories');
    } else {
        $location.path('login');
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
});