app.controller('EmployeeRegisterStepController', function ($rootScope, $scope) {
    $rootScope.title = 'employee_register_step';
    $rootScope.pagetitle = 'Register Your Employee'
    $scope.steponedone = false;
    $scope.tabindex = 0;
    $scope.form = {
        title: 'mr',
        firstname: 'Mushaqdeen',
        middlename: 'Mushaq',
        lastname: 'J',
        dob: new Date(),
        address1: 'Address',
        address2: 'Address two',
        zipcode: '600041',
        telephone: '9884794962',
        email: 'mushaqdeen@gmail.com',
        passportnumber: '123456',
        passportexpire: new Date(),
        phone: '24510250',
        training_date: new Date(),
        training_time: new Date()
    };
    $scope.map = {center: [$rootScope.training_centers[0].lat, $rootScope.training_centers[0].lng]};
    $scope.submitExployeeStepOne = function () {
        $scope.steponedone = true;
        $scope.form.image = $scope.avatar[0].lfDataUrl;
        $scope.form.passport = $scope.passport[0].lfDataUrl;
        $scope.form.dob = moment($scope.form.dob).format('DD MMM YYYY');
        $scope.form.passportexpire = moment($scope.form.passportexpire).format('DD MMM YYYY');
        $scope.tabindex = 1;
    };
    $scope.registerEmployee = function () {
        var found = false;
        var employee = {};
        $scope.form.training_date = moment($scope.form.training_date).format('DD MMM YYYY');
        $scope.form.training_time = moment($scope.form.training_time).format('hh:mm A');
        angular.forEach($rootScope.companies, function (val, key) {
            if (!found && parseInt(val.ID) === parseInt($rootScope.login.company_id)) {
                found = true;
                if (typeof val.employees === 'undefined') {
                    val.employees = [];
                }
                angular.forEach($scope.form, function (val, key) {
                    employee[key] = val;
                });
                employee.image = $scope.avatar[0].lfDataUrl;
                employee.passport = $scope.passport[0].lfDataUrl;
                employee.ID = ((val.employees.length) + 1);
                (val.employees).push(employee);
            }
        });
        $rootScope.changePage('employees');
    };
    window.mdSelectOnKeyDownOverride = function (event) {
        event.stopPropagation();
    };
    $scope.country = [
        {name: 'Malaysia', value: 'malaysia'},
        {name: 'India', value: 'india'},
        {name: 'Philippines', value: 'philippines'},
        {name: 'Bangladesh', value: 'bangladesh'}
    ];
    $scope.countryresidence = [
        {name: 'Malaysia', value: 'malaysia'},
        {name: 'India', value: 'india'},
        {name: 'Philippines', value: 'philippines'},
        {name: 'Bangladesh', value: 'bangladesh'}
    ];
    $scope.nationality = [
        {name: 'Malaysia', value: 'malaysia'},
        {name: 'India', value: 'india'},
        {name: 'Philippines', value: 'philippines'},
        {name: 'Bangladesh', value: 'bangladesh'}
    ];
    $scope.state = [
        {name: 'Maharastra', value: 'maharastra'},
        {name: 'Delhi', value: 'delhi'},
        {name: 'kerala', value: 'kerala'},
        {name: 'Tamil Nadu', value: 'tamilnadu'}
    ];
    $scope.city = [
        {name: 'Kolalampure', value: 'kolalampure'},
        {name: 'Chennai', value: 'chennai'},
        {name: 'Mumbai', value: 'mumbai'},
        {name: 'Kolkatta', value: 'kolkatta'}
    ];
    $scope.clearSearchTerm = function () {
        $scope.searchTerm = '';
        $scope.searchcountryTerm = '';
        $scope.searchstateTerm = '';
        $scope.searchcityTerm = '';
        $scope.searchnationalityTerm = '';
    };
});

