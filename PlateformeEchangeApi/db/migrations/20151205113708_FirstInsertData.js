'use strict';

exports.up = function(knex, Promise) {
    //entrain de rouler
  knex('state').insert({state: 'driving'}),
    //en panne
  knex('state').insert({state: 'breakdown'}),
  //en cours de dépannage
  knex('state').insert({state: 'repairing'}),
  //phase de repos
  knex('state').insert({state: 'rest stage'})
};

exports.down = function(knex, Promise) {
  knex('state')
  .where('state', 'driving')
  .del(),
  knex('state')
  .where('state', 'breakdown')
  .del(),
  knex('state')
  .where('state', 'repairing')
  .del(),
  knex('state')
  .where('state', 'rest stage')
  .del()
};
