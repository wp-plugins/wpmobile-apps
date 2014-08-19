<style type="text/css">
	div.wrap.device-theme-switcher-settings table td {
		padding: 0 5px 0 5px;
	}
	div.wrap.device-theme-switcher-settings select {
	}
	.optional-settings-toggle, .help-and-support-toggle {
		font-size: 0.9em;
		outline: none;
	}
	.optional-settings, .help-and-support {
		max-width: 850px;
		display: none; /* We'll enable this via JavaScript */
	}
</style>            
<div class="wrap device-theme-switcher-settings">
    <div id="icon-themes" class="icon32"><br></div>
    <h2>
    	<?php _e('Device Themes', 'wpmob') ?><br/><br/>
    </h2>
    <form method="post" action="#">
        <table>
            <tr>
                <th scope="row" align="right" width="150px">
                    <label for="wpmob_handheld_theme"><?php _e("Handheld Theme", "wpmob") ?></label>
                </th><td>
                    <select name="wpmob_theme[wpmob_handheld_theme]">
                        <?php foreach ($available_themes as $theme){ ?>
                            <option value="<?php echo build_query($theme)?>" <?php selected($theme['name'], $themes['handheld']['name']) ?>><?php echo $theme['name'] ?> &nbsp; </option>
                        <?php } ?>
                    </select>
                </td>
                <td><span class="description"> <?php _e("Devices like iPhone, Android, BlackBerry...", "wpmob") ?></span></td>                 
            </tr><tr>
                <th scope="row" align="right">
                    <label for="wpmob_tablet_theme"><?php _e("Tablet Theme", "wpmob") ?> </label>
                </th><td>
                    <select name="wpmob_theme[wpmob_tablet_theme]">
                        <?php foreach ($available_themes as $theme){ ?>
                            <option value="<?php echo build_query($theme)?>" <?php selected($theme['name'], $themes['tablet']['name']) ?>><?php echo $theme['name'] ?> &nbsp; </option>
                        <?php } ?>
                    </select>
                </td>
                <td><span class="description"> <?php _e("Tablet devices like iPad, Galaxy Tab, Kindle Fire...", "wpmob") ?></span></td>
            </tr><tr>
                <th scope="row" align="right">
                    <a href="#" class="optional-settings-toggle"><?php _e("Show Optional Settings", "wpmob") ?></a> 
                </th><td colspan="2"></td>
            </tr>
        </table>
        <div class="optional-settings">
            <table>
                <tr>
                    <th scope="row" align="right"valign="top">
                        <label for="wpmob_cookie_lifespan"><?php _e("Cookie Lifespan", "wpmob") ?> </label>
                    </th><td valign="top">
                    <?php
					//Build a list of default cookie lifespans
					$wpmob_cookie_lifespans = array();
					$wpmob_cookie_lifespans[] = array('value' => 0, 'text' => __("When the browser is closed (Default)", "wpmob"));
					$wpmob_cookie_lifespans[] = array('value' => 900, 'text' => __("15 Minutes", "wpmob"));
					$wpmob_cookie_lifespans[] = array('value' => 1800, 'text' => __("30 Minutes", "wpmob"));
					$wpmob_cookie_lifespans[] = array('value' => 2700, 'text' => __("45 Minutes", "wpmob"));
					$wpmob_cookie_lifespans[] = array('value' => 3600, 'text' => __("60 Minutes", "wpmob"));
					$wpmob_cookie_lifespans[] = array('value' => 4500, 'text' => __("75 Minutes", "wpmob"));
					$wpmob_cookie_lifespans[] = array('value' => 5400, 'text' => __("90 Minutes", "wpmob"));
					?>
                        <select name="wpmob_cookie_lifespan"><?php
                            foreach ($wpmob_cookie_lifespans as $lifespan) { ?>
                            <option value="<?php echo $lifespan['value'] ?>" <?php selected($cookie_lifespan, $lifespan['value']) ?>><?php echo $lifespan['text'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
						<span class="description">
                            <?php _e("Length of time until a user is redirected back to their initial device theme after they've requested the 'Desktop' Version.", "wpmob") ?><br />
                        </span>
                    </td>                 
                </tr>
            </table>
        </div>
        <table>
            <tr>
                <th scope="row" align="right" width="150px">
                    <input type="hidden" name="wpmob_settings_update" value="true" />
                    <input type="submit" value="<?php _e("Save Settings", "wpmob") ?>" class="button button-primary" /> 
                </th></td colspan="2"></td>
            </tr>
        </table>
    </form>
    <script type="text/javascript">
		jQuery('.optional-settings-toggle').click(function() {
			oThis = jQuery(this);
			console.log(oThis);
			jQuery('.optional-settings').slideToggle(500, function() {
				console.log(this);
				if (jQuery(this).is(':visible')) {
					oThis.text('<?php _e('Hide Optional Settings', 'wpmob')?>');
				} else {
					oThis.text('<?php _e('Show Optional Settings', 'wpmob')?>');
				}
			});
		});
    </script>
</div>