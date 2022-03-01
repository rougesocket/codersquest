<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
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
    $id = $_GET['catid'];
    $sql="SELECT * FROM `categories` WHERE category_id=$id";
    $result= mysqli_query($conn,$sql);

    while($row=mysqli_fetch_assoc($result)){
    
        $catgeory_title=$row['category_name'];
        
        $catgeory_description=$row['category_description'];
    }
?>



<?php

    $method= $_SERVER['REQUEST_METHOD'];
    $isInserted=false;
    if($method=='POST'){
        $thread_title= $_POST['th_title'];
        $thread_description=$_POST['th_description'];
        $uid = $_SESSION['uid'];
        $sql="INSERT INTO `threads` (`thread_id`, `thread_title`,
         `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES (NULL,'$thread_title', '$thread_description', '$id', '$uid', current_timestamp());";

        $result= mysqli_query($conn,$sql);
        $isInserted=true;
    }
?>

<section>
        <div class="container-fluid " style="background-color: #6D28D9;">
            <div class="jumbotron-fluid container text-light p-3" >
                <h1 class="display-4 mt-5 font-weight-bolder"><?php echo $catgeory_title ?></h1>
                <p class="lead"><?php echo $catgeory_description ?></p>
              </div>
        </div>
    </section>
        
<!--here we add that green box of success-->
    <?php
    if($isInserted==true){

        echo '<div class="container mt-3"><div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Success!</h4>
        <p>your question has been added. please wait untill other users answer your questions.</p>
      </div></div>';
    }
?>


<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true"){
    echo '<div class="container mt-5 mb-3">
    <h4>Ask a Question</h4>
    <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="th_title" placeholder="enter your question title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="th_description" rows="3" placeholder="Enter your description"></textarea>
        </div>
        <button type="submit" class="btn main-container text-light mt-2">Submit</button>
           
    </form>
</div>';
}
else{
    echo '<h5 class="text-muted container mt-5 mb-3">Please login to ask a question</h5>';
}

?>
        
<div class="container mt-5">

    <h1 class="text-gradient">Browse Questions</h1>

<!--This is where we fetch different questions from our forum-->
    <?php 
        $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result= mysqli_query($conn,$sql);
        $isResult=false;
        while($row=mysqli_fetch_assoc($result)){
            $id= $row['thread_id'];
            $thread_title=$row['thread_title'];
            
            $thread_description=$row['thread_description'];
            $timestamp=$row['timestamp'];
            $isResult=true;
            $thread_user_id= $row['thread_user_id'];
            $sql2 = "SELECT user_email from `users` WHERE sno='$thread_user_id';";
            $userResult = mysqli_query($conn,$sql2);
            $userrow = mysqli_fetch_assoc($userResult);
            

            echo '<div class="media my-3 border p-3 rounded">
        
            <div class="mr-3 text-center">
                <i class="far fa-user-circle fa-3x"></i>
                
            </div>
            <div class="media-body">
              <h5 class="mt-0"><a href="./thread.php?thread_id='.$id.'" class="link_color text-decoration-none">'.$thread_title.'</a><br><span class="text-muted"><small> by '.$userrow['user_email'].'</small></span></h5>
              <p>'.substr($thread_description,0,200).'....</p>
              <small class="text-muted">'.$timestamp.'</small>
            </div>  
          </div>';
        }

        if($isResult==false){
            echo '<h5 class="text-muted my-3 font-weight-bolder">Be first to create questions</h5>';
        }
    ?>


    
</div>

    <!--footer ends here-->
    <?php include './partials/_footer.php' ?>



          <!--some scripts-->

          <script src="https://kit.fontawesome.com/c03e57a261.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>

</body>
</html>