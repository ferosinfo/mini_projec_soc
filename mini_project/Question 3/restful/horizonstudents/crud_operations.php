<?php
include 'db_connection.php';

function handleGET() {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM restful.horizonstudents");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "No students found"));
    }
}

function handlePOST() {
    global $pdo;

    // Updated data for a new student 
    $data = array(
        "Index No." => "1000",
        "First Name" => "Rose",
        "Last Name" => "begam",
        "City" => "Kaduvela",
        "District" => "Gampaha",
        "Province" => "south",
        "Email Address" => "rose@test.com",
        "Mobile Number" => "9876543210"
    );

    $indexNo = $data['Index No.'];
    $firstName = $data['First Name'];
    $lastName = $data['Last Name'];
    $city = $data['City'];
    $district = $data['District'];
    $province = $data['Province'];
    $email = $data['Email Address'];
    $mobile = $data['Mobile Number'];

    $stmt = $pdo->prepare("INSERT INTO restful.horizonstudents (`Index No.`, `First Name`, `Last Name`, City, District, Province, `Email Address`, `Mobile Number`)
    VALUES (:indexNo, :firstName, :lastName, :city, :district, :province, :email, :mobile)");

    $stmt->bindParam(':indexNo', $indexNo);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':district', $district);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mobile', $mobile);

    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(array("message" => "Student added successfully"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Failed to add student"));
    }
}

function handlePUT() {
    global $pdo;

    // Updated data for the student named Ayas
    $data = array(
        
        "Index No." => "1212",
        "First Name" => "Ayas", 
        "Last Name" => "ahamed", 
        "City" => "katpiddi",
        "District" => "Puththalam",
        "Province" => "north",
        "Email Address" => "ayas@update.com",
        "Mobile Number" => "9825487541"
    );

    
    $indexNo = $data['Index No.'];
    $firstName = $data['First Name'];
    $lastName = $data['Last Name'];
    $city = $data['City'];
    $district = $data['District'];
    $province = $data['Province'];
    $email = $data['Email Address'];
    $mobile = $data['Mobile Number'];

    $stmt = $pdo->prepare("UPDATE restful.horizonstudents SET 
     `First Name` = :firstName, `Last Name` = :lastName,
    City = :city, District = :district, Province = :province,
    `Email Address` = :email, `Mobile Number` = :mobile WHERE `Index No.` = :indexNo");

    
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':district', $district);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mobile', $mobile);
    $stmt->bindParam(':indexNo', $indexNo);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(array("message" => "Student updated successfully"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Failed to update student"));
    }
}

function handleDELETE() {
    global $pdo;

    // Updated data for deleting a student with Index No. 2001
    $data = array(
        "Index No." => "1005"
    );

    $indexNo = $data['Index No.'];

    $stmt = $pdo->prepare("DELETE FROM restful.horizonstudents WHERE `Index No.` = :indexNo");
    $stmt->bindParam(':indexNo', $indexNo);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(array("message" => "Student deleted successfully"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Failed to delete student"));
    }
}

?>
