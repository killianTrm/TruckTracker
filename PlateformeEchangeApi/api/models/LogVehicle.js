/**
* LogVehicle.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

  attributes: {
		immatricul: {
			type: 'string'
        },
        user : {
        	model: 'User',
        },
        stateVehicle : {
        	type: 'string',
        },
        levelBreakdown : {
        	type : 'string', 
    	},
  }
};

