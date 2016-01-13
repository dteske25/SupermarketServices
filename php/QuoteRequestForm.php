<?php

	$errors = array();

	// Check if name has been entered
	if (!isset($_POST['name'])) {
		$errors['name'] = 'Please enter your name.';
	}

	if (!isset($_POST['address'])) {
		$errors['address'] = 'Please enter your address.';
	}

	if (!isset($_POST['city'])) {
		$errors['city'] = 'Please enter your city.';
	}

	if (!isset($_POST['state'])) {
		$errors['state'] = 'Please enter your state.';
	}

	if (!isset($_POST['zip'])) {
		$errors['zip'] = 'Please enter your zip';
	}

	if (!isset($_POST['country'])) {
		$errors['country'] = 'Please enter your country';
	}

	if (!isset($_POST['phone'])) {
		$errors['phone'] = 'Please enter your phone';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Please enter a valid email address.';
	}


	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}



	$name = $_POST['name'];
	$email = $_POST['email'];
	$from = $email;
	$to = 'dteske25@gmail.com';  // please change this email id
	$subject = 'Testing Contact Forms';

	$message =

	$body = "From: $name\n E-Mail: $email\n Message:\n $message";


	//send the email
	$result = '';
	if (mail ($to, $subject, $body)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Thank You! I will be in touch';
		$result .= '</div>';

		echo $result;
		die();
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Something bad happend during sending this message. Please try again later';
	$result .= '</div>';

	echo $result;
