<?php
include_once "./authguard.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <div style="display:flex;flex-wrap: wrap;
    justify-content: space-around;">
    <?php
    echo "<h2>";
    echo "Hello ",$_SESSION['username'];
    echo "</h2>";

    ?>
    <form class='d-flex' role='search' action='logout.php'>
        <br><br>
            <button class='btn btn-outline-success'  >Logout</button>
          </form>
    
    </div>

</body>
</html>