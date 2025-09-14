<?php 

/* Template Name: FAQ Page */ 
get_header(); 
?>
<main class="main">
<?php 
           $faq_header_banner = get_field('faq_header_banner');      ?>
        	<div class="page-header text-center" style="background-image: url('<?php echo $faq_header_banner['url']; ?>')">
        		<div class="container">
        			<h1 class="page-title">F.A.Q<span>Pages</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <?php $faq_section = get_field('faq_section');  

                 $section_title = $faq_section['section_title'];
                 $faq = $faq_section['faq'];
            ?>
            <div class="page-content">
                <div class="container">
                	<h2 class="title text-center mb-3"><?php echo $section_title; ?></h2><!-- End .title -->
        			<div class="accordion accordion-rounded" id="accordion-1">
                    <?php
                        $index =1;
                    foreach($faq as $faq_info): 
                        ?>
					    <div class="card card-box card-sm bg-light">
					        <div class="card-header" id="heading-<?php echo $index; ?>">
					            <h2 class="card-title">
					                <a role="button" data-toggle="collapse" href="#collapse-<?php echo $index; ?>"  aria-expanded="false" aria-controls="collapse-<?php echo $index; ?>" class="collapsed">
					                   <?php echo $faq_info['questions'];  ?>
					                </a>
					            </h2>
					        </div><!-- End .card-header -->
					        <div id="collapse-<?php echo $index; ?>" class="collapse" aria-labelledby="heading-<?php echo $index; ?>" data-parent="#accordion-1">
					            <div class="card-body">
                                <?php echo $faq_info['answer'];  ?>
					            </div><!-- End .card-body -->
					        </div><!-- End .collapse -->
					    </div><!-- End .card -->
                    <?php 
                    $index++;
                endforeach; ?>    
                    </div><!-- End .accordion -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->

      
        </main><!-- End .main -->
<?php get_footer(); ?>