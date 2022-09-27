<?php

$submit = $_POST["submit"];

if ($submit == "Yes"){
    $submit = "yes";
} elseif ($submit == "No"){
    $submit = "no";
} else {
    $submit = "dont_know";
}

$count = 0;

include_once("./connect.php");

$result = $database->query("SELECT questId, publish FROM question ORDER BY questId DESC LIMIT 1");

if ($result->num_rows > 0){   
    $row = $result->fetch_assoc();

    if ($row["publish"] == 1){
    $id = $row["questId"];
    
    // $result = $database->query("SELECT $submit FROM votes WHERE questId = ? ORDER BY voteId DESC LIMIT 1");
    $stmt = $database->stmt_init();
    $stmt = $database->prepare("SELECT $submit FROM votes WHERE questId = ? ORDER BY voteId DESC LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result2 = $stmt->get_result();

    // echo $result->num_rows;

    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $count = $row2["$submit"];
        $count += 1;
        
        $stmt = $database->stmt_init();
        $stmt = $database->prepare("UPDATE votes SET $submit = ? WHERE questId = ?");

        $stmt->bind_param("ii", $count, $id);
        $stmt->execute();
    } else {
        $stmt = $database->stmt_init();
        $stmt = $database->prepare("INSERT INTO votes(questId, $submit) VALUES(?,?)");

        $count += 1;
        $stmt->bind_param("ii", $id, $count);
        $stmt->execute();
    }
}
    
// $stmt = $database->stmt_init();
// $stmt = $database->prepare("INSERT INTO question(quest, yes, no, dont_know, publish) VALUES(?,?,?,?,?)");
// $stmt->bind_param("ssssi", $quest, $yes, $no, $dont_know, $publish);
// $stmt->execute();
} else {
    header("location: ../student.php");
}
header("location: ../student.php");