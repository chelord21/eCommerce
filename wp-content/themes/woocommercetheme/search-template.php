<?php
/*
Template Name: search template
*/
get_header(); ?>
		<p style="text-align: center;">Fill the next field to do a specific search of the products of your interest:</p><p style="text-align: center;">The search is case sensitive</p></br>

	<input id="searchbar" type="text" onkeyup="showResult(this.value)">	

<ul class="grid" id="livesearch">
</ul>

<?php 
	get_footer();
?>