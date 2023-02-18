<h1>index user</h1>
<?php
// print_r($userRole) ;
// print_r($productName) ;
// echo "<br/>";
// print_r($user) ;

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
 