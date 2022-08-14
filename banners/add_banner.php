<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php'; 
 ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Banner</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>
    
    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="text-light">Add Banner Content  </h3>
                            
                        </div>
                        <div class="card-body">
                            <form action="add_banner_content_post.php" method="post">
                                <div class="mt-3">
                                    <label for="" class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" id="" class="form-control" value="<?=(isset($_SESSION['old_sub_title']))?$_SESSION['old_sub_title']:'';unset($_SESSION['old_sub_title'])?>">
                                    <?php if(isset($_SESSION['null_error'])){ ?>
                                        <srtong class="text-danger"> <?=$_SESSION['null_error']?></strong>
                                    <?php } unset($_SESSION['null_error']); ?>
                                    
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" id="" class="form-control" value="<?=(isset($_SESSION['old_title']))?$_SESSION['old_title']:'';unset($_SESSION['old_title'])?>">
                                    <?php if(isset($_SESSION['title_error'])){ ?>
                                        <srtong class="text-danger"> <?=$_SESSION['title_error']?></strong>
                                    <?php } unset($_SESSION['title_error']); ?>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="desp" class="form-control" value="<?=(isset($_SESSION['desp']))?$_SESSION['desp']:'';unset($_SESSION['desp'])?>"></textarea>
                                    <?php if(isset($_SESSION['desp_error'])){ ?>
                                        <srtong class="text-danger"> <?=$_SESSION['desp_error']?></strong>
                                    <?php } unset($_SESSION['desp_error']); ?>
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="submit " class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <h3>
                                <a href="view_banner.php"><button class="btn btn-warning float-left font-weight-bold mr-2"> View Banner</button></a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="text-light">Add Banner Image</h3>
                        </div>
                        <div class="card-body">
                            <form action="add_banner_image_post.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for="" class="form-label">Banner Image</label>
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
                                        </div>
                                        <div class="col-sm-7 text-center">
                                            <img src="" width="100" id="pic" >
                                        </div>
                                    </div>
                                    <?php if(isset($_SESSION['null_error'])){ ?>
                                        <srtong class=""> <?=$_SESSION['null_error']?></strong>
                                    <?php } unset($_SESSION['null_error']); ?>
                                <div class="mt-3 text-center">
                                    <button type="submit " class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <h3>
                                <a href="view_banner.php"><button class="btn btn-warning float-left font-weight-bold mr-2"> View Banner</button></a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require '../dashboard_parts/footer.php'; ?>


<?php
 if(isset($_SESSION['banner_content_inserted'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['banner_content_inserted']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['banner_content_inserted']);
?>

<?php
 if(isset($_SESSION['b_image_insert_success'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['b_image_insert_success']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['b_image_insert_success']);
?>
