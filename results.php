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
    <div class="rain">
    <div class="lightining">
 <div id="typewriter">
    <div class="results" style="text-align:center" >
        <h1>Results</h1>
        <h2><?php echo $row["quest"] ?></h2>
        <!-- <br>
        <h1>Yes</h1><h3 id="yes"><?php echo $row2["yes"] ?></h3>
        <br>
        <h1>No</h1> <h3 id="no"><?php echo $row2["no"] ?></h3>
        <br>
        <h1>I don't know</h1> <h3 id="idk"><?php echo $row2["dont_know"] ?></h3>
        <br> -->

        
    </div>
</div>
</div>

<div id="chart" style="position: relative; height:20vh; width:30vw; margin: 0 auto;">
<canvas id="myChart"></canvas>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
let yes = parseInt(<?php echo $row2["yes"] ?>);
let no = parseInt(<?php echo $row2["no"] ?>);
let idk = parseInt(<?php echo $row2["dont_know"] ?>);
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Yes', 'No', "I don't know"],
        datasets: [{
            label: '# of Votes',
            data: [yes, no, idk],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
