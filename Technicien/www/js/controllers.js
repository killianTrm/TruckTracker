angular.module('starter.controllers', ['ngToast','ngRoute'])

.controller('DashCtrl',['$scope','$interval','$http','ngToast','$window','$route',
 function($scope,$interval,$http,ngToast,$window,$route) {
  if(!sessionStorage.userId){
    $window.location.href= '#/tab/dash';
    $route.reload();
  }


    $scope.connectionUser = function(user){
        var successgetUser = function(userBdd){
          if(userBdd.data.length > 0){   
              if(userBdd.data[0].login == user.login && userBdd.data[0].password == user.password){;
             sessionStorage.userId = userBdd.data[0].id;
             sessionStorage.userLogin = userBdd.data[0].login;
             sessionStorage.userFirstname = userBdd.data[0].firstname;
             sessionStorage.userLastname = userBdd.data[0].lastname; 
             console.log(sessionStorage.userLogin);
             console.log(sessionStorage.userId);
              console.log("User connected");
              $window.location.href = '#/tab/info';
              $route.reload();
            }
          }else{
               console.log('Login or password incorrect');
          }
          

        }
        var errorGetUser = function(){
          console.log("Erreur connexion user");
        }

        $http.get('http://localhost:1337/user?login='+user.login)
        .then(successgetUser,errorGetUser);

    }



    navigator.geolocation.getCurrentPosition(function (position) {

      $interval(function(){

          $scope.positions = "lat:" + position.coords.latitude + ",lng: " + position.coords.longitude;
          console.log($scope.positions);
        },1000);


    });
  }])

.controller('InfoCtrl', function ($scope,$window,$http,$route) {


  $scope.getAction = function(){
    var successGetAction = function(action){
      $scope.actionGet = action.data;
      var action = action.data;

      angular.forEach(action, function(value, key) {
        $http.get('http://localhost:1337/immatricul/' + value.vehicle.immatricul).then(
          function(imma){
            $scope.actionGet[key].vehicle.stringimmatricul = imma.data.immatricul; 
          },function(){console.log('error get imma imma');})


        $http.get('http://localhost:1337/geolocalisation/' + value.vehicle.geolocalisation).then(
          function(geo){
            $scope.actionGet[key].vehicle.geolat= geo.data.latitude; 
            $scope.actionGet[key].vehicle.geolon= geo.data.longitude; 
          },function(){console.log('error get geo geo');})
        
      });

    };
    var errorGetAction = function(){
      console.log("Erreur get action");
    };
    console.log(sessionStorage.userId);
    $http.get('http://localhost:1337/action?repairman='+sessionStorage.userId)
    .then(successGetAction,errorGetAction);
  };


  $scope.showVehicleOnMap = function(ac){
    var longitude = ac.geolon;
    var latitude = ac.geolat;
    $scope.acceptTruck =true;
//         var map = L.map('map').setView([44.8584622, -0.5730805], 13);


//      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
//             attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
//             maxZoom: 18,
//             id: 'pedroc.on2148bk',
//             accessToken: 'pk.eyJ1IjoicGVkcm9jIiwiYSI6ImNpamZrMjczdzAwMGd2bGx4ZWJyYTh3NTIifQ.RJ8GQ1EoWKL_OPdVR-HQEA'
//         }).addTo(map);

// //L.marker([51.5, -0.09]).addTo(map)
// L.marker([latitude, longitude]).addTo(map)
//     .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
//     .openPopup();
//   }
}


$scope.chooseThisTruck = function(ac){
  var reqPut = {
        method: 'PUT',
        url: 'http://localhost:1337/action/'+ac.id,
        data: {
          stateAction: 3
        }
      };
      $http(reqPut).then(function () {
        console.log("modif action vehicle to En route et prise en charge")
      }, function () {
        console.log("modif action vehicle ko")
      });

    }
  $scope.getAction();





     
})

;
