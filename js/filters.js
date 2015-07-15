angular.module('searchAppFilters', []).filter('underscore', function () {
    return function (input) {
        if (input) {
            return input.replace(/_/g, ' ');
        }
    };
});