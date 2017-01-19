/**
* truck.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

  attributes: {
		gaz: {
			type: 'int'
        },
        speedMin: {
            type: 'int'
        },
        speedMax: {
            type: 'int'
        }
        ,speedAvg: {
            type: 'int'
        }
        ,acceleration: {
            type: 'int'
        }
        ,stopTime: {
            type: 'int'
        }
        ,breakTime: {
            type: 'int'
        }
        ,trafiCorridor: {
            type: 'int'
        }
  }
};
