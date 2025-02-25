<form action="" method="post">
    Categories: <input type="text" name="categories"><br><br>
    Tags: <input type="text" name="tags"><br><br>
    Months: <input type="text" name="months"><br><br>
    <input type="submit" value="Generate" ><br><br>
</form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST["categories"])){

            echo "<h2>Categories</h2>";
            $categories = explode(", ",$_POST["categories"]);

            echo "<ul>";
            foreach($categories as $category){

                echo "<li>$category</li>";
            }
            echo "</ul>";
            echo "<hr>";
        }

        if(!empty($_POST["tags"])){

            echo "<h2>Tags</h2>";
            $tags = explode(", ",$_POST["tags"]);

            echo "<ul>";
            foreach($tags as $tag){

                echo "<li>$tag</li>";
            }
            echo "</ul>";
            echo "<hr>";
        }

        if(!empty($_POST["months"])){

            echo "<h2>Months</h2>";
            $months = explode(", ",$_POST["months"]);

            echo "<ul>";
            foreach($months as $month){

                echo "<li>$month</li>";
            }
            echo "</ul>";
            echo "<hr>";
        }
    }
