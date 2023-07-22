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
    <link rel="stylesheet" href="all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fe02098b72.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid my-4">
        <div class="small-con" style=" padding:30px; border-radius:8px; box-shadow:5px 10px 18px #888888;">
        <div class="row">
            <div class="col-md-12">
                <h3>Create Account</h3>
                <p>Get started with your free account</p>
                <button type="submit" class="logingmail"><i class="fa-brands fa-google" style="margin-right:6px;"></i> Login Via Gmail </button><br><br>
                <button type="submit" class="loginfacebook"><i class="fa-brands fa-facebook-f" style="margin-right:6px;"></i> Login Via Facebook </button>
                <p class="linepara" style="font-weight:normal;">---------------- OR ----------------</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" class="form">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username"                   aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" aria-label="Username"                   aria-describedby="addon-wrapping">
                </div>
                <small id="invalidemail" style="color:red;"></small>
                <small value="" style="margin-bottom:10px; color:red;"></small>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-phone"></i></span>
                    <input type="number" class="form-control" name="phone" placeholder="Phone Number" aria-label="Username"                   aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" name="cpassword" placeholder="Create Password" aria-label="Username"                   aria-describedby="addon-wrapping">
                </div>
                <small id="invalidcpassword" style="color:red;"></small>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" name="rpassword" placeholder="Repeat Password" aria-label="Username"                   aria-describedby="addon-wrapping">
                </div>
                <small id="invalidrpassword" style="color:red;"></small>
                    <button type="submit" class="submitbtn" name="submitbtn" value="submitbtn">Create Account</button>
                
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Have an account? <a href="login.php">Log In</a></p>
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

if(isset($_POST['submitbtn'])){
    $name=mysqli_real_escape_string($con,$_POST['username']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
    $rpassword=mysqli_real_escape_string($con,$_POST['rpassword']);

    $cpass=password_hash($cpassword,PASSWORD_BCRYPT);
    $rpass=password_hash($rpassword,PASSWORD_BCRYPT);

    $emailQuery="select * from signup where email='$email' ";
    $query=mysqli_query($con,$emailQuery);
    $emailCount=mysqli_num_rows($query);

    if(strlen($name)==0){
        ?>
                <script>
                    alert("Plz Enter UserName");
                </script>
                <?php
    }
    else if(strlen($email)==0){
        ?>
                <script>
                    alert("Plz Enter Email");
                </script>
                <?php
    }
    else if(strlen($phone)==0 || strlen($phone)>11 || strlen($phone)<11){
        ?>
                <script>
                    alert("Plz Enter Proper Phone");
                </script>
                <?php
    }
    else if(strlen($cpassword)==0 || strlen($cpassword)<8 ){
        ?>
                <script>
                    alert("Plz Enter Password With Minimum 8 Characters");
                </script>
                <?php
    }
    else if(strlen($rpassword)==0){
        ?>
                <script>
                    alert("Plz Enter Password");
                </script>
                <?php
    }
    else{
    if($emailCount>0){
        ?>
                <script>
                    let msg="email already exists";
                    let em=document.getElementById('invalidemail');
                    em.innerHTML=msg;
                </script>
                <?php
    }
    else{
        if($cpassword===$rpassword){
            $insertQuery="insert into signup (username,email,phone,cpassword,rpassword) values('$name','$email','$phone','$cpass','$rpass')";

            $res=mysqli_query($con,$insertQuery);
        
            if($res){
                ?>
                <script>
                    alert("Account Created Successfully");
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Account Not Created Due To Invalid Info");
                </script>
                <?php
            }
        
                }
        else{
                    ?>
                <script>
                    let pmsg="passwords not matched";
                    let cpa=document.getElementById('invalidcpassword');
                    cpa.innerHTML=pmsg;
                    let rpa=document.getElementById('invalidrpassword');
                    rpa.innerHTML=pmsg;
                </script>
                <?php
                }
            }
        }
}    

?>