<?php
include("DbConnect.php");
require_once("Books.php");

$conn = new DbConnect();
$dbConnection = $conn->connect();

$instanceCars = new Books($dbConnection);
$books = $instanceCars->getBooks();

if (isset($_GET['ISBN']) || isset($_GET['author_name']) || isset($_GET['author_lastname']) || isset($_GET['book_name']) || isset($_GET['description'])) {
    $selISBN = $_GET['ISBN'];
    $selAuthor_name = $_GET['author_name'];
    $selAuthor_lastname = $_GET['author_lastname'];
    $selBook_name = $_GET['book_name'];
    $selDescription = $_GET['description'];
    $selBooks = $instanceCars->filterBooks($selISBN, $selAuthor_name, $selAuthor_lastname, $selBook_name, $selDescription);
} else {
    $selBooks = $books;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knihy</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Knihy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Vyhledávání</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Přidej knihu</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="h2">Vyhledávání</h2>
        <form action="index.php" method="get">
            <input type="text" name="ISBN" class="form-control my-2" placeholder="ISBN...">
            <input type="text" name="author_name" class="form-control my-2" placeholder="Jméno autora...">
            <input type="text" name="author_lastname" class="form-control" placeholder="Přijmení autora...">
            <input type="text" name="book_name" class="form-control my-2" placeholder="Jméno knihy...">
            <input type="text" name="description" class="form-control my-2" placeholder="Popis...">
            <input type="submit" value="Odešli" class="btn btn-primary my-2">
        </form>
        <table class="table">
            <tr>
                <th>ISBN</th>
                <th>Jméno autora</th>
                <th>Přijmení autora</th>
                <th>Jméno Knihy</th>
                <th>Popis</th>
            </tr>
            <?php
            foreach ($selBooks as $book):
                ?>
                <tr>
                    <td><?php echo $book['ISBN'] ?></td>
                    <td><?php echo $book['author_name'] ?></td>
                    <td><?php echo $book['author_lastname'] ?></td>
                    <td><?php echo $book['book_name'] ?></td>
                    <td><?php echo $book['description'] ?></td>
                </tr>
                <?php
            endforeach;
            ?>
        </table>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>