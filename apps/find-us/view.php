<div>
	<div class="wpmob-find-us">
		<div class="wpmob-find-us-address">
			<?php echo wpautop(stripslashes(get_option($this -> appID . '_address'))); ?>
		</div>
		<div id="wpmob-google-map"></div>
		<script type="text/javascript">
			window.lat = <?php echo ($lat = get_option($this -> appID . '_lat'))?$lat:0; ?>;
			window.lng = <?php echo ($lng = get_option($this -> appID . '_long'))?$lng:0; ?>;
			/**
			 * Register the content refresh function to be called every 
			 * time the content is displayed.
			 */ 
			window['<?php echo $this -> appID ?>_refresh'] = function(){
				wpmobFindUsRefresh();
			}
		</script>
	</div>
</div>