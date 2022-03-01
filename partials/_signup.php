<?php 

echo '
<div class="container-fluid">

    <div class="row">
        <div class="col-md-7 col-sm-12">

            <div class="my-3">
                <img src="./img/undraw_teamwork_hpdk.svg" alt="" class="h-100 w-100">
            </div>
        </div>
        <div class="col-md-5 col-sm-12 d-flex align-items-center justify-content-center">
            <div class="card my-5" style="width: 30rem;">
                <div class="card-body">
                    <h1 class="text-center w-100 text-gradient font-weight-bolder">Sign up</h1>

                    <p class="text-center text-muted">sign up to join the community of like minded people</p>';
    
                    

                    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
                        echo '<p class="text-success text-center font-weight-normal">Account Created Successfully</p>';
                    }
                    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
                        echo '<p class="text-danger text-center font-weight-normal">'.$_GET['error'].'</p>';
                    }
                
                 echo  '<form class="mt-5" action="/forum/partials/_handlesignup.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="emailaddr">Email address:</label>
                            <input type="email" class="form-control rounded-lg" id="emailaddr" name="emailaddr" placeholder="Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control rounded-lg" id="password" name="password" placeholder="Password">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="cnfpassword">Confirm Password:</label>
                            <input type="password" class="form-control rounded-lg" id="cnfpassword" name="cnfpassword" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn main-container text-light text-center w-100 mt-3">Register</button>
                        </form>
                </div>
            </div>
                
        </div>
        </div>
        </div>
';

?>