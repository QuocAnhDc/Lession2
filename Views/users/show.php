<h1>show products</h1>
<?php
// print_r($productName) ;
echo "<br/>";

    foreach ($user as $key => $value)
    {
        echo "<br/>";
        foreach ($value as $key => $value)
        {
            echo("{$key}: ");
            echo($value);
            echo "<br/>";
        }
    }
?>