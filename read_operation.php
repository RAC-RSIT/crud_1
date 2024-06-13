<?php 

include('db_connection.php'); 

$sql = "SELECT * FROM books"; 

$statement = $conn->prepare($sql); 

$statement->execute(); 

$books = $statement->fetchAll(PDO::FETCH_ASSOC); 