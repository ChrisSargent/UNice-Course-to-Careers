var searchApp = angular.module('searchApp', [
    'searchControllers',
    'dataFactory',
    'searchAppFilters',
    'chart.js',
    'ui.router'
]);

searchApp.config(function ($stateProvider, $urlRouterProvider) {

    // Now set up the states
    $stateProvider
        .state('state1', {
            url: "/search",
            templateUrl: "partials/KeywordSearch.html",
        })
        .state('state2', {
            url: "/{codeROME}",
            templateUrl: "partials/codeRomeCharts.html",
            controller: function ($stateParams) {
                codeROME = $stateParams.codeROME;
            }
        });
});