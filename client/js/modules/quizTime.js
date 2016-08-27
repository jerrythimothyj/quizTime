(function(angular) {
  'use strict';
angular.module('quizTime', ['ui.router'])
    .config(function($stateProvider, $urlRouterProvider) {
        $urlRouterProvider.otherwise("/userTest");
    
        $stateProvider
        .state('userTest', {
          url: "/userTest",
          templateUrl: "./client/views/pages/userTest.php",
          controller: "userTestController",
          controllerAs: "uTC"
        })
    });
})(window.angular);