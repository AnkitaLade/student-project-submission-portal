<?php
$servername = "localhost";
$username = "root"; // XAMPP default
$password = "";
$dbname = "student_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $domain = $_POST['domain'];
    $abstract = $_POST['abstract'];
    $description = $_POST['description'];

    $fileName = '';
    if(isset($_FILES['file']) && $_FILES['file']['error'] === 0){
        $uploadDir = 'uploads/';
        if(!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time().'_'.basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir.$fileName);
    }

    $stmt = $conn->prepare("INSERT INTO projects (name, roll, email, title, domain, abstract, description, fileName) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $roll, $email, $title, $domain, $abstract, $description, $fileName);

    if($stmt->execute()){
        echo "success";
    } else {
        echo $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
