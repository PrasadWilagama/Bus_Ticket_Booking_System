<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script> 
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

        <script>
            $(document).ready(function () {

                // Delete 
                $('.delete').click(function () {
                    var el = this;

                    // Delete id
                    var deleteid = $(this).data('id');

                    // Confirm box
                    bootbox.confirm("Do you really want to delete record?", function (result) {

                        if (result) {
                            // AJAX Request
                            $.ajax({
                                url: 'delete_user.php',
                                type: 'POST',
                                data: {id: deleteid},
                                success: function (response) {

                                    // Removing row from HTML Table
                                    alert(response);
                                    if (response == 1) {
                                        $(el).closest('tr').css('background', 'tomato');
                                        $(el).closest('tr').fadeOut(800, function () {
                                            $(this).remove();
                                        });
                                    } else {
                                        bootbox.alert('Record not deleted.');
                                    }

                                }
                            });
                        }

                    });

                });

                //Update
                //data-role attribute  is being used to access anchor element on click event
                $(document).on('click','a[data-role=update]',function() {
                    //Testing model input field
                    alert($(this).data('id'));
                })
            });
        </script>

    </head>
    <style type="text/css">
        .main-section{
            margin-top:150px;
        }
    </style>
    <body>


        <?php
        include "db_connect.php";
        ?>

        <section id="bg-bus" class="d-flex align-items-center">
            <main id="main">
                <div class="container">
                    <div class="col-lg-12">
                        
                        <div class="row">
                            <div class="card col-md-12">  
                                <div class="card-body">
                                    <table class="table table-striped table-bordered" id="user-field">
                                        <thead>
                                            <tr>
                                                <th class="text-center">User ID</th>
                                                <th class="text-center">First Name</th>
                                                <th class="text-center">Last Name</th>
                                                <th class="text-center">User Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Password</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                            <?php
                        $query = "SELECT * FROM registered_users";
                        $result = mysqli_query($conn, $query);

                        //$count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['user_id'];
                            $fname = $row['first_name'];
                            $lname = $row['last_name'];
                            $name = $row['user_name'];
                            $email = $row['email'];
                            $password = $row['password'];

                            ?>
                            <tr>
                                <td><?= $id ?></td>
                                <td><?= $fname ?></td>
                                <td><?= $lname ?></td>
                                <td><?= $name ?></td>
                                <td><?= $email ?></td>
                                <td><?= $password ?></td>
                                <td>
                                    <button class='update btn btn-default' data-toggle="modal" data-target="#myModal"><a href='#' data-role="update" data-id='<?= $id ?>'>Update</a></button>
                                    <div class="row">&nbsp</div>
                                    <button class='delete btn btn-danger' id='del_<?= $id ?>' data-id='<?= $id ?>' >Delete</button>
                                </td>
                            </tr>
                            <?php
                            //$count++;
                        }
                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
        
                </div>
            </main>
        </section>


    </body>
</html>