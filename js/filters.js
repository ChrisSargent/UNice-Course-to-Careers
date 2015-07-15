angular.module('searchAppFilters', [])

.filter('underscore', function () {
    return function (input) {
        if (input) {
            return input.replace(/_/g, ' ');
        }
    };
})

.filter('unique', function () {
    return function (input, key) {
        var unique = {};
        var uniqueList = [];
        for (var i = 0; i < input.length; i++) {
            if (typeof unique[input[i][key]] == "undefined") {
                unique[input[i][key]] = "";
                uniqueList.push(input[i]);
            }
        }
        return uniqueList;
    };
});