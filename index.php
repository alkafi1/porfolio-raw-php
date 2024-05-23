<?php
session_start();
require 'dashboard_parts/db.php';

//logo
$select_logo = "SELECT * FROM logo WHERE status=1";
$select_logo_res = mysqli_query($db_con, $select_logo);
$logo_after_assoc = mysqli_fetch_assoc($select_logo_res);

$select_content = "SELECT * FROM banner_contents WHERE status=1";
$select_content_res = mysqli_query($db_con, $select_content);
$content_after_assoc = mysqli_fetch_assoc($select_content_res);

$select_banner_image = "SELECT * FROM banner_images WHERE status=1";
$select_banner_image_res = mysqli_query($db_con, $select_banner_image);
$banner_image_after_assoc = mysqli_fetch_assoc($select_banner_image_res);

//social icon query
$select_social_icon = "SELECT * FROM social_icons WHERE status=1";
$select_social_icon_res = mysqli_query($db_con, $select_social_icon);
$social_icon_after_assoc = mysqli_fetch_assoc($select_social_icon_res);

//contact info
$select_contact_info = "SELECT * FROM contacts_info WHERE status=1";
$select_contact_info_res = mysqli_query($db_con, $select_contact_info);
$select_contact_info_affter_asso = mysqli_fetch_assoc($select_contact_info_res);

//about_ content
$select_about_content = "SELECT * FROM about_contents WHERE status=1";
$select_about_content_res = mysqli_query($db_con, $select_about_content);
$select_about_content_res_affter_assoc = mysqli_fetch_assoc($select_about_content_res);

//skill
$select_skill = "SELECT * FROM skills WHERE status=1";
$select_skill_res = mysqli_query($db_con, $select_skill);


//service data
$select_service = "SELECT * FROM services WHERE status=1";
$select_service_res = mysqli_query($db_con, $select_service);

//portpolio 
$select_portfolio = "SELECT * FROM pportfolios WHERE status='1'";
$select_portfolio_res = mysqli_query($db_con, $select_portfolio);

//facts Count
$select_fact = "SELECT * FROM facts WHERE status=1";
$select_fact_res = mysqli_query($db_con, $select_fact);

//feedback
$select_feedback = "SELECT * FROM feedbacks";
$select_feedback_res = mysqli_query($db_con, $select_feedback);

//barnds logo
$select_barnds_logo = "SELECT * FROM brands_logo WHERE status=1";
$select_brands_logo_res = mysqli_query($db_con, $select_barnds_logo);
?>
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="/portfolio/design_assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="../porfolio-raw-php//css//bootstrap.min.css">
        <link rel="stylesheet" href="../porfolio-raw-php//css//animate.min.css">
        <link rel="stylesheet" href="../porfolio-raw-php//css//magnific-popup.css">
        <link rel="stylesheet" href="../porfolio-raw-php//css//fontawesome-all.min.css">
        <link rel="stylesheet" href="../porfolio-raw-php//css//flaticon.css">
        <link rel="stylesheet" href="../porfolio-raw-php//css//slick.css">
        <link rel="stylesheet" href="../porfolio-raw-php//css//aos.css">
        <link rel="stylesheet" href="../porfolio-raw-php//css//default.css">
        <link rel="stylesheet" href="../porfolio-raw-php//css//style.css">
        <link rel="stylesheet" href="../porfolio-raw-php//css//responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.php" class="navbar-brand logo-sticky-none"><img src="image/uploads/logo/<?=$logo_after_assoc['logo']?>" alt="Logo"></a>
                                    <a href="index.php" class="navbar-brand s-logo-none"><img src="image/uploads/logo/<?=$logo_after_assoc['logo']?>" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index.php">
                        <img src="image/uploads/logo/<?=$logo_after_assoc['logo']?>" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p><?=$select_contact_info_affter_asso['address']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p><?=$select_contact_info_affter_asso['number']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?=$select_contact_info_affter_asso['email']?></p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <?php foreach($select_social_icon_res as $icon ) { ?>
                    <a href=""><i class="fab <?=$icon['icon_class']?>"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?=$content_after_assoc['sub_title']?></h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?=$content_after_assoc['title']?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?=$content_after_assoc['desp']?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <?php foreach($select_social_icon_res as $icon_active){?>
                                        <li><a href="#"><i class="fab <?=$icon_active['icon_class']?>"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img height="830" src="image/uploads/banners/<?=$banner_image_after_assoc['banner_image']?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img height="500" width="500" src="image/uploads/about_content/<?=$select_about_content_res_affter_assoc['about_image']?>" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span><?=$select_about_content_res_affter_assoc['sub_title']?></span>
                                <h2><?=$select_about_content_res_affter_assoc['title']?></h2>
                            </div>
                            <div class="about-content">
                                <p><?=$select_about_content_res_affter_assoc['desp']?></p>
                                <h3>Skill:</h3>
                            </div>
                            <!-- Education Item -->
                            <?php foreach($select_skill_res as $skill){?>
                            <div class="education">
                                <div class="year"><?=$skill['title']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?=$skill['desp']?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?=$skill['parcentage']?>%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- End Education Item -->
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <?php foreach($select_service_res as $key=>$service){?>
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="fab <?=$service['icon_class']?>"></i>
								<h3><?=$service['title']?></h3>
								<p>
									<?=$service['desp']?>
								</p>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($select_portfolio_res as $key=>$portfolio) {?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img height="600" src="image/uploads/portfolio/<?=$portfolio['image']?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?=$portfolio['category']?></span>
									<h4><a href="portfolio-single.php"><?=$portfolio['title']?></a></h4>
									<a href="portfolio-single.php?id=<?=$portfolio['id']?>" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        <?php } ?>

                        
                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <?php foreach($select_fact_res as $key=>$fact) { ?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="fab <?=$fact['icon_class']?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?=$fact['fact_count_number']?></span></h2>
                                        <span><?=$fact['fact_desp']?></span>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                <?php foreach($select_feedback_res as $feedback) { ?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="image/uploads/feedback/<?=$feedback['image']?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?=$feedback['desp']?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?=$feedback['name']?> </h5>
                                            <span><?=$feedback['designation']?> </span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <?php foreach($select_brands_logo_res as $key=>$brands) { ?>
                        <div class="col-xl-3">
                            <div class="single-brand">
                                <img src="image/uploads/brands_logo/<?=$brands['brands_logo']?>" alt="img">
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>OFFICE IN <span>DHAKA</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?=$select_contact_info_affter_asso['address']?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?=$select_contact_info_affter_asso['number']?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?=$select_contact_info_affter_asso['email']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="comment_post.php" method="POST">
                                    <input type="text" name="name" placeholder="your name *">
                                    <input type="email" name="email" placeholder="your email *">
                                    <textarea  name="comment" id="message" placeholder="your comment *"></textarea>
                                    <button type="submit" class="btn">Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="../porfolio-raw-php//js//popper.min.js"></script>
        <script src="../porfolio-raw-php//js//vendor/jquery-1.12.4.min.js"></script>
        <script src="../porfolio-raw-php//js//bootstrap.min.js"></script>
        <script src="../porfolio-raw-php//js//isotope.pkgd.min.js"></script>
        <script src="../porfolio-raw-php//js//one-page-nav-min.js"></script>
        <script src="../porfolio-raw-php//js//slick.min.js"></script>
        <script src="../porfolio-raw-php//js//ajax-form.js"></script>
        <script src="../porfolio-raw-php//js//wow.min.js"></script>
        <script src="../porfolio-raw-php//js//aos.js"></script>
        <script src="../porfolio-raw-php//js//jquery.waypoints.min.js"></script>
        <script src="../porfolio-raw-php//js//jquery.counterup.min.js"></script>
        <script src="../porfolio-raw-php//js//jquery.scrollUp.min.js"></script>
        <script src="../porfolio-raw-php//js//imagesloaded.pkgd.min.js"></script>
        <script src="../porfolio-raw-php//js//jquery.magnific-popup.min.js"></script>
        <script src="../porfolio-raw-php//js//plugins.js"></script>
        <script src="../porfolio-raw-php//js//main.js"></script>
    </body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->
</html>
