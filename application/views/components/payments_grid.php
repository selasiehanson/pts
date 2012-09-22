<div class="tab-pane" id="payments">
  <div class="toolbar">
    <a class='btn btn-success' data-toggle="modal" href="#payment_form"> <i class='icon-white icon-th-list'></i> </a>
    <a class='btn btn-danger'> <i class='icon-white icon-trash'></i> </a>
  </div>
  <table my-table class='table table-striped table-bordered my-table'>
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
  <?php echo View::make("components.modals.payment"); ?>
</div>