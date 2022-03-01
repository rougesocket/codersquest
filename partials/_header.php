<?php

session_start();

echo '<div class="main-container ">
        
<header>
    <div class="pt-3 container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand font-weight-bolder" href="index.php">Coders Quest <span><i class="fas fa-terminal"></i></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link nav-color" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>';

                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true"){
                  echo '<li class="nav-item active">
                   <a class="nav-link nav-color"><i class="fas fa-user"></i> '.$_SESSION['useremail'].'</a>
                 </li>
                 <li>
                 <a class="btn btn-danger nav-link nav-color" href="./partials/_logout.php" role="button">Logout</a>
                 </li>
                 ';
                 }
                 else{
                    echo '
                    <li class="nav-item">
                        <a class="nav-link nav-color" href="login.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-color" href="signup.php"><i class="fas fa-user-plus mr-2"></i>Sign Up</a>
                    </li>';
                 }
                
      echo '</div>
          </nav>
    </div>
    
</header>

<div class="container h-100 sm">
    <img src="./img/undraw_Developer_activity_re_39tg.svg" alt="" class="w-100 h-100">
</div>
</div>';

?>