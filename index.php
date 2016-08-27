<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quiz Time</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.3.1/angular-ui-router.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="./client/css/skeleton.css">
  <link rel="stylesheet" href="./client/css/text.css">
  <link rel="stylesheet" href="./client/css/colors.css">
</head>
<body data-ng-app="quizTime">
    
<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Quiz Time</a>
    </div>
  </div>
</nav>
  
<div class="container-fluid">
  <div ui-view></div>
</div>

<script src="./client/js/modules/quizTime.js"></script>
<script src="./client/js/controllers/userTest.js"></script>
<script src="./client/js/controllers/loginPanel.js"></script>
<script src="./client/js/controllers/userTopic.js"></script>
<script src="./client/js/controllers/userTestCtrl.js"></script>
<script src="./client/js/directives/loginPanel.js"></script>
<script src="./client/js/directives/userTopic.js"></script>
<script src="./client/js/directives/userTest.js"></script>
<script src="./client/js/directives/userResult.js"></script>
<script src="./client/js/services/userTest.js"></script>
</body>
</html>