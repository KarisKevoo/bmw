
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="bmw-css.css">
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
              <div id="bar"><a href="Gallery_1.php">Gallery</a></div>
              <a href="homepage.php">Home</a>
            </nav>
        </header>
        <div class="menu">
            <button onclick="showmenu()"><i class="fas fa-bars"></i><div id="menu">Menu</div></button>
            <div id="dropdown">
                <a href="homepage.php"><i class="fas fa-home"></i>Home</a>
                <div id="dropdown_selected"><a href="Gallery_1.php"><i class="far fa-images"></i>Gallery</a></div>
               <a href="Profile.php"><i class="far fa-user"></i>Profile</a>
               <a href=""><i class="fas fa-desktop"></i>How we work</a>
               <a href="updates.php"><i class="far fa-bell"></i>Updates</a>
               <a href="rate.php"><i class="far fa-star"></i>Rate site</a>
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

        <h2>Gallery</h2>
        <div class="Gallery_1" id="Gallery_1">
            <?php
                include 'images_store_config.php';
                
                //number of pages I want in every page 
                $items_per_page = 60;

                //which page is currently visited
                if(!isset($_GET['page'])){
                    $page = 1;
                }else{
                    $page = $_GET['page'];
                }
                //total records in the table
                $total = "SELECT * FROM images_store";
                $result = mysqli_query($connection, $total);
                $number_of_rows = mysqli_num_rows($result);

                //number of pages
                $number_of_pages = ceil($number_of_rows/$items_per_page);

                //offset
                $offset = ($page - 1) * $items_per_page;

                //fetching images now with limits
                $sql = "SELECT * FROM images_store ORDER BY RAND() LIMIT $offset, $items_per_page";
                $execute = mysqli_query($connection, $sql);
                while($row = mysqli_fetch_assoc($execute)){?>
                    <figure><img class="loading" src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['image_name']; ?>"><section><?php echo $row['image_name']; ?></section>
                    </figure>
                <?php } ?>
            </div>
        </div>

        <script src="jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="BMW.js"></script>
</body>
    <div class="paging">
        <?php
        if($page > 1){
            echo '<a href="Gallery_1.php?page='.($page - 1).'"><button class="paging_previous">Previous</button></a>';
        }
        ?>
        <div class="pages">
            <?php
            for($i = 1; $i <= $number_of_pages; $i++){
               if($i == $page){
                   echo '<a id="on_page">'.$page.'</a>';
               }else{
                   echo '<a href="Gallery_1.php?page='.$i.'">'.$i.'</a>';
               }
            }
            ?>
        </div>
        <?php
        if($number_of_pages > $page){
            echo '<a href="Gallery_1.php?page='.($page + 1).'"><button class="paging_next">Next</button></a>';
        }
        ?>
    </div>
    <?php include 'footer.html'; ?>
</html>