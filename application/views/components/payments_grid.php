<div class="tab-pane" id="payments" ng-controller="PaymentsController">
    <div class="btn-toolbar" style="margin-bottom: 9px">
      <div class="btn-group">
         <a class='btn btn-success' ng-click="refreshPayments()"> <i class='icon-white  icon-repeat'></i> </a>  
      </div>
    </div>
  <table my-table class='table table-striped table-bordered my-table'>
      <thead>
        <tr>
          <th class="grid_action2">#</th>
          <th>Member</th>
          <th>Date of Payment</th>
          <th>Amount</th>
          <th>Paid For (months)</th>
          <th>Received By</th>
        </tr>
      </thead>
  </table>
</div>