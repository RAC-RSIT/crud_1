<?php 

include('db_connection.php'); 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $book_isbn = $_POST['book_isbn']; 

    $sql = "DELETE FROM books WHERE isbn = $book_isbn"; 

    $conn->exec($sql); 
}

// go to index.php
header("Location: index.php");