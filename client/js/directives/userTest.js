(function(angular) {
  'use strict';
angular.module('quizTime')
  .directive('userTest', function() {
    return {
      restrict: 'E',
      templateUrl: './client/views/components/userTest.php',
      scope: {
          testDetails: '=',
          submitTest: '&'
      },
      controller: 'userTestCtrl',
      controllerAs: 'uTC'
    };
  });
})(window.angular);