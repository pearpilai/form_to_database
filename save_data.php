<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost"; // Server name ของ XAMPP คือ localhost
$username = "root";      // Username เริ่มต้นของ XAMPP คือ root
$password = "";          // Password เริ่มต้นของ XAMPP คือค่าว่าง
$dbname = "26_form";    // ชื่อฐานข้อมูลที่เราสร้างไว้

// 1. สร้างการเชื่อมต่อกับ Database
$conn = new mysqli($servername, $username, $password, $dbname);

// ตั้งค่า character set เป็น utf8mb4 เพื่อรองรับภาษาไทย
$conn->set_charset("utf8mb4");

// 2. ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. รับค่าจากฟอร์มด้วยเมธอด POST
// ใช้ isset เพื่อตรวจสอบว่ามีค่านั้นๆ ส่งมาจริงหรือไม่
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

// 4. เตรียม SQL Statement เพื่อป้องกัน SQL Injection (วิธีที่ปลอดภัย)
// ใช้ Prepared Statements (?) เป็น placeholder สำหรับข้อมูล
$sql = "INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// 5. Bind ข้อมูลที่รับมาจากฟอร์มเข้ากับ placeholder
// "sss" หมายถึงตัวแปรทั้ง 3 ตัวเป็นชนิด String
$stmt->bind_param("sss", $firstname, $lastname, $email);

// 6. Execute คำสั่ง SQL
if ($stmt->execute()) {
    echo "<h1>บันทึกข้อมูลสำเร็จ!</h1>";
    echo "<p>ขอบคุณที่ลงทะเบียนครับ/ค่ะ</p>";
    echo '<a href="index.php">กลับไปที่หน้าฟอร์ม</a>';
} else {
    echo "<h1>เกิดข้อผิดพลาดในการบันทึกข้อมูล</h1>";
    echo "<p>Error: " . $stmt->error . "</p>";
    echo '<a href="index.php">ลองอีกครั้ง</a>';
}

// 7. ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();

?>