<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php'; 
require '../dashboard_parts/db.php'; 

$id= $_GET['id'];


$select_contact_info = "SELECT * FROM contacts_info WHERE id='$id'";
$select_contact_info_res = mysqli_query($db_con, $select_contact_info);
$after_assoc_contact_info = mysqli_fetch_assoc($select_contact_info_res);


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
                               <h3 class="text-light pt-2">Contact Info Edit</h3>
                           </div>
                           <div class="card-body">
                               <form action="contact_info_edit_post.php" method="post">
                                <div class="mt-3">
                                    <label for="" class="form-label">Address</label>
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <input type="text" name="address" class="form-control" value="<?=$after_assoc_contact_info['address']?>">
                                    
                                    <?php if(isset($_SESSION['address_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['address_error'];?></strong>
                                    <?php } unset($_SESSION['address_error']); ?>
                                    
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Phone Number</label>
                                    <input type="tel" name="number" class="form-control" value="<?=$after_assoc_contact_info['number']?>">

                                    <?php if(isset($_SESSION['number_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['number_error'];?></strong>
                                    <?php } unset($_SESSION['number_error']); ?>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?=$after_assoc_contact_info['email']?>">

                                    <?php if(isset($_SESSION['email_error'])){ ?>
                                            <strong class="text-danger"><?php echo $_SESSION['email_error'];?></strong>
                                    <?php } unset($_SESSION['email_error']); ?>
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

<?php if(isset($_SESSION['contact_info_edited'])){ ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['contact_info_edited'];?>",
            showConfirmButton: false,
            timer: 1500
        })
     </script>
<?php }unset($_SESSION['contact_info_edited']); ?>