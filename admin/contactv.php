<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #FFB6C1	;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        h2 {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            margin: 0;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d4edda;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Contact List</h2>

    <?php
    // Include the connection.php file
    require_once 'connection.php';

    // Perform SQL query to retrieve contact data
    $sql = "SELECT * FROM contact";
    $result = mysqli_query($conn, $sql);

    // Check and display data
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                   
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['message']}</td>
                    
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found";
    }

    // Close the connection
    mysqli_close($conn);
    ?>

</div>

</body>