<?php
    class quizTime {
        function getTestTopics($userDetails) {
            
            $returnObj = new stdClass();
            $returnObj->testDetails = new stdClass();
                
            $_SESSION['name'] = $userDetails->userDetails->name;
            $_SESSION['email'] = $userDetails->userDetails->email;
            
            $dbConfig = new dbConfig();
            $dbConfig->dbConnect();
            
            $topicsSql = "SELECT * FROM topics WHERE status=1";
            $dbResult = $dbConfig->dbQuery($topicsSql);
            $topicCtr = 0;
            if ($dbResult->num_rows > 0) {
                while($dbRow = $dbResult->fetch_assoc()) {
                    $titlesSql = "SELECT title FROM titles WHERE sl IN (".$dbRow['titles'].") AND status=1 ORDER BY sl";
                    $dbResultTitle = $dbConfig->dbQuery($titlesSql);
                    $titleCtr = 0;
                    if ($dbResultTitle->num_rows > 0) {
                        while($dbRowTitle = $dbResultTitle->fetch_assoc()) {
                            $testTitleRows[$titleCtr] = $dbRowTitle['title'];
                            $titleCtr++;
                        }
                    }

                    $testTopicsRows[$topicCtr]['topic'] = $dbRow['topic'];
                    $testTopicsRows[$topicCtr]['sl'] = $dbRow['sl'];
                    $testTopicsRows[$topicCtr]['titles'] = $testTitleRows;
                    unset($testTitleRows);
                    $topicCtr++;
                }
            }
            
            
            
            $returnObj->testDetails->topics = $testTopicsRows;

            return $returnObj;
        }
        
        function getTestQuestions($testDetails) {
            
            $returnObj = new stdClass();
            $returnObj->userDetails = new stdClass();
            $returnObj->testDetails = new stdClass();
            $returnObj->quesDetails = new stdClass();
            
            $returnObj->userDetails->name = $_SESSION['name'];
            $returnObj->userDetails->email = $_SESSION['email'];
            
            $_SESSION['topic'] = $testDetails->testDetails->testTopic;
                
            $dbConfig = new dbConfig();
            $dbConfig->dbConnect();
            
            $topicsSql = "SELECT * FROM topics WHERE sl='".$testDetails->testDetails->testTopic."' AND status=1";
            $dbResult = $dbConfig->dbQuery($topicsSql);
            if ($dbResult->num_rows > 0) {
                while($dbRow = $dbResult->fetch_assoc()) {
                    $_SESSION['topic_name'] = $returnObj->testDetails->topic = $dbRow['topic'];
                    $titlesArr = explode(',', $dbRow['titles']);
                    $quesCountArr = explode(',', $dbRow['ques_count']);
                    
                    $jctr = 0;
                    for($ictr=0; $ictr<count($titlesArr); $ictr++) {
                        $quesSql = "SELECT sl,question,answers,correct FROM ques_and_ans WHERE titles like '".$titlesArr[$ictr]."' and status=1 ORDER BY RAND() LIMIT ".$quesCountArr[$ictr];
                        $dbResultQues = $dbConfig->dbQuery($quesSql);
                        if ($dbResultQues->num_rows > 0) {
                            while($dbRowQues = $dbResultQues->fetch_assoc()) {
                                $questionPattern[] = $dbRowQues['sl'];
                                $answerPattern[] = $dbRowQues['correct'];

                                $questionsRows[$jctr]['question'] = htmlentities($dbRowQues['question']);
                                $questionsRows[$jctr]['answers'] = htmlentities($dbRowQues['answers']);
                                
                                $jctr++;
                            }
                        }
                        
                        $titleSql = "SELECT title FROM titles WHERE sl='".$titlesArr[$ictr]."' and status=1";
                        $dbResultTitle = $dbConfig->dbQuery($titleSql);
                        if ($dbResultTitle->num_rows > 0) {
                            while($dbRowTitle = $dbResultTitle->fetch_assoc()) {
                                $titleRows[] = $dbRowTitle['title'];
                            }
                        }
                    }
                    
                    $_SESSION['ques_pattern'] = implode('#', $questionPattern);
                    $_SESSION['ans_pattern'] = implode('#', $answerPattern);
                    
                    $_SESSION['titles'] = $returnObj->testDetails->titles = implode(', ', $titleRows);
                }
            }
   
            $returnObj->quesDetails->questions = $questionsRows;
            
            return $returnObj;
        }
        
        function getTestResults($testData) {
            
            $returnObj = new stdClass();
            $returnObj->userDetails = new stdClass();
            $returnObj->testDetails = new stdClass();
            $returnObj->resultDetails = new stdClass();
            
            $returnObj->userDetails->name = $_SESSION['name'];
            $returnObj->userDetails->email = $_SESSION['email'];
            $returnObj->testDetails->topic = $_SESSION['topic_name'];
            $returnObj->testDetails->titles = $_SESSION['titles'];
            
            $dbConfig = new dbConfig();
            $dbConfig->dbConnect();
            
            $ansPatternArr = explode('#', $_SESSION['ans_pattern']);
            $ansArr =  $array = json_decode(json_encode($testData->testData->answers), true);
            
            $rightAns = 0;
            $wrongAns = 0;
            
            for($ictr=0;$ictr<count($ansPatternArr);$ictr++) {
                if((isset($ansArr[$ictr])) && ($ansArr[$ictr] == $ansPatternArr[$ictr]))
                    $rightAns++;
                else
                    $wrongAns++;
            }
            
            $testResult = 0;
            if(($rightAns/count($ansPatternArr)) * 100 >= 70 )
                $testResult = 1;
            
            $ip = $_SERVER['REMOTE_ADDR'];
            date_default_timezone_set('Asia/Kolkata');
            $dttm = date("l jS \of F Y h:i:s A");
            
            $returnObj->testDetails->time = $dttm;
            $returnObj->resultDetails->right = $rightAns;
            $returnObj->resultDetails->wrong = $wrongAns;
            $returnObj->resultDetails->result = $testResult;
            
            $testSql = "INSERT INTO user_tests(name, email, test_topic, ques_pattern, ans_pattern, correct_ans, wrong_ans, result, ip, time) VALUES('".$_SESSION['name']."','".$_SESSION['email']."',".$_SESSION['topic'].",'".$_SESSION['ques_pattern']."','".$_SESSION['ans_pattern']."',".$rightAns.",".$wrongAns.",".$testResult.",'".$ip."','".$dttm."')";
            $dbResultTest = $dbConfig->dbQuery($testSql);
            return $returnObj;
        }
    }
?>