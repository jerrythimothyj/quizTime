(function(angular) {
  'use strict';
angular.module('quizTime')
  .directive('userResult', function() {
    return {
      restrict: 'E',
      templateUrl: './client/views/components/userResult.php',
      scope: {
          resultDetails: '='
      }
    };
  });
})(window.angular);