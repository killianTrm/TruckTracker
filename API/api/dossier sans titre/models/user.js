/**
* user.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

  attributes: {
		firstname: {
			type: 'string'
        },
        lastname: {
            type: 'string'
        },
        address: {
            model: 'address'
        }
        ,password: {
            type: 'string'
        }
        ,entity: {
            model: 'entity'
        }
  }
};
