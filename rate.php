
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="bmw-css.css">
    <link rel="stylesheet" href="site-rate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600&family=Noto+Serif:ital,wght@1,700&family=Source+Sans+3:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital@1&display=swap" rel="stylesheet">
        <header class ="head">
        <?php
            session_start();
        ?>
            <h3 style='float:right;color: #FFFF99; text-shadow: 1px 1px 3px black; font-size: 2.5vmin;'><?php 
                if(isset($_SESSION['susername'])){
                    echo 'Welcome, ';echo $_SESSION['susername'];
                    if(time() - $_SESSION['login-time'] > 21600){
                        session_unset();
                        session_destroy();
                    }
                } else{
                    echo 'Not logged in';
                }?>&nbsp;
            </h3>
           <h1>BAVARIAN MOTOR WORKS (BMW)</h1>
           <img src="resources\logo.jpg" alt="bmw logo">
           <nav class = "buttons">
              <button id="log in">Login</button>
              <button id="sign up">Signup</button>
              <a href="updates.php">Updates</a>
              <select name="category" id="category">
                  <option value="Category">Category</option>
                  <option value="Xdrive">Xdrive</option>
                  <option value="Competition">Competition</option>
                  <option value="Is">is(i4, i8...)</option>
                  <option value="Manhart">Manhart</option>
                  <option value="CS">CS</option>
                  <option value="Hamann">Hamann</option>
                  <option value="Others">Others</option>
              </select>
                <a href="Gallery_1.php">Gallery</a>
              <a href="homepage.php">Home</a>
            </nav>
        </header>
        <div class="menu">
            <button onclick="showmenu()"><i class="fas fa-bars"></i><div id="menu">Menu</div></button>
            <div id="dropdown">
                <a href="homepage.php"><i class="fas fa-home"></i>Home</a>
                <a href="Gallery_1.php"><i class="far fa-images"></i>Gallery</a>
               <a href="Profile.php"><i class="far fa-user"></i>Profile</a>
               <a href=""><i class="fas fa-desktop"></i>How we work</a>
               <a href="updates.php"><i class="far fa-bell"></i>Updates</a>
               <div id="dropdown_selected"><a href="rate.php"><i class="far fa-star"></i>Rate site</a></div>
               <a href="" onclick="Help()"><i class="far fa-question-circle"></i>Help</a>
               <a href="#contacts"><i class="fas fa-phone-alt"></i>Contacts</a>
               <a href="#" id="DayNight"><i class="fas fa-moon"></i>Day/Night</a>
               <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
            </div>
        </div>
        <section class="Search">
        <form action='search_container.php' method="POST">
            <input type="search" placeholder="Search a car..." name="search" required><button type="submit" name="searchSubmit"><i
                    class="fas fa-search"></i></button>
        </form>
    </section>
    <section class='mobile_search'>
        <form action='search_container.php' method="POST">
        <input id="input_mobile" type="search" placeholder="Search a car..." name="search" required><button type=submit><i class="fas fa-search"></i></button>
        </form>
    </section>
    <section class="search-mobile"><i type="submit" name="searchSubmit" class="fas fa-search"></i></section>
</head>

<?php include 'login_signup_social.html'; ?>
    
<body>
    <div id="progressbar"></div>
    <div id="scrollpath"></div>
    <div id="percent"></div>
    <div class = "content">

    <h2>Site Rating</h2>
            <div class="heading"><h3>Welcome, rate our site</h3></div>

            <div class="rating_container">
            <form class = "rate-form" id="rate-form" action = "">
            <div class = "stars">
                <input type="radio" name="star" id="star-5" value="5">
                <label for="star-5" class="fas fa-star"></label>
                <input type="radio" name="star" id="star-4" value="4">
                <label for="star-4" class="fas fa-star"></label>
                <input type="radio" name="star" id="star-3" value="3">
                <label for="star-3" class="fas fa-star"></label>
                <input type="radio" name="star" id="star-2" value="2">
                <label for="star-2" class="fas fa-star"></label>
                <input type="radio" name="star" id="star-1" value="1">
                <label for="star-1" class="fas fa-star"></label>

                <section></section>
            </div>
                    <div class="post">
                        <div class="text">Thanks for rating!</div>
                    </div>
                    <textarea placeholder="Describe your experience..."></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>

        <script src="jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="BMW.js"></script>
</body>
    <?php include 'footer.html'; ?>
</html>