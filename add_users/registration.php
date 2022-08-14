<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
?>

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
            <div class="col-lg-7 m-auto">
                <div class="card">
                    <div class="card-header bg-info text-light">
                        <h3>Add User</h3>
                    </div>
                    <div class="card-body">
                        <form action="registration_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text"  class="form-control" name="name" value="<?=(isset($_SESSION['old_name']))?$_SESSION['old_name']:'';unset($_SESSION['old_name'])?>">
                                <?php
                                if(isset($_SESSION['name_error'])){
                                    ?>
                                    <strong class="text-danger"><?php echo $_SESSION['name_error'];?></strong>
                                    <?php
                                }unset($_SESSION['name_error']);
                                ?>
                                
                                </div>
                                
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text"  class="form-control" name="email" value="<?=(isset($_SESSION['old_email']))?$_SESSION['old_email']:'';unset($_SESSION['old_email'])?>">
                            
                                <?php
                                if(isset($_SESSION['email_error'])){
                                    ?>
                                    <strong class="text-danger"><?php echo $_SESSION['email_error'];?></strong>
                                    <?php
                                }unset($_SESSION['email_error']);
                                ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" name="password">
                                <?php
                                if(isset($_SESSION['password_error'])){
                                    ?>
                                    <strong class="text-danger"><?php echo $_SESSION['password_error'];?></strong>
                                    <?php
                                }unset($_SESSION['password_error']);
                                ?>
                                
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="profile_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                    <?php if(isset($_SESSION['photo_error'])){
                                        ?>
                                        <strong class="text-danger"><?php echo $_SESSION['photo_error'];?></strong>
                                    <?php }unset($_SESSION['photo_error']); ?>
                                    
                                    <?php if(isset($_SESSION['invalid_size'])){
                                        ?>
                                        <strong class="text-danger"><?php echo $_SESSION['invalid_size'];?></strong>
                                    <?php }unset($_SESSION['invalid_size']); ?>

                                    <?php if(isset($_SESSION['invalid_ext'])){ ?>
                                        
                                        <strong class="text-danger"><?php echo $_SESSION['invalid_ext'];?></strong>
                                    <?php }unset($_SESSION['invalid_ext']); ?>
                                </div>
                                <div class="col-sm-4">
                                    <img width="100" class="" id="pic" />
                                </div>
                            </div>
                            <div class="mb-3 mt-2 row text-center">
                                <div class="col">
                                 <select name="role" id="" class="form-control">
                                     <option value="NULL">-- Select Role --</option>
                                     <option value="2">Admin</option>
                                     <option value="3">Modaretor</option>
                                     <option value="4">Viewer</option>
                                 </select>
                                <?php if(isset($_SESSION['role_error'])){ ?>    
                                    <strong class="text-danger"><?php echo $_SESSION['role_error'];?></strong>
                                <?php }unset($_SESSION['role_error']); ?>
                                </div>
                            </div>
                            <div class="mb-3 mt-2 row text-center">
                                <div class="col">
                                 <button class="btn btn-info" name="registration">Submit</button> 
                                </div>
                            </div>
                        </form>
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

<?php
 if(isset($_SESSION['email_exist'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: '<?=$_SESSION['email_exist']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['email_exist']);
?>
<?php
 if(isset($_SESSION['insert_success'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['insert_success']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['insert_success']);
?>

