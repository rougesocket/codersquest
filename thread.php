<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Forum</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<body>

    <?php include './partials/_dbconnect.php' ?>


    <?php include './partials/_header_other.php' ?>

    <?php

    $id = $_GET['thread_id'];

    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";

    $result = mysqli_query($conn, $sql);

    $thread= mysqli_fetch_assoc($result);

    echo '
<div class="container my-5">

    <div class="display-4 mb-4">
        <h3>' . $thread['thread_title'] . '</h3>
    </div>
     
    <div class="jumbotron" style="background-color:#ced4da!important">
        <p class="lead">' . $thread['thread_description'] . '</p>
    </div>
</div>
';
    ?>


<!--This is our comment posting logic-->
<?php

    $method= $_SERVER['REQUEST_METHOD'];
    $isInserted=false;
    if($method=='POST'){
        $comment_description=$_POST['co_description'];
        $uid = $_SESSION['uid'];
        $sql="INSERT INTO `comments` (`comment_content`,`comment_by`, `thread_id`, `comment_time`) VALUES ( '$comment_description', '$uid','$id', current_timestamp());";
         $result= mysqli_query($conn,$sql);
        $isInserted=true;
    }
?>
<?php
    if($isInserted==true){

        echo '<div class="container mt-3"><div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Success!</h4>
        <p>your answer has been added. thank you for answering this questions.</p>
      </div></div>';
    }
?>


<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true"){
    echo '<div class="container mt-5 mb-3">
    <h4>Post an answer</h4>
    <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
        <div class="form-group mt-4 mb-2">
            <label for="description">type your comment</label>
            <textarea class="form-control" id="co_description" name="co_description" rows="3" placeholder="Enter your answer"></textarea>
        </div>
        <button type="submit" class="btn main-container text-light mt-2">Post Comment</button>
           
    </form>
</div>';
}
else{
    echo '<h5 class="text-muted container mt-5 mb-3">Please login to post a comment</h5>';
}

?>




    <section>
    <div class="container my-4">
        <div>
          <h1 class="text-gradient">Discussion:</h1>
        </div>
        <small class="text-capitalize text-muted">please read the forum rules before posting anything</small>
    </div>

    <div class="container">
    <?php 

        $id= $_GET['thread_id'];
        $sql="SELECT * FROM `comments` WHERE thread_id=$id";
        $result= mysqli_query($conn,$sql);
        $isResult=false;
        while($row=mysqli_fetch_assoc($result)){
            $id= $row['comment_id'];
            $description=$row['comment_content'];
            $isResult=true;
            $thread_user_id=$row['comment_by'];
            $sql2 = "SELECT user_email from `users` WHERE sno='$thread_user_id';";
            $userResult = mysqli_query($conn,$sql2);
            $userrow = mysqli_fetch_assoc($userResult);
            
            echo '<div class="media p-2 rounded mb-4" style="background-color:#ced4da">
            
            <div class="mr-3 text-center">
                <i class="far fa-user-circle fa-3x"></i>
                
            </div>
            <div>
                
            <p><span class="font-weight-bold">'.$userrow['user_email'].'</span><br><span class="text-muted d-flex">'.$row['comment_time'].'</span></p>
            
            <div>
             <p class="lead">' . $description . '</p>
            </div>
            </div>
            
        </div>';
        }

        if($isResult==false){
            echo '<h5 class="text-muted my-3 font-weight-bolder">Be first to answer this questions</h5>';
        }
        ?>

    </div>
    
</section>
    <!--footer ends here-->
    <?php include './partials/_footer.php' ?>



    <!--some scripts-->

    <script src="https://kit.fontawesome.com/c03e57a261.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>