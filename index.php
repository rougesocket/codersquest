<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/style.css">
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

<?php include './partials/_header.php'?>


<?php



  $sql = "SELECT * FROM `users`";
  $userResult = mysqli_query($conn,$sql);
  $cntuser= mysqli_num_rows($userResult);

  $sql2 = "SELECT * FROM `threads`";
  $threadResult = mysqli_query($conn,$sql2);
  $cntthread= mysqli_num_rows($threadResult);
  
  $sql3 = "SELECT * FROM `comments`";
  $commentsResult = mysqli_query($conn,$sql3);
  $cntcomment= mysqli_num_rows($commentsResult);


  echo '<main>

  <div class="container mat">
      <div class="card-group">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-gradient text-size-lg font-weight-bolder">'.$cntuser.'+</h5>
              <p class="card-text text-capitalize">Active users in the community across various category. Grow along with community of like minded people. Join Now</p>
             
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-gradient text-size-lg font-weight-bolder">'.$cntthread.'+</h5>
              <p class="card-text text-capitalize">Total Number of threads across various category. Browse category below.</p>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-gradient text-size-lg font-weight-bolder">'.$cntcomment.'+</h5>
              <p class="card-text text-capitalize">Total number of comments across various category.</p>
              
            </div>
          </div>
        </div>
  </div>
</main>'
?>
        




<!--Category goes here-->


<section class="my-5 py-5">


    <div class="container">
        <h3 class="text-gradient w-100 font-weight-bolder text-center text-capitalize">Bird eye view</h3>
        <p class="text-muted text-capitalize text-center">Collection of topics related to issues with budding developer</p>
    </div>
    <hr class="line">
    <div class="container mt-5">
        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-12">
                
                <h3 class="text-gradient font-weight-bold">Category</h3>
                <p class="text-muted">Browse collection of related topics</p>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
            
                <div class="column">

                <?php 
                    $sql="SELECT * FROM `categories` ";
                    $result= mysqli_query($conn,$sql);
                    $counter = 0;
            
                    while($row=mysqli_fetch_assoc($result)){

                      if($counter%2==0){
                          echo'
                          <div class="col-md-12 mt-5">
                        
                          <div class="card-deck">
                              <div class="card rounded" style="width: 18rem;">
                              <div class="card-img-top my-3 d-flex justify-content-center">
                                  <img src="./img/'.$row['category_name'].'.png" alt="" class="">
                                </div>
                                  <div class="card-body">
                                      <h5 class="card-title">'.$row['category_name'].'</h5>
                                    <p class="card-text">'.substr($row['category_description'],0,100).'.......</p>
                                    <a href="./threads.php?catid='.$row['category_id'].'" class="btn d-block text-center text-gradient">Browse <span><i class="fas fa-arrow-right"></i></span></a>
                                  </div>
                                </div>
                            ';
                      }
                      else{
                        echo '<div class="card rounded" style="width: 18rem;">
                                    <div class="card-img-top my-3 d-flex justify-content-center">
                                        <img src="./img/'.$row['category_name'].'.png" alt="" class="">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row['category_name'].'</h5>
                                      <p class="card-text">'. substr($row['category_description'],0,100).'.......</p>
                                      <a href="./threads.php?catid='.$row['category_id'].'" class="btn d-block text-center text-gradient">Browse <span><i class="fas fa-arrow-right"></i></span></a>

                                      </div>
                                              </div>
                                        </div>
                                    </div>
                        ';
                      }
                      $counter=$counter+1;
                    }


                ?>
                <!-- end for loop of two-->

                    

                </div>
            </div>
        </div>
    </div>
</section>

<!---->
 <?php include './partials/_footer.php'; ?>       
      <!--some scripts-->

    <script src="https://kit.fontawesome.com/c03e57a261.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>


</body>
</html>