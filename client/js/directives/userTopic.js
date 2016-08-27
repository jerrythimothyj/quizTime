(function(angular) {
  'use strict';
angular.module('quizTime')
  .directive('userTopic', function() {
    return {
      restrict: 'E',
      templateUrl: './client/views/components/userTopic.php',
      scope: {
          testTopics: '=',
          startTest: '&'
      },
      controller: 'userTopicCtrl',
      controllerAs: 'uTC'
    };
  });
})(window.angular);