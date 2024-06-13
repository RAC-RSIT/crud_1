<?php 

include('db_connection.php'); 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $isbn = $_POST['isbn'];
        $title = $_POST['title']; 
        $author = $_POST['author']; 
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        
        $sql = "UPDATE books SET title = :title, author = :author, price = :price, stock = :stock WHERE isbn = :isbn";

        $statement = $conn->prepare($sql);
        
        $statement->bindParam(":isbn", $isbn);
        $statement->bindParam(":title", $title);
        $statement->bindParam(":author", $author);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":stock", $stock);

        $statement->execute();

        // go to index.php
        header("Location: index.php");
    }
    catch(Exception $e) {
        echo "error: " . $e->getMessage();
    }
}

