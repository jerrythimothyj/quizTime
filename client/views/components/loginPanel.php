<div class="landing-panel horizontal-center">
     <span class="title-text">Enter your details</span>
     <form role="form"
           novalidate>
      <div class="form-group">
        <input type="text" 
               class="form-control" 
               placeholder="Name"
               data-ng-model="user.name">
      </div>
      <div class="form-group">
        <input type="text" 
               class="form-control" 
               placeholder="Email"
               data-ng-model="user.email">
      </div>
         <button type="button" 
                 class="btn btn-default btn-custom"
                 data-ng-click="selectTopic({userDetails: user})">
             Start Test
         </button>
    </form>
</div>