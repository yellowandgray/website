app.directive('editabledate', function ($filter) {
    return {
        restrict: 'E',
        scope: {'data': '=',
            'date': '=?',
            'mindate': '=?',
            'update': '&'},
        template: '  <a href="#" editable-bsdate="data" e-is-open="opened.$data" e-ng-change="setDate($data)" e-ng-click="open($event,\'$data\')" e-datepicker-options="{minDate: mindate}" e-datepicker-popup="dd-MMMM-yyyy">  {{ (data | date:"dd/MM/yyyy") }}</a>',
        link: function (scope, element, attrs) {
            scope.setDate = function (newValue) {  // Convert date object to string
                var date = $filter('date')(newValue, "yyyy/MM/dd"); // for conversion to string
                //scope.data[scope.column]['formatted'] = date;
                if (scope.add && newValue) {
                    scope.data[scope.column] = date;
                }
                else {
                    scope.update({id: scope.data['id'], column: scope.column, data: date});
                }
            };
            scope.opened = {};
            scope.open = function ($event, elementOpened) {
                $event.preventDefault();
                $event.stopPropagation();
                scope.opened[elementOpened] = !scope.opened[elementOpened];
            };
            scope.setDate = function (date) {
                scope.date = date;
            };
        }
    };
});

app.directive('myEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.myEnter);
                });

                event.preventDefault();
            }
        });
    };
});

app.directive('backButton', ['$window', function ($window) {
        return {
            restrict: 'A',
            link: function (scope, elem, attrs) {
                elem.bind('click', function () {
                    $window.history.back();
                });
            }
        };
    }]);