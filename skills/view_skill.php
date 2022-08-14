<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';

$select_skill = "SELECT * FROM skills";
$select_skill_res = mysqli_query($db_con, $select_skill);

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
                            <h3 class="text-light">Skill List <a href="add_skill.php"><button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add Skill</button></a></h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Descriptionr</th>
                                        <th>Percentage</th>
                                        <th>Status</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_skill_res as $key=>$skill){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$skill['title']?></td>
                                        
                                        <td><?=$skill['desp']?></td>
                                        <td><?=$skill['parcentage']?></td>
                                        <td>
                                           <a href="skill_status.php?id=<?=$skill['id'];?>"> <button class="status btn btn-<?= ($skill['status'] == 1 ? 'success':'secondary')?> " name=""> <?= ($skill['status'] == 1 ? 'Active':'Deactive')?> </button></a>
                                        </td>
                                        
                                        <td width="150">
                                           <a href="skill_edit.php?id=<?=$skill['id'];?>"> <button class="btn btn-info" >Edit</button> </a>
                                           <a href="skill_delete.php?id=<?=$skill['id'];?>"> <button class="btn btn-danger" >Delete</button> </a>
                                         
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



<?php if(isset($_SESSION['min_2_skil'])){ ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['min_2_skil'];?>",
            showConfirmButton: false,
            timer: 1500
        })
     </script>
<?php }unset($_SESSION['min_2_skil']); ?>

<?php if(isset($_SESSION['limit'])){ ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['limit'];?>",
            showConfirmButton: false,
            timer: 1500
        })
     </script>
<?php }unset($_SESSION['limit']); ?>




