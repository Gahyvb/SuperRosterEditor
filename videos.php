<?php include "header.php";
if ($_SESSION['email'] == NULL){
                echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Videos</title>
    </head>
<body>

    <p>Watch the below video to learn how to play the game!</p>
    <div class="imgcontainer">
        <iframe width="640" height="360" src="https://www.youtube.com/embed/j89Q-ZxNF94" frameborder="0" allowfullscreen></iframe>
    </div>


</body>

</html>