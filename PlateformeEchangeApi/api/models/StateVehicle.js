/**
* State.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

  attributes: {
      stateVehicle: {
            type: 'varchar',
            required: true,
            unique:true,
        },
        // levelBreakdown: {
        //     model: 'LevelBreakdown',
        // },
        color: {
            type: 'varchar',
        },
  }
};

