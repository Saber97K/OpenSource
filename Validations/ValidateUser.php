<?php 


function validateUser($user)
{
	$errors = array();
	if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email required';
    }
	if(empty($user['role_id'])){
		array_push($errors, 'Select a role ');
	}
	if($user['password2'] !== $user['password']){
		array_push($errors, 'Passwords do not match');
	}
$existingUser = selectExistingEmail('users', $user['email']);
    if($existingUser){
      array_push($errors, 'email already exists');
        }

	return $errors;
}


function validateLogin($user)
{
	$errors = array();
	if(empty($user['username'])){
		array_push($errors, 'username is required');
	}
	if(empty($user['password'])){
		array_push($errors, 'password is required');
	}

	return $errors;
}
