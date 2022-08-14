<?php
session_start();
require('../login_check.php');

require '../dashboard_parts/db.php';
    $sql = "SELECT * FROM users WHERE status=1";
    $query = mysqli_query($db_con,$sql);
    $trash_user = mysqli_fetch_assoc($query);
    $trash_user_count = mysqli_num_rows($query);

?>


<?php require '../dashboard_parts/header.php'; ?>
            <!-- ########## START: MAIN PANEL ########## -->
        <div class="sl-mainpanel">
            <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item" href="index.html">Starlight</a>
                <a class="breadcrumb-item" href="index.html">Pages</a>
                <span class="breadcrumb-item active">Blank Page</span>
            </nav>
            
            <div class="sl-pagebody">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 m-auto">
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h3 class="text-center">User Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-primary">
                                            <tr class="table-success">
                                                <th class="table-primary">SL</th>
                                                <th class="table-warning">Id</th>
                                                <th class="table-info">Name</th>
                                                <th class="table-success">Email</th>
                                                <th class="table-info">Photo</th>
                                                <th class="table-dark ">Action</th>
                                            </tr>
                                            <?php
                                            foreach($query as $key=>$user){
                                                ?>
                                                <tr>
                                                    <td class="table-primary"><?=$key+1?></td>
                                                    <td class="table-secondary"><?=$user['id']?></td>
                                                    <td class="table-success"><?=$user['name']?></td>
                                                    <td class="table-danger"><?=$user['email']?></td>
                                                    <td  class="table-info">
                                                        <img width="50" src="../image/uploads/users/<?=$user['profile_photo']?>" alt="" srcset="">
                                                    </td>
                                                    <td class="table-warning">
                                                        <button class="btn btn-info restore" name="user_update_change.php?id=<?=$user['id']?>">Restore</button>
                                                        <button class="btn btn-danger delete" name="delete.php?id=<?=$user['id']?>">Delete</button>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if($trash_user_count==0){
                                                ?>
                                                <tr>
                                                    <td class="text-center" colspan="5">No Data Found</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <h3>
                                            <a href="users.php"><button class="btn btn-warning float-left font-weight-bold mr-2"> View Users</button></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div><!-- sl-pagebody -->
        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
<?php require '../dashboard_parts/footer.php'; ?>

  <script>
      $('.restore').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "You restore this User!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Restore it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
               }
            })
      });
  </script>

  <script>
      $('.delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "You parmanently delete this User!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
               }
            })
      });
  </script>


