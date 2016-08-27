(function(angular) {
  'use strict';
angular.module('quizTime')
    .service('userTestService', function($http) {
        this.getTestTopics = (userDetails) => {
            return $http({
              method: 'POST',
              url: './server/api.php?api=getTestTopics',
              data: {userDetails: userDetails}
            });
        }
        
        this.getTestQuestions = (testDetails) => {
            return $http({
              method: 'POST',
              url: './server/api.php?api=getTestQuestions',
              data: {testDetails: testDetails}
            });
        }
        
        this.getTestResults = (testData) => {
            return $http({
              method: 'POST',
              url: './server/api.php?api=getTestResults',
              data: {testData: testData}
            });
        }
    });
})(window.angular);