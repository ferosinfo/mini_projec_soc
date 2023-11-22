
<?php
include 'crud_operations.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handleGET();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handlePOST();
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    handlePUT();
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    handleDELETE();
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Invalid method"));
}
?>