<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
	<nav class="nav-menu d-none d-lg-block" id='top-nav'>
         
	<!-- Navigation bar  After successfull login -->

        <ul>
          <li class="nav-home"><a href="./index.php?page=home">Dash Board</a></li>

		      
        <li class="drop-down nav-schedule nav-location"><a href="#">Users</a>
        <ul>
           
            <li><a href="./index.php?page=registered_user">Registered Users</a></li>

            <li><a href="./index.php?page=reg_test">Test</a></li>
            <li><a href="./index.php?page=user">Admin Users</a></li>
			      <li><a href="#">Deleted Users</a></li>
            
        </ul>
        </li>

    <!--  <li class="nav-schedule"><a href="./index.php?page=schedule">Schedule Admin</a></li>     -->
		   <li class="drop-down nav-schedule nav-location"><a href="#">Schedule Admin</a>
		   <ul>
              <li><a href="./index.php?page=schedule">Schedule List</a></li>
			  <li><a href="./index.php?page=location">Route List</a></li>
              
            </ul>
          </li>
    <!--  <li class="nav-booked"><a href="./index.php?page=booked">Booking Admin</a></li   -->
		  <li class="drop-down nav-booked nav-bus"><a href="#">Booking Admin</a>
		   <ul>
              <li><a href="./index.php?page=booked">Booked List</a></li>
			  <li><a href="./index.php?page=bus">Bus List</a></li>
              
            </ul>
          </li>
		  <li class="nav-feedback"><a href="./index.php?page=feedback">Feedbacks</a></li>
		  <li class="nav-report"><a href="./index.php?page=report">Report</a></li>

      <!--  The login_name is taken from the database  -->
		  <li class="drop-down nav-user"><a href="#"><?php echo $_SESSION['login_name'] ?> </a>
            <ul>
              <li><a href="./update_admin.php" id="manage_account">Manage Account</a></li>
              <li><a href="./logout.php">Logout</a></li> 
             
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->


    </div>
  </header>
  <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>';
      if(page != ''){
        $('#top-nav li').removeClass('active')
        $('#top-nav li.nav-'+page).addClass('active')
      }
      $('#manage_account').click(function(){
      uni_modal('Manage Account','manage_account.php')
  })
    })

  </script>