app.filter('timeformat', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== null) {
            var time = input.split(':');
            return moment().set({hour: time[0], minute: time[1], second: time[2]}).format('hh:mm A');
        } else {
            return input;
        }
    };
});

app.filter('dateformat', function () {
    return function (input) {
        if (typeof input !== 'undefined') {
            return moment(input).format('DD MMM YYYY');
        } else {
            return input;
        }
    };
});

app.filter('appointment', function () {
    return function (input) {
        if (input === true) {
            return 'Online';
        } else {
            return 'Offline';
        }
    };
});

app.filter('feetype', function () {
    return function (input) {
        input = parseInt(input);
        if (input === 1) {
            return 'PayWithConsultantFee';
        } else if (input === 2) {
            return 'PayBookingFeeOnly';
        } else if (input === 3) {
            return 'NoFee';
        }
    };
});

app.filter('disableCancel', function (moment) {
    return function (input) {
        var datetime = input.split(' ');
        var _date = datetime[0].split('-');
        var time = datetime[1].split(':');
        if (moment().set({year: _date[2], month: parseInt(_date[1]) - 1, date: _date[0], hour: '00', minute: '00', second: '00'}) > moment()) {
            return true;
        } else {
            return false;
        }
    };
});

app.filter('camelCase', function () {
    return function (input) {
        if (typeof input !== 'undefined') {
            var words = input.split(' ');
            for (var i = 0, len = words.length; i < len; i++)
                words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
            return words.join(' ');
        }
    };
});

app.filter('limitword', function () {
    return function (input, len) {
        if (input.length <= len) {
            return input;
        } else {
            return input.substr(0, (len - 3)) + '...';
        }
    };
});

app.filter('htmlToPlaintext', function () {
    return function (text) {
        return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
    };
});

app.filter('quantityName', function ($rootScope) {
    return function (input) {
        var name = '';
        var found = false;
        angular.forEach($rootScope.quantity, function (val, key) {
            if (!found) {
                if (parseInt(val.ID) === parseInt(input)) {
                    name = val.name;
                    found = true;
                }
            }
        });
        return name;
    };
});

app.filter('class', function ($rootScope) {
    return function (input) {
        var name = '';
        var found = false;
        angular.forEach($rootScope.class, function (val, key) {
            if (!found) {
                if (parseInt(val.ID) === parseInt(input)) {
                    name = val.name;
                    found = true;
                }
            }
        });
        return name;
    };
});

app.filter('section', function ($rootScope) {
    return function (input) {
        var name = '';
        var found = false;
        angular.forEach($rootScope.section, function (val, key) {
            if (!found) {
                if (parseInt(val.ID) === parseInt(input)) {
                    name = val.name;
                    found = true;
                }
            }
        });
        return name;
    };
});

app.filter('designition', function ($rootScope) {
    return function (input) {
        var name = '';
        var found = false;
        angular.forEach($rootScope.designition, function (val, key) {
            if (!found) {
                if (parseInt(val.ID) === parseInt(input)) {
                    name = val.name;
                    found = true;
                }
            }
        });
        return name;
    };
});

app.filter('teacher', function ($rootScope) {
    return function (input) {
        var name = '';
        var found = false;
        angular.forEach($rootScope.teacher, function (val, key) {
            if (!found) {
                if (parseInt(val.ID) === parseInt(input)) {
                    name = val.name;
                    found = true;
                }
            }
        });
        return name;
    };
});

app.filter('subjects', function ($rootScope) {
    return function (input) {
        var name = '';
        var found = false;
        angular.forEach($rootScope.subjects, function (val, key) {
            if (!found) {
                if (parseInt(val.ID) === parseInt(input)) {
                    name = val.name;
                    found = true;
                }
            }
        });
        return name;
    };
});

app.filter('classname', function ($rootScope) {
    return function (input) {
        var name = '';
        var found = false;
        angular.forEach($rootScope.classSections, function (val, key) {
            if (!found) {
                if (parseInt(val.ID) === parseInt(input)) {
                    name = val.name;
                    found = true;
                }
            }
        });
        return name;
    };
});

app.filter('student_name', function ($rootScope) {
    return function (input) {
        var name = '';
        var found = false;
        angular.forEach($rootScope.student, function (val, key) {
            if (!found) {
                if (parseInt(val.ID) === parseInt(input)) {
                    name = val.name;
                    found = true;
                }
            }
        });
        return name;
    };
});

app.filter('type', function () {
    return function (input) {
        var res = '';
        if (input && input !== 'undefined') {
            if (input === 'credit') {
                res = '+';
            } else {
                res = '-';
            }
        }
        return res;
    };
});

app.filter('objectFilter', function () {
    return function (items, search) {
        var result = [];
        angular.forEach(items, function (value, key) {
            angular.forEach(value, function (value2, key2) {
                if (value2 === search) {
                    result.push(value2);
                }
            })
        });
        return result;
    }
});

app.filter('image_url', function () {
    return function (input) {
        var image = 'v1/';
        if (input && input !== '') {
            return image + input;
        } else {
            return image + 'default_preview.jpg';
        }
    };
});

app.filter('trustAsResourceUrl', ['$sce', function ($sce) {
        return function (val) {
            return $sce.trustAsResourceUrl('v1/' + val);
        };
    }]);