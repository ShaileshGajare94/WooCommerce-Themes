<?php 

/* Template Name: About Us */ 
get_header(); 
?>
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <?php $bannner_section = get_field('bannner_section');
                    $title = $bannner_section['title'];
                    $banner_image = $bannner_section['banner_image']; ?>
            <div class="container">
	        	<div class="page-header page-header-big text-center" style="background-image: url('<?php echo $banner_image['url']; ?>')">
        			<h1 class="page-title text-white"><?php echo $title; ?></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->
             <?php $mission_section = get_field('mission_section'); 
              $our_vision = $mission_section['our_vision'];
              $our_mission = $mission_section['our_mission'];
             
             ?>       
            <div class="page-content pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <?php echo $our_vision; ?>
                        </div><!-- End .col-lg-6 -->
                        
                        <div class="col-lg-6">
                            <?php echo $our_mission; ?>
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->

                    <div class="mb-5"></div><!-- End .mb-4 -->
                </div><!-- End .container -->
                <?php $who_we_are = get_field('who_we_are'); 
                 $description = $who_we_are['description'];
                $image1 = $who_we_are['image1'];
                $image2 = $who_we_are['image2'];
                $button_link = $who_we_are['button_link'];
                $button_title = $button_link['title'];
                $button_url = $button_link['url'];
                $button_target = $button_link['target'];
             ?> 
                <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <?php echo $description; ?>   
                                <a href="<?php echo $button_url ?>" target="<?php echo $button_target; ?>" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                                    <span><?php echo $button_title ?></span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .col-lg-5 -->

                            <div class="col-lg-6 offset-lg-1">
                                <div class="about-images">
                                    <img src="<?php echo $image1['url']; ?>" alt="" class="about-img-front">
                                    <img src="<?php echo $image2['url']; ?>" alt="" class="about-img-back">
                                </div><!-- End .about-images -->
                            </div><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light-2 pt-6 pb-6 -->
    <?php 
           $logo_section = get_field('logo_section'); 
          $description = $logo_section['description'];
         $logo = $logo_section['logo'];
       

    ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="brands-text">
                                <?php echo $description; ?>
                            </div><!-- End .brands-text -->
                        </div><!-- End .col-lg-5 -->
                        <div class="col-lg-7">
                            <div class="brands-display">
                                <div class="row justify-content-center"> 
                               <?php foreach($logo as $logo_img): ?>
                                    <div class="col-6 col-sm-4">
                                        <a href="#" class="brand">
                                            <img src="<?php echo $logo_img['image']['url']; ?>" alt="Brand Name">
                                        </a>
                                    </div><!-- End .col-sm-4 -->
                                 <?php endforeach; ?>       
                                   
                                </div><!-- End .row -->
                            </div><!-- End .brands-display -->
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->

                    <hr class="mt-4 mb-6">

                    <h2 class="title text-center mb-4">Meet Our Team</h2><!-- End .title text-center mb-2 -->
                    <?php 
           $team_member = get_field('team_member');      ?>

           
                    <div class="row">
                    <?php foreach($team_member as $team_info): 
                            $team_img = $team_info['image'];
                            $title = $team_info['title'];
                            $position = $team_info['position'];
                            $description = $team_info['description'];
                        ?>
                        <div class="col-md-4">
                            <div class="member member-anim text-center">
                                <figure class="member-media">
                                    <img src="<?php echo $team_img['url']; ?>" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="member-overlay-content">
                                            <h3 class="member-title"><?php echo $title; ?></h3><!-- End .member-title -->
                                            <p><?php echo $description; ?></p> 
                                         
                                        </div><!-- End .member-overlay-content -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title"><?php echo $position; ?></span></h3><!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-md-4 -->
                        <?php endforeach; ?>      
                     

                    </div><!-- End .row -->
                </div><!-- End .container -->

                <div class="mb-2"></div><!-- End .mb-2 -->

                <?php $testimonial_slider = get_field('testimonial_slider');      ?>

                <div class="about-testimonials bg-light-2 pt-6 pb-6">
                    <div class="container">
                        <h2 class="title text-center mb-3">What Customer Say About Us</h2><!-- End .title text-center -->

                        <div class="owl-carousel owl-simple owl-testimonials-photo" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "1200": {
                                        "nav": true
                                    }
                                }
                            }'>
                            <?php foreach($testimonial_slider as $testimonial_slider_info):
                                   $title = $testimonial_slider_info['title'];
                                    $image = $testimonial_slider_info['image'];
                                   $description = $testimonial_slider_info['description'];
                                   $position =  $testimonial_slider_info['position'];

                                
                                ?>
                            <blockquote class="testimonial text-center">
                                <img src="<?php echo $image['url']; ?>" alt="user">
                                <?php echo $description; ?>
                                 <cite>
                                   <?php echo $title; ?>
                                    <span><?php echo $position; ?></span>
                                </cite>
                            </blockquote><!-- End .testimonial -->
                            <?php endforeach; ?>            
                        </div><!-- End .testimonials-slider owl-carousel -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light-2 pt-5 pb-6 -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
<?php get_footer(); ?>