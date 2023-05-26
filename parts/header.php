    <div class="header">
        <div class="left-part">
            <div class="logo">
                <a href=""> Ali & Ahmed</a>
            </div>
        </div>
            <ul class="middle">
                <li><a href="" class="home">Home</a></li>
                <li><a href="" class="home">About</a></li>
                <li><a href="" class="home">Dashboard</a></li>
                <li><a href="" class="home">Help</a></li>
            </ul>
        <div class="right-part">
            <div class="toggle_btn">
            <i class="fa-solid fa-bars fa-xl"></i>
            </div>
            <button class="btnLogin">login</button>
            <button class="btnLogin">Register</button>
        </div>
    </div>

    <div class="dropdown_menu">
        <li><a href="" class="home">Home</a></li>
        <li><a href="" class="home">About</a></li>
        <li><a href="" class="home">Dashboard</a></li>
        <li><a href="" class="home">Help</a></li>
        <li><button class="btnLogin">login</button></li>
        <li> <button class="btnLogin">Register</button></li>
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
