      <!-- ADD USER FORM -->
      <div class="modal hide fade" id="user_form" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>{{formTitle}}</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="firstName">First Name:</label>
              <div class="controls">
                <input type="text" id="firstName" placeholder="First Name" class='input-xlarge' ng-model="newUser.firstName">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="lastName">Last Name:</label>
              <div class="controls">
                <input type="text" id="lastName" placeholder="Last Name" class='input-xlarge' ng-model="newUser.lastName">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="userName">User Name:</label>
              <div class="controls">
                <input type="text" id="userName" placeholder="User Name" class='input-xlarge' ng-model="newUser.userName">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Email:</label>
              <div class="controls">
                <input type="text" id="email" placeholder="Email" class='input-xlarge' ng-model="newUser.email">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input type="password" id="password" placeholder="Password" class='input-xlarge' ng-model="newUser.password">
              </div>
            </div>
            <input type="hidden" name="id" ng-model="newUser.id">
          </form>
        </div>
        <div class="modal-footer"> 
          <a href="#" class="btn btn-success" ng-click='addUser(newUser)' ><i class='icon-white icon-user'  ></i> Save User </a>
          <a href="#" class="btn"><i class='icon icon-ban-circle'></i> Cancel</a>
        </div>
      </div>
      <!-- END OF ADD USER FORM -->
