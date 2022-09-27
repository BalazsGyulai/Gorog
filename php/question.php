<?php

include_once("./connect.php");

$quest = $_POST["question"];
$questId = $_POST["questId"];

if (isset($_POST["yes"])){

    $yes = $_POST["yes"];
} else {
    $yes = "0";
}

if (isset($_POST["no"])){

    $no = $_POST["no"];
} else {
    $no = "0";
}

if (isset($_POST["idk"])){

    $dont_know = $_POST["idk"];
} else {
    $dont_know = "0";
}

if (isset($_POST["publish"])){

    $publish = 1;
} else {
    $publish = 0;
}


$stmt = $database->stmt_init();
$stmt = $database->prepare("SELECT * FROM question WHERE questId = ?");
$stmt->bind_param("i", $questId);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $stmt->fetch_assoc();

    $stmt = $database->stmt_init();
    $stmt = $database->prepare("INSERT INTO question(quest, yes, no, dont_know, publish) VALUES(?,?,?,?,?)");

    if ($yes == "yes"){
        $yes = $row["yes"];
    }
    if ($no == "no"){
        $no = $row["no"];
    }
    if ($dont_know == "idk"){
        $dont_know = $row["dont_know"];
    }
    $stmt->bind_param("ssssi", $quest, $yes, $no, $dont_know, $publish);
    $stmt->execute();
} else {
    

$stmt = $database->stmt_init();
$stmt = $database->prepare("INSERT INTO question(quest, yes, no, dont_know, publish) VALUES(?,?,?,?,?)");
$stmt->bind_param("ssssi", $quest, $yes, $no, $dont_know, $publish);
$stmt->execute();

}


// echo $yes, $no, $dont_know;

header("location: ../trainer.php");
