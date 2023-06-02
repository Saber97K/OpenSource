<div class="main-side">
<div class="sidebar">
        <h2>Post functions</h2>
        <a href="<?php echo BASE_URL . '/dashboard/dashboard.php?posts' ?>" class="btn btn-big">Manage posts</a>
        <a href="<?php echo BASE_URL . '/dashboard/posts/create.php' ?>" class="btn btn-big">Add post</a>
        
    
    </div>
    <?php if(($_SESSION['role_id'] == 3)): ?>
    <div class="sidebar">
        <h2>Topic functions</h2>
        <a href="<?php echo BASE_URL . '/dashboard/dashboard.php?topics' ?>" class="btn btn-big">Manage topics</a>
        <a href="<?php echo BASE_URL . '/dashboard/topic/create.php' ?>" class="btn btn-big">Add topic</a>
        
    
    </div>
    <?php endif; ?>
</div>