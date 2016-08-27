(function(angular) {
  'use strict';
angular.module('quizTime')
    .controller('userTestController', ['$scope', 'userTestService', function($scope, userTestService) {
        
        $scope.showLoginPanel = true;
        $scope.showUserTopic = false;
        $scope.showUserTest = false;
        $scope.showUserResult = false;
        
        // Test Data
        
        $scope.name = '';
        $scope.email = '';
        $scope.test_topic = '';
        $scope.ques_pattern = '';
        
        // End of Test Data
        
        $scope.selectTopic = (userDetails) => {
            if(userDetails && userDetails.name != '' && userDetails.email != '') {
                userTestService.getTestTopics(userDetails).then((response) => {
                    $scope.testTopics = response.data.testDetails.topics;
                    $scope.showLoginPanel = false;
                    $scope.showUserTopic = true;
                });
            }
        }
        
        $scope.startTest = (testDetails) => {
            if(testDetails && testDetails.sl != '') {
                userTestService.getTestQuestions(testDetails).then((response) => {
                    $scope.test_topic = response.data.testDetails.topic.sl;
                    $scope.quesSl = _.pluck(response.data.quesDetails.questions, 'sl');
                    
                    let quesAnsBlock = [];
                    let getQuesAnsBlock = (questions) => {
                        _.map(questions, (num, key) => {
                            let answers = [];
                            _.map(num.answers.split('#########'), (num1, key1) => {
                                if(num1 != '') {
                                   answers.push(_.unescape(num1)); 
                                }
                            });

                            quesAnsBlock[key] = ({
                                question: _.unescape(num.question),
                                answers: answers
                            });
                        });
                    }
                    
                    getQuesAnsBlock(response.data.quesDetails.questions);
                    
                    $scope.testDetails = ({
                        userDetails: response.data.userDetails,
                        testDetails: response.data.testDetails,
                        quesDetails: quesAnsBlock
                    });
                    
                    $scope.showUserTopic = false;
                    $scope.showUserTest = true;
                });
            }
        }
        
        $scope.submitTest = (testData) => {
            if(testData) {
                userTestService.getTestResults(testData).then((response) => {
                    $scope.resultDetails = response.data;
                    $scope.showUserTest = false;
                    $scope.showUserResult = true;
                });
            }
        }
    }]);
})(window.angular);