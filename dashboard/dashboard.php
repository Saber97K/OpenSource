<?php include("../path.php"); ?>
<?php  include(ROOT_PATH . '/controllers/functions.php');
$posts = selectAllposts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
<?php include(ROOT_PATH . "/parts/header.php"); ?>
    


<div class="admin-content" >
    
    <?php include(ROOT_PATH . "/dashboard/sidebar.php"); ?>

    
    <div class="main-cont-dashboard">
    <?php if(isset($_GET['posts']) || (empty($_GET))): ?>
        <div class="inside">
        
        <h2 class="page-title">Manage posts</h2>
        <?php include( ROOT_PATH . '/controllers/messages.php'); ?>

        <table>
            <thead>
                <th>N</th>
                <th>Title</th>
                <th>Author</th>
                <th colspan="3" style="padding-left:0;">Actions on posts</th>	
            </thead>
        <tbody>
        <?php 
        foreach($posts as $key => $value){
        ?>
        <tr>
            <?php $author = selectUser( $value['author']); ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['title']; ?></td>
            <td><?php echo $author['username']; ?></td>
            <td><a href="posts/edit.php?post_id=<?php echo $value['id'];?>" class="edit">Edit</a></td>
            <td><a href="posts/edit.php?post_delete_id=<?php echo $value['id'];?>" class="delete">Delete</a></td>
            <?php if($value['published']): ?>
            <td><a href="posts/edit.php?published=0&p_id=<?php echo $value['id'] ?>" class="unpublished" style="text-decoration: underline; color: inherit;">Unpublish</a></td>
                <?php else: ?>
            <td><a href="posts/edit.php?published=1&p_id=<?php echo $value['id'] ?>" class="published" style="text-decoration: underline; color: inherit;">Publish</a></td>
                <?php endif; ?>
            
        </tr>
        <?php }  ?>

        </div>
        <?php endif; ?>



        <?php if(isset($_GET['topics'])): ?>
        <div class="inside">
        
        <h2 class="page-title">Manage topics</h2>
        <?php include( ROOT_PATH . '/controllers/messages.php'); ?>

        <table>
            <thead>
                <th>N</th>
                <th>Title</th>
                <th>Author</th>
                <th colspan="3" style="padding-left:0;">Actions on topics</th>	
            </thead>
        <tbody>
        <?php 
        foreach($topics as $key => $value){
        ?>
        <tr>
            <?php $author = selectUser( $value['user_id']); ?>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['topic_name']; ?></td>
            <td><?php echo $author['username']; ?></td>
            <td><a href="topic/edit.php?topic_id=<?php echo $value['id'];?>" class="edit">Edit</a></td>
            <td><a href="topic/edit.php?topic_delete_id=<?php echo $value['id'];?>" class="delete">Delete</a></td>
            
        </tr>
        <?php }  ?>

        </div>
        <?php endif; ?>

        

        

        
    </div>
    
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="https://kit.fontawesome.com/bbd49eb172.js" crossorigin="anonymous"></script>
</body>
</html>