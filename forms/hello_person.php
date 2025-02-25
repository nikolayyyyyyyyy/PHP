<form method="post">
Name: <input type="text" name="name"/><br/></br>
      <input type="submit" value="Submit"/>
</form>

<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(!empty($_POST["name"])){

            echo "Hello, ".$_POST["name"].".";
        } else {

            echo "Set name.";
        }
    }
