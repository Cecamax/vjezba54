<?php

$server ="localhost";
$user = "root";
$password = "";
$database ="";
$port = "3306";


$connection = mysqli_connect($server, $user, $password, $database, $port);

if(!$connection){
    die("Connection faild" . mysqli_connect_error());
}


mysqli_set_charset($connection, "utf8");

$query = "SELECT * FROM superheroes.users";

$results = mysqli_query($connection, $query);

if(mysqli_num_rows($results) > 0){
    while($row = mysqli_fetch_assoc($results)){
        echo "Hello, I am " . $row['name'] . " " . $row['lastname'] . ".<br>";
    }
}

# ovdje radimo INSERT
/*
$queryInesrt = "INESRT INTO superheroes.users (name, lastname, date) VALUES ('Tim', 'Drake', '21.12.2019')";

if(mysqli_query ($connection, $queryInesrt)){
    echo "Data inserted...";
}
*/

#ovdje radimo UPDATE

$queryUpdate = "UPDATE superheroes.users SET name='Barry', lastname='Alan' WHERE id = 4";

if(mysqli_query($connection, $queryUpdate)){
    echo "Data update...";
}else{
    echo "Data not update...";
}

#ovdje ide DELITE
$queryDelete = "DELETE FROM superheroes.users WHERE id = 5";

if(mysqli_query($connection, $queryDelete)){
    echo "Data deleted...";
}else{
    echo "Data not deleted...";
}
?>