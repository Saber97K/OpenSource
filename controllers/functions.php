<?php 
session_start();
    
require ROOT_PATH . "/controllers/database.php";
require ROOT_PATH . "/Validations/ValidateUser.php";
require ROOT_PATH . "/Validations/ValidatePost.php";
require ROOT_PATH . "/Validations/ValidateComment.php";


$errors = array();



$email = "";
$sname = "";
$fname = "";
$username = "";
$role_id = "";
$role_table = `role`;
$roles = selectAllroles();
$users = selectAllusers();

$title ="";
$body = "";
$image = "";
$postsTitle = "";
$totalPages = "";

$topics =  selectAlltopics();
$topic_name = "";



$per_page = 5; // Entries per page
$stmt = $conn->prepare("SELECT COUNT(*) as `count` FROM `posts`");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$totalEntries = $row['count'];
$totalPages = ceil($totalEntries / $per_page);
$pgnow = isset($_GET['page']) ? $_GET['page'] : 1 ;
$start = ($pgnow - 1) * $per_page;
$entries = $per_page;



$comment = "";

if(isset($_POST['add-comment']))
{

$errors = validateComment($_POST);

	if(count($errors) === 0){
        $author =  $_SESSION['id'];
        $post_id = $_POST['id'];
        $comment = $_POST['comment'];
        $time = date("Y-m-d H:i:s");
        $query = "INSERT INTO comments (user_id, post_id, time,text) VALUES ('$author', '$post_id','$time','$comment')";
        if ($conn->query($query) === TRUE) {
            $_SESSION['message'] ='Comment created successfully';
            $_SESSION['type'] ='success';
            header('location: ' . BASE_URL . '/single.php?id=' . $post_id);
            exit();
        } 
	} else{
		$id = $_POST['id'];
	}
}

$posts = getPublishedPosts($start , $entries);
if(isset($_GET['post_id'])) {
	$post = selectPostbyID($_GET['post_id']);
	$id = $post['id'];
	$title = $post['title'];
    $body = $post['description'];
    $image = $post['image'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
}

if (isset($_GET['search-term'])){
	$postsTitle = "You searched for '" . $_GET['search-term'] . "'";

    $results = search($_GET['search-term']);
    if(is_array($results)){
        $posts = $results;
    }
    else{
       $posts = "";
	}
}

    
if(isset($_GET['t_id'])){
	$posts = getPublishedTopics($_GET['t_id']);
	$postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
 }



if(isset($_GET['topic_id'])) {
	$topic = selectTopicbyID($_GET['topic_id']);
	$id = $topic['id'];
	$topic_name = $topic['topic_name'];    
}

if(isset($_GET['post_delete_id'])) {
    $condition = $_GET['post_delete_id'];

    $sql = "DELETE FROM posts WHERE id='$condition'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
	$_SESSION['message'] ='Post deleted successfully';
    $_SESSION['type'] ='success';
    header('location: ' . BASE_URL . '/dashboard/dashboard.php');
    exit();
}
if(isset($_GET['topic_delete_id'])) {
    $condition = $_GET['topic_delete_id'];

    $sql = "DELETE FROM topics WHERE id='$condition'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
	$_SESSION['message'] ='Topic deleted successfully';
    $_SESSION['type'] ='success';
    header('location: ' . BASE_URL . '/dashboard/dashboard.php?topics');
    exit();
}

if(isset($_GET['published']) && isset($_GET['p_id'])){
	$published = $_GET['published'];
	$p_id = $_GET['p_id'];
    $sql = " UPDATE `posts` SET published = '$published' WHERE id = '$p_id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
	$_SESSION['message'] ='Post publish state changed';
    $_SESSION['type'] ='success';
    header('location: ' . BASE_URL . '/dashboard/dashboard.php?posts');
    exit();

} 

function selectAllroles(){
    global $conn;
    $sql = "SELECT * FROM `role` WHERE role_id != '3' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function selectAllComments($condition){
    global $conn;
    $sql = "SELECT * FROM `comments` WHERE post_id = '$condition' ORDER BY time DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function selectAlltopics(){
    global $conn;
    $sql = "SELECT * FROM `topics` ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function selectAllposts(){
    global $conn;
    $sql = "SELECT * FROM `posts` ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function selectAllpostsexceptThis($condition){
    global $conn;
    $sql = "SELECT * FROM `posts` WHERE id != '$condition' AND published = '1'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function selectAllusers(){
    global $conn;
    $sql = "SELECT * FROM `users` ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


function selectExistingEmail($table , $condition)
{
	global $conn;
	$sql = "SELECT * FROM $table WHERE email = '$condition' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_assoc();
    return $records;

}
function selectExistingUser($condition1, $condition2)
{
	global $conn;
	$sql = "SELECT * FROM `users` WHERE (email = '$condition1' OR username = '$condition1') AND password = '$condition2' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // User found, set session variables and redirect
        $user = $result->fetch_assoc();
        return $user;
    } else {
        // Invalid login, display error message
        $error = "Invalid email or username and password combination";
    }

}

function selectUser($condition1)
{
	global $conn;
	$sql = "SELECT * FROM `users` WHERE id = '$condition1' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // User found, set session variables and redirect
        $user = $result->fetch_assoc();
        return $user;
    } else {
        // Invalid login, display error message
        $error = "Invalid email or username and password combination";
    }

}

function selectPost($condition1)
{
	global $conn;
	$sql = "SELECT * FROM `posts` WHERE title = '$condition1' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // User found, set session variables and redirect
        $user = $result->fetch_assoc();
        return $user;
    } else {
        // Invalid login, display error message
        $error = "Invalid email or username and password combination";
    }

}
function selectPostbyID($condition1)
{
	global $conn;
	$sql = "SELECT * FROM `posts` WHERE id = '$condition1' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // User found, set session variables and redirect
        $user = $result->fetch_assoc();
        return $user;
    } else {
        // Invalid login, display error message
        $error = "Invalid email or username and password combination";
    }

}

function selectTopic($condition1)
{
	global $conn;
	$sql = "SELECT * FROM `topics` WHERE topic_name = '$condition1' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // User found, set session variables and redirect
        $user = $result->fetch_assoc();
        return $user;
    } else {
        // Invalid login, display error message
        $error = "Invalid email or username and password combination";
    }

}

function selectTopicbyID($condition1)
{
	global $conn;
	$sql = "SELECT * FROM `topics` WHERE id = '$condition1' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // User found, set session variables and redirect
        $user = $result->fetch_assoc();
        return $user;
    } else {
        // Invalid login, display error message
        $error = "Invalid email or username and password combination";
    }

}

if(isset($_POST['register_btn']))
{
    global $conn;
	$errors = validateUser($_POST);
	if(count($errors) === 0 ){
    
	$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];
    $query = "INSERT INTO users (username, password, email,first_name,second_name,role_id) VALUES ('$username', '$password','$email','$fname','$sname','$role_id')";
    if ($conn->query($query) === TRUE) {
        $user = selectExistingUser($email, $password);
        loginUser($user);
    } 

	} else{
		$username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['password2'];
        $fname = $_POST['sname'];
        $sname = $_POST['fname'];
        if(!empty($role_id)){
        $role_id = $_POST['role_id'];
        }   
        
	}
}

if(isset($_POST['login_btn']))
{
    global $conn;
	$errors = validateLogin($_POST);
	if(count($errors) === 0 ){
          
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss',$username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result ->fetch_assoc();
    
    if(isset($user)){
        if(password_verify($password, $user['password'])){
            loginUser($user);
        } else{
            array_push($errors, 'Wrong credentials');
            
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    else{
        array_push($errors, 'Wrong credentials');
    }
    }
}

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
	$_SESSION['username'] = $user['username'];
	$_SESSION['email'] = $user['email'];
	$_SESSION['role_id'] = $user['role_id'];
	$_SESSION['message'] = 'You successfully logged in';
	$_SESSION['type'] = 'success';
    $_SESSION['role_id'] = $user['role_id'];
    header('Location: index.php');
	exit();
}



if(isset($_POST['add-post']))
{
$errors = validatePost($_POST);
if(!empty($_FILES['image']['name'])){
$image_name = time() . '_' . $_FILES['image']['name'];
$destination = ROOT_PATH . '/images/' . $image_name ;
$result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
if($result){
 $_POST['image'] = $image_name;
}else{
 array_push($errors, "Failed to upload image");
}
} else{

	array_push($errors, "Image required");
}

	if(count($errors) === 0){
        $author =  $_SESSION['id'];
        $title = $_POST['title'];
        $description = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $image = $_POST['image'];
        $published = isset($_POST['published']) ? 1 : 0;
        $time = date("Y-m-d H:i:s");
        $escaped_content = mysqli_real_escape_string($conn, $description);
        $query = "INSERT INTO posts (title, description, author,topic_id,published,time , image) VALUES ('$title', '$escaped_content','$author','$topic_id','$published','$time','$image')";
        if ($conn->query($query) === TRUE) {
            $_SESSION['message'] ='Post created successfully';
            $_SESSION['type'] ='success';
            header('location: ' . BASE_URL . '/dashboard/dashboard.php');
            exit();
        } 
	} else{
		$title = $_POST['title'];
		$body = $_POST['body'];
		$topic_id = $_POST['topic_id'];
		$published = isset($_POST['published']) ? 1 : 0;
	}
}


if(isset($_POST['add-topic']))
{
    $errors = validateTopic($_POST);
	if(count($errors) === 0){
        $author =  $_SESSION['id'];
        $topic_name = $_POST['topic_name'];
        $time = date("Y-m-d H:i:s");
        $query = "INSERT INTO topics (topic_name , time, user_id) VALUES ('$topic_name','$time','$author')";
        if ($conn->query($query) === TRUE) {
            $_SESSION['message'] ='Topic created successfully';
            $_SESSION['type'] ='success';
            header('location: ' . BASE_URL . '/dashboard/dashboard.php?topics');
            exit();
        } 
	} else{
		$topic_name = $_POST['topic_name'];
	
	}
}



if(isset($_POST['update-post']))
{
	
$errors = validatePost($_POST);
$post = selectPostbyID($_POST['id']);
$image = $post['image'];
if(count($errors) === 0){

if(!empty($_FILES['image']['name'])){
$image = time() . '_' . $_FILES['image']['name'];
$destination = ROOT_PATH . '/images/' . $image ;
$result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
if($result){
 $_POST['image'] = $image;
}else{
 array_push($errors, "Failed to upload image");
}


} else{

	array_push($errors, "Image required");
}
    $id = $_POST['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $topic_id = $_POST['topic_id'];
    $escaped_content = mysqli_real_escape_string($conn, $body);
    $query = " UPDATE `posts` SET title = '$title' , description = '$escaped_content', image = '$image' , topic_id = '$topic_id' 
    WHERE id = '$id' ";
    if ($conn->query($query) === TRUE) {
    $_SESSION['message'] ='Post updated successfully';
    $_SESSION['type'] ='success';
    header('location: ' . BASE_URL . '/dashboard/dashboard.php');
    exit();
    }
	} else{
        $id = $_POST['id'];
		$title = $_POST['title'];
		$body = $_POST['body'];
		$topic_id = $_POST['topic_id'];
		$published = isset($_POST['published']) ? 1 : 0;
        

	}
}


if(isset($_POST['update-topic']))
{

$errors = validateTopic($_POST);
if(count($errors) === 0){


    $id = $_POST['id'];
    $topic_name = $_POST['topic_name'];

    $query = " UPDATE `topics` SET topic_name = '$topic_name' WHERE id = '$id' ";
    if ($conn->query($query) === TRUE) {
    $_SESSION['message'] ='Post updated successfully';
    $_SESSION['type'] ='success';
    header('location: ' . BASE_URL . '/dashboard/dashboard.php?topics');
    exit();
    }
	} else{
        $id = $_POST['id'];
		$title = $_POST['title'];

	}
}



function getPublishedPosts($start, $entries){ 
    global $conn;
    $stmt = $conn->prepare("SELECT p.*, u.username 
                        FROM posts AS p 
                        JOIN users AS u ON p.author=u.id 
                        WHERE p.published=1 
                        ORDER BY p.time DESC 
                        LIMIT ?,?");
    $stmt->bind_param("ii", $start, $entries);
    $stmt->execute();
    $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

return $results;
}

function search($term)
{
    $match = '%' . $term . '%';
    global $conn;
    $sql = "SELECT p.*, u.username 
    FROM posts AS p 
    JOIN users AS u ON p.author = u.id 
    WHERE p.published = 1 
    AND p.title LIKE ? 
    ORDER BY p.title ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $match);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPublishedTopics($topic_id){
    global $conn;
    // SELECT * FROM posts WhERE published=1
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.author=u.id WHERE p.published=1 AND topic_id = '$topic_id' ORDER BY 
    p.time DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}



?>