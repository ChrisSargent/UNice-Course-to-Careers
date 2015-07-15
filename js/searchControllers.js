var searchControllers = angular.module('searchControllers', []);

searchControllers.controller('codeRomeSearch', function ($scope, getRawData, processData) {

    // Set the columns you want to search and output data from
    var searchCols = ['Niveau_emploi', 'Mode_obtention', 'Classe_rémuneration_mensuelle', 'Spécialité_diplôme']
    $scope.codeROME = codeROME;

    // Call getRawData
    getRawData.lookup(codeROME, 'codeROME', function (rawData) {
        $scope.rawData = rawData;
        
        // Then call processData
        chartData = processData.process(rawData, searchCols);
        $scope.chartData = chartData;
    });
});

searchControllers.controller('keywordSearch', function ($scope, getRawData, processData) {

    $scope.search = function (searchTerms, searchType) {
        getRawData.lookup(searchTerms, searchType, function (rawData) {
            $scope.careers = rawData;
        });
    }
});