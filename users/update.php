<?php
session_start();
require('../login_check.php');
require('../dashboard_parts/header.php');
require('../dashboard_parts/db.php');
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id='$id'";
            $query = mysqli_query($db_con,$sql);
            $user = mysqli_fetch_assoc($query);
        }    
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>
    
    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-info">Update User Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="update_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?=$user['id']?>">
                                <input type="text"  class="form-control" name="name" value="<?=$user['name'];?>">
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
                                <input type="text"  class="form-control" name="email" value="<?=$user['email']?>">
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
                                </div>
                            </div>
                            <div class="mb-3 pt-3 row">
                                <label  class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-6">
                                <input type="file" class="form-control" name="profile_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="col-sm-4">
                                <img width="100" class="" id="pic" src="../image/uploads/users/<?=$user['profile_photo']?>">
                                </div>
                            </div>
                            <div class="mb-3 row text-center">
                                <div class="col">
                                <button type="submit"   class="btn btn-success" name="update">Update</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php
require('../dashboard_parts/footer.php');
?>