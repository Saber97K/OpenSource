    <?php if(isset($_SESSION['id'])): ?>
      <div class="header">
      <div class="left-part" style = "padding:15px 35px;">
    <?php else:  ?>
      <div class="header" style = "padding:15px;">
      <div class="left-part">
    <?php endif; ?>
            <div class="logo">
                <a href="<?php echo BASE_URL . '/index.php' ?>"> Ali & Ahmed</a>
            </div>
        </div>
            <ul class="middle">
                
            </ul>
        <div class="right-part">  
            <div class="toggle_btn">
            <i class="fa-solid fa-bars fa-xl"></i>
            </div>
            <?php if(isset($_SESSION['id'])): ?>
              <div class="dropdown_user">
                <button class="dropbtn"><?php echo $_SESSION['username']; ?></button>
                <div class="dropdown-content">
                <a href="<?php echo BASE_URL . '/logout.php' ?>">logout</a>
                <?php if(($_SESSION['role_id']) != '1' ): ?>
                  <li><a href="<?php echo BASE_URL . '/dashboard/dashboard.php' ?>">dashboard</a></li>
                <?php endif; ?>
                </div>
              </div>
            <?php else: ?>
              <a href="<?php echo BASE_URL . '/login.php' ?>" class="btnLogin">login</a>
              <a href="<?php echo BASE_URL . '/register.php' ?>" class="btnLogin">Register</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="dropdown_menu">
      <?php if(isset($_SESSION['id'])): ?>
        <li><a href="<?php echo BASE_URL . '/logout.php' ?>">logout</a></li>
        <li><a href="<?php echo BASE_URL . '/dashboard/dashboard.php' ?>">dashboard</a></li>
      <?php else: ?>
        <li><button class="btnLogin">login</button></li>
        <li> <button class="btnLogin">Register</button></li>
      <?php endif; ?>
    </div>

    <script>
       // Get the toggle button, menu, and toggle button icon
const toggleBtn = document.querySelector('.toggle_btn');
const menu = document.querySelector('.dropdown_menu');
const toggleBtnIcon = toggleBtn.querySelector('.toggle_btn i');

// Function to close the menu and reset the toggle button
function closeMenu() {
  menu.classList.remove('open');
  toggleBtnIcon.classList.remove('fa-xmark');
  toggleBtnIcon.classList.add('fa-bars');
}

// Add click event listener to the toggle button
toggleBtn.addEventListener('click', function() {
  menu.classList.toggle('open');
  toggleBtnIcon.classList.toggle('fa-xmark');
  toggleBtnIcon.classList.toggle('fa-bars');
});

// Add click event listener to the document
document.addEventListener('click', function(event) {
  const isClickInsideMenu = menu.contains(event.target);
  const isClickOnToggleBtn = toggleBtn.contains(event.target);
  
  if (!isClickInsideMenu && !isClickOnToggleBtn) {
    closeMenu();
  }
});

window.addEventListener('resize', function() {
  if (window.innerWidth > 992) {
    closeMenu();
  }
});
    </script>
