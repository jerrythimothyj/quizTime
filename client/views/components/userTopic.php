<div class="landing-panel horizontal-center input-panel"
     data-ng-repeat="testTopic in testTopics track by $index">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="topic-nav"
                data-ng-click="startTest({testDetails: {testTopic: testTopic.sl}})">{{testTopic.topic}}</h3>
            <h5>
                <span data-ng-repeat="title in testTopic.titles track by $index">
                    {{title}}
                </span>
            </h5>
        </div>
    </div>
</div>