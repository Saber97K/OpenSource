<?php include("path.php"); ?>
<?php  include(ROOT_PATH . '/controllers/functions.php'); 
$postsTitle = 'Recent Posts';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <title>Main</title>
</head>
<body>

    
    <?php include(ROOT_PATH . "/parts/header.php"); ?>
    <?php include(ROOT_PATH . "/controllers/messages.php"); ?>

    </div>


    <div class="main">
        <div class="content">
        <h1 class="recent-post-title"><?php echo $postsTitle ;?></h1>
            <?php foreach ($posts as $post)  :?>
            <div class="container">
                <div class="picture">
                    <img src="<?php echo  "images/" . $post['image']; ?>" >
                </div>
                <div class="text">
                    <div class="title">
                        <a href="single.php?id=<?php echo $post['id'] ;?>"><?php echo $post['title'] ;?> </a>
                    </div>
                    
                    <div class="author">
                        <i class="fa-solid fa-user"></i>
                        <?php $user = selectUser($post['author']); ?>
                        <div class="after-user-text"><?php echo $user['username'];?></div>
                        
                        <i class="fa-solid fa-calendar-days"></i>
                        <div class="after-user-text"><?php echo date('F j, Y', strtotime($post['time'])); ?></div>
                    </div>
                    <div class="description">
                        <?php echo html_entity_decode(substr($post['description'], 0, 150) . '...'); ?>
                    </div>
                        <a href="single.php?id=<?php echo $post['id'] ;?>" class="read-more">Open</a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php   if(empty($_GET['t_id']) && empty($_GET['search-term'])): ?>
            <div class="pagination">
            <?php if ($pgnow > 1) { ?>
                <a href="?page=<?php echo $pgnow - 1; ?>">&laquo;</a>
            <?php }; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <a href="?page=<?php echo $i; ?>" <?php if ($i == $pgnow) { echo 'class="active"'; } ?>><?php echo $i; ?></a>
            <?php }; ?>

            <?php if ($pgnow < $totalPages) { ?>
                <a href="?page=<?php echo $pgnow + 1; ?>">&raquo;</a>
            <?php }; ?>
            </div>
            <?php endif; ?>
        </div>

        <!--SIDEBAR-->
        <div class="sidebar">
            <div class="section">
                <div class="search">
                    <h2 class="section-title">Search</h2>
                    <form action="index.php" mehod="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Search...">
                    </form>
                </div>
            </div>
            <div class="section">
                <div class="topics">
                    <h2 class="section-title">Topics</h2>
                    <ul class="titles"> 
                    <?php foreach ($topics as $key => $topic): ?>
                        <li><a href ="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['topic_name'] ?>"><?php echo $topic['topic_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>  

        <!--END--SIDEBAR-->
    </div>
    
    <script src="https://kit.fontawesome.com/bbd49eb172.js" crossorigin="anonymous"></script>
</body>
</html>