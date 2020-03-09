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

app.directive('forceSelectFocus', [function () {
        return {
            restrict: 'A',
            require: ['^^mdSelect', '^ngModel'],
            link: function (scope, element, controller) {
                scope.$watch(function () {
                    var foundElement = element;
                    while (!foundElement.hasClass('md-select-menu-container')) {
                        foundElement = foundElement.parent();
                    }
                    return foundElement.hasClass('md-active');
                }, function (newVal) {
                    if (newVal) {
                        console.log(controller[1]);
                        element.focus();
                    }
                });
            }
        };
    }]);

app.directive("moveNextOnEnter", function () {
    return {
        restrict: "A",
        link: function ($scope, element) {
            element.bind("keyup", function (e) {
                if (e.which == 13) {
                    var $nextElement = element.next();
                    if ($nextElement.length) {
                        $nextElement[0].focus();
                    }
                }
            });
            event.preventDefault();
        }
    };
});