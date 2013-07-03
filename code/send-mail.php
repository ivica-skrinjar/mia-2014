<?php
const EMAIL = 'mia2014@math.hr';
#const EMAIL = 'robi_petranovic@yahoo.com';
#2014.mia-journal.com
$errors = array();
$mail_status = NULL;
$name = $email = $organization = "";

if (isset($_POST['registration'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$organization = $_POST['organization'];

	if (strlen($name) === 0)
		$errors['name'] = 'Please enter your name.';
	else if (!preg_match("/[a-z ]/i", $name))
		$errors['name'] = 'Name must contain only letters and spaces.';

	if (strlen($email) === 0)
		$errors['email'] = 'Please enter your E-mail address.';
	else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		$errors['email'] = 'You entered invalid E-mail address.';

	if (strlen($organization) === 0)
		$errors['organization'] = 'Please enter your organization\'s name.';
		
	if (count($errors) === 0) {
		$body = <<<EOF
Name: $name
E-mail: $email
Organization: $organization
EOF;
		
		$mail_status = mail(EMAIL, "Registration for MIA-2014.", $body, "From: $email\r\n");
	}
}	