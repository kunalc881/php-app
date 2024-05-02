<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Form</title>
</head>
<body>

<h2>Enter Data</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="surname"><br><br>

    <input type="submit" value="Submit">
</form>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    // Database connection parameters
    $servername = $_ENV['DB_HOST'] ?? '172.31.28.92';
    $username = $_ENV['DB_USER'] ?? 'kunal';
    $password = $_ENV['DB_PASSWORD'] ?? 'test';
    $dbname = $_ENV['DB_NAME'] ?? 'phpdatabase';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the table
    $sql = "INSERT INTO phptable (name, surname) VALUES ('$name', '$surname')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

</body>
</html>
