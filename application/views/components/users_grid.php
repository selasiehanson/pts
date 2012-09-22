<div class="tab-pane active" id="users" ng-controller="UserController">
  <div class="btn-toolbar" style="margin-bottom: 9px">
    <div class="btn-group">
      <a class='btn btn-success' data-toggle="modal" href="#user_form"> <i class='icon-white icon-user'></i> </a>
      <a class='btn btn-info'> <i class='icon-white icon-pencil'></i> </a>
      <a class='btn btn-danger'> <i class='icon-white icon-trash'></i> </a>
      <a class='btn btn-success .btn-small' href="#" ng-click="refreshUsers()"> <i class='icon-white icon-refresh'></i> </a>
    </div>
  </div>
  <div>
    <table my-table class='table table-striped table-bordered my-table'>
        <thead>
          <tr>
           <th class="grid_action2">#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="user in users">
            <td> {{$index + 1}} </td>
            <td> {{user.firstName}} </td>
            <td> {{user.lastName}} </td>
            <td> {{user.userName}} </td>
            <td> {{user.email}} </td>
            
          </tr>
        </tbody>
    </table>
  </div>  
<?php echo View::make("components.modals.user_form"); ?>
  
</div>