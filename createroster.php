<!--
Currently in progress and needs to be implemented
-->
<?php include "header.php";
if ($_SESSION['email'] == NULL){
                echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
<body>

<div id="sidebar" class="sidebar">
    <div class="content">
    </div>
    </div>

<?php


        $conn = mysqli_connect('localhost','admin','password','roster') or die ("error connecting to database");
        $query = "SELECT * FROM ships ORDER BY faction ASC, points DESC";
        $result = mysqli_query($conn, $query);
        echo"<table class='table table-bordered table-hover table-striped'>
                        <tr>
                                <th>Faction</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Points</th>
                        </tr>";
        while ($row = mysqli_fetch_assoc($result)){
        echo
                "<tr>
                    <td>".$row['faction']."</td>
                    <td>".$row['type']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['points']."</td>
                    
            </tr>";
        }
        echo"</table>";

?>

</body>
</html>
