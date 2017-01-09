/**
 * Controls the User
 */
angular.module('VehicleCtrl', [])

    .controller('VehicleCtrl', ['$scope', '$http', 'socket', function ($scope, $http, socket) {

        var map = L.map('map').setView([44.8584622, -0.5730805], 13);
        var markers = [];

        var truckGreenIcon = L.icon({
            iconUrl: '/img/marker-repairman.png',

            iconSize: [125, 125], // size of the icon
            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        socket.on('send:vehicle', function () {
            $scope.getVehicle();
        });


        $scope.showForm = false;
        $scope.refreshTechnicians = false;
        $scope.buttonShowHide = "Add Vehicle";
        $scope.vehicle =
            $http.get('http://localhost:1337/user')
                .then(function (data) {
                    $scope.user = data.data;
                }, function () {
                    console.log("error get user")
                });

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
            maxZoom: 18,
            id: 'pedroc.on2148bk',
            accessToken: 'pk.eyJ1IjoicGVkcm9jIiwiYSI6ImNpamZrMjczdzAwMGd2bGx4ZWJyYTh3NTIifQ.RJ8GQ1EoWKL_OPdVR-HQEA'
        }).addTo(map);


        $scope.registerVehicle = function (vehicle) {
            var succesCreateVehicle = function (immatricul) {
                var reqV = {
                    method: 'POST',
                    url: 'http://localhost:1337/Vehicle',
                    headers: {
                        'Content-Type': undefined
                    },
                    data: {
                        immatricul: immatricul.data.id,
                        stateVehicle: 4,
                        levelBreakdown: 5,
                        usedBy: 0
                    }
                };
                $http(reqV).then(function () {
                    $scope.refreshVehicle = !$scope.refreshVehicle;
                }, function () {
                });
                console.log(immatricul.data.id);
            };

            var errorCreateVehicle = function () {
                console.log("Erreur création vehicle");
            };


            var req = {
                method: 'POST',
                url: 'http://localhost:1337/Immatricul',
                headers: {
                    'Content-Type': undefined
                },
                data: {
                    immatricul: vehicle.immatricul.immatricul
                }
            };
            $http(req).then(succesCreateVehicle, errorCreateVehicle);
        };


        $scope.gotoMap = function (latitude, longitude) {
            if (latitude !== undefined && longitude !== undefined)
                map.setView([latitude, longitude], 13);
        };

        $scope.showFormAddVehicle = function () {
            $scope.showForm = !$scope.showForm;
            if ($scope.showForm) {
                $scope.buttonShowHide = "Hide form";
            } else {
                $scope.buttonShowHide = "Add Vehicle";
            }
        };


        $scope.assigner = function(action, user, stateAction){
            var actionData = JSON.parse(action.vehicle);

            var successCallback = function(){
                console.log("Success");
                $scope.refreshTechnicians = !$scope.refreshTechnicians;
            };

            var errorCallback = function(){
                console.log("Erreur");
            };

            var req = {
                method: 'POST',
                url: 'http://localhost:1337/action',
                data: {
                    vehicle: actionData.id,
                    repairman : user,
                    stateAction : stateAction
                }
            };
            $http(req).then(successCallback,errorCallback);
        };



        $scope.getVehicle = function () {
            var successCallback = function (vehicle) {

                $scope.vehicle = vehicle.data;

                //Delete markers to reconstruct them
                if (markers.length > 0) {
                    for (var i = 0; i < markers.length; i++) {
                        map.removeLayer(markers[i]);
                    }
                    markers = [];
                }

                angular.forEach($scope.vehicle, function (value, key) {
                    if (value.usedBy !== undefined && value.usedBy != null) {
                        if (value.geolocalisation !== undefined && value.geolocalisation != null) {
                            markers.push([value.geolocalisation.latitude, value.geolocalisation.longitude]);
                            marker = L.marker([value.geolocalisation.latitude, value.geolocalisation.longitude]).addTo(map);
                            marker.bindPopup("<b>Immatriculation : " + value.immatricul.immatricul + "</b><br>Conduit par " + value.usedBy.firstname + " " + value.usedBy.lastname + "<br />Etat : " + value.stateVehicle.stateVehicle).openPopup();
                        }

                        $http.get('http://localhost:1337/accountType/' + value.usedBy.accountType)
                            .then(function (at) {
                                $scope.vehicle[key].usedBy.accountType = at.data.accountType;
                            }, function () {
                                console.log("Impossible de recupérer le type de compte");
                            }
                        );
                    }
                });
            };

            var errorCallback = function (vehicle) {
                console.log("Erreur");
            };
            $http.get('http://localhost:1337/vehicle')
                .then(successCallback, errorCallback);
        };

        $scope.getVehicle();


        $scope.refreshTechniciens = function(){
            $http.get('http://localhost:1337/user?accountType=1')
                .then(function (data) {
                    $scope.techniciens = data.data;

                    angular.forEach($scope.techniciens, function (value, key) {

                        $http.get('http://localhost:1337/action?repairman=' + value.id )
                            .then(function (data) {
                                if (data.data[0] !== undefined) {

                                    // console.log(data.data[0].stateAction.stateAction);
                                    $scope.techniciens[key].text = data.data[0].stateAction.stateAction;
                                }
                                else
                                    $scope.techniciens[key].text = "Disponible";


                            }, function () {
                                console.log("Erreur lors de l'appel de l'api")
                            });

                    });
                }, function () {
                    console.log("error get techniciens")
                });
        };

        $scope.refreshTechniciens();

        $scope.$watch("refreshVehicle", function () {
            $scope.getVehicle();
        });
        $scope.$watch("refreshTechnicians", function () {
            $scope.refreshTechniciens();
        });

        $scope.deleteVehicle = function (v) {
            $http.delete('http://localhost:1337/vehicle/' + v.id)
                .then(function () {
                    console.log("Delete vehicle ok");
                    $scope.refreshVehicle = !$scope.refreshVehicle;
                }, function () {
                    console.log("delete vehicle ko")
                });
        };


        $scope.trouver = function(){
            alert("hello its me");
        }
    }]);