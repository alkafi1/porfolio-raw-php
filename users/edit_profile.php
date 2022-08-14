<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/db.php';
$id = $_SESSION['id'];
$select_logged_user_info = "SELECT * FROM users WHERE id='$id'";
$select_logged_user_info_query = mysqli_query($db_con, $select_logged_user_info);
$select_logged_user_info_assoc = mysqli_fetch_assoc($select_logged_user_info_query);
require '../dashboard_parts/header.php'; ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>
    
    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header bg-info text-light">
                            <h3>Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <form action="edit_profile_post.php" method="post" enctype="multipart/form-data">
                                <div class="">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?=$select_logged_user_info_assoc['name']?>">
                                    <input type="hidden" name="id" class="form-control" value="<?=$id;?>">
                                </div>

                                <div class="mt-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?=$select_logged_user_info_assoc['email']?>">
                                </div>

                                <div class="mt-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" value="">
                                </div>

                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="" class="form-label">Profile Photo</label>
                                            <input type="file" name="profile_photo" class="form-control" value="" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="col-lg-6">
                                            <img width="100" class="circle" id="pic" src="../image/uploads/users/<?=$select_logged_user_info_assoc['profile_photo']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require '../dashboard_parts/footer.php'; ?>

<?php if(isset($_SESSION['profile_update_success'])) { ?>   
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['profile_update_success']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
<?php } unset($_SESSION['profile_update_success']); ?>