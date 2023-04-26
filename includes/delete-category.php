<?php

session_start();

if (isset($_GET['id']) && isset($_SESSION['userId']) && ($_SESSION['userLevel'] == 1))
{
    
    require 'config.php';
    $conn=mysqli_connect("localhost","root","","farajni");


    $category = $_GET['id'];
    
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 'forum';
    }
    
    $sql = "delete from categories where cat_id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../".$page.".php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $category);
        mysqli_stmt_execute($stmt);
        header("Location: ../".$page.".php");
        exit();
    }
    
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    $page = 'forum';
    header("Location: ../".$page.".php");
    exit();
}