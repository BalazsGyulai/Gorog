<?php

include_once("./php/connect.php");

$result = $database->query("SELECT * FROM question ORDER BY questId DESC LIMIT 1");

if ($result->num_rows > 0){

    $row = $result->fetch_assoc();
} else {
    $row["quest"] = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trainer</title>
</head>
<body>
    <font color="blue"></font>
    <div class="form">
    <form method="POST" action="./php/question.php">
        <h2>Question</h2>
        
        
        <input type="text" id="question" name="question" value="<?php echo $row["quest"] ?>">
        <input type="checkbox" name="publish" id="publishq" value="publish">
        <label for="publishq">Publish</label>
        <br>
        <br>
        
        <input type="submit" value="Yes">
        <input type="submit" value="No">
        <input type="submit" value="I don't know">
        <br>
        <br>

        <input type="submit" value="Save">

      </form>
      </div>
</body>
</html>