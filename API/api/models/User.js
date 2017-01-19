/**
 * User.js
 *
 * @description :: TODO: You might write a short summary of how this model works and what it represents here.
 * @docs        :: http://sailsjs.org/documentation/concepts/models-and-orm/models
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
            model: 'Address'
        }
        ,password: {
            type: 'string'
        }
        ,entity: {
            model: 'Entity'
        }
  }
};
