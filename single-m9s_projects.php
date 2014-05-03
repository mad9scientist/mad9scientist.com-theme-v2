<?php
/*
	Custom Post Type Template
	Single Post for Project
*/

Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article class="article-wrap" role="main">

	<header>
		<?php 
			# Get Custom Fields
			$custom = get_post_custom($post->ID);

			# Project Logo
			$logo = $custom['m9s_project_img'][0];
			if(!empty($logo)){
				echo "<img class=\"project-master-logo\" src=\"$logo\" />";
			}

		?>
		<h1><?php the_title(); ?></h1>
		<p class="metadata">
			<time datetime="<?php the_time('c'); ?>" pubdate>Started: <?php the_date('F Y'); ?></time>			
		</p>		
		<div class="meta">
		<?php 
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
	</header>

	<?php the_content(); ?>			

</article>
	
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>