<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';

$select_social_icon = "SELECT * FROM social_icons";
$select_social_icon_res = mysqli_query($db_con, $select_social_icon);

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
                <div class="col-lg-10 m-auto">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3 class="text-light">Add Social Icon <a href="add_social_icon.php"><button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add Icon</button></a></h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Icon</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_social_icon_res as $key=>$social_icon){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td class="pos-lg-relative">
                                            <i style=" position:absolute; top: 23px; left: 48px; font-size: 28px; " class="fa <?=$social_icon['icon_class']?>"></i>
                                        </td>
                                        <td><?=$social_icon['link']?></td>
                                        <td>
                                           <a href="social_icon_status.php?id=<?=$social_icon['id'];?>"> <button class="status btn btn-<?= ($social_icon['status'] == 1 ? 'success':'secondary')?> " name=""> <?= ($social_icon['status'] == 1 ? 'Active':'Deactive')?> </button></a>
                                        </td>
                                        <td>
                                             <button class="btn btn-danger social_icon_delete" name="social_icon_delete.php?id=<?=$social_icon['id'];?>">Delete</button> 
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

<script>
      $('.social_icon_delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "Social Icon Wants To Delete!",
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
 if(isset($_SESSION['social_icon_delete'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['social_icon_delete']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['social_icon_delete']);
?>

<?php
 if(isset($_SESSION['limit'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['limit'];?>",
            showConfirmButton: false,
            timer: 1500
        })
     </script>
     <?php
 }unset($_SESSION['limit']);
?>




