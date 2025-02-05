<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction to PHP</title>
</head>
<body>
    <center>
        <marquee>This is my first PHP code</marquee>
        <?php
            #Printing
            echo "<font color=red size=5>Welcome in PHP</font>";
            print("<br> This is my PHP certification course");

            #variable
            $a = 10;
            $b = 20;
            $c = $a + $b;
            echo "<br>Sum of ".$a." and ".$b." is ".$c;

            #data type
            $int = 10;
            echo "<br>Integer : ".$int;
            $float = 10.25;
            echo "<br>Float : ".$float;
            $string = "Musaraf Hossain";
            echo "<br>String : ".$string;
            $boolean = TRUE;
            echo "<br>Boolean : ".$boolean;
            $array = array("Musaraf", "Abu", "Tanvir");
            echo "<br>Array: ";
            print_r($array);
            $null = NULL;
            echo "<br>Null : ".$null;

            #constants
            define("PI", 3.14);
            echo "<br>Constants : ".PI;
            echo "<br>PHP Version : ".PHP_VERSION;
            echo "<br>PHP OS : ".PHP_OS;
        ?>
    </center>
</body>
</html>