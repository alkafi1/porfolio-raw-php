<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';

$select_service = "SELECT * FROM services";
$select_service_res = mysqli_query($db_con, $select_service);

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
                            <h3 class="text-light">Service List <a href="add_service.php"> <button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add Service</button> </a></h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Service Icon</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th width="220">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_service_res as $key=>$service){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td class="pos-lg-relative">
                                            <i style=" position:absolute; top: 23px; left: 48px; font-size: 28px; " class="fa <?=$service['icon_class']?>"></i>
                                        </td>
                                        <td><?=$service['title']?></td>
                                        <td><?=$service['desp']?></td>
                                        <td>
                                           <a href="service_status.php?id=<?=$service['id'];?>"> <button class="btn btn-<?= ($service['status'] == 1 ? 'success':'secondary')?> "> <?= ($service['status'] == 1 ? 'Active':'Deactive')?> </button></a>
                                        </td>
                                        <td>
                                             <a href="service_edit.php?id=<?=$service['id'];?>"> <button class="btn btn-info mr-2" >Edit</button> </a>
                                             <button class="btn btn-danger service_delete" name="service_delete.php?id=<?=$service['id'];?>">Delete</button> 
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
      $('.service_delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "Service Wants To Delete!",
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
 if(isset($_SESSION['service_delete'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['service_delete']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['service_delete']);
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




