<div class="landing-panel horizontal-center input-panel">
     <span class="title-text">
         <h2 class="text-center">QuizTime Results</h2>
         <br><br><br>
         <div class="row">
             <div class="col-xs-2 text-right"><u>Name:</u></div>
             <div class="col-xs-4 text-left"><em>{{resultDetails.userDetails.name}}</em></div>
             <div class="col-xs-2 text-right"><u>Email:</u></div>
             <div class="col-xs-4 text-left"><em>{{resultDetails.userDetails.email}}</em></div>
         </div>
         <br><br><br>
         <div class="row">
             <div class="col-xs-3 text-left"><u>Topic:</u></div>
             <div class="col-xs-9 text-left"><em>{{resultDetails.testDetails.topic}}</em></div>
         </div>
         <div class="row">
             <div class="col-xs-3 text-left"><u>Titles:</u></div>
             <div class="col-xs-9 text-left"><em>{{resultDetails.testDetails.titles}}</em></div>
         </div>
         <div class="row">
             <div class="col-xs-3 text-left"><u>Time:</u></div>
             <div class="col-xs-9 text-left"><em>{{resultDetails.testDetails.time}}</em></div>
         </div>
         <br><br><br>
         <div class="row">
             <div class="col-xs-6 text-center"><u>Right Answers</u></div>
             <div class="col-xs-6 text-center"><u>Wrong Answers</u></div>
         </div>
         <div class="row">
             <div class="col-xs-6 text-center"><em>{{resultDetails.resultDetails.right}}</em></div>
             <div class="col-xs-6 text-center"><em>{{resultDetails.resultDetails.wrong}}</em></div>
         </div>
         <div class="row">
             <div class="col-xs-12 text-center"><u>Result</u></div>
         </div>
         <div class="row">
             <div class="col-xs-12 text-center"><em>{{(resultDetails.resultDetails.result == 1)? 'Pass' : 'Please retry'}}</em></div>
         </div>
     </span>
</div>