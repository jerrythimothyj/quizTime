<div class="landing-panel horizontal-center input-panel">
     <span class="title-text">
         Name: {{testDetails.userDetails.name}}<br>
         Email: {{testDetails.userDetails.email}}<br>
         Topic: {{testDetails.testDetails.topic}}<br>
         Titles: {{testDetails.testDetails.titles}}<br>
     </span>
     <form role="form"
           novalidate>
         <div class="row"
              data-ng-repeat="quesAns in testDetails.quesDetails track by $index">
             <br><br>
             <div class="col-sm-11">
                 {{$index + 1}}) {{quesAns.question}}
                 <div class="row"
                      data-ng-repeat="answer in quesAns.answers track by $index">
                     <div class="col-sm-12">
                         <div class="answers">{{$index + 1}}) {{answer}}</div>
                     </div>
                 </div>
             </div>
             <div class="col-sm-1">
                 <input type="text" 
                        class="form-control" 
                        placeholder="{{$index + 1}}"
                        size="1"
                        maxlength="1"
                        data-ng-model="test.answers[$index]"
                        data-ng-init="test.answers[$index]=initVal">
             </div>
         </div>
         <br><br><br>
         <button type="button" 
                 class="btn btn-default btn-custom"
                 data-ng-click="submitTest({testData: test})">
             Submit Test
         </button>
    </form>
</div>