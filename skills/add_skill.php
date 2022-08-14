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
                            <h3 class="text-light">Add Skill</h3>
                        </div>
                        <div class="card-body">

                            <form action="add_skill_post.php" method="post">
                                <div class="mt-3 pos-lg-relative">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="<?=(isset($_SESSION['old_title']))?$_SESSION['old_title']:'';unset($_SESSION['old_title'])?>" >
                                    
                                    <?php if(isset($_SESSION['title_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['title_error'];?></strong>
                                    <?php } unset($_SESSION['title_error']); ?>
                                    
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <input type="text" name="desp" class="form-control" value="<?=(isset($_SESSION['old_desp']))?$_SESSION['old_desp']:'';unset($_SESSION['old_desp'])?>">

                                    <?php if(isset($_SESSION['desp_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['desp_error'];?></strong>
                                    <?php } unset($_SESSION['desp_error']); ?>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Parcentage</label>
                                    <input type="text" name="parcentage" class="form-control" value="<?=(isset($_SESSION['old_parcentage']))?$_SESSION['old_parcentage']:'';unset($_SESSION['old_parcentage'])?>">

                                    <?php if(isset($_SESSION['parcentage_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['parcentage_error'];?></strong>
                                    <?php } unset($_SESSION['parcentage_error']); ?>
                                </div>
                                
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <h3>
                                <a href="view_skill.php"><button class="btn btn-warning float-left font-weight-bold mr-2"> View Skills</button></a>
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

<?php if(isset($_SESSION['skill_inserted'])) { ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['skill_inserted']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
<?php } unset($_SESSION['skill_inserted']); ?>


