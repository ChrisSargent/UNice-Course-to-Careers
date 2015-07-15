var dataFactory = angular.module('dataFactory', []);

dataFactory.factory('getRawData', function ($http) {
    return {
        lookup: function (searchTerms, searchType, callback) {

            var urlBase = '/searchapi.php';
            var getRequest = {
                method: 'GET',
                url: urlBase,
                //cache: true,
                params: {
                    search: searchTerms,
                    type: searchType
                }
            }

            $http(getRequest).success(function (rawData) {
                callback(rawData)
            });
        }
    }
});

dataFactory.factory('processData', function (sortData) {
    return {
        process: function (rawData, searchCols) {

            var tempData = {};
            var chartData = [];
            var rawDataLength = rawData.length;
            var searchColsLength = searchCols.length;
            var otherResponse = "Autre réponse";
            var maximumResults = 5;

            for (var j = 0; j < searchColsLength; j++) {
                var searchCol = searchCols[j];

                // Loop through each selected colum of the rawData to find and count unique values
                for (var i = 0; i < rawDataLength; i++) {
                    var currVal = rawData[i][searchCol];
                    if (currVal === "") {
                        currVal = "Non-communiqué"
                    };
                    var testValue = tempData[currVal];

                    if (testValue === undefined) {
                        tempData[currVal] = 1;
                    } else if (testValue !== undefined) {
                        tempData[currVal] = ++testValue;
                    }
                }
                
                // Sort the object - use 'value' to order by value and the number to specifiy maximum results
                tempData = sortData.sortObj(tempData, maximumResults, 'value');

                // split object of label:data to two arrays so chart.js can ingest it, ignores results with a value less than 1
                var labels = [];
                var data = [];
                for (var label in tempData) {
                    if (tempData[label] <= 1) {

                    } else {
                        labels.push(label);
                        data.push(tempData[label]);
                    }
                };

                // Add up the values in the data array
                var count = 0;
                for (var i = 0; i < data.length; i++) {
                    count += data[i];
                }

                var remainder = rawDataLength - count;
                if (remainder != 0) {
                    labels.push(otherResponse);
                    data.push(remainder);
                }

                // Create a temporary object that is inserted in to the array object of label:data to two arrays so chart.js can ingest it
                tempObj = {
                    series: searchCol,
                    data: data,
                    labels: labels
                };

                // Writes the temp object to the chartData array in position [j]
                chartData[j] = tempObj;

                // Empties the tempData object
                tempData = {};
            };
            return chartData;
        }
    }
});


// This function takes an unordered object of key value pairs and returns an order object by key or value
dataFactory.factory('sortData', function () {
    return {
        sortObj: function (obj, requiredSize, type) {
            var temp_array = [];

            // Convert the object to an array of key-value pairs
            for (var key in obj) {
                if (obj.hasOwnProperty(key)) {
                    temp_array.push(key);
                }
            }

            // Sort the array
            if (type === 'value') {
                temp_array.sort(function (a, b) {
                    var x = obj[a];
                    var y = obj[b];
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                });
            } else {
                temp_array.sort();
            }

            // Order it by the largest first
            temp_array.reverse();

            // Only use the top 5 results
            temp_array = temp_array.slice(0, requiredSize);

            var temp_obj = {};
            for (var i = 0; i < temp_array.length; i++) {
                temp_obj[temp_array[i]] = obj[temp_array[i]];
            }
            return temp_obj;
        }
    }
});


/*
// Template for a function that returns a value
dataFactory.factory('sortData', function () {
    return {
        sort: function(input) {
            output = input * 2;
            return output;
        }
    }
});
*/


/*
// Converts the key:value object in to a sorted array - {foo:20,bar:2,baz:5} to [[bar,2],[baz,5],[foo,20[]
var sorted = [];
for (var key in tempData) {
    sorted.push([key, tempData[key]]);

    sorted.sort(function (a, b) {
        return a[1] - b[1]
    })
}
*/