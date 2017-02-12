<?php require_once('header.php');
?>

<div class="clearfix">
                <div class="row clearfix">
                        <div class="column full">
                                <div class="content">
<form action="register.php" method="POST">
                                                <div class="row form-group">
                                                                <input class='form-control' type="email" name="email" placeholder="email">
                                                </div>
                                                <div class="row form-group">
                                                                <input class='form-control' type="password" name="password" placeholder="password">
                                                </div>
                                                <div class="row form-group">
                                                                <input class=" btn btn-info" type="submit" name="submit" value="Register"/>
                                                </div>
                                        </form>

<?php
 if(isset($_POST['submit'])) {
          $link = mysqli_connect('localhost', 'admin', '', 'roster') or die ("Connection Error" . mysqli_error($link));
          $sql = "INSERT INTO user(email,salt,hash) VALUES (?,?,?)";
          if ($stmt = mysqli_prepare($link, $sql)) {
            $email = $_POST['email'];
            $salt = mt_rand();
            $hashpass = password_hash($salt.$_POST['password'], PASSWORD_BCRYPT)  or die("bind param");
            mysqli_stmt_bind_param($stmt, "sss", $email, $salt, $hashpass) or die("bind param");
            if(mysqli_stmt_execute($stmt)) {
              echo "<h2>User Created</h2>";

                header('Refresh: 3; URL=index.php');
            } else {
              echo "<h4>Account creation for $email failed...</h4>";
            }
            $result = mysqli_stmt_get_result($stmt);
          }
        }
?>
