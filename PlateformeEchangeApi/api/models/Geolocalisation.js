/**
 * Geolocalisation.js
 *
 * @description :: TODO: You might write a short summary of how this model works and what it represents here.
 * @docs        :: http://sailsjs.org/#!documentation/models
 */

module.exports = {

    //connection: ['rabbitCluster', 'apiSocieteTransport'],
    //routingKey: ['immatricul'],
    attributes: {
        latitude: {
            type: 'float',
            required: true
        },
        longitude: {
            type: 'float',
            required: true
        },
    }
};

