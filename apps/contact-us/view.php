<div>
	<div class="wpmob-contact-us">
		<div class="wpmob-contact-us-answer">
		</div>
		<form action="<?php echo site_url(); ?>/index.php" method="post" enctype="multipart/form-data">
			<?php 
			$form_name = get_option($this -> appID . '_form_name');
			$form_email = get_option($this -> appID . '_form_email'); 
			$form_subject = get_option($this -> appID . '_form_subject');
			$form_msg = get_option($this -> appID . '_form_message');
			$form_submit = get_option($this -> appID . '_form_submit');
			?>
			<input type="hidden" id="wpmobapp" name="wpmobapp" value="WPMobAppContactUs" />
			<input type="hidden" id="action" name="action" value="sendmail" />
			<input type="text" id="contact_name" name="contact_name" <?php echo $form_name['required']?'required':'';?> placeholder="<?php echo ($form_name['required']?'* ':'').$form_name['placeholder'] ?>" value="<?php echo stripslashes($form_name['default']) ?>"/><br/>
			<input type="email" id="contact_email" name="contact_email" <?php echo $form_email['required']?'required':'';?> placeholder="<?php echo ($form_email['required']?'* ':'').$form_email['placeholder'] ?>" value="<?php echo stripslashes($form_email['default']) ?>"/><br/>
			<input type="text" id="contact_subject" name="contact_subject" <?php echo $form_subject['required']?'required':'';?> placeholder="<?php echo ($form_subject['required']?'* ':'').$form_subject['placeholder'] ?>" value="<?php echo stripslashes($form_subject['default']) ?>"/><br/>
			<textarea id="contact_message" name="contact_message" <?php echo $form_msg['required']?'required':'';?> placeholder="<?php echo ($form_msg['required']?'* ':'').$form_msg['placeholder'] ?>"><?php echo stripslashes($form_msg['default']) ?></textarea><br/>
			<input type="submit" id="contact_submit" name="contact_submit" placeholder="<?php echo $form_submit['placeholder'] ?>" value="<?php echo stripslashes($form_submit['label']) ?>"/><br/>
		</form>
		<script type="text/javascript">
			/**
			 * Register the content refresh function to be called every 
			 * time the content is displayed.
			 */ 
			window['<?php echo $this -> appID ?>_refresh'] = function(){
				wpmobContactUsRefresh();
			}
		</script>		
	</div>
</div>