<div class="tab-pane" id="members" ng-controller="MemberController">
  <div>
    <div class="btn-toolbar" style="margin-bottom: 9px">
      <div class="btn-group">
          <a class='btn btn-success' data-toggle="modal" href="#member_form"> <i class='icon-white icon-user'></i> </a>
          <a class='btn btn-info'> <i class='icon-white icon-pencil'></i> </a>
          <a class='btn btn-danger'> <i class='icon-white icon-trash'></i> </a>
          <a class='btn btn-success .btn-small' href="#" ng-click="refreshMembers()"> <i class='icon-white icon-refresh'></i> </a>
      </div>

       <div class="pull-right member_search">
        <label>Search:</label>
        <input type="text" name="" ng-model='filterExpr'>
       </div>

    </div>
  </div>
  <table my-table class='table table-striped table-bordered my-table'>
      <thead>
        <tr>
          <th class="grid_action2">#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th class="grid_action1"></th>
        </tr>
      </thead>
      <tbody>
        <!-- <tr ng-repeat="member in members"> -->
        <tr ng-repeat="member in filtered = (members | filter:filterExpr)">  
          <td> {{$index + 1}}</td>
          <td> {{member.firstName}} </td>
          <td> {{member.lastName}} </td>
          <td> {{member.phone}} </td>
          <td> {{member.address}} </td>
          <td> <a href=""><i class='icon icon-plus' ng-click='makePayment(member)'></i></a> </td>
        </tr> 
      </tbody>
  </table>

  <?php echo View::make("components.modals.member_form"); ?>
  <?php echo View::make("components.modals.payment_form"); ?>
</div>