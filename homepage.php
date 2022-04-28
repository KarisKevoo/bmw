
<HTML>
<head>
    <title>BMW-homepage</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bmw-css.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="Jquery_cookie.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600&family=Noto+Serif:ital,wght@1,700&family=Source+Sans+3:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital@1&display=swap" rel="stylesheet">
    <header class="head">
        <?php
            session_start();
            ?>
            <h3 style='float:right;color: #FFFF99; text-shadow: 1px 1px 3px black; font-size: 2.5vmin;'><?php 
                if(!empty($_SESSION['susername'])){
                    echo 'Welcome, ';echo $_SESSION['susername'];
                    if(time() - $_SESSION['login-time'] > 21600){
                        session_destroy();
                        session_unset();
                    }
                } else{
                    echo 'Not logged in';
                }?>&nbsp;
            </h3>
        <h1>BAVARIAN MOTOR WORKS (BMW)</h1>
        <img src="resources\logo.jpg" alt="bmw logo">
        <nav class="buttons">
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
            <div id="bar"><a href="homepage.php">Home</a></div>
        </nav>
    </header>
    <div class="menu">
        <button onclick="showmenu()"><i class="fas fa-bars"></i>
            <div id="menu">Menu</div>
        </button>
        <div id="dropdown">
            <div id="dropdown_selected">
                <a href="homepage.php"><i class="fas fa-home"></i>Home</a>
            </div>
            <a href="Gallery_1.php"><i class="far fa-images"></i>Gallery</a>
            <a href="Profile.php"><i class="far fa-user"></i>Profile</a>
            <a href=""><i class="fas fa-desktop"></i>How we work</a>
            <a href="updates.php"><i class="far fa-bell"></i>Updates</a>
            <a href="rate.php"><i class="far fa-star"></i>Rate site</a>
            <a href="" onclick="Help()"><i class="far fa-question-circle"></i>Help</a>
            <a href="#contacts"><i class="fas fa-phone-alt"></i>Contacts</a>
            <a href="#" id="DayNight"><i class="fas fa-moon"></i>Day/Night</a>
            <a id="logout" href="logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
        </div>

    </div>
    <section class="Search">
        <form action='search_container.php' method="POST">
            <input type="search" placeholder="Search a car..." name="search" required><button type="submit" name="searchSubmit"><i class="fas fa-search"></i></button>
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

    <div class="content" id="content">

        <div id="progressbar"></div>
        <div id="scrollpath"></div>
        <div id="percent"></div>
        <h2>Most Liked Cars</h2>

        <button id="previous" onclick="previous()"><i class="fas fa-chevron-left"></i></button>
        <button id="next" onclick="next()"><i class="fas fa-chevron-right"></i></button>

        <div class="mostliked" id="mostliked">
            <figure><img src="resources\2019_bmw_x5_72.jpg" alt="bm"class='loading'>
                <section class='loading'>X5 Xdrive</section>
            </figure>
            <figure><img src="" alt="" class="loading">
                <section class="loading"></section>
            </figure>
            <figure><img src="" alt="" class="loading">
                <section class="loading"></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
        </div>
        <h2>Most Visited Cars</h2>
        <button id="previous2" onclick="previous2()"><i class="fas fa-chevron-left"></i></button>
        <button id="next2" onclick="next2()"><i class="fas fa-chevron-right"></i></button>
        <div class="mostvisited" id="mostvisited">
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
            <figure><img src="" alt="">
                <section></section>
            </figure>
        </div>
    </div>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="BMW.js"></script>
</body>
<?php if(!isset($_COOKIE['test'])){ ?>
<div class="cookie">
    <div class="text"><span>We make use of cookies to improve our user experience. By using this website, you agree with our Cookies Policy</span></div>
    <div class="accept-readmore">
    <a href="javascript: void(0);" id="accept">Accept All</a><a href="javascript: void(0);" id="readmore">Read more</a>
    </div>
</div>
<?php } ?>
<?php include 'footer.html'; ?>

</HTML>