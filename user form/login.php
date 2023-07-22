<?php

session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>user form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fe02098b72.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid my-4">
       <div class="small-con" style=" padding:30px; border-radius:8px; box-shadow:5px 10px 18px #888888;">
        <div class="row">
            <div class="col-md-12">
                <h3>Login Account</h3>
                <p>Get started to login your account</p>
                <button type="submit" class="logingmail"><i class="fa-brands fa-google" style="margin-right:6px;"></i> Login Via Gmail </button><br><br>
                <button type="submit" class="loginfacebook"><i class="fa-brands fa-facebook-f" style="margin-right:6px;"></i> Login Via Facebook </button>
                <p class="linepara" style="font-weight:normal;">---------------- OR ----------------</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" class="form">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" aria-label="Username"                   aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" name="cpassword" placeholder="Enter Password" aria-label="Username"                   aria-describedby="addon-wrapping">
                </div>
                    <button type="submit" class="submitbtn" name="submitlogin" value="submitbtn">LogIn</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Not have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  </body>
</html>

<?php

include 'connection.php';

if(isset($_POST['submitlogin'])){
    $email=$_POST['email'];
    $password=$_POST['cpassword'];

    $emailQuery="select * from signup where email='$email' ";
    $query=mysqli_query($con,$emailQuery);
    $emailCount=mysqli_num_rows($query);

    if($email=="" || strlen($password)==0){
        ?>
            <script>
                alert("Plz Fill Both Fields ");
            </script>
            <?php
    }
    else{
    if($emailCount){
        $emailFetch=mysqli_fetch_assoc($query);
        $dbPass=$emailFetch['cpassword'];

        $_SESSION['username']=$emailFetch['username'];        // fetch username to display on home page

        $passVerify=password_verify($password,$dbPass);
        if($passVerify==true){
            ?>
            <script>
                alert("Login Successfully");
                location.replace("../index.php");
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Incorrect email or Password");
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
                alert("Invalid Email or password");
        </script>
        <?php
    }
}
}

?>

