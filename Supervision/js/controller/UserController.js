/**
 * Controls the User
 */
angular.module('UserCtrl', [])

.controller('UserCtrl', ['$scope','$http','$route','$window', function($scope,$http,$route,$window) {
// Init var
$scope.showForm = false;
$scope.buttonShowHide = "Add User";

/// Scope Function

  	 $scope.connection = function(user) {
  	 		console.log("Connection");
  	 		var successCallback = function(user){
          // Si user exist in bdd
          if(user.data[0]){
            var loginBdd = user.data[0].login;
            var passwordBdd = user.data[0].password;  
            if(loginBdd == $scope.user.login && passwordBdd == $scope.user.password){
              sessionStorage.user = user.data[0];
              console.log("User connected");
              $window.location.href = '#/user/';
            }
          }else{
            console.log("User / password incorrect");
          }
        };

  	 		var errorCallback = function(user){
  	 			console.log("Erreur");
  	 		};

  	 		$http.get('http://localhost:1337/user?login='+$scope.user.login)
  	 		.then(successCallback, errorCallback);
      };


      $scope.deconnection = function(){
      	console.log("Déconnexion");
      	sessionStorage.clear();
      	$route.reload();
      };


      $scope.isConnected = function(){
        console.log("isConnected");
        $scope.user = sessionStorage.user;
      };


      $scope.showUsers = function(){
          var succesShowUsers = function(users){
               $scope.users = users.data;

          };
          var errorShowUsers = function(users){

            console.log("Erreur affichage des users.");
          };
        $http.get('http://localhost:1337/user')
        .then(succesShowUsers, errorShowUsers);
      };



            $scope.addUser = function(){
          var succesShowUsers = function(users){
              $scope.users = users.data;
          }
          var errorShowUsers = function(users){

            console.log("Erreur affichage des users.");
          }
        $http.get('http://localhost:1337/user')
        .then(succesShowUsers, errforShowUsers);
      };


      $scope.showFormAddUser = function(){
        $scope.showForm = !$scope.showForm;
        if($scope.showForm){
          $scope.buttonShowHidebuttonShowHide = "Hide form";
        }else{
          $scope.buttonShowHide = "Add User";
        }
      }


      $scope.registerUser = function(user){


        var succesRegisterUser = function(user){
          $scope.showUsers();
          console.log("user correctement créé");
        };

        var errorRegisterUSer = function(){
          console.log("Erreur création user");
        };
        console.log(user);
        var req = {
             method: 'POST',
             url: 'http://localhost:1337/user',
             headers: {
               'Content-Type': undefined
             },
             data: { 

                login: user.login,
                password : user.password,
                firstname : user.firstname,
                lastname : user.lastname,
                skill : user.skill,
                accountType : user.accountType 
            }
          }
        $http(req).then(succesRegisterUser,errorRegisterUSer);      
      };

      $scope.getAccountType = function(accountType){
        var successGetAccount = function(accountType){
          $scope.accountType = accountType.data;
          console.log($scope.accountType);
          return $scope.accountType;
        }
        var errorGetAccount = function(accountType){
          console.log("Erreur get account type");
        }

        $http.get('http://localhost:1337/accountType').then(successGetAccount,errorGetAccount);

      };


      $scope.getSkill = function(skill){
        var succesGetSkill = function(skill){
          return $scope.skill = skill.data;
        }      
        var errorGetSkill = function(){
          console.log("Erreur get skill");
        }
        $http.get('http://localhost:1337/skill').then(succesGetSkill,errorGetSkill);
      };

      $scope.deleteUser = function(userObject){
        var successDeleteUSer = function(){
          console.log("user "+ userObject.id +"supprimé");
          // angular.forEach($scope.user, function(value, key) {
          //   $scope.user[key].splice($scope.user[key].indexOf('userObject.id'),1);  
          //   //console.log($scope.user);
          // });
          
          $scope.showUsers();
        };
        var errorDeleteUser = function(){
          console.log("Erreur suppression user");
        }
        $http.delete('http://localhost:1337/user/'+userObject.id).then(successDeleteUSer,errorDeleteUser);
      }



// au démarrage du controller



$scope.showUsers();
$scope.accountType = $scope.getAccountType();
$scope.skill = $scope.getSkill();









}]);