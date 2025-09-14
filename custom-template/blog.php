<?php 

/* Template Name: Blog Page */ 
get_header(); 
?>
 <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Blog Classic<span>Blog</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Classic</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                        <?php
// Define arguments for the query
$args = array(
    'post_type'      => 'post', // Query for posts only
    'posts_per_page' => 3,    // Number of posts to display
    'orderby'        => 'date', // Order by date
    'order'          => 'DESC', // Show the latest posts first
    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1, // Get the current page number
);

// Instantiate WP_Query with the arguments
$query = new WP_Query($args);

// Start the loop
if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post(); // Set up post data
?>
        <article class="entry">
            <figure class="entry-media">
                <?php
                if (has_post_thumbnail()) {
                    // Display the post thumbnail with a specific size (e.g., 'medium')
                    the_post_thumbnail('full', array('class' => 'post-thumbnail'));
                }
                ?>
            </figure><!-- End .entry-media -->

            <div class="entry-body">
                <div class="entry-meta">
                    <span class="entry-author">
                        by <a href="#"><?php the_author(); ?></a>
                    </span>
                    <span class="meta-separator">|</span>
                    <a href="#"><?php echo get_the_date(); ?></a>
                    <span class="meta-separator">|</span>
                </div><!-- End .entry-meta -->

                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h2><!-- End .entry-title -->

                <div class="entry-cats">
                    <?php the_category(', '); ?>
                </div><!-- End .entry-cats -->

                <div class="entry-content">
                    <p><?php echo get_the_excerpt(); ?></p>
                    <a href="<?php echo get_permalink(); ?>" class="read-more">Continue Reading</a>
                </div><!-- End .entry-content -->
            </div><!-- End .entry-body -->
        </article><!-- End .entry -->
<?php
    endwhile;

    // Pagination
    $pagination_args = array(
        'total'        => $query->max_num_pages, // Total number of pages
        'current'      => max(1, get_query_var('paged')), // Current page
        'prev_text'    => '<i class="icon-long-arrow-left"></i> Prev', // Previous button text
        'next_text'    => 'Next <i class="icon-long-arrow-right"></i>', // Next button text
        'type'         => 'list', // Output pagination as a list
    );

    echo '<nav class="pagination">';
    echo paginate_links($pagination_args);
    echo '</nav>';

    // Reset post data after the loop
    wp_reset_postdata();
else :
    // If no posts found, display a message
    echo '<p>No posts found.</p>';
endif;
?>

                		</div><!-- End .col-lg-9 -->

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
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

         <?php get_footer(); ?>

       