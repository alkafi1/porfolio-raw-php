<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';

$select_content = "SELECT * FROM banner_contents";
$select_content_res = mysqli_query($db_con, $select_content);

$select_image = "SELECT * FROM banner_images";
$select_image_res = mysqli_query($db_con, $select_image);
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
            <div class="row ">
                <div class="col-lg-12 ">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="text-light">Banner Content List <a href="add_banner.php"><button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add Banner</button></a></h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Sub Title</th>
                                        <th>Title</th>
                                        <th>Descrip</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_content_res as $key=>$content){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$content['sub_title']?></td>
                                        <td><?=$content['title']?></td>
                                        <td><?=$content['desp']?></td>
                                        <td>
                                            <button class="status btn btn-<?= ($content['status'] == 1 ? 'success':'secondary')?> " name="banner_content_status.php?id=<?=$content['id'];?>"> <?= ($content['status'] == 1 ? 'Active':'Deactive')?> </button>
                                        </td>
                                        <td width="200">
                                           <a href="banner_edit_content.php?id=<?=$content['id'];?>"> <button class="btn btn-info " name="banner_image_delete.php?id=<?=$content['id'];?>">Edit</button></a>
                                        <button class="btn btn-danger content_delete" name="banner_content_delete.php?id=<?=$content['id'];?>">Delete</button> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(mysqli_num_rows($select_content_res) == 0 ){ ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-warning">
                                                Oppssssss! There Is No Content. Please <a href="#" class="alert-link">Add Banner Content</a>!!!!!!!
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="text-light">Banner Image List <a href="add_banner.php"> <button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add Banner Image</button> </a> </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_image_res as $key=>$image){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td>
                                            <img width="200" height="200" src="../image/uploads/banners/<?=$image['banner_image']?>" alt="">
                                        </td>
                                        <td>
                                            <button class="status btn btn-<?= ($image['status'] == 1 ? 'success':'secondary')?> " name="banner_image_status.php?id=<?=$image['id'];?>"> <?= ($image['status'] == 1 ? 'Active':'Deactive')?> </button>
                                        </td>
                                        <td>
                                             <a href="banner_edit_image.php?id=<?=$image['id'];?>"> <button class="btn btn-info name="">Edit</button> </a>
                                             <button class="btn btn-danger image_delete" name="banner_image_delete.php?id=<?=$image['id'];?>">Delete</button> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(mysqli_num_rows($select_image_res) == 0 ){ ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-warning">
                                                Oppssssss! There Is No Content. Please <a href="#" class="alert-link">Add Banner Image</a>!!!!!!!
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                                    
                                </tbody>
                            </table>
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
 if(isset($_SESSION['content_delete'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['content_delete']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['content_delete']);
?>
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

<script>
      $('.status').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "Content Wants Active!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Active it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
               }
            })
      });
  </script>
<script>

      $('.content_delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "Content Wants Delete!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
               }
            })
      });
  </script>

<script>
      $('.image_delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "Image Wants Delete!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
               }
            })
      });
  </script>
<?php
 if(isset($_SESSION['active_error'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['active_error']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['active_error']);
?>
<?php
 if(isset($_SESSION['image_delete'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '<?=$_SESSION['image_delete']?>',
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['image_delete']);
?>
