<!-- This contains the  cards (Ex- Users, Routes etc.)-->
<section id="bg-bus" class="d-flex align-items-center">
    <div class="container">

      <div class="row">

              <!-- Card 1 -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    require 'db_connect.php';

                    $query = "SELECT user_id FROM registered_users ORDER BY user_id";
                    $query_run = mysqli_query($conn, $query);

                    //  viewing the output
                    $row = mysqli_num_rows($query_run);
                    echo '<h3>'.$row.'</h3>';
                    ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

          <!-- Card 2 -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Schedules</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    require 'db_connect.php';

                    $query = "SELECT  id FROM schedule_list ORDER BY id";
                    $query_run = mysqli_query($conn, $query);

                    //  viewing the output
                    $row = mysqli_num_rows($query_run);

                    echo '<h3>'.$row.'</h3>';

                    ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

          <!-- Card 3-->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Locations</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    require 'db_connect.php';

                    $query = "SELECT  id FROM location ORDER BY id";
                    $query_run = mysqli_query($conn, $query);

                    //  viewing the output
                    $row = mysqli_num_rows($query_run);

                    echo '<h3>'.$row.'</h3>';

                    ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-route fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

                  <!-- Card 4-->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Buses</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    require 'db_connect.php';

                    $query = "SELECT  id FROM bus ORDER BY id";
                    $query_run = mysqli_query($conn, $query);

                    //  viewing the output
                    $row = mysqli_num_rows($query_run);

                    echo '<h3>'.$row.'</h3>';

                    ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-bus fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  
