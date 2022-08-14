<?php
session_start();
require 'login_check.php';
require 'dashboard_parts/db.php';
 
$user_data = "SELECT * FROM users WHERE status = 0";
$user_data_query = mysqli_query($db_con,$user_data);
$user_data_store =mysqli_fetch_assoc($user_data_query);
$count_data = mysqli_num_rows($user_data_query);

$user_data = "SELECT COUNT(*) as modaretor FROM users WHERE role='2'";
$user_data_query = mysqli_query($db_con,$user_data);
$user_data_store =mysqli_fetch_assoc($user_data_query);

$user_datav = "SELECT COUNT(*) as viewer FROM users WHERE role='3'";
$user_data_query = mysqli_query($db_con,$user_datav);
$user_data_store2 =mysqli_fetch_assoc($user_data_query);
?>
<?php
require 'dashboard_parts/header.php';
?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Blank Page</span>
    </nav>
    
    <div class="sl-pagebody">
        <div class="sl-page-title">

           <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-primary">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">User Info</h6>
                        <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                        <span class="tx-11 tx-white-6">Total User</span>
                        <h6 class="tx-white mg-b-0"><?=$count_data?></h6>
                        </div>
                        <div>
                        <span class="tx-11 tx-white-6">Total Admin</span>
                        <h6 class="tx-white mg-b-0">8</h6>
                        </div>
                    </div><!-- card-body -->
                    <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                        <div>
                        <span class="tx-11 tx-white-6">Total Modaretor</span>
                        <h6 class="tx-white mg-b-0"><?=$user_data_store['modaretor']?></h6>
                        
                        </div>
                        <div>
                        <span class="tx-11 tx-white-6">Total Viewers</span>
                        <h6 class="tx-white mg-b-0"><?=$user_data_store2['viewer']?></h6>
                        </div>
                    </div><!-- -->
                    </div><!-- card -->
                </div>
           </div>

        </div><!-- sl-page-title -->   
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require 'dashboard_parts/footer.php'; ?>