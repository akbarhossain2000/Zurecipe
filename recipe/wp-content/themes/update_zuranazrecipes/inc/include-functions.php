<?php

function wp_list_categories_for_post_type($post_type, $args = '') {
	$exclude = array();
	global $zuranaz_recipe;
	// Check ALL categories for posts of given post type
	foreach (get_categories() as $category) {
		$posts = get_posts(array('post_type' => $post_type, 'category' => $category->cat_ID));

		// If no posts found, ...
		if (empty($posts) || $category->cat_ID == 1 || $category->cat_ID == $zuranaz_recipe['category-one'])
			// ...add category to exclude list
			$exclude[] = $category->cat_ID;
	}

	// Set up args
	if (! empty($exclude)) {
		$args .= ('' === $args) ? '' : '&';
		$args .= 'exclude='.implode(',', $exclude);
	}

	// List categories
	wp_list_categories($args);
}



/**
 * Show Recent Comments
 *
 * @author deelko
 * @link http://deelko.com 
 *
 * @param string/integer $no_comments
 * @param string/integer $comment_len
 * @param string/integer $avatar_size
 * 
 * @echo string $comm
 */
function bpost_recent_comments($no_comments = 5, $comment_len = 80, $avatar_size = 48) {
	$comments_query = new WP_Comment_Query();
	$comments = $comments_query->query( array( 'number' => $no_comments ) );
	$comm = '';
	if ( $comments ) : foreach ( $comments as $comment ) :
		$comm .= '<li class="recentcomments">';
		$comm .= '<span class="comment-author-link">';
		$comm .= get_avatar( $comment->comment_author_email, $avatar_size );
		$comm .= get_comment_author( $comment->comment_ID );
		$comm .= '</span> on ';
		$comm .='<a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
		$comm .= wp_trim_words(get_the_title( $comment->comment_post_ID ), 3, ' .... ' ). ':</a> ';
		$comm .= '<p>' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . '...</p></li>';
	endforeach; else :
		$comm .= 'No comments.';
	endif;
	echo $comm;	
}

?>