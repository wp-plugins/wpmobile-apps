<div>
	<div class="wpmob-opening-hours">
	<?php 
	echo wpautop(stripslashes(get_option($this -> appID . '_desc')));
	?>
	</div>
	<script type="text/javascript">
		/**
		 * Register the content refresh function to be called every 
		 * time the content is displayed.
		 */ 
		window['<?php echo $this -> appID ?>_refresh'] = function(){
			wpmobOpeningHoursRefresh();
		}
	</script>
</div>