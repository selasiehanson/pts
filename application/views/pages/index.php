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
                <?php 
                  echo View::make("components.users_grid");
                  echo View::make("components.members_grid");
                  echo View::make("components.payments_grid");
                 ?>
                </div>
              </div>
            </div><!--/span12-->
            
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->
 
      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

  <?php echo View::make("common.footer"); ?>