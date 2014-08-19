<?php
header('Content-Type: text/json');
$output = array();

if (!empty($_POST) && !empty($_POST['contact_email']) && !empty($_POST['contact_subject']) && !empty($_POST['contact_message'])) {
	# Get the e-mail address to send the message (from, to)
	$to = get_option('wpmob_app_contact_us_address');
	if ($to) {
		if (filter_var($_POST['contact_email'], FILTER_VALIDATE_EMAIL) !== FALSE) {
			$name = $_POST['contact_name'];
			$email = $_POST['contact_email'];
			$subject = get_option('wpmob_app_contact_us_subject') . " [$name] ". $_POST['contact_subject'];
			$msg = wpautop(get_option('wpmob_app_contact_us_body')) . $_POST['contact_message'];

			$fromName = get_bloginfo();

			$headers = array();
			$headers[] = "From: {$fromName}<{$to}>";
			$headers[] = "Reply-To: {$email}";
			add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
			if (wp_mail($to, $subject, $msg, $headers)) {
				$output[] = array('type' => 'success', 'msg' => wpautop(stripslashes(get_option('wpmob_app_contact_us_conf'))));
			} else {
				$output[] = array('type' => 'error', 'msg' => __('Sorry, the e-mail could not been sent!', 'wpmob-contact-us'));
			}
		} else {
			$output[] = array('type' => 'error', 'msg' => __('Sorry, the e-mail address seems invalid!', 'wpmob-contact-us'));
		}
	} else {
		$output[] = array('type' => 'success', 'msg' => __('There is no recipient configured in the App.', 'wpmob-contact-us'));
	}
} else {
	$output[] = array('type' => 'error', 'msg' => __('Sorry, there are missing parameters.', 'wpmob-contact-us'));
}
echo json_encode($output);
?>