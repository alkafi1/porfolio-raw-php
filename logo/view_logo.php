<?php
session_start();
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';

$select_logo = "SELECT * FROM logo";
$select_logo_res = mysqli_query($db_con, $select_logo);

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
                            <h3 class="text-light">Logo List <a href="add_logo.php"> <button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add Logo</button> </a></h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Logo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_logo_res as $key=>$logo){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td>
                                            <img width="200" src="../image/uploads/logo/<?=$logo['logo']?>" alt="">
                                        </td>
                                        <td>
                                          <a href="logo_status.php?id=<?=$logo['id'];?>">  <button class="btn btn-<?= ($logo['status'] == 1 ? 'success':'secondary')?>"> <?= ($logo['status'] == 1 ? 'Active':'Deactive')?> </button></a>
                                        </td>
                                        <td>
                                            
                                             <button class="btn btn-danger logo_delete" name="logo_delete.php?id=<?=$logo['id'];?>">Delete</button> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(mysqli_num_rows($select_logo_res) == 0 ){ ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-warning">
                                                Oppssssss! There Is No Content. Please <a href="#" class="alert-link">Add Logo</a>!!!!!!!
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
 if(isset($_SESSION['logo_delete'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['logo_delete']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['logo_delete']);
?>
<?php
 if(isset($_SESSION['limit'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['limit']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['limit']);
?>


<script>
      $('.logo_delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "Logo Wants Delete!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Move it!'
            }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
               }
            })
      });
  </script>

