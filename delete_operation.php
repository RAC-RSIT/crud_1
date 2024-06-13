<?php 

include('db_connection.php'); 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $isbn = $_POST['isbn']; 

    $sql = "DELETE FROM books WHERE isbn = $isbn"; 

    $conn->exec($sql); 
}

// go to index.php
header("Location: index.php");