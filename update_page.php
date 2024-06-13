<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <title>Home</title>
    </head>
    <body>

        <?php include('db_connection.php'); ?> 

        <?php 
            if(isset($_GET['isbn'])) {
                $isbn = $_GET['isbn']; 
                $sql = "SELECT * FROM books WHERE isbn = $isbn"; 
                $statement = $conn->prepare($sql); 
                $statement->execute(); 
                $books = $statement->fetchAll(PDO::FETCH_ASSOC); 
            }
        ?>

        <section class="container my-5 d-flex justify-content-center">
            <div class="w-50 p-5 bg-light border rounded">
                <h4 class="mb-3 text-center">Update the book information</h4>
                <form action="update_operation.php" method="POST">
                    <input type="hidden" id="isbn" name="isbn" value="<?= $isbn ?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $books[0]['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" value="<?= $books[0]['author'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?= $books[0]['price'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="<?= $books[0]['stock'] ?>">
                    </div>
                    <input type="submit" class="btn btn-primary" name="add-book" value="UPDATE">
                </form>  
            </div>
        </section>  


        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>