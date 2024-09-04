<?php
include("DbConnect.php");
require_once("Books.php");

$conn = new DbConnect();
$dbConnection = $conn->connect();

$instanceCars = new Books($dbConnection);

if (isset($_POST['add'])){
    $ISBN = $_POST['ISBN'];
    $author_name = $_POST['author_name'];
    $author_lastname = $_POST['author_lastname'];
    $book_name = $_POST['book_name'];
    $description = $_POST['description'];
    $instanceCars->addBook($ISBN, $author_name, $author_lastname, $book_name, $description);
    header('Location: index.php');
    exit();
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
        <h2 class="h2">Přidání knihy</h2>
        <form action="add.php" method="post">
            <input type="text" name="ISBN" value="" class="form-control my-2" placeholder="ISBN.." required>
            <input type="text" name="author_name" value="" class="form-control my-2" placeholder="Jméno autora.." required>
            <input type="text" name="author_lastname" value="" class="form-control my-2" placeholder="Přijmení autora.." required>
            <input type="text" name="book_name" value="" class="form-control my-2" placeholder="Název knihy.." required>
            <input type="text" name="description" value="" class="form-control my-2" placeholder="Popis.." required>
            <input type="submit" value="Vlož knihu" class="btn btn-primary my-2" name="add">
        </form>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>