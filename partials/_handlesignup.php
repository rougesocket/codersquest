<?php


if($_SERVER['REQUEST_METHOD']=="POST"){

    include '_dbconnect.php';

    $showError="false";
    $email= $_POST['emailaddr'];
    $password= $_POST['password'];
    $cnfpassword= $_POST['cnfpassword'];


    $existsql = "SELECT * FROM `users` where user_email='$email'";
    $result = mysqli_query($conn,$existsql);
    $numRows = mysqli_fetch_row($result);


    if($numRows>0){
        $showError = "Already a user!!";
    }
    else{

        if($password==$cnfpassword){
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users`(`user_email`, `user_pass`, `timestamp`) VALUES ('$email','$hash',current_timestamp());";

            $result = mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
                header("Location:/forum/signup.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError="password mismatch";
            header("Location:/forum/signup.php?signupsuccess=false&error=$showError");
        }

        

    }
    header("Location:/forum/signup.php?signupsuccess=false&error=$showError");
}


    
?>