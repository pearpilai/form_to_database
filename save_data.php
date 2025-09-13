<?php

$servername = "localhost"; 
$username = "root";      
$password = "";          
$dbname = "26_form";    


$conn = new mysqli($servername, $username, $password, $dbname);


$conn->set_charset("utf8mb4");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';


$sql = "INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}


$stmt->bind_param("sss", $firstname, $lastname, $email);


if ($stmt->execute()) {
    echo "<h1>บันทึกข้อมูลสำเร็จ!</h1>";
    echo "<p>ขอบคุณที่ลงทะเบียนครับ/ค่ะ</p>";
    echo '<a href="index.php">กลับไปที่หน้าฟอร์ม</a>';
} else {
    echo "<h1>เกิดข้อผิดพลาดในการบันทึกข้อมูล</h1>";
    echo "<p>Error: " . $stmt->error . "</p>";
    echo '<a href="index.php">ลองอีกครั้ง</a>';
}


$stmt->close();
$conn->close();


?>
