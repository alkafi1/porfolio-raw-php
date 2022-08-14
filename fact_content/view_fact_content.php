<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';

$select_fact = "SELECT * FROM facts";
$select_fact_res = mysqli_query($db_con, $select_fact);

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
                            <h3 class="text-light">Fact List <a href="add_fact_content.php"> <button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add Fact Count</button> </a></h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Fact Icon</th>
                                        <th>Fact Count Number</th>
                                        <th>Fact Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_fact_res as $key=>$fact){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td class="pos-lg-relative">
                                            <i style=" position:absolute; top: 23px; left: 48px; font-size: 28px; " class="fa <?=$fact['icon_class']?>"></i>
                                        </td>
                                        <td><?=$fact['fact_count_number']?></td>
                                        <td><?=$fact['fact_desp']?></td>
                                        <td>
                                           <a href="fact_status.php?id=<?=$fact['id'];?>"> <button class="btn btn-<?= ($fact['status'] == 1 ? 'success':'secondary')?> "> <?= ($fact['status'] == 1 ? 'Active':'Deactive')?> </button></a>
                                        </td>
                                        <td>
                                             <button class="btn btn-danger fact_delete" name="fact_delete.php?id=<?=$fact['id'];?>">Delete</button> 
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
      $('.fact_delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "This Fact Wants To Delete!",
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
 if(isset($_SESSION['fact_delete'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['fact_delete']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['fact_delete']);
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




