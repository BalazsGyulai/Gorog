<?php
include_once("./php/connect.php");

$result = $database->query("SELECT questId, quest, yes, no, dont_know, publish FROM question ORDER BY questId DESC LIMIT 1");

if ($result->num_rows > 0){   
    $row = $result->fetch_assoc();

    if ($row["publish"] == 0){
        $row["quest"] = "There is no question yet.";
        $row["yes"] ="0";
        $row["no"] ="0";
        $row["dont_know"] ="0";
    }
} else {
    $row["quest"] = "There is no question yet.";
    $row["yes"] ="0";
    $row["no"] ="0";
    $row["dont_know"] ="0";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <form action="./php/vote.php" method="post">

    <?php
echo " <h1>".$row["quest"]."</h1> "
    ?>
   
    <!-- <h1 id="question">&nbsp;</h1> -->
<div class="buttons">
    <div id="block">
    <?php
    if ($row["yes"] != "0") {
        echo ' <div class="yes">

        <input id="yes" type="submit" name="submit" title="Yes" value="Yes">

    </div>';
    }
    if ($row["no"] != "0") {
        echo '       <div class="no">

        <input id="no" type="submit" name="submit" title="No" value="No">  

    </div>';
    }

    if ($row["dont_know"] != "0") {
        echo '     <div class="dontknow">
        
        <input id="dontknow" type="submit" name="submit" title="Dont know" value="Dont know">
        </div>';
    }
    echo "</div>";
    ?>
       
 
    </div>

</form>
</div>

</body>
</html> 
