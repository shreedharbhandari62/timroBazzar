
<?php
$SERVER=SERVER;
$DBNAME=DBNAME;
try {
    $conn = new PDO("mysql:host=$SERVER;dbname=$DBNAME", DBUSER, DBPASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connected Successfully";
    }
catch(PDOException $e)
    {
    echo  $e->getMessage();
    }