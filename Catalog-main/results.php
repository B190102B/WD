<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>

<body>
    <h1>Book Search Results</h1>
    <?php
    // TODO 1: Create short variable names.
    $hn = "localhost";
    $db = "publications";
    $un = "sm";
    $pw = "password";


    // TODO 2: Check and filter data coming from the user.
    if (isset($_POST["searchterm"]) && isset($_POST["searchtype"])) {
        $key = $_POST["searchterm"];
        $type = $_POST["searchtype"];

        // TODO 3: Setup a connection to the appropriate database.
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) {
            die("fail to link");
        }

        // TODO 4: Query the database.
        $query = "SELECT * FROM catalogs WHERE $type LIKE '%$key%' ";
        $data = $conn->query($query);

        // TODO 5: Retrieve the results.
        if (!$data) {
            echo "data none found";
        }

        // TODO 6: Display the results back to user.
        echo "<table style='border: 1px solid black'>
        <tr>
            <th>isbn</th>
            <th>author</th>
            <th>title</th>
            <th>price</th>
        </tr>";
        
        for ($i = 0; $i < $data->num_rows; $i++) {
            $row = $data->fetch_array(MYSQLI_NUM);
            echo "<tr>";
            for ($j = 0; $j < 4; $j++) {
                echo "<td>" . htmlspecialchars($row[$j]) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        // TODO 7: Disconnecting from the database.
        $conn->close();
        $data->close();

    } else{
        echo "no data";
    }
    ?>
</body>

</html>