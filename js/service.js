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
        return {
            url: 'v1/'
        };
    } else {
        return {
            url: 'v1/'
        };
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

app.service('predefined', function ($ngConfirm) {
    return {
        showAlert: function (ttl, content) {
            $ngConfirm({
                title: ttl,
                content: content,
                buttons: {
                    Ok: {
                        text: 'Ok',
                        btnClass: 'btn-blue',
                        action: function () {
                        }
                    }
                }
            });
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

app.service('handset', function (usSpinnerService) {
    return {
        height: $(window).height(),
        is_mobile: document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1,
        showSpinner: function () {
            usSpinnerService.spin('spinner-1');
        },
        hideSpinner: function () {
            usSpinnerService.stop('spinner-1');
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