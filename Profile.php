<?php
    session_start();
    if(!isset($_SESSION['susername'])){
        echo '<script>alert("Must log in first!");</script>';
        echo '<script>window.location.assign("homepage.php");</script>';
    }
?>
<!DOCTYPE html>
<HTML>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="bmw-css.css">
        <link rel="stylesheet" href="Profile.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@1,200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600&family=Noto+Serif:ital,wght@1,700&family=Source+Sans+3:ital,wght@1,200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <header class ="head">
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
              <a href="">Updates</a>
              <select name="category" id="category">
                  <option value="Category">Category</option>
                  <option value="Xdrive">Xdrive</option>
                  <option value="Competition">Competition</option>
                  <option value="I">is(i4, i8...)</option>
                  <option value="Manhart">Manhart</option>
                  <option value="CS">CS</option>
                  <option value="Hamann">Hamann</option>
                  <option value="Others">Others</option>
              </select>
              <a href="Gallery_1.php">Gallery</a>
              <div><a href="homepage.php">Home</a></div>
            </nav>
        </header>
        <div class="menu">
            <button onclick="showmenu()"><i class="fas fa-bars"></i><div id="menu">Menu</div></button>
            <div id="dropdown">
               <a href="homepage.php"><i class="fas fa-home"></i>Home</a>
               <a href="Gallery_1.php"><i class="far fa-images"></i>Gallery</a>
               <div id="dropdown_selected">
               <a href="Profile.php"><i class="far fa-user"></i>Profile</a></div>
               <a href="updates.php"><i class="fas fa-desktop"></i>How we work</a>
               <a href=""><i class="far fa-bell"></i>Updates</a>
               <a href="rate.php"><i class="far fa-star"></i>Rate site</a>
               <a href="" onclick="Help()"><i class="far fa-question-circle"></i>Help</a>
               <a href="#contacts"><i class="fas fa-phone-alt"></i>Contacts</a>
               <a href="#" id="DayNight"><i class="fas fa-moon"></i>Day/Night</a>
               <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
            </div>

        </div>
        <section class="Search">
        <form action='search_container.php' method="POST">
            <input type="search" placeholder="Search a car..." name="search"><button type="submit" name="searchSubmit" required><i
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

    <div class="content">
        <div id="progressbar"></div>
        <div id="scrollpath"></div>
        <div id="percent"></div>
            <h2>Profile</h2>
            <div id="my-profile">
                <form action="Profile.php" method="POST" enctype = "multipart/form-data">
                    <img scr ="" alt='Your picture'>
                    <input type="file" accept="image/*" name="profile-pic" id="my-profile-input1">
                    <input type="text" name = 'username' id="my-profile-input2" placeholder='required' value=" <?php if(isset($_SESSION['susername'])){echo "$_SESSION[susername]";}?>"required>
                    <input type="email" name ="email" placeholder='required' id="my-profile-input3" value=" <?php if(isset($_SESSION['susername'])){echo "$_SESSION[email]";}?>" required>
                    <button type="submit" name="save_profile" id="my-profile-submit">Save</button>
                </form>
                <?php
                     include 'images_store_config.php';

                        $target_dir = "resources/profiles/";
                        $target_file = $target_dir . basename($_FILES['profile-pic']['name']);

                        if($_FILES['profile-pic']['size'] > 3000000){
                            echo "<script> alert('File too large, choose a file less than 3mb') </script>";
                        }else if(move_uploaded_file($_FILES['profile-pic']['tmp_name'], $target_file)){
                            echo '<script> alert("Successful!!")</script>';
                       }
                    ?>
            </div>
    </div>
        <script src="jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="BMW.js"></script>
    </body>
    <?php include 'footer.html'; ?>

</HTML>