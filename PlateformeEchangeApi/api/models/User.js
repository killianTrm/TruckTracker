/**
* User.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

  attributes: {
      login: {
            type: 'string',
            required: true,
            minLength: 3,
            unique:true,
        },

        password: {
            type: 'string',
            required: true
        },  
        lastname: {
            type: 'string',
            required: true,
            unique: true
        },
        firstname: {
            type:'string',
            required: true,
            unique: true
        },
        skill: {
            model: 'Skill',
        },
        accountType: {
            model: 'AccountType',
        },



  }
};

