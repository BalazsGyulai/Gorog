<?php

include_once("./connect.php");

$quest = $_POST["question"];

if (isset($_POST["yes"])){

    $yes = 1;
} else {
    $yes = 0;
}

if (isset($_POST["no"])){

    $no = 1;
} else {
    $no = 0;
}

if (isset($_POST["idk"])){

    $dont_know = 1;
} else {
    $dont_know = 0;
}



$stmt = $database->stmt_init();
$stmt = $database->prepare("INSERT INTO question(quest, yes, no, dont_know) VALUES(?,?,?,?)");
$stmt->bind_param("siii", $quest, $yes, $no, $dont_know);
$stmt->execute();


// echo $yes, $no, $dont_know;

header("location: ../index.php");
