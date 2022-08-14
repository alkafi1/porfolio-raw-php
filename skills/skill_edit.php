<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php'; 
require '../dashboard_parts/db.php'; 

$id= $_GET['id'];


$select_skill = "SELECT * FROM skills WHERE id='$id'";
$select_skill_res = mysqli_query($db_con, $select_skill);
$select_skill_assoc = mysqli_fetch_assoc($select_skill_res);


?>

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
                           <div class="card-header bg-info">
                               <h3 class="text-light pt-2">Skill Edit</h3>
                           </div>
                           <div class="card-body">
                               <form action="skill_edit_post.php" method="post">
                                <div class="mt-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <input type="text" name="title" class="form-control" value="<?=$select_skill_assoc['title']?>">
                                    
                                    <?php if(isset($_SESSION['title_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['title_error'];?></strong>
                                    <?php } unset($_SESSION['title_error']); ?>
                                    
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <input type="text" name="desp" class="form-control" value="<?=$select_skill_assoc['desp']?>">

                                    <?php if(isset($_SESSION['desp_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['desp_error'];?></strong>
                                    <?php } unset($_SESSION['desp_error']); ?>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Percantege</label>
                                    <input type="text" name="parcentage" class="form-control" value="<?=$select_skill_assoc['parcentage']?>">

                                    <?php if(isset($_SESSION['parcentage_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['parcentage_error'];?></strong>
                                    <?php } unset($_SESSION['parcentage_error']); ?>
                                </div>
                                
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-info">Submit</button>
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

<?php if(isset($_SESSION['skil_edited'])){ ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['skil_edited'];?>",
            showConfirmButton: false,
            timer: 1500
        })
     </script>
<?php }unset($_SESSION['skil_edited']); ?>