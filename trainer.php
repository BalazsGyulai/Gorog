<?php

include_once("./php/connect.php");

$result = $database->query("SELECT * FROM question ORDER BY questId DESC LIMIT 1");

if ($result->num_rows > 0){

    $row = $result->fetch_assoc();
} else {
    
    $row["publish"] = 0;
    $row["quest"] = "";
    $row["yes"] = 0;
    $row["no"] = 0;
    $row["dont_know"] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="js.js"></script>
    <title>Trainer</title>
</head>
<body>
    
   
    </div>
    <div class="form">
    <form method="POST" action="./php/question.php">
        <h2>Question</h2>
        
        
        <input type="text" id="question" name="question" value="<?php echo $row["quest"] ?>">
        <!-- <input type="checkbox" name="publish" id="publishq" value="publish"> -->

        <?php

if($row["publish"] == 1){
    echo '<input type="checkbox" name="publish" id="publishq" value="publish" checked>';
    
} else {
               echo '<input type="checkbox" name="publish" id="publishq" value="publish">';

           }
        ?>
        <label for="publishq">Publish</label>
        <br>
        <br>
        
        <Label>Yes</Label>
        
        <?php

if($row["yes"] == 1){
    echo '<input type="checkbox" name="yes" id="yes1" value="yes"  checked onclick="ido()" >';
    
} else {
               echo '<input type="checkbox" name="yes" id="yes1" value="yes" onclick="ido()">';

           }
        ?>

        <br>
        <br>

        <label>No</label>

        <?php 
        if($row["no"] == 1){
            echo '<input type="checkbox" name="no" id="no1" value="no" checked onclick=ido()>';
            
        } else {
           echo '<input type="checkbox" name="no" id="no1" value="no" onclick="ido()">';
            
        }
        ?>
        
        <br>
        <br>
        <label>I don't know</label>

        <?php 
        if($row["dont_know"] == 1){
            echo '<input type="checkbox" name="idk" id="idk1" value="idk" checked onclick="ido()">';
            
        } else {
           echo '<input type="checkbox" name="idk" id="idk1" value="idk" onclick="ido()">';
            
        }
        ?>
        

        
        <br>
        <br>

        <input type="submit" value="Save" id="save">
        <br>
        <br>
        
          <input type=button onClick="parent.location='results.html'"
    value='Show results' id="sresults">
    
        

      </form>
      </div>

      
</body>
</html>
