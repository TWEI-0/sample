<?php
/*
Template Name: Sitemap
Template Post Type: page
*/
?>
<div>
	<h1>サイトマップ<h1>
	<ul>
		<li><h2><a href="<?php echo home_url(); ?>">HOME</a><h2></li>

<?php
		$get_categories_args = array(
			'parent' => 0,
		);
		$categories = get_categories( $get_categories_args );
		foreach ( $categories as $category ) {
			show_child_category( $category, 1 );
		}
		function show_child_category( $parent_category, $depth ) {
			$category_link = get_category_link( $parent_category->cat_ID );
			echo "<li><h2><a href='$category_link'>$parent_category->name</a></h2></li>";
			echo "<p>$parent_category->description</p>";
			echo '<ul>';
			global $post;
			$posts = get_posts( 'numberposts=-1&category=' . $parent_category->cat_ID );
			foreach ( $posts as $post ) {
				setup_postdata($post);
				$post_category = get_the_category( $post->ID );
				if ( count( $post_category ) > $depth ) {
					continue;
				}
?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
			}
			$get_categories_args = array(
				'parent' => $parent_category->cat_ID,
			);
			$categories = get_categories( $get_categories_args );
			foreach ( $categories as $category ) show_child_category( $category, $depth + 1 );
			echo '</ul>';
		}
?>

		<li><h2>固定ページ</h2></li>
		<ul>
<?php
			wp_list_pages( 'title_li=' );
?>
		</ul>
	</ul>
</div>
