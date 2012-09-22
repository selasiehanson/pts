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
            <span><span class="name_field uneditable-input"> {{ currentMember.name }} <span></span>
          </div>
          <div class="controls my_clear">
              <div class="pull-left">
                <label>Currency:</label>
                <div>
                  <select class="mini_control" ng-model="currentPayment.currencyId" ng-options="cur.id as cur.name for cur in currencies">
                  </select>
                </div>
              </div>
              <div class="pull-left">
                <label>Total Amount:</label>
                <div class="input-append amount_field">
                  <input class="extra_mini_control" type="text"><span class="add-on">.00</span>
                </div>
              </div>
              <div class="pull-right">
                <label>Payment Date:</label>
                <div>
                  <input type="text" class="">
                </div>
              </div>
          </div>
                  
          <div class="controls my_clear">
              <div class="pull-left">
                <label>Paying for Months:</label>
                <div>
                  <input type="text" class="mini_control" ng-model="currentPayment.numMonths">
                </div>
              </div>
              
              <div class="pull-left">
                <label>Starting From:</label>
                <div>
                  <input type="text" class="maxi_control">
                </div>
              </div>
               <div class="pull-right breakdown_btn">
                  <a href="" class="btn btn-info" ng-click="generateBreakDown(currentPayment)">Generate BreakDown</a>
               </div>

          </div>
          <div>
            <legend>Break Down</legend>
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
                    <td> {{ bkd.month }}</td>
                    <td> {{ bkd.currency }} </td>
                    <td> <input class='input-mini' value="{{ bkd.amount }}">  </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <input type='hidden' ng-model="currentMember.id">
         </form>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-success" ng-click="submitPayment(member, currentPayment)"><i class='icon-white icon-th-list'></i> Save Payment </a>
          <a href="#" class="btn"><i class='icon icon-ban-circle'></i> Cancel</a>
        </div>
      </div>
      <!-- END OF ADD PAYMENT FORM -->
