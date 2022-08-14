<?php
session_start();
require '../login_check.php';
require '../dashboard_parts/header.php';
require '../dashboard_parts/db.php';

$select_portfolio = "SELECT * FROM pportfolios";
$select_portfolio_res = mysqli_query($db_con, $select_portfolio);

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
                            <h3 class="text-light">Portfolio List <a href="add_portfolio.php"> <button class="btn btn-warning float-right font-weight-bold"><i class="fa fa-plus"></i> Add Portfolio </button> </a> </h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Added By</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Iamge</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($select_portfolio_res as $key=>$portfolio){ ?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td>
                                            <?php
                                                $user_id = $_SESSION['id'];
                                                $select_user = "SELECT * FROM users WHERE id='$user_id'";
                                                $select_user_res = mysqli_query($db_con,$select_user);
                                                $user_assoc = mysqli_fetch_assoc($select_user_res);
                                                echo $user_assoc['name'];
                                            ?>
                                        </td>
                                        <td><?=$portfolio['category']?></td>
                                        <td><?=$portfolio['title']?></td>
                                        <td><?=$portfolio['desp']?></td>
                                        <td>
                                            <img width="100" height="100" src="../image/uploads/portfolio/<?=$portfolio['image']?>" alt="">
                                        </td>
                                        <td>
                                             <a href="portfolio_status.php?id=<?=$portfolio['id'];?>"><button class="btn btn-<?=($portfolio['status']==1?'success':'secondary')?>"><?=($portfolio['status']==1?'Active':'Deactive')?></button> </a>
                                        </td>
                                        <td>
                                            <a href="portfolio_edit.php?id=<?=$portfolio['id'];?>"> <button class="btn btn-info mr-2" name="">Edit</button></a>
                                            <button class="btn btn-danger portfolio_delete" name="portfolio_delete.php?id=<?=$portfolio['id'];?>">Delete</button> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(mysqli_num_rows($select_portfolio_res) == 0 ){ ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-warning">
                                                Oppssssss! There Is No Content. Please <a href="#" class="alert-link">Add Portfolio</a>!!!!!!!
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
 if(isset($_SESSION['portfolio_delete'])){
     ?>
     <script>
         Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: "<?=$_SESSION['portfolio_delete']?>",
            showConfirmButton: false,
            timer: 1500
            })
     </script>
     <?php
 }unset($_SESSION['portfolio_delete']);
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
            timer: 2000
            })
     </script>
     <?php
 }unset($_SESSION['limit']);
?>
<script>
      $('.portfolio_delete').click(function(){
          Swal.fire({
            title: 'Are you sure?',
            text: "Portfolio Wants Delete!",
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




