<?php include($root."header.php"); ?>
<?php
        if (!isset($_SERVER['HTTP']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
            //exit;
        }
        error_reporting(E_ALL);
        session_start();
        function goView() {
                header('Location: view.php');
        }
?>
        <div class="clearfix">
                <div class="row clearfix">
                        <div class="column full">
                                <div class="content">
                                        <!-- login form -->
                                        <form action="" method="post"><h2>Login</h2>
                                                <p>Username: <input type="text" name="email" id="username"><br>
                                                   Password: <input type="password" name="password" id="password"><br>

                                                   <button id="login" class="loginbtn" type="submit" name="submit">Log In</button></p>
                                                  <p><button id="Forgot" class="loginbtn" type="submit" name="forgot">Forgot Password?</button></p>
                                        </form>
                                </div>
                                
     
                         </div>
                </div>
         </div>

