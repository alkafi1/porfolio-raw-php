<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';
$id = $_GET['id'];
$select = "SELECT * FROM banner_images WHERE id ='$id'";
$select_res = mysqli_query($db_con, $select);
$image_assoc = mysqli_fetch_assoc($select_res);
?>
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
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="text-light">Edit Banner Image</h3>
                        </div>
                        <div class="card-body">
                            <form action="edit_banner_image_post.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for="" class="form-label">Banner Image</label>
                                            <input type="hidden" name="id" value="<?=$image_assoc['id']?>">
                                            <input type="file" name="banner_image" id="" class="form-control" value="" oninput="pic.src=window.URL.createObjectURL(this.files[0])">

                                            <?php if(isset($_SESSION['photo_error'])){ ?>
                                                <strong class="text-danger"><?php echo $_SESSION['photo_error'];?></strong>
                                            <?php }unset($_SESSION['photo_error']); ?>
                                            
                                            <?php if(isset($_SESSION['invalid_size'])){ ?>
                                                <strong class="text-danger"><?php echo $_SESSION['invalid_size'];?></strong>
                                            <?php }unset($_SESSION['invalid_size']); ?>

                                            <?php if(isset($_SESSION['invalid_ext'])){ ?>
                                                <strong class="text-danger"><?php echo $_SESSION['invalid_ext'];?></strong>
                                            <?php }unset($_SESSION['invalid_ext']); ?>

                                            <?php if(isset($_SESSION['null'])){ ?>
                                                <strong class="text-danger"><?php echo $_SESSION['null'];?></strong>
                                            <?php }unset($_SESSION['null']); ?>
                                        </div>
                                        <div class="col-sm-7 text-center">
                                            <img src="../image/uploads/banners/<?=$image_assoc['banner_image']?>" width="100" id="pic" >
                                        </div>
                                    </div>
                                    <?php if(isset($_SESSION['null_error'])){ ?>
                                        <srtong class=""> <?=$_SESSION['null_error']?></strong>
                                    <?php } unset($_SESSION['null_error']); ?>
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        
    </div>
</div>

<?php
 require '../dashboard_parts/footer.php';
?>

<?php
 if(isset($_SESSION['update_banner_image'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['update_banner_image']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['update_banner_image']);
?>