app.controller('NotificationsController', function ($rootScope, $scope, $http, apiPath, predefined) {
    $rootScope.title = 'Notifications';
    $rootScope.menu = 'notifications';
//    $scope.data = null;
    $scope.classes = [];
    $scope.sections = [];
    $scope.students = [];
    $scope.getClasses = function () {
        $http.get(apiPath.url + 'get_all_where/classes/Class/status=1').then(function (response) {
            if (response.data.result.error === false) {
                $scope.classes = response.data.result.data;
            } else {
                $scope.classes = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.classes = [];
        });
    };
    $scope.getSections = function (cid) {
        $http.get(apiPath.url + 'get_sections_by_class/' + cid).then(function (response) {
            if (response.data.result.error === false) {
                $scope.sections = response.data.result.data;
                $scope.getStudents(response.data.result.data[0].class_id, response.data.result.data[0].section_id);
            } else {
                $scope.sections = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.sections = [];
        });
    };
    $scope.getStudents = function (cid, sid) {
        $http.get(apiPath.url + 'get_students_by_class_section/' + cid + '/' + sid).then(function (response) {
            if (response.data.result.error === false) {
                $scope.students = response.data.result.data;
            } else {
                $scope.students = [];
            }
        }, function (error) {
            predefined.showAlert('Error', error.statusText);
            $scope.students = [];
        });
    };
});