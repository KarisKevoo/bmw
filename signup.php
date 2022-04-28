<?php
    session_start();
    $_SESSION['login-time'] = time();

    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];
    $passwordRepeat = $_POST ['passwordRepeat'];
    $stayloggedin = isset($_POST ['stayloggedin']);
    $_SESSION['susername'] = $username;
    $_SESSION['email'] = $email;

    if($password === $passwordRepeat){
        $host = 'localhost';
        $dbusername = 'kevin';
        $dbpassword = '35852744';
        $dbname = 'BMW';

        //create connection
        $connection = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if(mysqli_connect_error()){
            die("<h3>Database connection failed!! Check your connection</h3");
        } else{
            $SELECT = 'SELECT email FROM sign_up WHERE email = ? LIMIT 1';
            $INSERT = 'INSERT INTO sign_up(username, email, password, stayloggedin) VALUES (?, ?, ?, ?)';

            //prepare statement
            $statement = $connection->prepare($SELECT);
            $statement->bind_param('s', $email);
            $statement->execute();
            $statement->bind_result($email);
            $statement->store_result();
            $num_row = $statement->num_rows;

            //tracking whether there are similar records into the database
            if($num_row == 0){
                $statement->close();

                $statement = $connection->prepare($INSERT);
                $statement->bind_param('ssss', $username, $email, $password, $stayloggedin);
                $statement->execute();
                echo "<script>alert('You have successfully signed up. You are part of the team!')</script>";
                echo'<script>window.location.assign("homepage.php")</script>';
            } else{
                echo "<script>alert('There exists a similar record!')</script>";
                echo'<script>window.location.assign("homepage.php")</script>';
                    $statement->close();
                    $connection->close();
            }
        }
    }else{
        echo "<script>alert('Password mismatch!! Confirm both passwords are matching')</script>";
        echo'<script>window.location.assign("homepage.php")</script>';
    }
?>