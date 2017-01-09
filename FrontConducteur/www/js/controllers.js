angular.module('starter.controllers', ['ngToast', 'ngRoute'])

  .controller('DashCtrl', ['$scope', '$interval', '$http', 'ngToast', '$window', '$route',
    function ($scope, $interval, $http, ngToast, $window, $route) {
      if (!sessionStorage.userId) {
        $window.location.href = '#/tab/dash';
        $route.reload();
      }

      $scope.connectionUser = function (user) {
        var successgetUser = function (userBdd) {
          if (userBdd.data.length > 0) {
            if (userBdd.data[0].login == user.login && userBdd.data[0].password == user.password) {
              sessionStorage.userId = userBdd.data[0].id;
              sessionStorage.userLogin = userBdd.data[0].login;
              sessionStorage.userFirstname = userBdd.data[0].firstname;
              sessionStorage.userLastname = userBdd.data[0].lastname;
              console.log("User connected");
              $window.location.href = '#/tab/account';
              $route.reload();
            }
          } else {
            console.log('Login or password incorrect');
          }
        };
        var errorGetUser = function () {
          console.log("Erreur connexion user");
        };

        $http.get('http://localhost:1337/user?login=' + user.login)
          .then(successgetUser, errorGetUser);

      };


      $scope.deconnection = function () {
        console.log("deconnection");
        sessionStorage.clear();
        $window.location.href = '#/tab/dash';
        $route.reload();
      };

    }])

  .controller('TruckCtrl', function ($scope, $http, $route, $window) {
    $scope.getDisponibilityTruck = function () {
      //stateVehicle 4 = stop.
      $http.get('http://localhost:1337/vehicle?usedBy=0&stateVehicle=4')
        .then(
        function (data) {
          $scope.getDispoTruck = data.data
        },
        function () {
          console.log("recup vehicle ko")
        });
    };

    $scope.getTruckFromUserSession = function () {
      $http.get('http://localhost:1337/vehicle?usedBy=' + sessionStorage.userId)
        .then
      (function (data) {
          $scope.getTfromU = data.data[0];

        },
        function () {
          console.log("Erreur recuperation truck du driver")
        }
      );
    };

    $scope.chooseTruck = function (truckChoose) {
      var tc = truckChoose;
      console.log(tc);
      var reqPut = {
        method: 'PUT',
        url: 'http://localhost:1337/vehicle/' + tc.id,
        headers: {
          'Content-Type': undefined
        },
        data: {
          usedBy: sessionStorage.userId
        }
      };
      $http(reqPut).then(function () {
        console.log("choose truck ok")
      }, function () {
        console.log("choose truck ko")
      });
      $window.location.reload();
    };


    $scope.getDisponibilityTruck();
    $scope.getTruckFromUserSession();


  })


  .controller('AccountCtrl', function ($scope, $window, $http, socket) {

    socket.on('connect', function () {
      setInterval(function () {
        navigator.geolocation.getCurrentPosition(function (position) {
          $scope.positions = "lat:" + position.coords.latitude + ",lng: " + position.coords.longitude;

          $http.get('http://localhost:1337/vehicle?usedBy=' + sessionStorage.userId)
            .then(function (vehicle) {
              $scope.vehicle = vehicle.data[0];
              var reqPut = {
                method: 'PUT',
                url: 'http://localhost:1337/geolocalisation/' + $scope.vehicle.geolocalisation.id,
                data: {
                  latitude: position.coords.latitude,
                  longitude: position.coords.longitude
                }
              };
              $http(reqPut).then(function () {
                  console.log("geoloc modifié");
                  socket.emit('send:geolocalisationFront');
                }, function () {
                  console.log("geoloc pas update");
                }
              )
            }, function () {
              console.log("Erreur recupértion vehicle");
            });
        });
      }, 5000);
    });


    $scope.getVehicle = function () {
      $http.get('http://localhost:1337/vehicle?usedBy=' + sessionStorage.userId)
        .then(function (vehicle) {
          $scope.vehicle = vehicle.data[0];
        }, function () {
          console.log("Erreur recupértion vehicle");
        });
    };

    $scope.newLevelBreakdown = false;
    $scope.$watch("newLevelBreakdown", function () {
      $scope.getVehicle();
    });

    $scope.getLevelBreakdown = function () {
      $http.get('http://localhost:1337/levelBreakdown').then(
        function (data) {
          $scope.getlvlBreakdown = data.data;
        },
        function () {
        });
    };

    $scope.getStateVehicle = function () {
      $http.get('http://localhost:1337/stateVehicle').then(
        function (data) {
          $scope.getsv = data.data;
        },
        function () {
        });
    };
    $scope.getLevelBreakdown();
    $scope.getStateVehicle();

    $scope.getVehicle();


    $scope.formAskHelp = function (fah) {
      //Post in historique
      var v = $scope.vehicle;
      var successRegisterLogVehicle = function () {
        console.log("Etat du vehicule courant mis en base pour historique");
        $scope.jsonFah = JSON.parse(fah.levelBreakdown);
        $scope.jsonSv = JSON.parse(fah.sv);


        // modif vehicle with put
        var reqPut = {
          method: 'PUT',
          url: 'http://localhost:1337/vehicle/' + v.id,
          headers: {
            'Content-Type': undefined
          },
          data: {

            levelBreakdown: $scope.jsonFah.id,
            stateVehicle: $scope.jsonSv.id
          }
        };

        $http(reqPut).then(function () {
            console.log("Update ok ");
            $scope.newLevelBreakdown = !$scope.newLevelBreakdown;
          },
          function () {
            console.log('Update ko')
          });


        var reqAddBreakHisto = {
          method: 'POST',
          url: 'http://localhost:1337/logVehicle',
          headers: {
            'Content-Type': undefined
          },
          data: {
            immatricul: v.immatricul.immatricul,
            user: v.usedBy,
            stateVehicle: $scope.jsonSv.stateVehicle,
            levelBreakdown: $scope.jsonFah.levelBreakdown
          }
        };

        $http(reqAddBreakHisto).then(function () {
          console.log('add histo break ok')
        }, function () {
          console.log('add histo break ko')
        });


      };


      var errorRegistrerLogVehicle = function () {
        console.log("Erreur enregistrement etat en base historique");
      };

      var req = {
        method: 'POST',
        url: 'http://localhost:1337/logVehicle',
        headers: {
          'Content-Type': undefined
        },
        data: {
          immatricul: v.immatricul.immatricul,
          user: v.usedBy,
          stateVehicle: v.stateVehicle.stateVehicle,
          levelBreakdown: v.levelBreakdown.levelBreakdown
        }
      };
      $http(req).then(successRegisterLogVehicle, errorRegistrerLogVehicle);

    };


    $scope.goOut = function () {
      var reqPut = {
        method: 'PUT',
        url: 'http://localhost:1337/vehicle/' + $scope.vehicle.id,
        headers: {
          'Content-Type': undefined
        },
        data: {
          usedBy: 0
        }
      };
      $http(reqPut).then(function () {
        console.log("go out ok")
      }, function () {
        console.log("go out ko")
      });
      $scope.getTfromU = null;
      $window.location.href = '#/tab/truck';
      $window.location.reload();

    }


  })

  .
  controller('GeoCtrl', function () {

    // With the new view caching in Ionic, Controllers are only called
    // when they are recreated or on app start, instead of every page change.
    // To listen for when this page is active (for example, to refresh data),
    // listen for the $ionicView.enter event:
    //
    //$scope.$on('$ionicView.enter', function(e) {
    //});

  })
;
