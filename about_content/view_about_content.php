<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';

$select_about_content = "SELECT * FROM about_contents";
$select_about_content_res = mysqli_query($db_con, $select_about_content);

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
                            <h3 class="text-light">About Content List <a href="add_about_content.php"><button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add About Content</button></a></h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Sub Title</th>
                                        <th>Title</th>
                                        <th>Descrip</th>
                                        <th>Iamge</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_about_content_res as $key=>$about){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$about['sub_title']?></td>
                                        <td><?=$about['title']?></td>
                                        <td><?=$about['desp']?></td>
                                        <td>
                                            <img width="100" height="100" src="../image/uploads/about_content/<?=$about['about_image']?>" alt="">
                                        </td>
                                        
                                        <td>
                                           <button class="status btn btn-<?= ($about['status'] == 1 ? 'success':'secondary')?> " name="about_content_status.php?id=<?=$about['id'];?>"> <?= ($about['status'] == 1 ? 'Active':'Deactive')?> </button>
                                        </td>
                                        <td>
                                            <a href="about_content_edit.php?id=<?=$about['id'];?>"><button class="btn btn-info mr-2" >Edit</button></a>
                                             <button class="btn btn-danger about_content_delete" name="about_content_delete.php?id=<?=$about['id'];?>">Delete</button> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(mysqli_num_rows($select_about_content_res) == 0 ){ ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-warning">
                                                Oppssssss! There Is No Content. Please <a href="#" class="alert-link">Add About Content</a>!!!!!!!
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

<script>
      $('.status').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "Content Wants Active!",
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
<script>
      $('.about_content_delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "Content Wants Delete!",
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
<?php
 if(isset($_SESSION['about_content_delete'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'warning',
            title: "<?=$_SESSION['about_content_delete']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['about_content_delete']);
?>

