<?php


if($_SERVER['REQUEST_METHOD']=="POST"){

    include '_dbconnect.php';

    $showError="false";
    $email= $_POST['email'];
    $password= $_POST['password'];



    $sql = "SELECT * FROM users where user_email='$email'";
    $result=mysqli_query($conn,$sql);

    $numRows = mysqli_num_rows($result);

    if($numRows==1){

        $row=mysqli_fetch_assoc($result);

        if(password_verify($password,$row['user_pass'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['useremail']=$email;
            $_SESSION['uid']=$row['sno'];
            header("Location: /forum/index.php");
        }
        else{
            $showError="password Mismatch";
            header("Location:/forum/login.php?loginsuccess=false&error=$showError");
        }
    }
    else{
        $showError="email not found";
        header("Location:/forum/login.php?loginsuccess=false&error=$showError");
    }
}


    
?>