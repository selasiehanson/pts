<div class="tab-pane" id="payments" ng-controller="PaymentsController">
    <div class="btn-toolbar" style="margin-bottom: 9px">
      <div class="btn-group">
         <a class='btn btn-success' ng-click="refreshPayments()"> <i class='icon-white  icon-repeat'></i> </a>  
      </div>
    </div>
  <table my-table class='table table-striped table-bordered my-table'>
      <thead>
        <tr>
          <th class="grid_action1">#</th>
          <th>Member</th>
          <th>Date of Payment</th>
          <th>Amount</th>
          <th>Paid For (months)</th>
          <th>Received By</th>
          <th class="grid_action1"></th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="payment in payments">
          <td> {{$index + 1}}</td>
          <td> {{payment.firstName + " "+ payment.lastName}}  </td>
          <td> {{payment.paymentDate}} </td>
          <td> {{payment.amount}} </td>
          <td> {{payment.numMonths}} </td>
          <td> {{payment.createdBy}} </td>
          <td> <a href="#"> <i class="icon-eye-open"></i> </a> </td>
        </tr>
      </tbody>
  </table>
</div>