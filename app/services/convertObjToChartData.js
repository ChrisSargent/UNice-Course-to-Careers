angular
    .module('app')
    .factory('convertObjToChartData', convertObjToChartData);

// This function takes an unordered object of key value pairs and returns an order object by key or value
function convertObjToChartData() {
    return {
        doit: function convertObjToChartData(obj, objLength) {
            var labels = [];
            var data = [];
            var otherResponse = "Autre réponse";
            
            for (var label in obj) {
                if (obj[label] <= 1) {

                } else {
                    labels.push(label);
                    data.push(obj[label]);
                }
            };

            // Add up the values in the data array
            var count = 0;
            for (var i = 0; i < data.length; i++) {
                count += data[i];
            }

            var remainder = objLength - count;
            if (remainder != 0) {
                labels.push(otherResponse);
                data.push(remainder);
            }
            
            // Return an array of the data and labels arrays.
            return [data, labels];
        }
    }
};