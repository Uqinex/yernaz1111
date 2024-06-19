<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <h1>members information</h1> 
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Player id</th>
                <th>Club</th>
                <th>Players</th>
                <th>Position</th>
                <th>Date of birth</th>
                <th>Nationality</th>
                <th>Profile Picture</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "team";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Read all rows from database table
            $sql = "SELECT * FROM players";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            // Read data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["player_id"] . "</td>
                <td>" . $row["team"] . "</td>
                <td>" . $row["player_name"] . "</td>
                <td>" . $row["position"] . "</td>
                <td>" . $row["date_of_birth"] . "</td>
                <td>" . $row["nationality"] . "</td>
                <td><img src='" . $row["photo_players"] . "' alt='" . $row["player_name"] . "' width='50' height='50'></td>
                        <td>
                        <a class='btn btn-primary btn-sm' href='update.php?match_id=" . htmlspecialchars($row["player_id"]) . "'>Update</a>
                        <a class='btn btn-danger btn-sm' href='delete.php?match_id=" . htmlspecialchars($row["player_id"]) . "'>Delete</a>                   
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
