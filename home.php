<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Athena
 */
get_header();
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main athena-blog" role="main">

        <?php if (have_posts()) : ?>



            <div class="col-sm-<?php echo (!is_active_sidebar('sidebar-right') ) ? '12' : '8'; ?>">
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

                <?php /* Start the Loop */ ?>
                <?php while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php if (get_post_thumbnail_id($post->ID)) : ?>
                            <div id="athena-posts-image">

                                <a href="<?php echo esc_url( get_permalink() ); ?>"> 
                                    <?php echo the_post_thumbnail('large'); ?>
                                </a> 
                                
                            </div>
                        <?php endif; ?>

                        <header class="entry-header">
                            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

                            <?php if ('post' === get_post_type()) : ?>
                                <div class="entry-meta">
                                    
                                    <div class="meta-detail">
                                        
                                        <span><span class="fa fa-calendar"></span> <?php echo athena_posted_on(); ?></span>
                                        
                                        <span class="author"><?php echo get_the_author() ? '<span class="fa fa-user"></span> ' . get_the_author() : ' '; ?></span>
                                    
                                        <span><?php echo get_comments_number() == 0 ? '<span class="fa fa-comment"></span> ' . __( 'No comments yet', 'athena' ) : get_comments_number() . ' Comments'; ?></span>

                                        <span><?php athena_entry_footer(); ?></span>

                                    </div>
                                    
                                    
                                </div><!-- .entry-meta -->
                            <?php endif; ?>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php echo wp_trim_words( get_the_content(), 50 ); ?>

                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'athena'),
                                'after' => '</div>',
                            ));
                            ?>
                        </div><!-- .entry-content -->
                        
                        <div class="continue-reading">
                            <a class="athena-button primary" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php _e( 'Continue Reading', 'athena' ); ?></a>
                        </div>

                        <footer class="entry-footer">
                            <?php //athena_entry_footer(); ?>
                        </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->
                <?php endwhile; ?>

                <?php echo paginate_links(); ?>

            <?php else : ?>

                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; ?>
        </div>

        <div class="col-sm-4" id="athena-sidebar">
            <?php get_sidebar(); ?>
        </div>            

    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>
