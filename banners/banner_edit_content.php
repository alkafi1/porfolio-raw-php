<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';
$id = $_GET['id'];
$select = "SELECT * FROM banner_contents WHERE id ='$id'";
$select_res = mysqli_query($db_con, $select);
$content_assoc = mysqli_fetch_assoc($select_res);

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
                    <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="text-light">Edit Banner Content  </h3>
                            
                        </div>
                        <div class="card-body">
                            <form action="edit_banner_content_post.php" method="post">
                                <div class="mt-3">
                                    <label for="" class="form-label">Sub Title</label>
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <input type="text" name="sub_title" id="" class="form-control" value="<?=$content_assoc['sub_title']?>">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" id="" class="form-control" value="<?=$content_assoc['title']?>">
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="desp" class="form-control" value=""><?=$content_assoc['desp']?></textarea>
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
        </section>
    </div><!-- sl-mainpanel -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


<?php
require '../dashboard_parts/footer.php'
?>

<?php
 if(isset($_SESSION['edit_content'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['edit_content']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['edit_content']);
?>