<?php
const EMAIL = 'ivica.skrinjar@gmail.com';

$errors = array();
$mail_status = NULL;
$title = $name = $email = $affiliation = $address = $telephone = $fax = $permition = $title_communication = $accompany = "";

if (isset($_POST['registration'])) {
	$title = $_POST['title'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$affiliation = $_POST['affiliation'];
	$address = $_POST['address'];
	$telephone = $_POST['telephone'];
	$fax = $_POST['fax'];
	$title_communication = $_POST['title_communication'];
	$accompany = $_POST['accompany'];
	$permition = $_POST['permition'];

	if (strlen($title) === 0)
		$errors['title'] = 'Please select title.';

	if (strlen($name) === 0)
		$errors['name'] = 'Please enter your name.';
	else if (!preg_match("/^[[:alpha:] ]+$/ui", $name))
		$errors['name'] = 'Name must contain only letters and spaces.';

	if (strlen($email) === 0)
		$errors['email'] = 'Please enter your E-mail address.';
	else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		$errors['email'] = 'You entered invalid E-mail address.';

	if (strlen($affiliation) === 0)
		$errors['affiliation'] = 'Please enter affiliation.';

	if (!is_numeric($telephone) && !empty($telephone))
		$errors['telephone'] = 'Please enter just numbers.';

	if (!is_numeric($fax) && !empty($fax))
		$errors['fax'] = 'Please enter just numbers.';


	if (strlen($permition) === 0)
		$errors['permition'] = 'Please enter permition.';

	if (count($errors) === 0) {
		$body = <<<EOF
Title: $title
Name: $name
E-mail: $email
EOF;

		$mail_status = mail(EMAIL, "Registration for MIA-2014.", $body, "From: $email\r\n");
	}
}
