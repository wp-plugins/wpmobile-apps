<?php
# Instantiate the app classes
$apps = array();
foreach ($this->appClasses as $appClass) {
	$app = new $appClass();
	$apps[($pos = get_option($app -> appID . '_order'))? $pos : count($app)] = $app;
}
ksort($apps);
?>
<div id="bottomtoolbar" style="display: none;">
	<div id="pinasmenubox" class="pinasmenubox">
		<div class="toolbar-carousel">
			<?php foreach($apps as $app):?>
			<div class="item wpmob-app-icon">
				<a class="wpmob-icon" rel="<?php echo $app -> appID; ?>" href="<?php echo get_option($app -> appID . '_slug'); ?>"> <i class="<?php echo get_option($app -> appID . '_text_icon'); ?>"></i><span class="icontext"><?php echo stripslashes(get_option($app -> appID . '_label')); ?></span> </a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<div id="wpmob-apps-content" style="display: none;">
	<?php
	foreach ($apps as $app) {
		echo "<div id='{$app -> appID}' class='wpmob-app-content'>";
		$app -> render();
		echo "</div>";
	}
	?>
</div>