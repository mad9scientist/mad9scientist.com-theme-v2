<?php

	/*
		Custom Post Type Template
		M9S URL Redirector
		v. 0.0.3 (2013 March 25)
	*/

	if ( have_posts() ) while ( have_posts() ) : the_post();

	$urlPatter = "/http(s)?:\/\/\b[a-zA-Z0-9]{1,999}\b\.\w{2,4}/";
	
	$link = get_the_content();
	$link = trim($link);
	

	if(preg_match($urlPatter, $link)){
		header("location: $link");
	}else{
		echo "Error: Redirect Failed";
	}

	endwhile;