	
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
				Proudly Powered by 
				<a href="http://www.wordpress.org/" title="WordPress Platform">WordPress</a>
				 and 
				<a href="http://mdtm.pl/1kIpnmN" title="Buy some Hosting from MediaTemple!">(mt) MediaTemple</a>.
			</div>
			<div class="copyleft">
				Copyright <?=date('Y')?> Christopher A Holbrook. Most Rights Reserved. <a href="https://github.com/mad9scientist/mad9scientist.com-theme-v2/issues" title="Report an issue on GitHub">Report a Bug</a> &bull; <a href="/about/legal/" title="The super complex legal agreement between you and me.">Legal?</a>
			</div>
		</div>
	</div>
</footer>
