<?php
const EMAIL = 'mia-2014@math.hr';

$errors = array();
$mail_status = NULL;
$name = $email = $affiliation = $address = $telephone = $fax = $title_communication = $accompany = $permition = "";

if (isset($_POST['registration'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$affiliation = $_POST['affiliation'];
	$telephone = $_POST['telephone'];
	$fax = $_POST['fax'];
	$title_communication = $_POST['title_communication'];
	$accompany = $_POST['accompany'];
	$permition = $_POST['permition'];

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

	if (strlen($address) === 0)
		$errors['address'] = 'Please enter address.';

	if (strlen($affiliation) === 0)
		$errors['affiliation'] = 'Please enter affiliation.';

	if (strlen($telephone) === 0)
		$errors['telephone'] = 'Please enter telephone.';
	else if (!is_numeric($telephone))
		$errors['telephone'] = 'Please enter just numbers.';

	if (!is_numeric($fax) && !empty($fax))
		$errors['fax'] = 'Please enter just numbers.';

	if (strlen($title_communication) === 0)
		$errors['title_communication'] = 'Please enter your title of communication.';

	if (strlen($permition) === 0)
		$errors['permition'] = 'Please enter permition.';

	if (count($errors) === 0) {
		$body = <<<EOF
Name: $name
E-mail: $email
Organization: $organization
EOF;

		$mail_status = mail(EMAIL, "Registration for MIA-2014.", $body, "From: $email\r\n");
	}
}
