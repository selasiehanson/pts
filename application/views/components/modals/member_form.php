  <!-- ADD MEMBER FORM -->
      <div class="modal hide fade" id="member_form" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>{{formTitle}}</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="firstName">First Name:</label>
              <div class="controls">
                <input type="text" id="firstName" placeholder="First Name" class='input-xlarge'  ng-model="newMember.firstName">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="lastName">Last Name:</label>
              <div class="controls">
                <input type="text" id="lastName" placeholder="Last Name" class='input-xlarge'  ng-model="newMember.lastName">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="phone">Phone:</label>
              <div class="controls">
                <input type="text" id="phone" placeholder="Phone" class='input-xlarge'  ng-model="newMember.phone">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="dob">Date of Birth:</label>
              <div class="controls">
                <input type="text" id="dob" placeholder="date of birth" class='input-xlarge'  ng-model="newMember.dateOfBirth">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="dob">Address:</label>
              <div class="controls">
                 <textarea id="address" class='input-xlarge' rows="6"  ng-model="newMember.address"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-success" ng-click="addMember(newMember)"><i class='icon-white icon-th-list'></i> Save  </a>
          <a href="#" class="btn"><i class='icon icon-ban-circle'></i> Cancel</a>
        </div>
      </div>
      <!-- END OF ADD MEMBER FORM -->