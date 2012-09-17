<?php echo View::make("common.header"); ?>
<?php echo View::make("common.topmenu"); ?>
    <div class="container-fluid">
      <div class="row-fluid">
        <!-- <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
            </ul>
          </div>--> <!--/.well -->
        <!-- </div> -->
        <!--/span-->
        <div class="span12">
          <div class="row-fluid">
            <div class="span12">
              <fieldset>
                <legend >Admin</legend>
              </fieldset>
              <div class="tabbable">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#users" data-toggle="tab"> <i class='icon icon-user'></i> Manage Users</a></li>
                  <li><a href="#members" data-toggle="tab"><i class='icon icon-th-list'></i> Manage Members</a></li>
                  <li><a href="#payments" data-toggle="tab"><i class='icon icon-th-list'></i> Payments</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="users">
                    <div class="toolbar">
                      <a class='btn btn-success' data-toggle="modal" href="#user_form"> <i class='icon-white icon-user'></i> </a>
                      <a class='btn btn-info'> <i class='icon-white icon-pencil'></i> </a>
                      <a class='btn btn-danger'> <i class='icon-white icon-trash'></i> </a>
                    </div>
                    <div>
                      <table my-table class='table table-striped table-bordered'>
                          <thead>
                            <tr>
                              <!-- <th>#</th> -->
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Username</th>
                              <th>Email</th>
                            </tr>
                          </thead>
                      </table>
                    </div>  
                  </div>
                  <div class="tab-pane" id="members">
                    <div class="toolbar">
                      <a class='btn btn-success' data-toggle="modal" href="#member_form"> <i class='icon-white icon-th-list'></i> </a>
                      <a class='btn btn-info'> <i class='icon-white icon-pencil'></i> </a>
                      <a class='btn btn-danger'> <i class='icon-white icon-trash'></i> </a>
                    </div>
                    <table my-table class='table table-striped table-bordered'>
                        <thead>
                          <tr>
                            <!-- <th>#</th> -->
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                          </tr>
                        </thead>
                    </table>
                  </div>
                  <div class="tab-pane" id="payments">
                    <div class="toolbar">
                      <a class='btn btn-success' data-toggle="modal" href="#payment_form"> <i class='icon-white icon-th-list'></i> </a>
                      <a class='btn btn-danger'> <i class='icon-white icon-trash'></i> </a>
                    </div>
                    <table my-table class='table table-striped table-bordered'>
                        <thead>
                          <tr>
                            <!-- <th>#</th> -->
                            <th>Member</th>
                            <th>Date of Payment</th>
                            <th>Amount</th>
                            <th>Paid For (months)</th>
                            <th>Received By</th>
                          </tr>
                        </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div><!--/span12-->
            
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <!-- ADD USER FORM -->
      <div class="modal hide fade" id="user_form" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Add User</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="firstName">First Name:</label>
              <div class="controls">
                <input type="text" id="firstName" placeholder="First Name" class='input-xlarge'>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="lastName">Last Name:</label>
              <div class="controls">
                <input type="text" id="lastName" placeholder="Last Name" class='input-xlarge'>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="userName">User Name:</label>
              <div class="controls">
                <input type="text" id="userName" placeholder="User Name" class='input-xlarge'>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Email:</label>
              <div class="controls">
                <input type="text" id="email" placeholder="Email" class='input-xlarge'>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input type="password" id="password" placeholder="Password" class='input-xlarge'>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer"> 
          <a href="#" class="btn btn-success"><i class='icon-white icon-user'></i> Save User </a>
          <a href="#" class="btn"><i class='icon icon-ban-circle'></i> Cancel</a>
        </div>
      </div>
      <!-- END OF ADD USER FORM -->

      <!-- ADD PROJECT FORM -->
      <div class="modal hide fade" id="member_form" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Member</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="firstName">First Name:</label>
              <div class="controls">
                <input type="text" id="firstName" placeholder="First Name" class='input-xlarge'>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="lastName">Last Name:</label>
              <div class="controls">
                <input type="text" id="lastName" placeholder="Last Name" class='input-xlarge'>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="userName">User Name:</label>
              <div class="controls">
                <input type="text" id="userName" placeholder="User Name" class='input-xlarge'>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="phone">Phone:</label>
              <div class="controls">
                <input type="text" id="phone" placeholder="Phone" class='input-xlarge'>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="dob">Date of Birth:</label>
              <div class="controls">
                <input type="text" id="dob" placeholder="date of birth" class='input-xlarge'>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="dob">Address:</label>
              <div class="controls">
                 <textarea id="address" class='input-xlarge' rows="6"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-success"><i class='icon-white icon-th-list'></i> Save  </a>
          <a href="#" class="btn"><i class='icon icon-ban-circle'></i> Cancel</a>
        </div>
      </div>
      <!-- END OF ADD PAROJECT FORM -->

      <!-- ADD PROJECT FORM -->
      <div class="modal hide fade" id="payment_form" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Add Payment</h3>
        </div>
        <div class="modal-body">
          <p>coming up</p>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-success"><i class='icon-white icon-th-list'></i> Save Payment </a>
          <a href="#" class="btn"><i class='icon icon-ban-circle'></i> Cancel</a>
        </div>
      </div>
      <!-- END OF ADD PAROJECT FORM -->
      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

  <?php echo View::make("common.footer"); ?>