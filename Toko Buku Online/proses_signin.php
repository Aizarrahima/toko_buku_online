<?php
    if($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email)){
            echo "<script>alert('Email is required');location.href='signin.php';</script>";
        } else if(empty($password)){
            echo "<script>alert('Password is required');location.href='signin.php';</script>";
        } else {
            include "connection.php";
            $qry_signin=mysqli_query($conn, "select * from signup where email ='".$email."' and password='".md5($password)."'");
            if(mysqli_num_rows($qry_signin)>0){
                $dt_signin=mysqli_fetch_array($qry_signin);
                session_start();
                $_SESSION['id_user']=$dt_signin['id_user'];
                $_SESSION['email']=$dt_signin['email'];
                $_SESSION['first_name']=$dt_signin['first_name'];
                $_SESSION['status_signin']=true;
                header("location: home.php");
            } else {
                echo "<script>alert('Email dan Password tidak benar'); location.href='signin.php';</script>";
            }
        }
    }
?>