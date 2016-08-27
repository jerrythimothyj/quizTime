(function(angular) {
  'use strict';
angular.module('quizTime')
    .controller('userTestCtrl', ['$scope', function($scope) {
        $scope.test = {};
        $scope.initVal;
    }]);
})(window.angular);