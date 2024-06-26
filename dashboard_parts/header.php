<?php

require 'db.php';
$id = $_SESSION['id'];
$select_logged_user_info = "SELECT * FROM users WHERE id='$id'";
$select_logged_user_info_query = mysqli_query($db_con, $select_logged_user_info);
$select_logged_user_info_assoc = mysqli_fetch_assoc($select_logged_user_info_query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="/porfolio-raw-php/dashboard_assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/porfolio-raw-php/dashboard_assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="/porfolio-raw-php/dashboard_assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="/porfolio-raw-php/dashboard_assets/css/bootsrtap.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="/porfolio-raw-php/dashboard_assets/css/starlight.css">
    <link rel="stylesheet" href="/porfolio-raw-php/dashboard_assets/css/admin.css">
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
        <div class="input-group input-group-search">
            <input type="search" name="search" class="form-control" placeholder="Search">
            <span class="input-group-btn">
                <button class="btn"><i class="fa fa-search"></i></button>
            </span><!-- input-group-btn -->
        </div><!-- input-group -->

        <label class="sidebar-label">Navigation</label>
        <div class="sl-sideleft-menu">
            <a href="/porfolio-raw-php/dashboard.php" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                    <span class="menu-item-label">Dashboard</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="widgets.html" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Cards &amp; Widgets</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-users tx-20"></i>
                    <span class="menu-item-label">Users</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="/porfolio-raw-php/add_users/registration.php" class="nav-link">Add Users</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/users/users.php" class="nav-link">View Users</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/users/trash.php" class="nav-link">Trash Users</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-flag-o tx-20"></i>
                    <span class="menu-item-label">Banner</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="/porfolio-raw-php/banners/add_banner.php" class="nav-link">Add banners</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/banners/view_banner.php" class="nav-link">View Banner</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-folder-o tx-20"></i>
                    <span class="menu-item-label">Social Icon</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="/porfolio-raw-php/social_icon/add_social_icon.php" class="nav-link">Add Social_icon</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/social_icon/view_social_icon.php" class="nav-link">View Social Icon</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-info-circle tx-20"></i>
                    <span class="menu-item-label">Contact Info</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="\porfolio-raw-php/contact_info/add_contact_info.php" class="nav-link">Add Contact Info</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/contact_info/view_contact_info.php" class="nav-link">View Contact Info</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-user-circle tx-20"></i>
                    <span class="menu-item-label">About Content</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="\porfolio-raw-php/about_content/add_about_content.php" class="nav-link">Add About Content</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/about_content/view_about_content.php" class="nav-link">View Contact Info</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-cogs tx-20"></i>
                    <span class="menu-item-label">Skills</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="\porfolio-raw-php/skills/add_skill.php" class="nav-link">Add Skill</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/skills/view_skill.php" class="nav-link">View Skill List</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-tasks tx-20"></i>
                    <span class="menu-item-label">Service</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="\porfolio-raw-php/services/add_service.php" class="nav-link">Add Service</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/services/view_service.php" class="nav-link">View Service List</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-university tx-20"></i>
                    <span class="menu-item-label">Logo</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="\porfolio-raw-php/logo/add_logo.php" class="nav-link">Add Logo</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/logo/view_logo.php" class="nav-link">View Logo</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-sort-numeric-asc tx-20"></i>
                    <span class="menu-item-label">Count Item</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="\porfolio-raw-php/fact_content/add_fact_content.php" class="nav-link">Add Count Content </a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/fact_content/view_fact_content.php" class="nav-link">View Count Content</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-angellist tx-20"></i>
                    <span class="menu-item-label">Brand Logo</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="\porfolio-raw-php/brand_logo/add_brand_logo.php" class="nav-link">Add Brand Logo</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/brand_logo/view_brand_logo.php" class="nav-link">View Brand Logo</a></li>
            </ul>

            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-comments-o tx-20"></i>
                    <span class="menu-item-label">Feedback</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="\porfolio-raw-php/feedback/add_feedback.php" class="nav-link">Add Feedback</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/feedback/view_feedback.php" class="nav-link">View Feedback</a></li>
            </ul>
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon fa fa-comments-o tx-20"></i>
                    <span class="menu-item-label">porfolio-raw-php</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="\porfolio-raw-php/portfolio/add_portfolio.php" class="nav-link">Add porfolio-raw-php</a></li>
                <li class="nav-item"><a href="/porfolio-raw-php/portfolio/view_portfolio.php" class="nav-link">View porfolio-raw-php</a></li>
            </ul>

        </div><!-- sl-sideleft-menu -->
        <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
        <div class="sl-header-left">
            <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
            <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        </div><!-- sl-header-left -->
        <div class="sl-header-right">
            <nav class="nav">
                <div class="dropdown">
                    <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                        <span class="logged-name"><?=$select_logged_user_info_assoc['name']?></span>
                        <img src="/porfolio-raw-php/image/uploads/users/<?=$select_logged_user_info_assoc['profile_photo']?>" class="wd-32 rounded-circle" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-header wd-200">
                        <ul class="list-unstyled user-profile-nav">
                            <li><a href="/porfolio-raw-php/users/edit_profile.php"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                            <li><a href="/porfolio-raw-php/logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
                        </ul>
                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
            </nav>
            <div class="navicon-right">
                <a id="btnRightMenu" href="" class="pos-relative">
                    <i class="icon ion-ios-bell-outline"></i>
                    <!-- start: if statement -->
                    <span class="square-8 bg-danger"></span>
                    <!-- end: if statement -->
                </a>
            </div><!-- navicon-right -->
        </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
        <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
            </li>
        </ul><!-- sidebar-tabs -->

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
                <div class="media-list">
                    <!-- loop starts here -->
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                                <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <!-- loop ends here -->
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                                <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                                <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                                <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                                <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                                <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                                <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link">
                        <div class="media">
                            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                                <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                            </div>
                        </div><!-- media -->
                    </a>
                </div><!-- media-list -->
                <div class="pd-15">
                    <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
                </div>
            </div><!-- #messages -->

            <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
                <div class="media-list">
                    <!-- loop starts here -->
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                <span class="tx-12">October 03, 2017 8:45am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <!-- loop ends here -->
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                                <span class="tx-12">October 02, 2017 12:44am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                                <span class="tx-12">October 01, 2017 10:20pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                <span class="tx-12">October 01, 2017 6:08pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                                <span class="tx-12">September 27, 2017 6:45am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                                <span class="tx-12">September 28, 2017 11:30pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                                <span class="tx-12">September 26, 2017 11:01am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                <span class="tx-12">September 23, 2017 9:19pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                </div><!-- media-list -->
            </div><!-- #notifications -->

        </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->