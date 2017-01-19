/**
 * VehicleController
 *
 * @description :: Server-side logic for managing vehicles
 * @help        :: See http://sailsjs.org/#!/documentation/concepts/Controllers
 */

module.exports = {

  getAllCoordinates:function (req,res) {

    var data_from_client = req.params.all();

    if(req.isSocket && req.method === 'GET'){
      // This is the message from connected client
      // So add new conversation
      res.json({ "value" : "toto" });

    }
    else if(req.isSocket){
      // subscribe client to model changes
      Vehicle.watch(req.socket);
      console.log( 'User subscribed to ' + req.socket.id );
    }
  }

};

