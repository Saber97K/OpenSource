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
    <title>Document</title>
</head>
<body>


    <?php include('parts/header.php'); ?>


    <div class="main">
        <div class="content">
            <h1>Main content</h1>
            <div class="container">
                <div class="picture">
                    <img src="pic.jpg" alt="">
                </div>
                <div class="text">
                    <div class="title">Contain an image within a div?</div>
                    <div class="author">
                        <i class="fa-solid fa-user"></i>
                        <div class="after-user-text">Ali</div>
                        
                        <i class="fa-solid fa-calendar-days"></i>
                        <div class="after-user-text">11.04.2023</div>
                    </div>
                    <div class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</div>
                        <button>Open</button>
                </div>
            </div>
            <div class="container">
                <div class="picture">
                    <img src="pic3.jpg" alt="">
                </div>
                <div class="text">
                    <div class="title">Contain an image within a div?</div>
                    <div class="author">
                    <i class="fa-solid fa-user"></i>
                    <div class="after-user-text">Ali</div>
                    
                    <i class="fa-solid fa-calendar-days"></i>
                    <div class="after-user-text">11.04.2023</div>
                    </div>
                    <div class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</div>
                    <button>Open</button>
                </div>
            </div>
            <div class="container">
                <div class="picture">
                    <img src="pic3.jpg" alt="">
                </div>
                <div class="text">
                    <div class="title">Contain an image within a div?</div>
                    <div class="author">
                    <i class="fa-solid fa-user"></i>
                    <div class="after-user-text">Ali</div>
                    
                    <i class="fa-solid fa-calendar-days"></i>
                    <div class="after-user-text">11.04.2023</div>
                    </div>
                    <div class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</div>
                    <button>Open</button>
                </div>
            </div>
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
                        <li><a href ="">ONE</a></li>
                        <li><a href ="">Two</a></li>
                        <li><a href ="">Three</a></li>
                    </ul>
                </div>
            </div>
        </div>  

        <!--END--SIDEBAR-->
    </div>
   
</body>
</html>