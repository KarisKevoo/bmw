<?php
    session_start();
    $_SESSION['login-time'] = time();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['email'] = $email;

    //cookies
    if(isset($_POST['stayloggedin'])){
        /*setcookie('email', $email);
        setcookie('password', $password);*/
    }

    $host = 'localhost';
    $dbusername = 'kevin';
    $dbpassword = '35852744';
    $dbname = 'BMW';

    $connection = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($connection->connect_error){
        die("Database connection failed. Please check your internet connection");
    } else{
        $statement = $connection->prepare("SELECT * FROM sign_up WHERE email = ?");
        $statement->bind_param('s', $email);
        $statement->execute();
        $statement_result = $statement->get_result();
        $num_rows = $statement_result->num_rows;

        if($num_rows < 1){
            echo "<script>alert('You have no account here. Please sign up')</script>";
            echo'<script>window.location.assign("homepage.php")</script>';
        } else{
            $data = $statement_result->fetch_assoc();
            if($data['password']=== $password){
                $_SESSION['susername'] = $data['username'];
                echo "<script>alert('Logged in successfully')</script>";
                echo'<script language=javascript>window.location.assign("homepage.php");$("#Login-modal").hide();</script>';
            } else{
                echo "<script>alert('Invalid password or email. Recheck and try again')</script>";
                echo'<script>window.location.assign("homepage.php")</script>';
            }
        }
    }
?>