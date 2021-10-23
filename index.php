<?php 
$style = "header";
$home ="active";
$user = 'shopping';
require_once './helpers/init.php';

$sql = "SELECT * FROM products LIMIT 4";
$op = mysqli_query($conn, $sql);

?>

	<!-- start header -->
	<section class="header d-flex flex-wrap flex-column">
		<div class="home container d-flex flex-grow-1 align-items-center justify-content-between">
			<div class="content">
				<h1 class="text-uppercase">for the <br><span>fe<span>m</span>inine</span>in you</h1>
				<h2 class="text-uppercase">stud <span>y</span>ourself !</h2>
				<a href="shopping.php" class="text-uppercase btn btn-jewely">start shopping</a>
			</div>
            <div class="flower">
                <img src="images/1298017-e6a3a3.svg" style="width: 400px;height: 553px;/* position: absolute; */top: 500px;right: 137px;">
            </div>
		</div>
	</section>
	<!-- end header -->
	<!--start our features-->
	<section class="features text-center">
           <div class="container">
               <div class="row">
                   <div class="col-sm-6 col-lg-3 wow animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-offset="30" >
                       <div class="icon"><i class="far fa-lightbulb"></i></div>
                       <h4>Great Ideas</h4>
                       <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt</p>
                   </div>
                   <div class="col-sm-6 col-lg-3 wow animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-offset="30 " data-wow-delay="0.2s">
                       <div class="icon"><i class="fas fa-wrench"></i></div>
                       <h4>Quick Settings</h4>
                       <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt</p>
                   </div>
                   <div class="col-sm-6 col-lg-3 wow animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-offset="30 " data-wow-delay="0.4s">
                       <div class="icon"><i class="fab fa-skyatlas"></i></div>
                       <h4>Cloud Services</h4>
                       <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt</p>
                   </div>
                   <div class="col-sm-6 col-lg-3 wow animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-offset="30 " data-wow-delay="0.6s">
                       <div class="icon"><i class="fab fa-connectdevelop"></i></div>
                       <h4>Cross Development</h4>
                       <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt</p>
                   </div>
               </div>
           </div>
        </section>
     <!--end our features-->
     <!--start our overview-->
        <section class="overview text-center">
            <div class="container">
                <h2 class="h1">Company Overview</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilla. sed do eiusmod tempor incididunt ut labore et dolore.</p>
                <span>Let's Start Today</span>
                <button>VIEW MORE</button>
            </div>
        </section>
     <!--end our overview-->
     <!--start our featured work-->
        <!-- <section class="featured-work text-center">
            <div class="container">
                <h2 class="h1">Featured Work</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.</p>
                <ul class="list-unstyled row ">
                    <li data-class=".all" class="col-md active">ALL</li>
                    <li data-class=".website" class="col-md">WEBSITE</li>
                    <li data-class=".logo" class="col-md">LOGO & BRANDING</li>
                    <li data-class=".graphic-design" class="col-md">GRAPHIC DESIGN</li>
                    <li data-class=".online-marketing" class="col-md">ONLINE MARKETING</li>
                    <li data-class=".video" class="col-md">VIDEO</li>
                </ul>
            </div>
            <div class="shuffle">
                 <div class="row ">
                    <div class="col-md">
                        <img class="logo" src="images/features/images.jpg" alt="pic.1">
                    </div>
                    <div class="col-md">
                        <img class="logo" src="images/features/images2.jpg" alt="pic.2">
                    </div>
                    <div class="col-md">
                        <img class="online-marketing" src="images/features/images3.jpg" alt="pic.3">
                    </div>
                    <div class="col-md">
                        <img class="graphic-design" src="images/features/images4.jpg" alt="pic.4">
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md">
                        <img class="graphic-design" src="images/features/images5.jpg" alt="pic.5">
                    </div>
                    <div class="col-md">
                        <img class="online-marketing" src="images/features/images6.jpeg" alt="pic.6">
                    </div>
                    <div class="col-md">
                        <img class="website" src="images/features/images7.jpg" alt="pic.7">
                    </div>
                    <div class="col-md">
                        <img class="video" src="images/features/images8.jpg" alt="pic.8">
                    </div>
                </div>
            </div>
        </section> -->
     <!--end our featured work-->
     <!--start our Latest Post-->
        <!-- <section class="latest-post ">
            <div class="container">
                <h2 class="h1 text-center">Latest Post</h2>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.</p>
           start grid system-->
                <!-- <div class="row">
                    <div class="col-md">
                        <div class="card  wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="30 " >
                            <img class="card-img-top" src="images/posts/3.jpg" alt="pic.1">
                            <div class="card-body">
                                <h5 class="card-title">How latest technologies changing people's life</h5>
                                <h6 class="card-subtitle mb-2 text-muted">November 23, 2020</h6>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.</p>
                                <a class="card-link" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card  wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="30 " data-wow-delay="0.4s">
                            <img class="card-img-top" src="images/posts/2.jpg" alt="pic.1">
                            <div class="card-body">
                                <h5 class="card-title">5 Thing to know before you start new blog</h5>
                                <h6 class="card-subtitle mb-2 text-muted">November 23, 2020</h6>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.</p>
                                <a class="card-link" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card  wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="30 " data-wow-delay=".6s">
                            <img class="card-img-top" src="images/posts/1.jpg" alt="pic.1">
                            <div class="card-body">
                                <h5 class="card-title">2020 is the year of startups are you for it</h5>
                                <h6 class="card-subtitle mb-2 text-muted">November 23, 2020</h6>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.</p>
                                <a class="card-link" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            end grid system-->
            <!-- </div>
        </section> --> 
     <!-- end our Latest Post -->
        
     <!--start our testimonial-->
        <section class="testimonial">
            <div class="overlay"></div>
                <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                  </ol>
                <div class="container">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="carousel-caption d-block ">
                        <img src="images/testimonial/0 (1).jpg" class="rounded-circle" alt="pic.1">
                        <h5>JONSON IBRAHAM</h5>
                        <span>Company CEP </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="carousel-caption d-block ">
                        <img src="images/testimonial/0.jpg" class="rounded-circle" alt="pic.2">
                        <h5>CHARLIZ DECEN</h5>
                        <span>Company URL</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="carousel-caption d-block ">
                        <img src="images/testimonial/thumb@2x.jpg" class="rounded-circle" alt="pic.3">
                        <h5>RAHAF ILOL</h5>
                        <span>Company Nasa</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.</p>
                      </div>
                    </div>
                  </div>
              </div>
              <a class="carousel-control-prev hidden-left" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left fa-2x"></i></span>
                    <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next hidden-right" href="#carouselExampleCaptions" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right fa-2x"></i></span>
                 <span class="sr-only">Next</span>
              </a>
            </div>
        </section>
     <!--end our testimonial-->
        
     <!--start our pricing table-->
        <section class="pricing-table text-center">
            <div class="container">
                <h2 class="h1">Latest Post</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.</p>
           <!--start grid system-->
           <div class="cat-box">
                <div class="row ">
                <?php 
                $i = 0;
                while($data = mysqli_fetch_assoc($op)){
                $discountPrice = $data['price'] * ($data['discount'] / 100);
                $totalPrice = $data['price'] - $discountPrice;
                // submit form for quantity...
                ?>
                    <!-- category products... -->
                    <div class="col-6 col-lg-4 col-xl-3 pb-3">
                        <figure class="card border-0 text-left wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="30" wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-offset="30" data-wow-delay="<?php echo $i += 0.2;?>s">
                            <div class="image" style="width:100% ;">
                                <img src="<?php echo url('product/uploads/').$data['img']?>"  alt="image">
                            </div>
                            <div class="px-3">
                                <h5 class="card-title"><?php echo $data['name']?></h5>
                                <h5 class="card-title"><?php echo $data['description']?></h5>
                                <?php if ($data['discount'] != 0) {?>
                                <h4 class="card-text font-weight-bold">EGP <span class="font-weight-bold text-dark"><?php echo $totalPrice ?></span></h4>
                                <p class="card-text"><span class="text-uppercase">egp <?php echo $data['price']?> </span><span class="green font-weight-bold"> <?php echo $data['discount']?>% off</span></p>
                                <?php }else{?>
                                <h4 class="card-text font-weight-bold">EGP <span class="font-weight-bold text-dark"><?php echo $data['price'] ?></span></h4>

                                <?php }?>
                            </div>
                        </figure>
                    </div>
                    <?php }?>
                </div>
            </div>
            <!--end grid system-->
            </div>
        </section>
     <!--end our pricing table-->
        
     <!--start our choose us-->
        <section class="choose-us">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-xs-12 wow animate__animated animate__fadeInLeft" data-wow-duration="1s" data-wow-offset="30 ">
                       <img src="./images/header.jpg" alt="background"> 
                    </div>
                    <div class="col-lg-6 col-xs-12 wow animate__animated animate__fadeInRight" data-wow-duration="1s" data-wow-offset="30 ">
                        <h2 class="h1">Why Choose Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn btn-primary">view more</a>
                    </div>
                </div>
            </div>
        </section>
     <!--end our choose us-->
     <!--start our statistics-->
        <section class="stats text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 stat-box">
                        <i class="fas fa-suitcase fa-3x"></i>
                        <h2>3,329</h2>
                        <p>PROJECTS</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 stat-box">
                        <i class="fas fa-user fa-3x"></i>
                        <h2>156,789</h2>
                        <p>CUSTOMERS</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 stat-box">
                        <i class="fas fa-coffee fa-3x"></i>
                        <h2>13,222</h2>
                        <p>CUSTOMERS</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 stat-box">
                        <i class="fas fa-download fa-3x"></i>
                        <h2>9,623,689</h2>
                        <p>APP DOWNLOAD</p>
                    </div>
                </div>
            </div>
        </section>
     <!--end our statistics--> 
     <!--start our contact us--> 
        <section class="contact-us text-right">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 ">
                        <p>You think we're cool? let's work together</p>
                    </div>
                    <div class="col-lg-3 ">
                        <a href="#">contact us</a>
                    </div>
                </div>
            </div>
        </section>
     <!--end our contact us--> 
     <!--start our footer-->
        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="site-info">
                            <h2>JEWELRY</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, ut labore et dolore magna aliqua. Ut enim ad minim veniam. quis nostrud exercitation ullamco laboris commodo conse.</p>
                            <a href="#"><i class="fas fa-chevron-circle-right "></i> Read more</a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="links">
                            <h2>Helpful Links</h2>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-chevron-right"></i><a href="#">About</a></li>
                                        <li><i class="fas fa-chevron-right"></i><a href="#">Portfolio</a></li>
                                        <li><i class="fas fa-chevron-right"></i><a href="#">Team</a></li>
                                        <li><i class="fas fa-chevron-right"></i><a href="#">Pricing</a></li>
                                        <li><i class="fas fa-chevron-right"></i><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-chevron-right"></i><a href="#">FAQ</a></li>
                                        <li><i class="fas fa-chevron-right"></i><a href="#">Blog</a></li>
                                        <li><i class="fas fa-chevron-right"></i><a href="#">How It Works</a></li>
                                        <li><i class="fas fa-chevron-right"></i><a href="#">Benefits</a></li>
                                        <li><i class="fas fa-chevron-right"></i><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                           </div>
                       </div>
                    </div> 
                   
                    <div class="col-lg-3">
                        <div class="contact">
                            <h2>Contact Us</h2>
                            <ul class="list-unstyled">
                                <li>54958 Levo Road Near Red Fort, U.S</li>
                                <li>Phone: 012-12345678</li>
                                <li>Email: <a href="mailto:info@elitecorp.com?subject=contact">info@elitecorp.com</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
     <!--end our footer--> 
        
     <!--start our copyright--> 
        <section class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col  text-left text-uppercase">
                        copyright &copy; 2020 elitecorp | all rights reserved
                    </div>
                    <div class="col text-right">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
<?php require_once 'helpers/footer.php';?>