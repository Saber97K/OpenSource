<?php 
function validatePost($post)
{
	$errors = array();
	if(empty($post['title'])){
		array_push($errors, 'Title is required');
	}
	if(empty($post['body'])){
		array_push($errors, 'Body is required');
	}
	if(empty($post['topic_id'])){
		array_push($errors, 'Select a topic ');
	}

	$existingPost = selectPost($post['title']);
    if($existingPost){
    	if(isset($post['update-post']) && $existingPost['id'] != $post['id']){
    	array_push($errors, 'Title already exists');
    }
       if(isset($post['add-post']))
       {
       	array_push($errors, 'Title already exists');
       }
        }
	return $errors;
}

function validateTopic($topic)
{
	$errors = array();
	if(empty($topic['topic_name'])){
		array_push($errors, 'Title is required');
	}
	$existingTopic = selectTopic($topic['topic_name']);
    if($existingTopic){
		
    	if(isset($topic['update-topic']) && $existingTopic['id'] != $topic['id']){
    	array_push($errors, 'Title already exists');
		}
       if(isset($topic['add-topic']))
		{
			
       	array_push($errors, 'Title already exists');
		}
	}
	return $errors;
}