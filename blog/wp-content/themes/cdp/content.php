<?php
/**
 * @package cdp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
        <div class="entry-meta">
			<?php cdp_posted_on(); ?>
        
            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                <span class="comments-link">
                    <img src="<?php echo get_template_directory_uri() . '/img/comment.png' ?>" title="Comment" id="comment-img"/>
                    <?php comments_popup_link( __( '', 'cdp' ), __( '1 ', 'cdp' ), __( '% ', 'cdp' ) ); ?>
                </span>
            <?php endif; ?>

            <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
                <?php
                    /* translators: used between list items, there is a space after the comma */
                    $categories_list = get_the_category_list( __( ' // ', 'cdp' ) );
                    if ( $categories_list && cdp_categorized_blog() ) :
                ?>
                <span class="cat-links">
                    <?php printf( __( ' %1$s', 'cdp' ), $categories_list ); ?>
                </span>
                <?php endif; // End if categories ?>

                <?php
                    /* translators: used between list items, there is a space after the comma */
                    $tags_list = get_the_tag_list( '', __( ', ', 'cdp' ) );
                    if ( $tags_list ) :
                ?>
                <span class="tags-links">
                    <?php printf( __( 'Tagged %1$s', 'cdp' ), $tags_list ); ?>
                </span>
                <?php endif; // End if $tags_list ?>
            <?php endif; // End if 'post' == get_post_type() ?>
        
        </div><!-- .entry-meta -->
        
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo the_post_thumbnail('post-thumbnail', array( 'class'	=> "link-img")); ?></a>
        
		<?php if ( 'post' == get_post_type() ) : ?>
		
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'cdp' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cdp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'cdp' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
