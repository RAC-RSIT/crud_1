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
    <!-- include necessary php files -->
    <?php include('read_operation.php') ?>  <!-- reads the book list from database -->

    <h1 class="text-center bg-dark text-light p-5">Rootsoft International Library</h1>
    <section class="container my-5">
        <div class="row d-flex justify-content-between">
            <div class="col-6 d-flex justify-content-start">
                <h4>All books</h4>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addBookModal">Add new book</button>
            </div>
        </div>
        <table class="table table-hover table-bordered table-striped my-5 text-center">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($books as $book) { 
                ?>
                    <tr>
                        <td><?= $book['isbn'] ?></td>
                        <td><?= $book['title'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td><b>$</b> <?= $book['price'] ?></td>
                        <td><?= $book['stock'] ?></td>
                        <td><a href="update_page.php?isbn=<?= $book['isbn'] ?>" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="delete_operation.php" method="POST">
                                <!-- this hidden input field is used to pass the isbn of the clicked record when the form is submitted -->
                                <input type="hidden" name="isbn" value="<?= $book['isbn']; ?>"> 
                                <input type="submit" class="btn btn-danger" name="delete-book" value="DELETE">
                            </form>
                        </td>
                    </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>

        <!-- Add book Modal starts here -->
        <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBookModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="create_operation.php" method="POST">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" aria-describedby="isbnHelp">
                                <small id="isbnHelp" class="form-text text-muted">ISBN is a unique number for each book</small>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock">
                            </div>
                            <input type="submit" class="btn btn-primary" name="add-book" value="ADD">
                        </form>    
                    </div>
                </div>
            </div>
        </div>
        <!-- Add book Modal ends here -->
    </section>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>