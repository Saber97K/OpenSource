<?php 

function validateComment($comment)
{
	$errors = array();
	if(empty($comment['comment'])){
		array_push($errors, 'Comment is empty');
	}
	return $errors;
}