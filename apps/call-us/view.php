<div class="wpmob-call-us">
	<div class="wpmob-call-us-phone">
	<?php 
	echo stripslashes(get_option($this -> appID . '_phone'));
	?>
	<div>
		<?php if(get_option($this -> appID . '_phone')): ?>
		<a class="wpmob-call-now" href="tel:<?php echo stripslashes(get_option($this -> appID . '_phone'));?>" target="_self"><?php _e('Call Now', 'wpmob-call-us')?></a>
		<?php else: ?>
		<a class="wpmob-call-now" href="#" target="_self"><?php _e('No phone set yet', 'wpmob-call-us')?></a>
		<?php endif ?>
	</div>
	</div>
	<script type="text/javascript">
		/**
		 * Register the content refresh function to be called every 
		 * time the content is displayed.
		 */ 
		window['<?php echo $this -> appID ?>_refresh'] = function(){
			wpmobCallUsRefresh();
		}
	</script>
</div>