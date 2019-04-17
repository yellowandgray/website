app.controller('LoginController', function ($scope, $rootScope, userDetail, $http, apiPath, $location, handset, $uibModal, predefined, $timeout) {
    $rootScope.title = 'login';
    $rootScope.pagetitle = 'Login';
    $scope.formFields = {};
    $scope.loginForm = function () {
        handset.showSpinner();
        var formData = new FormData();
        angular.forEach($scope.formFields, function (val, key) {
            formData.append(key, val);
        });
        getLocalIP().then(function (res) {
            formData.append('ipaddress', res);
            $http.post(apiPath.url + 'login', formData, {transformRequest: angular.identity, headers: {'content-Type': undefined}}).then(function (response) {
                handset.hideSpinner();
                if (response.data.result.error === false) {
                    angular.forEach(response.data.result.data, function (val, key) {
                        userDetail.set('eshine_' + key, val);
                    });
                    if (response.data.result.data.type === 'franchise') {
                        var accepted = userDetail.get('eshine_terms_accepted');
                        if (accepted === null || parseInt(accepted) === 0) {
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
                        } else {
                            $location.path('dashboard').replace();
                        }
                    } else {
                        $location.path('program_master').replace();
                    }
                } else {
                    $timeout(function () {
                        predefined.showAlert('Error', response.data.result.message);
                    }, 200);
                }
            }, function (data) {
                handset.hideSpinner();
                predefined.showAlert('Error', data.statusText);
            });
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
        });
    };
    $scope.forgotPassword = function () {
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'forgot_password.html',
            controller: 'ForgotPasswordController'
        });
        modalInstance.result.then(function (response) {
            $timeout(function () {
                predefined.showAlert('Error', response.data.result.message);
            }, 200);
        }, function () {
            console.log('Dismissed');
        });
    };
    function getLocalIP() {
        return new Promise(function (resolve, reject) {
            // NOTE: window.RTCPeerConnection is "not a constructor" in FF22/23
            var RTCPeerConnection = /*window.RTCPeerConnection ||*/ window.webkitRTCPeerConnection || window.mozRTCPeerConnection;

            if (!RTCPeerConnection) {
                reject('Your browser does not support this API');
            }

            var rtc = new RTCPeerConnection({iceServers: []});
            var addrs = {};
            addrs["0.0.0.0"] = false;

            function grepSDP(sdp) {
                var hosts = [];
                var finalIP = '';
                sdp.split('\r\n').forEach(function (line) { // c.f. http://tools.ietf.org/html/rfc4566#page-39
                    if (~line.indexOf("a=candidate")) {     // http://tools.ietf.org/html/rfc4566#section-5.13
                        var parts = line.split(' '), // http://tools.ietf.org/html/rfc5245#section-15.1
                                addr = parts[4],
                                type = parts[7];
                        if (type === 'host') {
                            finalIP = addr;
                        }
                    } else if (~line.indexOf("c=")) {       // http://tools.ietf.org/html/rfc4566#section-5.7
                        var parts = line.split(' '),
                                addr = parts[2];
                        finalIP = addr;
                    }
                });
                return finalIP;
            }

            if (1 || window.mozRTCPeerConnection) {      // FF [and now Chrome!] needs a channel/stream to proceed
                rtc.createDataChannel('', {reliable: false});
            }

            rtc.onicecandidate = function (evt) {
                // convert the candidate to SDP so we can run it through our general parser
                // see https://twitter.com/lancestout/status/525796175425720320 for details
                if (evt.candidate) {
                    var addr = grepSDP("a=" + evt.candidate.candidate);
                    resolve(addr);
                }
            };
            rtc.createOffer(function (offerDesc) {
                rtc.setLocalDescription(offerDesc);
            }, function (e) {
                console.warn("offer failed", e);
            });
        });
    }
});

app.controller('ForgotPasswordController', function ($scope, $uibModalInstance, handset, $http, apiPath, predefined) {
    $scope.cancel = function () {
        $uibModalInstance.dismiss();
    };
    $scope.email = '';
    $scope.forgotPassword = function () {
        handset.showSpinner();
        $http.get(apiPath.url + 'forgotpassword/' + $scope.email).then(function (response) {
            handset.hideSpinner();
            $uibModalInstance.close(response);
        }, function (data) {
            handset.hideSpinner();
            predefined.showAlert('Error', data.statusText);
        });
    };
});