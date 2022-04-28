<?php
    session_start();
        if(isset($_SESSION['susername'])){
            session_unset();
            session_destroy();
            header('location:homepage.php');
        }
?>