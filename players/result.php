<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <h1>Match results</h1> 
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>result id</th>
                <th>competitor1	</th>
                <th>competitor2	</th>
                <th>competitor1_score</th>
                <th>competitor2_score</th>
                <th>winner_team</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "sp";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Read all rows from database table
            $sql = "SELECT * FROM results";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            // Read data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["result_id"] . "</td>
                <td>" . $row["competitor1"] . "</td>
                <td>" . $row["competitor2"] . "</td>
                <td>" . $row["competitor1_score"] . "</td>
                <td>" . $row["competitor2_score"] . "</td>
                <td>" . $row["winner_team"] . "</td>
                        <td>
                        <a class='btn btn-primary btn-sm' href='update.php?match_id=" . htmlspecialchars($row["result_id"]) . "'>Update</a>
                        <a class='btn btn-danger btn-sm' href='delete.php?match_id=" . htmlspecialchars($row["result_id"]) . "'>Delete</a>                   
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
