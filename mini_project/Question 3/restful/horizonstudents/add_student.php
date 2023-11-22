<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    // Create connection use PDO
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS restful";
    $conn->exec($sql);

    // Switch  database
    $conn->exec("USE restful");

    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS horizonstudents (
        id INT AUTO_INCREMENT PRIMARY KEY,
        `Index No.` VARCHAR(50),
        `First Name` VARCHAR(50),
        `Last Name` VARCHAR(50),
        City VARCHAR(50),
        District VARCHAR(50),
        Province VARCHAR(50),
        `Email Address` VARCHAR(100),
        `Mobile Number` VARCHAR(20)
    )";
    $conn->exec($sql);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $indexNo = $_POST['indexNo'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $province = $_POST['province'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        // insert data
        $stmt = $conn->prepare("INSERT INTO horizonstudents (`Index No.`, `First Name`, `Last Name`, City, District, Province, `Email Address`, `Mobile Number`)
        VALUES (:indexNo, :firstName, :lastName, :city, :district, :province, :email, :mobile)");

        
        $stmt->bindParam(':indexNo', $indexNo);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':district', $district);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mobile', $mobile);

        
        $stmt->execute();

        echo "New record inserted successfully";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>