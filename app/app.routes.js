angular
    .module('app')
    .config(config);

function config($stateProvider, $urlRouterProvider) {
    // Now set up the states
    $stateProvider
        .state('search', {
            url: "",
            views: {
                '': {
                    templateUrl: "partials/search.html"
                },
                'col1@search': {
                    templateUrl: "partials/metiersSearch.html",
                    controller: "searchController",
                    controllerAs: "vm"
                },
                'col2@search': {
                    templateUrl: "partials/diplomeSearch.html",
                    controller: "searchController",
                    controllerAs: "vm"
                }
            }
        })
        .state('crCharts', {
            url: "/cr/:searchTerm",
            params: {
                searchType: 'codeROME'
            },
            templateUrl: "partials/codeRomeCharts.html",
            controller: "chartsController",
            controllerAs: "vm"
        })
        .state('dipCharts', {
            url: "/dip/:searchTerm",
            params: {
                searchType: 'codeDiplome'
            },
            templateUrl: "partials/diplomeCharts.html",
            controller: "chartsController",
            controllerAs: "vm"
        });
}