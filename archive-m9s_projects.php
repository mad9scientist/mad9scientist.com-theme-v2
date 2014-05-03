<?php 
/*
	Custom Post Type Template
	Archives for Projects CPT
*/

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="article-wrap" role="main">
<?php if ( have_posts() ): ?>

<h1> Projects and Code </h1>

<?php while ( have_posts() ) : the_post(); ?>

<article>
	<?php 
		# Get Custom Fields
		$custom = get_post_custom($post->ID);

		# Project Logo
		$logo = $custom['m9s_project_img'][0];
		if(!empty($logo)){
			echo "<img class=\"project-logo\" src=\"$logo\" />";
			echo "<div class=\"proj-img-spacer\">";
		}
	?>
	
	<h2>
		<?php the_title(); ?>
	</h2>
	<?php the_excerpt(); ?>
	<div class="meta">
	<?php 
		# Project Page
		echo "<span class=\"proj-home\"><a href=\"". get_permalink() ."\">Project Home</a></span>";

		# Repo
		$repo = $custom['m9s_repo_link'][0];
		if(!empty($repo)){
			echo '<span class="repo">';
			if(preg_match('/github/', $repo)){
				echo "<a href=\"$repo\" class=\"github\">GitHub Repo</a>";
			}elseif (preg_match('/bitbucket/', $repo)) {
				echo "<a href=\"$repo\" class=\"bitbucket\">BitBucket Repo</a>";
			}else{
				echo "<a href=\"$repo\">Code Repo</a>";
			}
			echo "</span>";
		}

		# Demo URL
		$demo = $custom['m9s_demo_url'][0];
		if(!empty($demo)){
			echo "<span class=\"demo\"><a href=\"$demo\">Demo Project</a></span>";			
		}

		# License
		$license = $custom['m9s_license_type'][0];
		if(!empty($license)){			
			echo "<span class=\"license\"> License: $license</span> ";
		}
	?>
	</div>
	<?php if(!empty($logo)){ echo "</div>"; } ?>
</article>
<?php endwhile; ?>

<?php if( next_posts_link() || previous_posts_link() ){ ?>
<div class="pagination">
	<?php next_posts_link('<div class="next-posts button">&laquo; Older Articles</div>') ?>
	<?php previous_posts_link('<div class="prev-posts button">Newer Articles &raquo;</div>') ?>
</div>
<?php } ?>

<?php else: ?>
<h2>Empty Archive</h2>	
<p> Nothing was Found or Published for this Archived. </p>
<?php endif; ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>