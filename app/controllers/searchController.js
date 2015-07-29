angular
    .module('app')
    .controller('searchController', searchController);

function searchController($filter, getRawData) {
 
    var vm = this;

    vm.search = function (searchTerms, searchType) {
        getRawData.lookup(searchTerms, searchType, function (rawData) {
            vm.results = rawData;
        });
    };
}