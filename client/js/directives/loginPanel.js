(function(angular) {
  'use strict';
angular.module('quizTime')
  .directive('loginPanel', function() {
    return {
      restrict: 'E',
      templateUrl: './client/views/components/loginPanel.php',
      scope: {
          selectTopic: '&'
      },
      controller: 'loginPanelCtrl',
      controllerAs: 'lpc'
    };
  });
})(window.angular);