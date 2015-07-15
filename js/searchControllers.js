var searchControllers = angular.module('searchControllers', []);

searchControllers.controller('pageCtrl', function ($scope, getRawData, processData) {

    // Constant Test Variables
    var searchType = 'codeROME';
    var searchCols = ['Niveau_emploi', 'Mode_obtention', 'Classe_rémuneration_mensuelle'/*, 'Durée_accès'*/]
    $scope.codeROME = codeROME;

    // Call getRawData
    getRawData.lookup(codeROME, searchType, function (rawData) {
        // Then call processData
        chartData = processData.process(rawData, searchCols);
        $scope.chartData = chartData;
    });
});


// ['Niveau_emploi', 'Mode_obtention', 'Classe_rémuneration_mensuelle'/*, 'Durée_accès'*/];