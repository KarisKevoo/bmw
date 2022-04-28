<?php
session_start();
if(isset($_SESSION['susername'])){
    echo '0';
}else{
    echo '1';
}
?>