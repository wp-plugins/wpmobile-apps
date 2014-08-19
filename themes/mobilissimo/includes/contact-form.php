<?php 

if($_POST['submitted']){
	$emailTo = get_option('now_contact_form_mail');
	if (!isset($emailTo) || ($emailTo == '') ){
		$emailTo = get_option('admin_email');
	}
	$name = $_POST['contact-name'];
	$email = $_POST['e-mail'];
	$comments = $_POST['text'];

	if (get_option('now_contact_form_subject')) {
		$subject = str_replace(array("%sender_name%", "%sender_email%"), array($name, $email), get_option('now_contact_form_subject'));
	} else{
		$subject = '[Now] From '.$name;
	}

	if (get_option('now_contact_form_content')) {
		$body = str_replace(array("%sender_text%", "%sender_name%", "%sender_email%"), array($comments, $name, $email), get_option('now_contact_form_content'));
	} else{
		$body = "Name: $name \nE-mail: $email \n\nBody: $comments";
	}

	$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

	wp_mail($emailTo, $subject, $body, $headers);
	$emailSent = true;
}

?>

<form id="contact-form" action="<?php the_permalink(); ?>" method="post" class="full-width">
	<h3>Send us an e-mail!</h3>

	<?php if(isset($emailSent) && get_option('now_contact_form_dialog', 'false') == 'false'): ?>

	<div data-alert class="alert-box success radius">
		<?php if(get_option('now_contact_form_dialog_content')): ?>
		<?php echo stripslashes(get_option('now_contact_form_dialog_content')); ?>
		<?php else: ?>
		Your message was sent <strong>successfully!</strong>
		<?php endif; ?>
		<a href="#" class="close">&times;</a>
	</div>

	<?php endif; ?>
	
	<p>
		<label for="contact-name">Your Name <span class="mark-text">(Required)</span></label>

		<input type="text" name="contact-name" id="contact-name" required>
	</p>

	<p>
		<label for="e-mail">Your E-mail <span class="mark-text">(Required)</span></label>

		<input type="email" class="h5-email" name="e-mail" id="e-mail" required>
	</p>

	<p>
		<label for="text">Your Message <span class="mark-text">(Required)</span></label>

		<textarea name="text" id="text" cols="30" rows="10" required></textarea>
	</p>

	<input type="hidden" name="submitted" id="submitted" value="true" />

	<p>
		<button class="button radius" type="submit">Send</button>
		<input class="push-right push-small button radius secondary" type="reset" value="Reset">
	</p>
</form>