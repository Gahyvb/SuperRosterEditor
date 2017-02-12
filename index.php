<!DOCTYPE html>
<html>
<style>
    html{
        background: url(images/dropfleetimg.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    form {
        border: 4px solid #f1f1f1;
    }

    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: blue;
        color: white; 
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        width: 200px;
    }


        .login{
            background-color: white;
        position: fixed;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .regbtn {
        width: auto;
        padding: 10px 18px;
        background-color: black;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    .registerForm{
        float: left;
    }
    .container {
        padding: 16px;
    }

    .formheader{
        text-align: center;
    }
</style>
<body>

    <div class="login" style="width: 50%; margin-left: auto; margin-right: auto">
        <form action="index.php" method="post">
          <div class="formheader">
             <h1>Dropfleet Commander Roster Editor</h1>
          </div>

          <div class="container">
            <label><b>Email</b></label>
            <input placeholder="email" type="text" name="email" id="username">

            <label><b>Password</b></label>
            <input placeholder="password" type="password" name="password" id="password">

            <button id="login" class="loginbtn" type="submit" name="submit">Log In</button>
          </div>
        </form>


        <form class="registerForm" action="register.php"  method="post">
            <div class="container" style="background-color:#f1f1f1">
                <button class="regbtn" onClick="window.location='register.php';">Click to Register</button>
              </div>
        </form>
    </div>


                   <?php
        session_start();
        if ($_SESSION["email"] != NULL){
        echo "<meta http-equiv='refresh' content='0;url=home.php'>";
        }
        else{
        if(isset($_POST['submit'])){ // was the form submitted?
          $link = mysqli_connect("localhost", "admin", "", "roster") or die ("connection Error " . mysqli_error($link));
            $sql = "SELECT salt, hash, email FROM user WHERE email=?";

            if($stmt = mysqli_prepare($link, $sql)) {
                $user = $_POST['email'];
                $password = $_POST['password'];
                mysqli_stmt_bind_param($stmt, "s", $user) or die("bind param");
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_bind_result($stmt, $salt ,$hashpass, $user);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($salt.$password, $hashpass)){
                            $_SESSION["email"] = $user;
                            $_Session["userid"] = $id;
                            echo "<script> window.location.assign('home.php'); </script>";
                } else {

                    echo "<h4>Login failed</h4><br>wrong username or password...";
                    }
                    }


                }
            }
        }
        }
       ?>

    </body>
</html>