<?php 

/* Template Name: Shop Page */ 
get_header(); 
?>
<main class="main">
    
<div class="container">
    <div class="row">
        <h2>Best Selling</h2>
        <?php echo do_shortcode('[products columns="4" category="best-selling"]'); ?>

        <h2>Top Selling</h2>
        <?php echo do_shortcode('[products columns="4" category="top-rated"]'); ?>

        <h2>On Sale</h2>
        <?php echo do_shortcode('[products columns="4" category="on-sale"]'); ?>
    </div>
    </div>
</main>
<?php get_footer(); ?>