	
<footer>
	<div class="innerContainer">
		<div class="bio column">
			<h5>About Me</h5>
			<p>
				<?php echo get_transient('bio-ftlinks'); ?> 
				<a href="/about/">Read More &raquo;</a>
			</p>
		</div>
		<div class="ventures column">
			<h5>My Ventures</h5>
			<a href="//madscitech.com" class="mst">Mad Scientist Technologies</a>
			<a href="//staticookie.com" class="sc">StatiCookie</a>
			<a href="//jzscottmedia.com" class="jzsm">JZ Scott Media Production</a>
		</div>
		<div class="socialSites column">
			<h5>Other Digitally Homes</h5>
			<ul>
				<?php 
					echo get_transient('socialmedia-ftlinks');
				?>
			</ul>
		</div>
		<div class="friends column">
			<h5>Some of Great Places</h5>
			<ul>
				<?php 
					echo get_transient('shoutout-ftlinks');
				?> 
			</ul>
		</div>
		<div class="credits">
			<div class="powered">
				Proudly Powered by <a href="http://www.wordpress.org/">WordPress</a> and <a href="http://www.mediatemple.net/go/order/?refdom=mad9scientist.com">(mt) MediaTemple</a>.
			</div>
			<div class="copyleft">
				Copyright <?=date('Y')?> Christopher A Holbrook. Most Rights Reserved. <a href="/about/legal/">Legal?</a>
			</div>
		</div>
	</div>
</footer>
