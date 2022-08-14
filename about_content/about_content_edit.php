<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php'; 
require '../dashboard_parts/db.php';

$id =$_GET['id'];
$select_about_content = "SELECT * FROM about_contents WHERE id='$id'";
$select_about_content_res = mysqli_query($db_con, $select_about_content);
$about_content_assoc = mysqli_fetch_assoc($select_about_content_res);
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
                            <h3 class="text-light">Edit About Content</h3>
                        </div>
                        <div class="card-body">
                            <form action="about_content_edit_post.php" method="post" enctype="multipart/form-data">
                                <div class="mt-3">
                                    <label for="" class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" id="" class="form-control" value="<?=$about_content_assoc['sub_title']?>">
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" id="" class="form-control" value="<?=$about_content_assoc['title']?>">
                                    
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <input type="text" row="3" name="desp" id="" class="form-control" value="<?=$about_content_assoc['desp']?>">
                                    
                                </div>
                                <div class="row mt-3">
                                        <div class="col-sm-5">
                                            <label for="" class="form-label">About Image</label>
                                            <input type="file" name="about_image" id="" class="form-control" value="" oninput="pic.src=window.URL.createObjectURL(this.files[0])">

                                            <?php if(isset($_SESSION['image_error'])){ ?>
                                                <srtong class="text-danger"> <?=$_SESSION['image_error']?></strong>
                                            <?php } unset($_SESSION['image_error']); ?>

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
                                            <img src="../image/uploads/about_content/<?=$about_content_assoc['about_image']?>" width="100" id="pic" >
                                        </div>
                                    </div>

                                <div class="mt-3 text-center">
                                    <button type="submit " class="btn btn-info">Submit</button>
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


<?php
 if(isset($_SESSION['about_content_update'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['about_content_update']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['about_content_update']);
?>


