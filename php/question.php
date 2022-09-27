<?php

include_once("./connect.php");

$quest = $_POST["question"];

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
$stmt = $database->prepare("INSERT INTO question(quest, yes, no, dont_know, publish) VALUES(?,?,?,?,?)");
$stmt->bind_param("ssssi", $quest, $yes, $no, $dont_know, $publish);
$stmt->execute();


// echo $yes, $no, $dont_know;

header("location: ../trainer.php");
