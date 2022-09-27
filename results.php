<?php
include_once("./php/connect.php");


$result = $database->query("SELECT questId, quest, publish FROM question ORDER BY questId DESC LIMIT 1");

if ($result->num_rows > 0){   
    $row = $result->fetch_assoc();

    $id = $row["questId"];
    
    // $result = $database->query("SELECT $submit FROM votes WHERE questId = ? ORDER BY voteId DESC LIMIT 1");
    $stmt = $database->stmt_init();
    $stmt = $database->prepare("SELECT yes, no, dont_know FROM votes WHERE questId = ? ORDER BY voteId DESC LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result2 = $stmt->get_result();

    // echo $result->num_rows;

    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
    } else {
        $row2["yes"] = 0;
        $row2["no"] = 0;
        $row2["dont_know"] = 0;
}
} else {
    $row2["yes"] = 0;
    $row2["no"] = 0;
    $row2["dont_know"] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Results</title>
</head>
<body>

    <div class="results" style="text-align:center" >
        <h1>Results</h1>
        <h2><?php echo $row["quest"] ?></h2>
        <br>
        <h1>Yes</h1><h3 id="yes"><?php echo $row2["yes"] ?></h3>
        <br>
        <h1>No</h1> <h3 id="no"><?php echo $row2["no"] ?></h3>
        <br>
        <h1>I don't know</h1> <h3 id="idk"><?php echo $row2["dont_know"] ?></h3>
        <br>

        
    </div>
    
</body>
</html>