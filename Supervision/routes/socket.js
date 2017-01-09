module.exports = function (socket) {

    socket.on('send:geolocalisationFront',function(){
        socket.broadcast.emit('send:vehicle');
    });
};