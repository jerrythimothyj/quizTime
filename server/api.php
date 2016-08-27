<?php
    require('./config/config.php');

    $json = file_get_contents('php://input');
    $obj = json_decode($json);


    $quizTime = new quizTime();

    switch($_GET['api']) {
        case 'getTestTopics':
            print_r(json_encode($quizTime->getTestTopics($obj)));
            break;
        
        case 'getTestQuestions':
            print_r(json_encode($quizTime->getTestQuestions($obj)));
            break;
            
        case 'getTestResults':
            print_r(json_encode($quizTime->getTestResults($obj)));
            break;
    }
?>