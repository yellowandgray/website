var app = angular.module('app', ['ngMaterial', 'ngMessages', 'ngRoute', 'mdCollectionPagination', 'lfNgMdFileInput', 'ngMap', 'keruC', 'md.time.picker', 'ngMdBadge'])
        .config(function ($routeProvider, $locationProvider, $mdThemingProvider) {
            $locationProvider.hashPrefix('');
            $routeProvider.caseInsensitiveMatch = false;
            $routeProvider
                    .when('/', {
                        templateUrl: 'pages/home.html',
                        controller: 'HomeController'
                    })
                    .when('/home', {
                        templateUrl: 'pages/home.html',
                        controller: 'HomeController'
                    })
                    .when('/register', {
                        templateUrl: 'pages/register.html',
                        controller: 'RegisterController'
                    })
                    .when('/login', {
                        templateUrl: 'pages/login.html',
                        controller: 'LoginController'
                    })
                    .when('/admin', {
                        templateUrl: 'pages/admin.html',
                        controller: 'AdminController'
                    })
                    .when('/detail/:id', {
                        templateUrl: 'pages/detail.html',
                        controller: 'DetailController'
                    })
                    .when('/training_centre', {
                        templateUrl: 'pages/training_centre.html',
                        controller: 'TrainingcentreController'
                    })
                    .when('/employees', {
                        templateUrl: 'pages/employees.html',
                        controller: 'EmployeesController'
                    })
                    .when('/employee_register_step', {
                        templateUrl: 'pages/employee_register_step.html',
                        controller: 'EmployeeRegisterStepController'
                    })
                    .when('/configs', {
                        templateUrl: 'pages/configs.html',
                        controller: 'ConfigsController'
                    })
                    .when('/trainer', {
                        templateUrl: 'pages/trainer.html',
                        controller: 'TrainerController'
                    })
                    .when('/payment', {
                        templateUrl: 'pages/payment.html',
                        controller: 'PaymentController'
                    })
                    .when('/support_employee', {
                        templateUrl: 'pages/support_employee.html',
                        controller: 'SupportEmployeeController'
                    })
                    .when('/schedule_employee', {
                        templateUrl: 'pages/schedule_employee.html',
                        controller: 'ScheduleEmployeeController'
                    })
                    .when('/onsite_employee', {
                        templateUrl: 'pages/onsite_employee.html',
                        controller: 'OnsiteEmployeeController'
                    })
                    .when('/support_superadmin', {
                        templateUrl: 'pages/support_superadmin.html',
                        controller: 'SupportSuperadminController'
                    })
                    .when('/center', {
                        templateUrl: 'pages/center.html',
                        controller: 'CenterController'
                    })
                    .otherwise({
                        redirectTo: '/home'
                    });
            $mdThemingProvider.definePalette('mahisprimary', {
                '50': 'ffffff',
                '100': 'ffffff',
                '200': 'ffffff',
                '300': 'ffffff',
                '400': 'ffffff',
                '500': 'ffffff',
                '600': 'ffffff',
                '700': 'ffffff',
                '800': 'ffffff',
                '900': 'ffffff',
                'A100': 'ffffff',
                'A200': 'ffffff',
                'A400': 'ffffff',
                'A700': 'ffffff',
                'contrastDefaultColor': 'light',
                'contrastDarkColors': [
                    '50',
                    '100',
                    '200',
                    '300',
                    '400',
                    '500',
                    '600',
                    '700',
                    '800',
                    '900',
                    'A100',
                    'A200',
                    'A400',
                    'A700'
                ],
                'contrastLightColors': []
            });
            $mdThemingProvider.definePalette('mahisaccent', {
                '50': 'e1f3f7',
                '100': 'b5e0ec',
                '200': '0897be',
                '300': '52b6d2',
                '400': '2da7c8',
                '500': '0897be',
                '600': '078fb8',
                '700': '0684af',
                '800': 'ffffff',
                '900': '026999',
                'A100': '0897be',
                'A200': 'b5e0ec',
                'A400': 'f3f3f3',
                'A700': '45baff',
                'contrastDefaultColor': 'light',
                'contrastDarkColors': [
                    '50',
                    '100',
                    '200',
                    '300',
                    '400',
                    'A400',
                    'A700'
                ],
                'contrastLightColors': [
                    '500',
                    '600',
                    '700',
                    '800',
                    '900',
                    'A100',
                    'A200'
                ]
            });
            $mdThemingProvider.theme('default')
                    .primaryPalette('mahisprimary')
                    .backgroundPalette('mahisaccent').dark()
                    .accentPalette('mahisaccent');
            $mdThemingProvider.theme('forms')
                    .primaryPalette('mahisaccent')
                    .accentPalette('mahisprimary');
        })
        .run(function ($rootScope, $location, predefined) {
            $rootScope.companies = [{ID: 1, activated: 1, blocked: 0, rejected: 0, name: '4BLOCKSInc', reg_number: '123456', sector: 'manufacture', email: 'mushaqdeen@yahoo.co.in', phone: '9884794962', address: '2/120 Karim Nagar', training_staffs: 20, employer: 'Mushaq', password: '123456'}]; //ID, activated, blocked, rejected, name, reg_number, sector, email, phone, address, training_staffs, employer, password, onsite[], employees[paid, ID, injection_certificate, training_certificate, verified, rejected, rejected_reason]
            $rootScope.training_centers = [{ID: 1, name: 'Center', address: 'Address', seats: 10, trainee_name: 'Mushaqdeen', user_name: 'mushak', password: '123456', map: 'Palavakkam', image: 'http://localhost/mushak/mahis/img/training_center3.jpg', lat: 3.1518233, lng: 101.6643154}]; // ID, name, address, seats, trainee_name, user_name, password, map, image, lat, lng
            $rootScope.paymentemployees = [];
            $rootScope.login = {role: 'admin', company_id: 1}; //role, company_id, training_center_id
            $rootScope.configs = [{ID: 1, name: 'Training Fees', value: 300}, {ID: 2, name: 'Cancel Fees', value: 3}];
            $rootScope.changePage = function (page) {
                $location.path(page);
            };
            $rootScope.workonprogress = function () {
                predefined.showAlert('Information', 'Work on progress');
            };
        });