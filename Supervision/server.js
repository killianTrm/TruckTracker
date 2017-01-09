var express = require('express')
    , cookieParser = require('cookie-parser')
    , bodyParser = require('body-parser')
    , methodOverride = require('method-override')
    , session = require('express-session')
    , http = require('http');
    ;



// Initialize server
var app = module.exports = express();
var server = require('http').createServer(app);
app.use(cookieParser());
app.use(bodyParser.urlencoded({extended: false}));
app.use(bodyParser.json());
app.use(methodOverride('X-HTTP-Method-Override'));
app.use(session({secret: 'supernova', saveUninitialized: true, resave: true}));
app.use(express.static(__dirname));
app.set('port', process.env.PORT || 5000);

process.on('uncaughtException', function (err) {
    console.log(err.stack);
});

server.listen(app.get('port'), function () {
    console.log('Express server listening on port ' + app.get('port'));
});

//Socket
var io = require('socket.io').listen(server);
// Socket.io Communication
io.sockets.on('connection', require('./routes/socket'));