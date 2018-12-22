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

app.service('rootPath', function () {
    var is_mobile = document.URL.indexOf('http://') === -1 && document.URL.indexOf('https://') === -1;
    if (is_mobile) {
        return {url: 'http://4blocksinc.com/demo/v1/'};
    } else {
        return {url: 'http://4blocksinc.com/demo/v1/'};
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

app.service('predefined', function ($mdDialog) {
    return {
        showAlert: function (ttl, content) {
            $mdDialog.show(
                    $mdDialog.alert()
                    .parent(angular.element(document.querySelector('#popupContainer')))
                    .clickOutsideToClose(true)
                    .title(ttl)
                    .theme('forms')
                    .textContent(content)
                    .ariaLabel('Unable to get location')
                    .ok('Ok')
                    //.targetEvent(ev)
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

app.service('toast', function ($mdToast) {
    return {
        simple: function (msg, position, delay) {
            $mdToast.show(
                    $mdToast.simple()
                    .textContent(msg)
                    .position(position)
                    .hideDelay(delay)
                    );
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

app.service('cart', function () {
    var cartItems = $.parseJSON(window.localStorage.getItem('cartItems'));
    var addToCart = function (data) {
        cartItems.push(data);
        window.localStorage.setItem('cartItems', JSON.stringify(cartItems));
    };
    var getCart = function () {
        return cartItems;
    };
    var getCartCount = function () {
        return cartItems.length;
    };
    var removeFromCart = function (code) {
        $.each(cartItems, function (index, row) {
            if (row.code === code) {
                cartItems.splice(index, 1);
                window.localStorage.setItem('cartItems', JSON.stringify(cartItems));
                return false;
            }
        });
    };
    var removeAllFromCart = function () {
        window.localStorage.setItem('cartItems', JSON.stringify([]));
    };
    var clearCart = function () {
        cartItems = [];
        window.localStorage.setItem('cartItems', JSON.stringify(cartItems));
    };
    var getTotal = function () {
        var grandTotal = 0;
        if (cartItems.length > 0) {
            $.each(cartItems, function (index, row) {
                var total = 0;
                var amt = parseFloat(row[row.serviceTypeSelected]);
                var tax = amt * parseFloat(row.tax) / 100;
                var discount = parseFloat(row.discount_value);
                if (row.discount_type === 'percentage') {
                    discount = amt * parseFloat(row.discount_value) / 100;
                }
                total = amt + tax - discount;
                total = total * row.serviceCountSelected;
                grandTotal = grandTotal + total;
            });
        }
        return grandTotal.toFixed(2);
    };
    return {add: addToCart, get: getCart, count: getCartCount, remove: removeFromCart, removeAll: removeAllFromCart, clear: clearCart, getTotal: getTotal};
});