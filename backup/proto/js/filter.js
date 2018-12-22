app.filter('timeformat', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== null && input !== '') {
            return moment(input, 'hhmm').format('hh:mm A');
        } else {
            return 'HH:MM';
        }
    };
});

app.filter('dateformat', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== null && input !== '') {
            var date = input.split('-');
            var month = date[1].replace(/\w\S*/g, function (txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
            return moment(date[0] + '-' + month + '-' + date[2], 'DD-MMM-YY').format('dddd, DD MMM');
        } else {
            return 'Date';
        }
    };
});

app.filter('dateformat2', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== null && input !== '') {
            var date = input.split('-');
            var month = date[1].replace(/\w\S*/g, function (txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
            return moment(date[0] + '-' + month + '-' + date[2], 'DD-MMM-YY').format('dddd, DD MMM');
        } else {
            return 'Date';
        }
    };
});

app.filter('fromnow', function () {
    return function (input) {
        if (!input || input === 0) {
            return 'N/A';
        } else {
            return moment(moment().subtract(input, 'minutes')).fromNow();
        }
    };
});

app.filter('charlimit', function () {
    return function (input, len) {
        if (typeof input !== 'undefined' && input !== null && input !== '') {
            if (input.length <= len) {
                return input;
            } else {
                return input.substr(0, (len - 3)) + '...';
            }
        }
    };
});

app.filter('dayhourmin', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== null && input !== '' && input > 0) {
            var day = parseInt(input) / 1440;
            var hour = 0;
            var min = 0;
            var value = '';
            if (day !== 0) {
                var inp = parseInt(input) % 1440;
                hour = parseInt(inp) / 60;
                min = parseInt(inp) % 60;
            } else {
                hour = parseInt(input) / 60;
                min = parseInt(input) % 60;
            }
            if (day !== 0) {
                value = value + parseInt(day) + 'day ';
            }
            if (hour !== 0) {
                value = value + parseInt(hour) + 'hour ';
            }
            if (min !== 0) {
                value = value + parseInt(min) + 'mins';
            }
            return value;
        } else {
            return '-';
        }
    };
});

app.filter('validateavailable', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== null && input !== '' && input !== 'null') {
            return input;
        } else {
            return '-';
        }
    };
});

app.filter('passwordfield', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== null && input !== '' && input !== 'null') {
            return '*****';
        } else {
            return '-';
        }
    };
});

app.filter('cyclestatus', function () {
    return function (input) {
        var status = {0: 'Assign', 1: 'Assign', 2: 'Downloaded', 3: 'Viewed', 4: 'Customer At location', 5: 'Released'};
        if (typeof input !== 'undefined' && input !== null && input !== '') {
            status[input];
        } else {
            return 'N/A';
        }
    };
});

app.filter('singlechar', function () {
    return function (input) {
        if (typeof input !== 'undefined') {
            return input.charAt(0).toUpperCase();
        } else {
            return '';
        }
    };
});

app.filter('allworkorders', function () {
    return function (input) {
        var count = 0;
        angular.forEach(input, function (val, key) {
            count = parseInt(val) + count;
        });
        return count;
    };
});

app.filter('validatezeor', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== null && input !== '') {
            return input;
        } else {
            return '0';
        }
    };
});

app.filter('reportline', function () {
    return function (input, index) {
        if (typeof input[index] !== 'undefined') {
            return input[index];
        } else {
            return '0';
        }
    };
});

app.filter('pendingworkorder', function () {
    return function (input) {
        var count = 0;
        if (typeof input['Backlog'] !== 'undefined') {
            count = count + parseInt(input['Backlog']);
        }
        if (typeof input['Received'] !== 'undefined') {
            count = count + parseInt(input['Received']);
        }
        if (typeof input['Successfully Delivered'] !== 'undefined') {
            count = count - parseInt(input['Successfully Delivered']);
        }
        return count;
    };
});

app.filter('paidtext', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== '' && input === 'paid') {
            return 'Paid';
        } else {
            return 'Unpaid';
        }
    };
});

app.filter('paidbackground', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== '' && input === 'paid') {
            return 'green';
        } else {
            return 'red';
        }
    };
});

app.filter('injectionCertificateBtnLabel', function () {
    return function (input) {
        if (typeof input !== 'undefined' && input !== '') {
            return 'Change';
        } else {
            return 'Upload';
        }
    };
});