<div class="vertical-center">
    <div class="container">
        <login-panel data-ng-if="showLoginPanel"
                     select-topic="selectTopic(userDetails)">
        </login-panel>

        <user-topic data-ng-if="showUserTopic"
                    start-test="startTest(testDetails)"
                    test-topics="testTopics">
        </user-topic>

        <user-test data-ng-if="showUserTest"
                   submit-test="submitTest(testData)"
                   test-details="testDetails">
        </user-test>

        <user-result data-ng-if="showUserResult"
                     result-details="resultDetails">
        </user-result>
    </div>
</div>