<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';

$select_contact_info = "SELECT * FROM contacts_info";
$select_contact_info_res = mysqli_query($db_con, $select_contact_info);

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
                            <h3 class="text-light">Contact Info List <a href="add_contact_info.php"><button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add Contact</button></a></h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Address</th>
                                        <th>Number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_contact_info_res as $key=>$contact_info){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$contact_info['address']?></td>
                                        
                                        <td><?='+880'.$contact_info['number']?></td>
                                        <td><?=$contact_info['email']?></td>
                                        <td>
                                           <a href="contact_info_status.php?id=<?=$contact_info['id'];?>"> <button class="status btn btn-<?= ($contact_info['status'] == 1 ? 'success':'secondary')?> " name=""> <?= ($contact_info['status'] == 1 ? 'Active':'Deactive')?> </button></a>
                                        </td>
                                        
                                        <td>
                                          <a href="contact_info_edit.php?id=<?=$contact_info['id'];?>">  <button class="btn btn-info " name=>Edit</button> </a>
                                            <button class="btn btn-danger contact_delete" name="contact_info_delete.php?id=<?=$contact_info['id'];?>">Delete</button> 
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
      $('.contact_delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "This Contact Info Wants To Delete!",
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
 if(isset($_SESSION['contact_info_delete'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['contact_info_delete']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['contact_info_delete']);
?>

<?php if(isset($_SESSION['limit'])){ ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['limit'];?>",
            showConfirmButton: false,
            timer: 2000
        })
     </script>
<?php }unset($_SESSION['limit']); ?>




