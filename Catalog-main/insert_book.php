<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>

<body>
    <h1>Book Entry Results</h1>
    <?php
    // TODO 1: Create short variable names.
    if (isset($_POST["isbn"]) && isset($_POST["author"]) && isset($_POST["title"]) && isset($_POST["price"])) {
        $isbn = $_POST["isbn"];
        $author = $_POST["author"];
        $title = $_POST["title"];
        $price = $_POST["price"];

        // TODO 2: Check and filter data coming from the user.
        if ($isbn && $author && $title && $price) {

            // TODO 3: Setup a connection to the appropriate database.

            $hn = "localhost";
            $db = "publications";
            $un = "sm";
            $pw = "password";

            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) {
                die("fail to link");
            }

            // TODO 4: Query the database.
            $query = "INSERT INTO catalogs(isbn, author, title, price) VALUES ('$isbn','$author','$title','$price')"; //sql code
            $conn->query($query);

            // TODO 5: Display the feedback back to user.
            echo "create succ";

            // TODO 6: Disconnecting from the database.
            $conn->close();
        } else {
            echo "Pls fill all the form";
        }
    } else {
        echo "no info received";
    }

    ?>

    <a href="./newbook.html">back</a>
</body>

</html>