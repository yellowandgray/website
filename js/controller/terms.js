app.controller('TermsController', function ($rootScope, $scope, userDetail, $http, apiPath, predefined, $location) {
    $rootScope.title = 'terms';
    $rootScope.pagetitle = 'Terms';
    $scope.terms = true;
    $scope.accepted = userDetail.get('eshine_terms_accepted');
    $scope.acceptTerms = function () {
        var formData = new FormData();
        formData.append('ID', userDetail.get('eshine_ID'));
        formData.append('terms_accepted', 1);
        $http.post(apiPath.url + 'add_row/franchise/Terms', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            if (response.data.result.error === false) {
                userDetail.set('eshine_terms_accepted', 1);
                $location.path('dashboard').replace();
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
        });
    };
});

app.controller('TermsPopupController', function ($rootScope, $scope, userDetail, $http, apiPath, predefined, $location, $uibModalInstance) {
    $rootScope.title = 'terms';
    $rootScope.pagetitle = 'Terms';
    $scope.terms = true;
    $scope.accepted = userDetail.get('eshine_terms_accepted');
    $scope.acceptTerms = function () {
        var formData = new FormData();
        formData.append('ID', userDetail.get('eshine_ID'));
        formData.append('terms_accepted', 1);
        $http.post(apiPath.url + 'add_row/franchise/Terms', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
            if (response.data.result.error === false) {
                $uibModalInstance.dismiss();
                userDetail.set('eshine_terms_accepted', 1);
                $location.path('dashboard').replace();
            }
        }, function (data) {
            predefined.showAlert('Error', data.statusText);
        });
    };
});