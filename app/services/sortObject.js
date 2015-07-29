angular
    .module('app')
    .factory('sortObject', sortObject);

// This function takes an unordered object of key value pairs and returns an ordered object by key or value
function sortObject() {
    return {
        doit: function (obj, requiredSize, type) {
            var temp_array = [];
            var sortedObj = {};

            // Convert the object to an array of key-value pairs
            for (var key in obj) {
                if (obj.hasOwnProperty(key)) {
                    temp_array.push(key);
                }
            }

            // Sort the array
            
            if (type === 'value') {
                // Sort by the values
                temp_array.sort(function (a, b) {
                    var x = obj[a];
                    var y = obj[b];
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                });
                // Order it by the largest first
                temp_array.reverse();
            }
            
            else {
                // Sort it by the key
                temp_array.sort();
            }

            // Only use the required results
            temp_array = temp_array.slice(0, requiredSize);
            
            // Convert the sorted array back in to an object
            for (var i = 0; i < temp_array.length; i++) {
                sortedObj[temp_array[i]] = obj[temp_array[i]];
            }
            return sortedObj;
        }
    }
};