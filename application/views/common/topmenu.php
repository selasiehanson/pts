    <!-- Beginning of header -->
    <div class="navbar navbar-inverse navbar-fixed-top"  >
      <div class="navbar-inner">
          <div class="container-fluid">
            <a class="brand" href="/">PTS</a>
            <div class="nav-collapse">
              <ul class="nav pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Logged in as<span class='username'> <?php  echo Auth::user()->user_name; ?> </span>
                    <b class="caret"></b>
                    </a>
                 
                  <ul class="dropdown-menu">
                   <li> <a href="logout"> <i class="icon-off"></i> Sign out</a> </li>
                  </ul>
                </li>
          </ul>
            </div><!--/.nav-collapse -->
          </div>
      </div>
    </div>
    <!-- Beginning of header -->