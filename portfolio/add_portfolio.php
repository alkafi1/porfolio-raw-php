<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php'; 
$user_id = $_SESSION['id'];

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
                            <h3 class="text-light">Add Porfolio</h3>
                        </div>
                        <div class="card-body">
                            <form action="add_portfolio_post.php" method="post" enctype="multipart/form-data">
                                <div class="mt-3">
                                    <label for="" class="form-label">Category</label>
                                    <input type="hidden" name="user_id" value="<?=$user_id?>">
                                    
                                    <input type="text" name="category" id="" class="form-control" value="<?=(isset($_SESSION['old_category']))?$_SESSION['old_category']:'';unset($_SESSION['old_category'])?>">
                                    <?php if(isset($_SESSION['category_error'])){ ?>
                                        <srtong class="text-danger"> <?=$_SESSION['category_error']?></strong>
                                    <?php } unset($_SESSION['category_error']); ?>
                                    
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
                                    <textarea type="text" name="desp" id="" class="form-control"><?=(isset($_SESSION['old_desp']))?$_SESSION['old_desp']:'';unset($_SESSION['old_desp'])?></textarea>
                                    <?php if(isset($_SESSION['desp_error'])){ ?>
                                        <srtong class="text-danger"> <?=$_SESSION['desp_error']?></strong>
                                    <?php } unset($_SESSION['desp_error']); ?>
                                </div>
                                
                                <div class="row mt-3">
                                        <div class="col-sm-5">
                                            <label for="" class="form-label">Work Image</label>
                                            <input type="file" name="image" id="" class="form-control" value="" oninput="pic.src=window.URL.createObjectURL(this.files[0])">

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
                                            <img src="" width="100" id="pic" >
                                        </div>
                                    </div>

                                <div class="mt-3 text-center">
                                    <button type="submit " class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <h3>
                                <a href="view_portfolio.php"><button class="btn btn-warning float-left font-weight-bold mr-2"> View Portfolio</button></a>
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
 if(isset($_SESSION['feedback_inserted'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['feedback_inserted']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['feedback_inserted']);
?>
