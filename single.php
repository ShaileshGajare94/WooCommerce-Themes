<?php
get_header();
?>

<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title"><?php echo get_the_title(); ?></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
           
			<div class="page-content">
                <div class="container">
                	<div class="row">
					<div class="col-lg-9">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'woothemes' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'woothemes' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div>
		<aside class="col-lg-3">
		<div class="sidebar">
                				<div class="widget widget-search">
                                    <h3 class="widget-title">Search</h3><!-- End .widget-title -->

                                    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                                    <label for="s" class="sr-only">Search in blog</label>
                                    <input 
                                        type="search" 
                                        class="form-control" 
                                        name="s" 
                                        id="s" 
                                        placeholder="Search in blog" 
                                        value="<?php echo get_search_query(); ?>" 
                                        required
                                    >
                                    <button type="submit" class="btn">
                                        <i class="icon-search"></i>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </form>
                                                                </div><!-- End .widget -->

                                <div class="widget widget-cats">
                                    <h3 class="widget-title">Categories</h3><!-- End .widget-title -->
                                    <?php
                                        // Get all categories
                                        $categories = get_categories();

                                        // Check if categories exist
                                        if ( ! empty( $categories ) ) :
                                        ?>
                                            <ul>
                                                <?php
                                                foreach ( $categories as $category ) :
                                                ?>
                                                    <li>
                                                        <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                                                            <?php echo esc_html( $category->name ); ?>
                                                            <span><?php echo intval( $category->count ); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php
                                        endif;
                                        ?>
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                                    <?php
                                            // Query for the latest posts
                                            $recent_posts = new WP_Query( array(
                                                'posts_per_page' => 3, // Number of posts to display
                                                'post_status'    => 'publish', // Only show published posts
                                            ) );

                                            // Check if there are any posts
                                            if ( $recent_posts->have_posts() ) :
                                            ?>
                                                <ul class="posts-list">
                                                    <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                                                        <li>
                                                            <figure>
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php 
                                                                    // Check if the post has a featured image
                                                                    if ( has_post_thumbnail() ) : 
                                                                        the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title() ) ); // Display the post thumbnail
                                                                    else : 
                                                                    ?>
                                                                        <img src="path/to/default-image.jpg" alt="Default Post Image">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </figure>
                                                            <div>
                                                                <span><?php echo get_the_date(); ?></span>
                                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            </div>
                                                        </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            <?php
                                            // Reset post data after custom query
                                            wp_reset_postdata();
                                            endif;
                                            ?>

                                </div><!-- End .widget -->

                              

                                <div class="widget">
                                    <h3 class="widget-title">Browse Tags</h3><!-- End .widget-title -->
                                        <?php
                                            // Get all tags
                                            $tags = get_tags();

                                            // Check if there are tags available
                                            if ( ! empty( $tags ) ) :
                                            ?>
                                                <div class="tagcloud">
                                                    <?php
                                                    foreach ( $tags as $tag ) :
                                                        // Display each tag as a link
                                                    ?>
                                                        <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
                                                            <?php echo esc_html( $tag->name ); ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php
                                            endif;
                                            ?>              
                                </div><!-- End .widget -->

                			</div><!-- End .sidebar -->
		</aside>
		</div>
		</div>
		</div>
	</main><!-- #main -->

<?php

get_footer();
