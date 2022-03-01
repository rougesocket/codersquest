<?php 


echo '
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6 col-sm-12">

            <div class="my-3">
                <img src="./img/undraw_good_team_m7uu.svg" alt="" class="h-100 w-100">
            </div>
        </div>
        <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
            <div class="card my-5" style="width: 30rem;">
                <div class="card-body">
                    <h1 class="text-center w-100 text-gradient font-weight-bolder">Sign in</h1>

                    <p class="text-center text-muted">sign in to join the community of like minded people</p>';
                   
                    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
                        echo '<p class="text-danger text-center font-weight-normal">'.$_GET['error'].'</p>';
                    }
                   
                   echo' <form class="mt-5" action="/forum/partials/_handlelogin.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control rounded-lg" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control rounded-lg" id="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn main-container text-light text-center w-100 mt-3">Sign in</button>
                        </form>
                </div>
            </div>
                
        </div>
        </div>
        </div>
';


?>