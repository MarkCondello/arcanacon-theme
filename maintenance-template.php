<?php
/**
 * The maintenance template file
 *
 */

get_header(); 
?>
	<div style="height: 100vh; padding-top: 10vh; background-image: url('<?= get_template_directory_uri() . '/screenshot.png' ?>'); background-repeat: no-repeat; background-position: top; background-size: cover;">
		<div class="grid-x align-center">
		    <main class="main small-10 cell text-center" role="main">
 
				<i class="colour-white fal fa-alarm-clock fa-4x"></i>

				<h1 class="l-height-1 colour-white ff-super-bold m-y-1">Down for scheduled <br> maintenance. </h1>
				<p class="colour-white">For general enquiries, please email <a style=" text-decoration: underline;" href="mailto:arcanacon.orgs@gmail.com">here</a></p>														
		    </main>  
		</div>  
	</div> 
<?php get_footer(); ?>
<style>
	header.header {
		display: none;
	}
</style>