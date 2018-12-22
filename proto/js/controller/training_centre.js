app.controller('TrainingcentreController', function ($rootScope, $scope, $mdDialog, $routeParams) {
    $rootScope.title = 'training_centre';
    $scope.list = $rootScope.training_centers;
    var found = false;
    $rootScope.pagetitle = 'Training Center';
    angular.forEach($rootScope.companies, function (val, key) {
        if (found === false && parseInt(val.ID) === parseInt($routeParams.id)) {
            found = true;
            $scope.data = val;
        }
    });
    $scope.openAddedTrainingCentre = function (ev) {
        $mdDialog.show({
            controller: AddedTraingCentre,
            templateUrl: 'forms/added_training_centre.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true
        }).then(function (answer) {
            $scope.list = $rootScope.training_centers;
        }, function () {
            console.log('Cancel');
        });
    };
});

function AddedTraingCentre($scope, $mdDialog, $timeout, $rootScope) {
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
    $scope.loading = false;
    $scope.form = {};
    $scope.placeChanged = function () {
        $scope.map.center = [this.getPlace().geometry.location.lat(), this.getPlace().geometry.location.lng()];
        $scope.map.marker = [this.getPlace().geometry.location.lat(), this.getPlace().geometry.location.lng()];
        $scope.form.lat = this.getPlace().geometry.location.lat();
        $scope.form.lng = this.getPlace().geometry.location.lng();
    };
    $scope.getCurrentLocation = function (event, $event) {
        $scope.form.lat = event.latLng.lat();
        $scope.form.lng = event.latLng.lng();
        geocoder = new $event.google.maps.Geocoder();
        geocoder.geocode({
            'latLng': new $event.google.maps.LatLng(event.latLng.lat(), event.latLng.lng())
        }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var formatted_address = results[0].formatted_address;
                    $timeout(function () {
                        $scope.form.map = formatted_address;
                    }, 300);
                }
            }
        });
    };
    $scope.map = {center: [3.1518233, 101.6643154], marker: [3.1518233, 101.6643154]};
    $scope.submitForm = function () {
        $scope.loading = true;
        $timeout(function () {
            $scope.loading = false;
            var data = $scope.form;
            data.ID = (($rootScope.training_centers).length + 1);
            data.image = $scope.image[0].lfDataUrl;
            ($rootScope.training_centers).push(data);
            $mdDialog.hide();
        }, 3000);
    };
}