<?php 

include('db_connection.php'); 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $isbn = $_POST['isbn'];
        $title = $_POST['title']; 
        $author = $_POST['author']; 
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        
        $sql = "INSERT INTO books (isbn, title, author, price, stock) VALUES (:isbn, :title, :author, :price, :stock)"; 

        $statement = $conn->prepare($sql);

        $statement->bindParam(":isbn", $isbn);
        $statement->bindParam(":title", $title);
        $statement->bindParam(":author", $author);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":stock", $stock);
        

        $statement->execute(); 
    }
    catch(Exception $e) {
        echo "error: " . $e->getMessage();
    }
}

// go to index.php
header("Location: index.php");