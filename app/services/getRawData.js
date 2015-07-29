angular
    .module('app')
    .factory('getRawData', getRawData);

function getRawData($http) {
    return {
        lookup: function (searchTerms, searchType, callback) {
            var urlBase = '/app/serverApi/searchapi.php';
            var getRequest = {
                method: 'GET',
                url: urlBase,
                cache: true,
                params: {
                    search: searchTerms,
                    type: searchType
                }
            };
            $http(getRequest).success(function (rawData) {
                // Returns rawData which is an Array of Objects - each object is a row from the database with key:value pairs
                callback(rawData);
            });
        }
    };
}