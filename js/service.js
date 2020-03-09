app.service('close', function ($mdSidenav, $log) {
    return function () {
        // Component lookup should always be available since we are not using `ng-if`
        $mdSidenav('left').close()
                .then(function () {
                    $log.debug('close LEFT is done');
                });

    };
});

app.service('buildDelayedToggler', function ($mdSidenav, $log, $timeout) {
    return debounce(function () {
        // Component lookup should always be available since we are not using `ng-if`
        $mdSidenav('left')
                .toggle()
                .then(function () {
                    $log.debug('toggle left is done');
                });
    }, 200);

    function debounce(func, wait, context, $scope) {
        var timer;
        return function debounced() {
            var context = $scope,
                    args = Array.prototype.slice.call(arguments);
            $timeout.cancel(timer);
            timer = $timeout(function () {
                timer = undefined;
                func.apply(context, args);
            }, wait || 10);
        };
    }
});

app.service('apiPath', function () {
    var is_mobile = document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1;
    if (is_mobile) {
        return {url: 'v1/'};
    } else {
        return {url: 'v1/'};
    }
});

app.service('network', function () {
    var connection = {};
    var is_mobile = document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1;
    if (is_mobile) {
        connection.network = navigator.connection.type;
    } else {
        connection.network = 'WiFi';
    }
    return connection;
});

app.service('predefined', function ($mdDialog, $mdToast) {
    return {
        showAlert: function (ttl, content) {
            $mdDialog.show(
                    $mdDialog.alert()
                    .parent(angular.element(document.querySelector('#popupContainer')))
                    .clickOutsideToClose(true)
                    .title(ttl)
                    .textContent(content)
                    .ariaLabel('Unable to get location')
                    .ok('Ok')
                    //.targetEvent(ev)
                    );
        },
        showToast: function (msg, pos) {
            $mdToast.show(
                    $mdToast.simple()
                    .textContent(msg)
                    .position(pos)
                    .hideDelay(3000)
                    );
        },
        version: '1.0.3'
    };
});

app.service('userDetail', function () {
    var setValue = function (key, val) {
        window.localStorage.setItem(key, val);
    };
    var getValue = function (key) {
        return window.localStorage.getItem(key);
    };
    var removeValue = function (key) {
        return window.localStorage.removeItem(key);
    };
    return {
        set: setValue, get: getValue, remove: removeValue
    };
});

app.service('userSession', function () {
    var setValue = function (key, val) {
        window.sessionStorage.setItem('sankara_school_' + key, val);
    };
    var getValue = function (key) {
        return window.sessionStorage.getItem('sankara_school_' + key);
    };
    var removeValue = function (key) {
        return window.sessionStorage.removeItem('sankara_school_'+key);
    };
    return {
        set: setValue, get: getValue, remove: removeValue
    };
});

app.service('handset', function () {
    return {
        height: $(window).height(),
        is_mobile: document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1,
        showSpinner: function (ttl, msg, fixed) {
            if (this.is_mobile) {
                window.plugins.spinnerDialog.show(ttl, msg, fixed);
            }
        },
        hideSpinner: function () {
            if (this.is_mobile) {
                window.plugins.spinnerDialog.hide();
            }
        }
    };
});

app.service('log', function (handset) {
    return {
        info: function (msg) {
            if (handset.is_mobile) {
                window.logToFile.info(msg);
            }
        },
        warn: function (msg) {
            if (handset.is_mobile) {
                window.logToFile.warn(msg);
            }
        },
        error: function (msg) {
            if (handset.is_mobile) {
                window.logToFile.error(msg);
            }
        },
        debug: function (msg) {
            if (handset.is_mobile) {
                window.logToFile.debug(msg);
            }
        }
    };
});