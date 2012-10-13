     <!-- ADD PAYMENT FORM -->
      <div class="modal hide fade" id="payment_form" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Add Payment</h3>
        </div>
        <div class="modal-body">
         <form class="form-vertical">
          <div class="controls">
            <label>Payment For:</label>
            <span><span class="name_field uneditable-input"> {{ currentPayment.memberName }} <span></span>
          </div>
          <div class="controls my_clear">
              <div class="pull-left">
                <label>Currency:</label>
                <div>
                  <select class="extra_mini_control" ng-model="currentPayment.currencyId" ng-options="cur.id as cur.name for cur in currencies">
                  </select>
                </div>
              </div>
              <div class="pull-left">
                <label>Total Amount:</label>
                <div class="input-append amount_field">
                  <input class="extra_mini_control" type="text" ng-model="currentPayment.totalAmount"><span class="add-on">.00</span>
                </div>
              </div>
              <div class="pull-left" style="margin-left:25px">
                <label>Paying for Months:</label>
                <div>
                  <input type="text" class="extra_mini_control" ng-model="currentPayment.numMonths">
                </div>
              </div>
              <div class="pull-right">
                <label>Starting From:</label>
                <div>
                  <input id="paymentDate" type="text" class="mini_control"  ng-model="currentPayment.startDate">
                </div>
              </div>
          </div>
          <br><br>
          <div class="controls my_clear">
            <legend>Break Down
                <div class="pull-right breakdown_btn">
                  <a href="" class="btn btn-info" ng-click="generateBreakDown(currentPayment)">Generate BreakDown</a>
                </div>
            </legend>
            
          </div>
          <div>
             <table class='table table-striped table-bordered my-table user_group_table'>
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>Currency</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat=" bkd in breakDown">
                    <td> {{ bkd.date | date:'dd-MM-yyyy' }}</td>
                    <td> {{ bkd.currency }} </td>
                    <td> <input class='input-mini' ng-model="bkd.amount">  </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <input type='hidden' ng-model="currentPayment.memberId">
         </form>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-success" ng-click="submitPayment(currentPayment)"><i class='icon-white icon-th-list'></i> Save Payment </a>
          <a href="#" class="btn"><i class='icon icon-ban-circle'></i> Cancel</a>
        </div>
      </div>
      <!-- END OF ADD PAYMENT FORM -->
