angular
    .module('app')
    .controller('chartsController', chartsController);

function chartsController($location, $filter, $stateParams, getRawData, processData) {

    var vm = this,
        // Set the Database search columns
        searchType = $stateParams.searchType,
        // What to search for
        searchTerm = $stateParams.searchTerm,
        searchCols = [],
        chartData = {},
        groupedData = {},
        groupedDataArr = [],
        sortedDataArr = [],
        groupBy = '';

    console.log(searchType);
    console.log(searchTerm);
    
    // Call getRawData
    getRawData.lookup(searchTerm, searchType, function (rawData) {
        console.log(rawData);

        switch (searchType) {
            // Set the columns you want to search and output data to the charts from
        case 'codeROME':
            searchCols = ['Niveau_emploi', 'Mode_obtention', 'Classe_rémuneration_mensuelle', 'Spécialité_diplôme'];
            groupBy = 'Spécialité_diplôme';
            break;
        case 'codeDiplome':
            searchCols = ['Niveau_emploi', 'Mode_obtention', 'Classe_rémuneration_mensuelle', 'Intitulé_ROME'];
            groupBy = 'Intitulé_ROME';
            break;
        }

        // Call processData to format data for the charts
        chartData = processData.process(rawData, searchCols);

        // Group the data
        groupedData = $filter('groupBy')(rawData, groupBy);

        // Convert it to an array so it can be sorted
        groupedDataArr = $filter('toArray')(groupedData);

        // Sorted it by each element length
        sortedDataArr = $filter('orderBy')(groupedDataArr, '', true);

        // Title for the Pages
        vm.intituleROME = sortedDataArr[0][0].Intitulé_ROME;
        vm.specialityDiplome = sortedDataArr[0][0].Spécialité_diplôme;
        // Total number of survey results
        vm.numOfResults = sortedDataArr.length;
        // Limit the results table to the top five results
        vm.limit = 5;
        // Give the page access to the data
        vm.sortedDataArr = sortedDataArr;
        // Give the page access to the Chart data
        vm.chartData = chartData;
        // Give the page access to the searchTerm
        vm.searchTerm = searchTerm;
    });
}