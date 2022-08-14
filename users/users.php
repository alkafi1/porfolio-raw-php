<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/db.php';

$user_data = "SELECT * FROM users WHERE status = 0";
$user_data_query = mysqli_query($db_con,$user_data);
$user_data_store =mysqli_fetch_assoc($user_data_query);
$count_data = mysqli_num_rows($user_data_query);

?>
<?php require '../dashboard_parts/header.php';?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <a class="breadcrumb-item" href="index.html">Pages</a>
            <span class="breadcrumb-item active">Blank Page</span>
        </nav>
        
        <div class="sl-pagebody">
                
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="text-center">User Information <a href="/portfolio/add_users/registration.php"><button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add User</button></a></h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr class="table-info">
                                        <th class="table-primary">SL</th>
                                        <th class="table-warning">Id</th>
                                        <th class="table-info">Name</th>
                                        <th class="table-success">Email</th>
                                        <th class="table-info">Photo</th>
                                        <?php if($select_logged_user_info_assoc['role'] == 2 || $select_logged_user_info_assoc['role'] == 3){?>
                                        <th class="table-dark ">Action</th>
                                        <?php } ?>
                                    </tr>
                                                                 
                                    <?php foreach($user_data_query as $key=>$user){ 
                                        
                                        ?>                                    
                                            <tr>
                                            <td class="table-primary"><?=$key+1?></td>
                                            <td class="table-secondary"><?=$user['id']?></td>
                                            <td class="table-success"><?=$user['name']?></td>
                                            <td class="table-danger"><?=$user['email']?></td>
                                            
                                            <td width="20%" class="table-info text-center">
                                                <img width="50" src="../image/uploads/users/<?=$user['profile_photo']?>" alt="" srcset="">
                                            </td>
                                            <?php if($select_logged_user_info_assoc['role'] == 2 || $select_logged_user_info_assoc['role'] == 3){?>
                                            <td class="table-warning">
                                                <a href="update.php?id=<?=$user['id']?>"><button class="btn btn-info" name="update">Update</button></a>
                                                <?php if($select_logged_user_info_assoc['role'] == 1 || $select_logged_user_info_assoc['role'] == 2){ ?>
                                                <button class="btn btn-danger trash" name="user_update_change.php?id=<?=$user['id'];?>">Delete</button>
                                                <?php } ?>
                                            </td>
                                            <?php  } ?>
                                        </tr>
                                    <?php  }  ?>
                                    <?php
                                    if($count_data==0){
                                        ?>
                                        <tr>
                                            <td class="text-center" colspan="6">No Data Found</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    
                                    <?php if(isset($_SESSION['restore'])){
                                        ?>
                                        <strong class="text-danger"><?php echo $_SESSION['restore'];?></strong>
                                    <?php }unset($_SESSION['restore']); ?>

                                </table>
                            </div>
                            <div class="card-footer">
                                <h3>
                                    <a href="trash.php"><button class="btn btn-warning float-left font-weight-bold mr-2"></i> Trashed User</button></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php require '../dashboard_parts/footer.php'; ?>

    
    
  <script>
      $('.trash').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "User move to trash!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Move it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
               }
            })
      });
  </script>

    <?php if(isset($_SESSION['update_success'])) { ?>
     
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['update_success']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     
    <?php } unset($_SESSION['update_success']); ?>

    <?php if(isset($_SESSION['restore'])) { ?>   
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['restore']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>     
    <?php } unset($_SESSION['restore']); ?>

    <?php if(isset($_SESSION['delete'])) { ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['delete']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
    <?php } unset($_SESSION['delete']); ?>

    <?php if(isset($_SESSION['trash'])) { ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['trash']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
    <?php } unset($_SESSION['trash']); ?>

    <?php if(isset($_SESSION['login_msg'])) { ?>
     
     <script>
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: 'Signed in successfully!'
            })
     </script>
     
    <?php } unset($_SESSION['login_msg']); ?>

    
    


