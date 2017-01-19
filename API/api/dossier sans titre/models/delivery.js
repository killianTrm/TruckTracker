/**
* delivery.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

  attributes: {
		name: {
			type: 'string'
        },
        date : {
        	type: 'date',
        },
        address : {
        	model: 'address',
        },
        truck : {
        	model : 'truck', 
    	},
        user : {
            model : 'user', 
        },
  }
};

