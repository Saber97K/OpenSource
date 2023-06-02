<?php include("path.php"); ?>
<?php  include(ROOT_PATH . '/controllers/functions.php'); 


if(isset($_GET['id']) ){
$post = selectPostbyID($_GET['id']);
$posts = selectAllpostsexceptThis($_GET['id']);
$comments = selectAllComments($_GET['id']);
}
if(isset($_POST['id'])){
    $post = selectPostbyID($_POST['id']);
$posts = selectAllpostsexceptThis($_POST['id']);
$comments = selectAllComments($_POST['id']);
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatitive" content="ie=edge">
	<script src="https://kit.fontawesome.com/083ef0b105.js" crossorigin="anonymous"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/single.css">
	<link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
	<title><?php echo $post['title']; ?> </title>
</head>


<body>
   <?php include(ROOT_PATH . "/parts/header.php"); ?>
   <?php include(ROOT_PATH . "/controllers/messages.php"); ?>

<div class ="page-wrapper">
    <div class="main-content-single">
            <h2 class="post-title"> <?php echo $post['title']; ?></h2>
            <div class="post-content">
                <?php echo html_entity_decode($post['description']); ?>
            </div>
            <div class="comments-section">
                
                <?php if(isset($_SESSION['id'])): ?>
                <div class="comment">   
                    <form action="single.php" method="post"  enctype="multipart/form-data">                 
                    <div class="text">
                    
                        <input value="<?php echo $post['id']; ?>"type="hidden" name="id" class="text-input">
                        <input value="<?php echo $comment ?>"type="text" name="comment" placeholder = "Write a comment here.." class="text-input">
                    </div>
                    <?php include(ROOT_PATH . "/controllers/formErrors.php"); ?>
                    <div class="reply_button">

                    <button type="submit" name="add-comment" class="btnLogin" style=" padding:15px 20px;">Leave the comment</button>
                    </div>
                    </form>
                </div>
                <h2 class="post-title"> Comments</h2>
                <div class="comments-list">
                    <?php foreach ($comments as $c)  :?>
                        <div class="one-com">
                            <div class="author-dat">
                                <i class="fa-solid fa-user"></i>
                                <?php $user = selectUser($c['user_id']); ?>
                                <div class="after-user-text"><?php echo $user['username'];?></div>
                                
                                <i class="fa-solid fa-calendar-days"></i>
                                <div class="after-user-text"><?php echo date('F j, Y', strtotime($c['time'])); ?></div>
                            </div>
                            <div class="textt">
                            <?php echo ($c['text']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php endif; ?>
            </div>
    </div>

    <div class="sidebar-single">
            
            <div class="popular-inside">
            <h2 class="section-title">Another posts</h2>
            <?php foreach (array_slice($posts,0,5) as $p) : ?>
                <div class="post-clearfix">
                <img src="<?php echo BASE_URL . '/images/' . $p['image']; ?>" style = "height:100px;width:100px;   object-fit: cover ; border-radius:50%;" >
                <div class="text">
                    
                    <a href ="<?php echo BASE_URL . '/single.php?id=' . $p['id'];?>" class="title"><h4>
                        <?php if(strlen($p['title']) > 7) : ?>
                    <?php echo html_entity_decode(substr($p['title'], 0, 8) .  '..'); ?>
                        <?php else : ?>
                        <?php echo html_entity_decode(substr($p['title'], 0, 8)); ?>
                        <?php endif; ?>
                    </h4></a>
                    <div class="author">
                        <div>
                        <i class="fa-solid fa-user"></i>
                        <?php $user = selectUser($p['author']); ?>
                        <div class="after-user-text"><?php echo $user['username'];?></div>
                        </div>
                      
                        <div>
                        <i class="fa-solid fa-calendar-days"></i>
                        <div class="after-user-text"><?php echo date('F j, Y', strtotime($p['time'])); ?></div>
                        </div>
                      
                    </div>
                </div>
                
                </div>
            <?php endforeach ; ?>
            </div>
    </div>
</div>

	<script src="scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="assets/js/scripts.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="https://kit.fontawesome.com/bbd49eb172.js" crossorigin="anonymous"></script>
</body>