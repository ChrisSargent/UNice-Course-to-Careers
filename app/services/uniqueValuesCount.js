angular
    .module('app')
    .factory('uniqueValuesCount', uniqueValuesCount);

// Scan through each row of a particular column / key (column) of a javascript array of objects (arr)
// Create an object of only unique values from each object's key and count the occurences in the array of objects
// Also pass the object length to save calculating it more than once

function uniqueValuesCount() {
    return {
        doit: function uniqueValuesCount(arr, column) {
            var uniqueValues = {};
            var emptyAnswer = "Non-communiqué";
            var arrLength = arr.length;
            
            // arr is an array of objects - think of it like a spreadsheet / database where each array is a row and each key:value pair is the column/value
            
            for (var i = 0; i < arrLength; i++) {       // Loop through each row of the array
                var currentKey = arr[i][column];        // Inspect the value of this row in the desired column and set it to 'currentKey'
                
                if (currentKey === "") {
                    currentKey = emptyAnswer;           // If there is no text in this particular cell then set 'currentKey' to be the string for an empty answer
                };
                
                var count = uniqueValues[currentKey];   // 'uniqueValues' starts as an empty object. Set 'count' to be equal to the value at 'currentKey'
                
                if (count === undefined) {              // If 'count' does not have a value (i.e. the key hasn't been created), then...
                    count = 1;
                    uniqueValues[currentKey] = count;   // Create a key:value pair where the key is equal to 'currentKey' and set it's value ('count') to 1
                    
                } else if (count !== undefined) {       // If 'count' does have a value (i.e. the key has been created), then...
                    uniqueValues[currentKey] = ++count; // Increment the 'count' value by one
                } 
            }
            
            return uniqueValues;                        // Return an object of key:value pairs where the keys are unique
                                                        // and the values are the number of occurences in the original array
        }
    }
};