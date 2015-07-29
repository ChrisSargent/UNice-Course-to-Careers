angular
    .module('app')
    .factory('processData', processData);

function processData(sortObject, uniqueValuesCount, convertObjToChartData) {
    return {
        process: function (rawData, searchCols) {
            //var tempData = {};
            var chartData = [];
            var rawDataLength = rawData.length;
            var searchColsLength = searchCols.length;
            var maximumResults = 5;
            var sortBy = 'value';

            for (var j = 0; j < searchColsLength; j++) {
                var searchCol = searchCols[j];

                // Loop through each selected column of the rawData to find and count unique values
                var uniqueData = uniqueValuesCount.doit(rawData, searchCol);

                // Sort the object using variables above
                var sortedUniqueData = sortObject.doit(uniqueData, maximumResults, sortBy);
                
                // Convert the object to an array or two arrays - data and labels so that chart.js can ingest it
                var convertedObj = convertObjToChartData.doit(sortedUniqueData,rawDataLength);
                
                // Create a temporary object that is inserted in to the chartData array
                var tempObj = {
                    series: searchCol,
                    data: convertedObj[0],
                    labels: convertedObj[1]
                };
                
                // Writes the temp object to the chartData array in position [j]
                chartData[j] = tempObj;
                
            };
            return chartData;
        }
    }
};