<?php

function test($connection,$message){
    if($connection){
        echo "<div class='alert alert-success' role='alert'>
        $message is done
        
      </div>";
        
    }else{
        echo "<div class='alert alert-danger' role='alert'>
        Error! <br> Something went wrong
        </div>";
    }
}
function encryp($pass){
    return password_hash($pass,PASSWORD_BCRYPT);
}
function path($go)
{
    echo "<script>
    location.replace('/BUGTRACKER/$go')
    </script>";
}
function checklink(){
    if (!isset($_SESSION['admin'])) {
        path('return#');
    }
}
function auth(){
    if (!$_SESSION['admin']) {
        path("index.php");
    }
}
?>