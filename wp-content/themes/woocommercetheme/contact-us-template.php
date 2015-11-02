<?php
/*
Template Name: Contact Us - Template
*/
get_header(); ?>

<article class="post">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<p style="text-align: center;">Please use the following form to get in touch with us:</p>

		<?php
			if(isset($_POST['submit'])) {
				// validation is made by html5 inputs
				$email_to = "toni.subotin@gmail.com";
				$email_from = "no-reply";
				$email_subject = get_option("blogname") . "Contact us form";

				$email_message = $_POST['contacts-name']. " sent you a message from:" . get_option("blogname") . "\n\n";
				$email_message .= "Details: " . "\n";
				$email_message .= "Name: " . $_POST['contacts-name'] . "\n";
				$email_message .= "E-mail: " . $_POST['contacts-email'] . "\n";
				$email_message .= "Subject: " . $_POST['contacts-subject'] . "\n";
				$email_message .= "Message: " . $_POST['contacts-message'] . "\n\n";


				// Sending the email
				$headers = 'From: '.$email_from."\r\n". 'Reply-To: '.$email_from."\r\n";
				wp_mail( $email_to, $email_subject, $email_message, $headers);

				echo "<p>Mail Successfully Sent</p>";
			}
		?>

		<form name="frmContact" role="form" method="post" id="frmContact">
			<div class="form-group">
				<label for="contacts-name">Name</label>
				<input type="text" class="form-control" id="contacts-name" name="contacts-name" required>
			</div>
			<div class="form-group">
				<label for="contacts-email">Email</label>
				<input type="email" class="form-control" id="contacts-email" name="contacts-email" required>
			</div>
			<div class="form-group">
				<label for="contacts-subject">Subject</label>
				<input type="text" class="form-control" id="contacts-subject" name="contacts-subject" required>
			</div>
			<div class="form-group">
				<label for="contacts-message">Message</label>
				<textarea class="form-control" rows="5" id="contacts-message" name="contacts-message" required></textarea>
			</div>
			<button type="submit" name="submit" id="submit" class="btn">Send</button>
		</form>

</article>

<?php 
	get_footer();
?>